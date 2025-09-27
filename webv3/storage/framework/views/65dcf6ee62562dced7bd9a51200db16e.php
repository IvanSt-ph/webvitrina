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
            <?php echo e(__('Личный кабинет')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Корзина -->
                <a href="<?php echo e(route('cart.index')); ?>" class="group bg-white shadow rounded-xl p-6 flex flex-col items-center justify-center hover:shadow-lg hover:bg-indigo-50 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-indigo-600 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M2.25 3a.75.75 0 000 1.5h1.386c.17 0 .32.114.363.279l2.098 7.868A2.25 2.25 0 008.271 14.25H17.5a2.25 2.25 0 002.18-1.62l1.69-6.084A.75.75 0 0020.66 5.25H6.258l-.43-1.612A2.25 2.25 0 003.636 2.25H2.25z"/>
                        <path d="M8.25 20.25a1.5 1.5 0 100-3 1.5 1.5 0 000 3zM18 20.25a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"/>
                    </svg>
                    <span class="mt-4 text-lg font-semibold text-gray-800">Корзина</span>
                    <span class="text-sm text-gray-500">Посмотреть выбранные товары</span>
                </a>

                <!-- Избранное -->
                <a href="<?php echo e(route('favorites.index')); ?>" class="group bg-white shadow rounded-xl p-6 flex flex-col items-center justify-center hover:shadow-lg hover:bg-pink-50 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-pink-500 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.203 3 12.755 3 10.25 3 7.322 5.322 5 8.25 5c1.61 0 3.04.698 4 1.804C13.21 5.698 14.64 5 16.25 5 19.178 5 21.5 7.322 21.5 10.25c0 2.505-1.688 4.953-3.989 7.257a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.218l-.022.012-.007.003a.75.75 0 01-.66 0z"/>
                    </svg>
                    <span class="mt-4 text-lg font-semibold text-gray-800">Избранное</span>
                    <span class="text-sm text-gray-500">Сохранённые товары</span>
                </a>

                <!-- Заказы -->
                <a href="<?php echo e(route('orders.index')); ?>" class="group bg-white shadow rounded-xl p-6 flex flex-col items-center justify-center hover:shadow-lg hover:bg-green-50 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-green-600 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M3 3h18v2H3V3zm2 4h14v2H5V7zm-2 4h18v10H3V11zm2 2v6h14v-6H5z"/>
                    </svg>
                    <span class="mt-4 text-lg font-semibold text-gray-800">Мои заказы</span>
                    <span class="text-sm text-gray-500">История покупок</span>
                </a>

                <!-- Настройки профиля -->
                <a href="<?php echo e(route('profile.edit')); ?>" class="group bg-white shadow rounded-xl p-6 flex flex-col items-center justify-center hover:shadow-lg hover:bg-yellow-50 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-yellow-500 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
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
<?php /**PATH C:\webv3\resources\views/profile/buyer-cabinet.blade.php ENDPATH**/ ?>