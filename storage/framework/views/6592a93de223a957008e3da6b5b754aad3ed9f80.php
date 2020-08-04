<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class='row'> 
            <div class="col-sm-offset-2 col-sm-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Amend Task
                    </div>

                    <div class="panel-body">
                        <!-- Display Validation Errors -->
                        <?php echo $__env->make('common.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                        <!-- Edit Task Form -->
                        <form action="<?php echo e(url('task/'.$task->id)); ?>" method="POST" class="form-horizontal">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('PUT')); ?>


                            <!-- Task Name -->
                            <div class="form-group">
                                <label for="task-name" class="col-sm-3 control-label">Task</label>

                                <div class="col-sm-6">
                                    <input type="text" name="name" id="task-name" class="form-control" value="<?php echo e($task->name); ?>">
                                </div>
                            </div>

                            <!-- Save Task Button -->
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-btn fa-floppy-o"></i>Save Task
                                    </button>
                                    <!-- Cancel Save Task Button -->
                                    <!--<a class="btn btn-default fa fa-btn fa-ban" href="<?php echo e(url('/')); ?>">Cancel</a>-->
                                    <button type="button" class="btn btn-default" onclick="location.href='<?php echo e(url('/')); ?>'">
                                        <i class="fa fa-btn fa-ban"></i>Cancel
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>