<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Кабинет продавца')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Мои товары -->
                <a href="<?php echo e(route('seller.products.index')); ?>" 
                   class="group bg-white shadow rounded-xl p-6 flex flex-col items-center justify-center 
                          hover:shadow-lg hover:bg-indigo-50 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" 
                         class="h-12 w-12 text-indigo-600 group-hover:scale-110 transition-transform" 
                         fill="currentColor" viewBox="0 0 24 24">
                        <path d="M3 3h18v2H3V3zm2 4h14v2H5V7zm-2 4h18v10H3V11zm2 2v6h14v-6H5z"/>
                    </svg>
                    <span class="mt-4 text-lg font-semibold text-gray-800">Мои товары</span>
                    <span class="text-sm text-gray-500">Управление товарами</span>
                </a>

                <!-- Добавить товар -->
                <a href="<?php echo e(route('seller.products.create')); ?>" 
                   class="group bg-white shadow rounded-xl p-6 flex flex-col items-center justify-center 
                          hover:shadow-lg hover:bg-green-50 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" 
                         class="h-12 w-12 text-green-600 group-hover:scale-110 transition-transform" 
                         fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 5v14m-7-7h14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    <span class="mt-4 text-lg font-semibold text-gray-800">Добавить товар</span>
                    <span class="text-sm text-gray-500">Создать новую карточку</span>
                </a>

                <!-- Настройки профиля -->
                <a href="<?php echo e(route('profile.edit')); ?>" 
                   class="group bg-white shadow rounded-xl p-6 flex flex-col items-center justify-center 
                          hover:shadow-lg hover:bg-yellow-50 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" 
                         class="h-12 w-12 text-yellow-500 group-hover:scale-110 transition-transform" 
                         fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 14a2 2 0 100-4 2 2 0 000 4zm0 7a7 7 0 100-14 7 7 0 000 14z"/>
                    </svg>
                    <span class="mt-4 text-lg font-semibold text-gray-800">Профиль</span>
                    <span class="text-sm text-gray-500">Личные данные и настройки</span>
                </a>

            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\webv3\resources\views/seller/cabinet.blade.php ENDPATH**/ ?>