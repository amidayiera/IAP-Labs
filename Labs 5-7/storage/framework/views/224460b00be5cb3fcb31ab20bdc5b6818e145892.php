<?php $__env->startSection('content'); ?>
<section id="student-form">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                
                <form action="/reviews" method="post">
                    <?php echo csrf_field(); ?>
                    <input id="car_id" name="car" type="hidden" class="form-control-plaintext" value="<?php echo e($car_id); ?>">
                    

                    <br><br>
                    <div class="form-group">
                        <label for="review">Write Review:</label>
                        <textarea class="form-control" rows="5" id="review" name="review"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                    <br>
                    <br>

                    <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <strong>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($error); ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </strong>
                    </div>
                    <?php endif; ?>

                    <?php if(session()->has('message')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session()->get('message')); ?>

                    </div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/LaravelLabs/resources/views/reviews/create.blade.php ENDPATH**/ ?>