<?php $__env->startSection('content'); ?>
<main role="main" class="container">
    <div class="text-center mb-4">
        
        <h4>ALL CARS</h4>
    </div>
    <div class="float-left">
        
        
    </div>
    <div>
        <table id="cars" class="table">
            
                <tr>
                    <th scope="col">Car ID</th>
                    <th scope="col">Make</th>
                    <th scope="col">Model</th>
                    <th scope="col">Date of Production</th>
                    <th scope="col">Review</th>
                </tr>
            </thead>
            <tbody>
                <?php if(count($data['cars']) > 0): ?>
                <?php $__currentLoopData = $data['cars']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($car->id); ?></td>
                    <td><?php echo e($car->make); ?></td>
                    <td><?php echo e($car->model); ?></td>
                    <td><?php echo e($car->produced_on); ?></td>
                    <td><a type="" href=<?php echo e(route('reviews.create', $car->id)); ?> class="btn btn-sm btn-primary">Review</a></td>
                </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>

                <?php endif; ?>

            </tbody>
        </table>
    </div>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/LaravelLabs/resources/views/cars/allcars.blade.php ENDPATH**/ ?>