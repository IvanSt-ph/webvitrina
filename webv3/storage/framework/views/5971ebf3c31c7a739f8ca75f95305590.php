<!-- Выдвижное боковое меню категорий -->
<div 
    x-show="open"
    class="fixed inset-0 z-50 flex"
    x-cloak
>
    <!-- overlay -->
    <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity duration-300"
         x-show="open"
         x-transition.opacity
         @click="open = false"></div>

    <!-- sidebar -->
    <div 
        class="relative bg-white w-72 h-full shadow-lg z-50 overflow-y-auto transform transition-transform duration-300"
        x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
    >
        <!-- header -->
        <div class="flex items-center justify-between px-4 py-3 border-b">
            <h2 class="text-lg font-semibold">Категории</h2>
            <button @click="open = false" class="text-gray-500 hover:text-gray-700">✕</button>
        </div>

        <!-- список категорий -->
        <ul class="divide-y divide-gray-200">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if (isset($component)) { $__componentOriginal3453a3ac21523c7c917410f853a17aab = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3453a3ac21523c7c917410f853a17aab = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.category-item','data' => ['category' => $cat]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('category-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['category' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($cat)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3453a3ac21523c7c917410f853a17aab)): ?>
<?php $attributes = $__attributesOriginal3453a3ac21523c7c917410f853a17aab; ?>
<?php unset($__attributesOriginal3453a3ac21523c7c917410f853a17aab); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3453a3ac21523c7c917410f853a17aab)): ?>
<?php $component = $__componentOriginal3453a3ac21523c7c917410f853a17aab; ?>
<?php unset($__componentOriginal3453a3ac21523c7c917410f853a17aab); ?>
<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>
<?php /**PATH C:\webv3\resources\views/profile/partials/category-menu.blade.php ENDPATH**/ ?>