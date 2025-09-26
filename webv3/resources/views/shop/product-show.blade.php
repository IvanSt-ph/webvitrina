<x-app-layout :title="$product->title">
  <div class="grid md:grid-cols-2 gap-6">
    <div class="bg-white rounded-xl border p-3">
      @if($product->image)
        <img src="{{ asset('storage/'.$product->image) }}" class="w-full rounded-lg"/>
      @endif
    </div>
    <div>
      <h1 class="text-3xl font-bold">{{ $product->title }}</h1>
      <div class="text-2xl my-2">{{ number_format($product->price, 2, ',', ' ') }} ₽</div>
      <p class="text-gray-700">{{ $product->description }}</p>
      <div class="mt-4 flex gap-3">
        @auth
        <form method="post" action="{{ route('cart.add',$product) }}">@csrf
          <button class="px-4 py-2 bg-indigo-600 text-white rounded">Добавить в корзину</button>
        </form>
        <form method="post" action="{{ route('favorites.toggle',$product) }}">@csrf
          <button class="px-4 py-2 border rounded">❤ В избранное</button>
        </form>
        @else
        <a href="/login" class="px-4 py-2 bg-indigo-600 text-white rounded">Войти, чтобы купить</a>
        @endauth
      </div>

      <section class="mt-8">
        <h2 class="text-xl font-semibold mb-2">Отзывы</h2>
        @auth
        <form method="post" action="{{ route('review.store',$product) }}" class="mb-4">@csrf
          <label class="block text-sm">Оценка</label>
          <select name="rating" class="border rounded p-2 mb-2">
            @for($i=5;$i>=1;$i--)<option value="{{ $i }}">{{ $i }}</option>@endfor
          </select>
          <textarea name="body" placeholder="Ваш отзыв" class="w-full border rounded p-2"></textarea>
          <button class="mt-2 px-3 py-1.5 bg-gray-900 text-white rounded">Отправить</button>
        </form>
        @endauth
        <div class="space-y-3">
          @forelse($product->reviews as $r)
            <div class="bg-white border rounded p-3">
              <div class="font-medium">{{ $r->user->name }} — {{ $r->rating }}★</div>
              <div class="text-gray-700">{{ $r->body }}</div>
            </div>
          @empty
            <p class="text-gray-600">Пока нет отзывов.</p>
          @endforelse
        </div>
      </section>
    </div>
  </div>
</x-app-layout>
