<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Laravel')); ?></title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100" x-data="{ open: false }">
            
            <?php echo $__env->make('layouts.navigation', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

            
            <?php if(isset($header)): ?>
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <?php echo e($header); ?>

                    </div>

                    
                </header>
            <?php endif; ?>

            
            <main class="pb-16">
                <?php echo e($slot); ?>

            </main>

            
            <div class="lg:hidden fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 shadow-lg z-50">
                <div class="flex justify-around items-center h-14">
                    <!-- Домой -->
                    <a href="<?php echo e(route('home')); ?>" class="flex flex-col items-center text-gray-600 hover:text-indigo-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l9-9 9 9v9a3 3 0 01-3 3H6a3 3 0 01-3-3v-9z" />
                        </svg>
                        <span class="text-xs">Главная</span>
                    </a>

                    <!-- Категории -->
                    <button @click="open = true" class="flex flex-col items-center text-gray-600 hover:text-indigo-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        <span class="text-xs">Категории</span>
                    </button>

                    <!-- Избранное -->
                    <a href="<?php echo e(route('favorites.index')); ?>" class="flex flex-col items-center text-gray-600 hover:text-pink-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 
                                2 6 4 4 6.5 4c1.74 0 3.41 1 4.22 2.44C11.09 5 
                                12.76 4 14.5 4 17 4 19 6 19 8.5c0 3.78-3.4 
                                6.86-8.55 11.54L12 21.35z"/>
                        </svg>
                        <span class="text-xs">Избранное</span>
                    </a>

                    <!-- Корзина -->
                    <a href="<?php echo e(route('cart.index')); ?>" class="flex flex-col items-center text-gray-600 hover:text-indigo-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M7 18c-1.1 0-1.99.9-1.99 
                            2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zm10 
                            0c-1.1 0-1.99.9-1.99 
                            2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2zM7.16 
                            14l.84-2h8.99c.89 0 1.66-.58 
                            1.91-1.41l2.58-7.59A.996.996 
                            0 0020.58 2H5.21l-.94-2H1v2h2l3.6 
                            7.59-1.35 2.44C4.52 12.37 5.48 
                            14 7.16 14z"/>
                        </svg>
                        <span class="text-xs">Корзина</span>
                    </a>

                    <!-- Профиль -->
                    <a href="<?php echo e(route('cabinet')); ?>" class="flex flex-col items-center text-gray-600 hover:text-indigo-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 
                            2.3-5 5 2.3 5 5 5zm0 
                            2c-3.3 0-10 1.7-10 
                            5v3h20v-3c0-3.3-6.7-5-10-5z"/>
                        </svg>
                        <span class="text-xs">Профиль</span>
                    </a>
                </div>
            </div>

            
            <?php echo $__env->make('profile.partials.category-menu', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
    </body>
</html>
<?php /**PATH C:\webv3\resources\views/layouts/app.blade.php ENDPATH**/ ?>