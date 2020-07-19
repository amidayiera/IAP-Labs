<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Show Specific Car</div>
            <div class="panel-body">
                <p></p>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Make</th>
                        <th scope="col">Model</th>
                        <th scope="col">Reviews</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row"><?php echo e($car->id); ?></th>
                        <td><?php echo e($car->make); ?></td>
                        <td><?php echo e($car->model); ?></td>
                        <td><a type="" href=<?php echo e(route('reviews.cars', $car->id)); ?> class="btn btn-sm btn-primary">View Reviews</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/LaravelLabs/resources/views/cars/show.blade.php ENDPATH**/ ?>