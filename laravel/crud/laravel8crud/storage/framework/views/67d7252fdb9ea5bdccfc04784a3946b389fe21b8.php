<?php $__env->startSection('contain'); ?>
<h2>CREAR REGISTROS</h2>
<form action="/articles" method="post">
    <?php echo csrf_field(); ?>
    <div class="mb-3">
        <label for="" class="form-label">Code</label>
        <input id="code" name="code" type="text" class="form-control" tabindex="1">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Description</label>
        <input id="description" name="description" type="text" class="form-control" tabindex="2">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Quantity</label>
        <input id="quantity" name="quantity" type="number" class="form-control" tabindex="3">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Price</label>
        <input id="price" name="price" type="number" class="form-control">
    </div>
    <a href="/articles" class="btn btn-secondary" tabindex="5">Cancel</a>
    <button type="submit" class="btn btn-primary" tabindex="4">Save</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base-template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/article/create.blade.php ENDPATH**/ ?>