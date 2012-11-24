<?php echo Form::open(null, array('id' => 'register')); ?>

    <?php if (isset($error)): ?>
        <span class="error"><?php echo $error; ?></span>
    <?php endif; ?>

    <p>
        <label for="email">Email</label>
        <?php echo Form::input('email', $user->email) ?>
    </p>
    <?php echo Form::submit('submit') ?>

<?php echo Form::close() ?>
