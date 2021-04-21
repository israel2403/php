;
<?php $__env->startSection('contain'); ?>
    <a name="" id="" href="articles/create" class="btn btn-primary">CREAR</a>
    <table class="table table-dark table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Code</th>
                <th scope="col">Description</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($article->id); ?></td>
                    <td><?php echo e($article->code); ?></td>
                    <td><?php echo e($article->description); ?></td>
                    <td><?php echo e($article->quantity); ?></td>
                    <td><?php echo e($article->price); ?></td>
                    <td>
                        <form action="<?php echo e(route('articles.destroy', $article->id)); ?>" method="post">
                            <a class="btn btn-info" href="/articles/<?php echo e($article->id); ?>/edit">Edit</a>
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base-template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/article/index.blade.php ENDPATH**/ ?>