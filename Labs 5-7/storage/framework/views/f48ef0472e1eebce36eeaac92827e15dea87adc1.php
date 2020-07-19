<?php $__env->startSection('content'); ?>
    <div class="container">
        <br>
        <h4 class="mb-2 text-center">New Car</h4>
        <?php echo e(Form::open(['action'=>'CarController@newcar','method'=>'POST','class'=>'centered'])); ?>

            <div class="">
                <div class="col">
                    <div class="form-group">
                        <?php echo e(Form::label('make', 'Make')); ?>

                        <?php echo e(Form::text('make','',['class'=>'form-control','placeholder'=>'Make'])); ?>

                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <?php echo e(Form::label('model', 'Model')); ?>

                        <?php echo e(Form::text('model','',['class'=>'form-control','placeholder'=>'Model'])); ?>

                    </div>
                </div>
            </div>

            <div class="">
                <div class="col">
                    <div class="form-group">
                        <?php echo e(Form::label('produced_on', 'Produced On')); ?>

                        <?php echo e(Form::date('produced_on','',['class'=>'form-control','placeholder'=>'Produced On'])); ?>

                    </div>
            </div>
            </div>
           
            <div class="">
                <div class="col">
                    <div class="form-group text-center">
                        <?php echo e(Form::submit('Add Car',['class'=>'btn btn-primary btn-lg btn-block'])); ?>

                    </div>
                </div>
            </div>
            
        <?php echo e(Form::close()); ?>

        
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/LaravelLabs/resources/views/cars/addcar.blade.php ENDPATH**/ ?>