<?php if ($fieldset->show_errors()): ?>
<div class="alert alert-error">
    <button class="close" data-dismiss="alert">×</button>
    <strong>Error!</strong><br>
    <?= $fieldset->show_errors(); ?>
</div>
<?php endif; ?>
