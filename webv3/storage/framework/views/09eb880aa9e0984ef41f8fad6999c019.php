<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Корзина']); ?>
  <h1 class="text-2xl font-bold mb-4">Корзина</h1>
  <div class="space-y-3">
    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="bg-white border rounded p-3 flex items-center gap-4">
        <div class="w-16 h-16 bg-gray-100 rounded overflow-hidden">
          <?php if($i->product->image): ?>
            <img src="<?php echo e(asset('storage/'.$i->product->image)); ?>" class="w-full h-full object-cover"/>
          <?php endif; ?>
        </div>
        <div class="flex-1">
          <a href="<?php echo e(route('product.show',$i->product)); ?>" class="font-medium"><?php echo e($i->product->title); ?></a>
          <div class="text-sm text-gray-600"><?php echo e(number_format($i->product->price/100,2,',',' ')); ?> ₽</div>
        </div>
        <form method="post" action="<?php echo e(route('cart.update',$i)); ?>" class="flex items-center gap-2"><?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
          <input type="number" min="1" name="qty" value="<?php echo e($i->qty); ?>" class="w-20 border rounded p-1">
          <button class="px-2 py-1 border rounded">Обновить</button>
        </form>
        <form method="post" action="<?php echo e(route('cart.remove',$i)); ?>"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
          <button class="px-2 py-1 border rounded text-red-600">Удалить</button>
        </form>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
  <div class="mt-4 flex items-center justify-between">
    <div class="text-xl font-bold">Итого: <?php echo e(number_format($total/100,2,',',' ')); ?> ₽</div>
    <form method="post" action="<?php echo e(route('checkout')); ?>"><?php echo csrf_field(); ?>
      <button class="px-4 py-2 bg-emerald-600 text-white rounded">Оформить заказ</button>
    </form>
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
<?php /**PATH C:\webv3\resources\views/shop/cart.blade.php ENDPATH**/ ?>