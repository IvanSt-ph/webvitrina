{{-- Добавили поддержку вложенных категорий с помощью Alpine.js для раскрытия/сокрытия подкатегорий. 14,09,2025 --}}


<li x-data="{ show: false }">
    <button @click="show = !show"
        class="w-full flex justify-between items-center px-4 py-3 hover:bg-gray-50">
        <span>{{ $category->name }}</span>
        @if($category->children->count())
            <svg :class="{'rotate-90': show}" class="w-4 h-4 transform transition-transform"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 5l7 7-7 7"/>
            </svg>
        @endif
    </button>

    @if($category->children->count())
        <ul x-show="show" x-collapse class="bg-gray-50">
            @foreach($category->children as $child)
                <x-category-item :category="$child" />
            @endforeach
        </ul>
    @endif
</li>
