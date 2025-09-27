<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product->exists ? 'Редактирование' : 'Добавление')]); ?>
  <h1 class="text-2xl font-bold mb-4">
    <?php echo e($product->exists ? 'Редактирование' : 'Добавление'); ?> товара
  </h1>

  <form method="post" enctype="multipart/form-data"
        action="<?php echo e($product->exists ? route('seller.products.update',$product) : route('seller.products.store')); ?>"
        class="max-w-2xl bg-white border rounded p-4 space-y-3">
    <?php echo csrf_field(); ?>
    <?php if($product->exists): ?> <?php echo method_field('PUT'); ?> <?php endif; ?>

    <div>
      <label class="block text-sm">Название</label>
      <input name="title" value="<?php echo e(old('title',$product->title)); ?>"
             class="w-full border rounded p-2"/>
    </div>

  <div class="grid grid-cols-2 gap-3">
  <div>
    <label class="block text-sm">Цена (в рублях)</label>
    <input name="price" type="number" step="0.01" min="0" 
           value="<?php echo e(old('price',$product->price)); ?>" 
           class="w-full border rounded p-2"/>
  </div>
  <div>
    <label class="block text-sm">Остаток</label>
    <input name="stock" type="number" min="0" 
           value="<?php echo e(old('stock',$product->stock)); ?>" 
           class="w-full border rounded p-2"/>
  </div>
</div>


    <div>
      <label class="block text-sm">Описание</label>
      <textarea name="description"
                class="w-full border rounded p-2"><?php echo e(old('description',$product->description)); ?></textarea>
    </div>

    <div>
    <label class="block text-sm">Страна</label>
    <select name="country" class="w-full border rounded p-2">
        <option value="Приднестровье" <?php echo e(old('country', $product->country) == 'Приднестровье' ? 'selected' : ''); ?>>Приднестровье</option>
        <option value="Молдова" <?php echo e(old('country', $product->country) == 'Молдова' ? 'selected' : ''); ?>>Молдова</option>
        <option value="Украина" <?php echo e(old('country', $product->country) == 'Украина' ? 'selected' : ''); ?>>Украина</option>
    </select>
</div>


    <div>
      <label class="block text-sm">Изображение</label>
      <input type="file" name="image" class="w-full border rounded p-2"/>
      <?php if($product->image): ?>
        <img src="<?php echo e(asset('storage/'.$product->image)); ?>" class="mt-2 w-40 rounded"/>
      <?php endif; ?>
    </div>

    <div class="pt-2">
      <button class="px-4 py-2 bg-emerald-600 text-white rounded">Сохранить</button>
    </div>
  </form>
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
<?php /**PATH C:\webv3\resources\views/seller/products-form.blade.php ENDPATH**/ ?>