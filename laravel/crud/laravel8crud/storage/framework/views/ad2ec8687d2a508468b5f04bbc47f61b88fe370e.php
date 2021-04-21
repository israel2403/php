<?php $__env->startSection('contain'); ?>
    <h2>EDITAR REGISTROS</h2>
    <form action="/articles/<?php echo e($article->id); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="" class="form-label">Code</label>
            <input id="code" name="code" type="text" class="form-control" tabindex="1" value="<?php echo e($article->code); ?>">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Description</label>
            <input id="description" name="description" type="text" class="form-control" tabindex="2"
                value="<?php echo e($article->description); ?>">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Quantity</label>
            <input id="quantity" name="quantity" type="number" class="form-control" tabindex="3"
                value="<?php echo e($article->quantity); ?>">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Price</label>
            <input id="price" name="price" type="number" class="form-control" value="<?php echo e($article->price); ?>">
        </div>
        <a href="/articles" class="btn btn-secondary" tabindex="5">Cancel</a>
        <button type="submit" class="btn btn-primary" tabindex="4">Save</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base-template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/article/edit.blade.php ENDPATH**/ ?>