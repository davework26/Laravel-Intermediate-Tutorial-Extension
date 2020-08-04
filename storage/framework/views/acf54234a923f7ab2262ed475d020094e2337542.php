<!-- resources/views/common/error.blade.php -->

<?php if(count($errors) > 0): ?>
    <!-- form error list -->
    <div class='alert alert-danger'>
        <strong>Whoops! Something went wrong!</strong>

        <br /><br />

        <ul>
            <?php foreach($errors->all() as $error): ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
