@props(['category', 'activeCategoryId' => null])

@php
  $hasChildren = $category->children->isNotEmpty();
  $isActive = $activeCategoryId === $category->id;

  // 🔹 Сохраняем все текущие query, кроме пагинации
  $keep = http_build_query(request()->except('page'));
  $link = route('category.show', $category->slug) . ($keep ? '?' . $keep : '');
@endphp

<li>
  <div x-data="{ open: false }" class="my-1">
    <div class="flex items-center justify-between">
      @if($hasChildren)
        <!-- 📂 слово категории = раскрытие -->
        <button type="button"
                @click="open = !open"
                class="flex-1 text-left py-2 px-3 rounded hover:bg-gray-100 {{ $isActive ? 'bg-indigo-100 font-semibold text-indigo-700' : '' }}">
          {{ $category->name }}
        </button>

        <!-- 🔗 стрелка = ссылка -->
        <a href="{{ $link }}"
           class="p-2 rounded hover:bg-gray-200 {{ $isActive ? 'text-indigo-600' : '' }}"
           title="Перейти в категорию {{ $category->name }}">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
          </svg>
        </a>
      @else
        <!-- 🌿 если нет детей -->
        <a href="{{ $link }}"
           class="flex-1 py-2 px-3 rounded hover:bg-gray-100 block {{ $isActive ? 'bg-indigo-100 font-semibold text-indigo-700' : '' }}">
          {{ $category->name }}
        </a>
      @endif
    </div>

    @if($hasChildren)
      <ul x-show="open" x-transition x-cloak class="ml-4 border-l pl-2">
        @foreach($category->children as $child)
          <x-category-item :category="$child" :activeCategoryId="$activeCategoryId" />
        @endforeach
      </ul>
    @endif
  </div>
</li>
