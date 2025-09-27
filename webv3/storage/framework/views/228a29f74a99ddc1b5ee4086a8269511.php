<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Мои товары']); ?>
  <div class="flex items-center justify-between mb-4">
    <h1 class="text-2xl font-bold">Мои товары</h1>
    <a href="<?php echo e(route('seller.products.create')); ?>"
       class="px-3 py-1.5 bg-indigo-600 text-white rounded">Добавить</a>
  </div>

  <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="bg-white border rounded p-3">
        <div class="aspect-video bg-gray-100 rounded mb-2 overflow-hidden">
          <?php if($p->image): ?>
            <img src="<?php echo e(asset('storage/'.$p->image)); ?>" class="w-full h-full object-cover"/>
          <?php endif; ?>
        </div>
        <div class="font-medium"><?php echo e($p->title); ?></div>
<div class="text-sm text-gray-600">
  Цена: <?php echo e(number_format($p->price, 2, ',', ' ')); ?> ₽, 
  Остаток: <?php echo e($p->stock); ?>

</div>

        <div class="mt-2 flex gap-2">
          <a href="<?php echo e(route('seller.products.edit',$p)); ?>"
             class="px-2 py-1 border rounded">Изменить</a>
          <form method="post" action="<?php echo e(route('seller.products.destroy',$p)); ?>">
            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
            <button class="px-2 py-1 border rounded text-red-600">Удалить</button>
          </form>
        </div>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>

  <div class="mt-4"><?php echo e($products->links()); ?></div>
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
<?php /**PATH C:\webv3\resources\views/seller/products-index.blade.php ENDPATH**/ ?>