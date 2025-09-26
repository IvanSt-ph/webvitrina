<x-app-layout :title="$product->exists ? 'Редактирование' : 'Добавление'">
  <h1 class="text-2xl font-bold mb-4">
    {{ $product->exists ? 'Редактирование' : 'Добавление' }} товара
  </h1>

  <form method="post" enctype="multipart/form-data"
        action="{{ $product->exists ? route('seller.products.update',$product) : route('seller.products.store') }}"
        class="max-w-2xl bg-white border rounded p-4 space-y-3">
    @csrf
    @if($product->exists) @method('PUT') @endif

    <div>
      <label class="block text-sm">Название</label>
      <input name="title" value="{{ old('title',$product->title) }}"
             class="w-full border rounded p-2"/>
    </div>

  <div class="grid grid-cols-2 gap-3">
  <div>
    <label class="block text-sm">Цена (в рублях)</label>
    <input name="price" type="number" step="0.01" min="0" 
           value="{{ old('price',$product->price) }}" 
           class="w-full border rounded p-2"/>
  </div>
  <div>
    <label class="block text-sm">Остаток</label>
    <input name="stock" type="number" min="0" 
           value="{{ old('stock',$product->stock) }}" 
           class="w-full border rounded p-2"/>
  </div>
</div>


    <div>
      <label class="block text-sm">Описание</label>
      <textarea name="description"
                class="w-full border rounded p-2">{{ old('description',$product->description) }}</textarea>
    </div>

    <div>
    <label class="block text-sm">Страна</label>
    <select name="country" class="w-full border rounded p-2">
        <option value="Приднестровье" {{ old('country', $product->country) == 'Приднестровье' ? 'selected' : '' }}>Приднестровье</option>
        <option value="Молдова" {{ old('country', $product->country) == 'Молдова' ? 'selected' : '' }}>Молдова</option>
        <option value="Украина" {{ old('country', $product->country) == 'Украина' ? 'selected' : '' }}>Украина</option>
    </select>
</div>


    <div>
      <label class="block text-sm">Изображение</label>
      <input type="file" name="image" class="w-full border rounded p-2"/>
      @if($product->image)
        <img src="{{ asset('storage/'.$product->image) }}" class="mt-2 w-40 rounded"/>
      @endif
    </div>

    <div class="pt-2">
      <button class="px-4 py-2 bg-emerald-600 text-white rounded">Сохранить</button>
    </div>
  </form>
</x-app-layout>
