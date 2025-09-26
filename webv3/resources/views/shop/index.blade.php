<x-app-layout title="Каталог">
  <h1 class="text-2xl font-bold mb-4">Каталог</h1>
  <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
    @foreach($products as $p)
      <div class="bg-white rounded-xl border p-3 flex flex-col">
        <a href="{{ route('product.show',$p) }}" class="aspect-square bg-gray-100 rounded mb-2 overflow-hidden">
          @if($p->image)
            <img src="{{ asset('storage/'.$p->image) }}" class="w-full h-full object-cover"/>
          @endif
        </a>
        <div class="font-medium line-clamp-2">{{ $p->title }}</div>
        <div class="mt-auto flex items-center justify-between">
          <div class="text-lg font-bold">{{ number_format($p->price, 2, ',', ' ') }} ₽</div>
          <form method="post" action="{{ route('cart.add',$p) }}">@csrf
            <button class="px-3 py-1.5 text-sm bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">В корзину</button>
          </form>
        </div>
      </div>
    @endforeach
  </div>
  <div class="mt-4">{{ $products->withQueryString()->links() }}</div>
</x-app-layout>
