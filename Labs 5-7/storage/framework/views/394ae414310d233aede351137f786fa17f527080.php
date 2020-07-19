<?php $__env->startSection('content'); ?>
<section id="">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mx-auto">
                <?php if(session()->has('message')): ?>
                <div class="alert alert-success">
                    <?php echo e(session()->get('message')); ?>

                </div>
                <?php endif; ?>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">Cars with Reviews</div>
                    <div class="panel-body">
                        <p></p>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Car Model</th>
                                <th scope="col">Car Make</th>
                                <th scope="col">Review</th>
                                <th scope="col">Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($review->id); ?></th>
                                <td><?php echo e($review->cars->model); ?></td>
                                <td><?php echo e($review->cars->make); ?></td>
                                <td><?php echo e($review->review); ?></td>
                                <td><a type="" href=<?php echo e(route('cars.show', $review->car)); ?> class="btn btn-sm btn-primary ">Details</a></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/LaravelLabs/resources/views/reviews/index.blade.php ENDPATH**/ ?>