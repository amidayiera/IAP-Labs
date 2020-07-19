<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            
                
            <div class="panel-heading">CAR REVIEWS</div>
            <div class="panel-body">
                <p></p>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Review</th>
                        <th scope="col">Car Make</th>
                        <th scope="col">Car Model</th>
                        <th scope="col">Produced On</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($review->review); ?></td>
                        <td><?php echo e($review->cars->make); ?></td>
                        <td><?php echo e($review->cars->model); ?></td>
                        <td><?php echo e($review->created_at); ?></td>
                    </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
            </table>
            <a type="" href=<?php echo e(route('reviews.create', $review->cars->id)); ?>

                class="btn btn btn-primary btn-lg btn-block">Write new review</a>
        
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/LaravelLabs/resources/views/reviews/cars.blade.php ENDPATH**/ ?>