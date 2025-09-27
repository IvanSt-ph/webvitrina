<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product->title)]); ?>
  <div class="grid md:grid-cols-2 gap-6">
    <div class="bg-white rounded-xl border p-3">
      <?php if($product->image): ?>
        <img src="<?php echo e(asset('storage/'.$product->image)); ?>" class="w-full rounded-lg"/>
      <?php endif; ?>
    </div>
    <div>
      <h1 class="text-3xl font-bold"><?php echo e($product->title); ?></h1>
      <div class="text-2xl my-2"><?php echo e(number_format($product->price, 2, ',', ' ')); ?> ₽</div>
      <p class="text-gray-700"><?php echo e($product->description); ?></p>
      <div class="mt-4 flex gap-3">
        <?php if(auth()->guard()->check()): ?>
        <form method="post" action="<?php echo e(route('cart.add',$product)); ?>"><?php echo csrf_field(); ?>
          <button class="px-4 py-2 bg-indigo-600 text-white rounded">Добавить в корзину</button>
        </form>
        <form method="post" action="<?php echo e(route('favorites.toggle',$product)); ?>"><?php echo csrf_field(); ?>
          <button class="px-4 py-2 border rounded">❤ В избранное</button>
        </form>
        <?php else: ?>
        <a href="/login" class="px-4 py-2 bg-indigo-600 text-white rounded">Войти, чтобы купить</a>
        <?php endif; ?>
      </div>

      <section class="mt-8">
        <h2 class="text-xl font-semibold mb-2">Отзывы</h2>
        <?php if(auth()->guard()->check()): ?>
        <form method="post" action="<?php echo e(route('review.store',$product)); ?>" class="mb-4"><?php echo csrf_field(); ?>
          <label class="block text-sm">Оценка</label>
          <select name="rating" class="border rounded p-2 mb-2">
            <?php for($i=5;$i>=1;$i--): ?><option value="<?php echo e($i); ?>"><?php echo e($i); ?></option><?php endfor; ?>
          </select>
          <textarea name="body" placeholder="Ваш отзыв" class="w-full border rounded p-2"></textarea>
          <button class="mt-2 px-3 py-1.5 bg-gray-900 text-white rounded">Отправить</button>
        </form>
        <?php endif; ?>
        <div class="space-y-3">
          <?php $__empty_1 = true; $__currentLoopData = $product->reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-white border rounded p-3">
              <div class="font-medium"><?php echo e($r->user->name); ?> — <?php echo e($r->rating); ?>★</div>
              <div class="text-gray-700"><?php echo e($r->body); ?></div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="text-gray-600">Пока нет отзывов.</p>
          <?php endif; ?>
        </div>
      </section>
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
<?php /**PATH C:\webv3\resources\views/shop/product-show.blade.php ENDPATH**/ ?>