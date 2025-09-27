


<li x-data="{ show: false }">
    <button @click="show = !show"
        class="w-full flex justify-between items-center px-4 py-3 hover:bg-gray-50">
        <span><?php echo e($category->name); ?></span>
        <?php if($category->children->count()): ?>
            <svg :class="{'rotate-90': show}" class="w-4 h-4 transform transition-transform"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 5l7 7-7 7"/>
            </svg>
        <?php endif; ?>
    </button>

    <?php if($category->children->count()): ?>
        <ul x-show="show" x-collapse class="bg-gray-50">
            <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if (isset($component)) { $__componentOriginal3453a3ac21523c7c917410f853a17aab = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3453a3ac21523c7c917410f853a17aab = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.category-item','data' => ['category' => $child]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('category-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['category' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($child)]); ?>
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
    <?php endif; ?>
</li>
<?php /**PATH C:\webv3\resources\views/components/category-item.blade.php ENDPATH**/ ?>