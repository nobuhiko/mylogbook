<?php echo Form::open(array('class' => 'form-horizontal')); ?>
<fieldset>
    <legend>Profile</legend>
    <?php echo render('error'); ?>

    <?php foreach($fieldset->field() as $field_name => $val): ?>
    <div class="control-group <?php if($fieldset->field($field_name)->has_error()):?>error<?php endif;?>">
        <?= $fieldset->field($field_name)->label_text(array('class'=>"control-label")) ?>
        <div class="controls">
            <?=$fieldset->field($field_name)->field_text(array('class'=>'span4'))?>
            <span class="help-inline"><?= $fieldset->field($field_name)->error_text()?></span>
        </div>
    </div>
    <?php endforeach; ?>

    <div class="form-actions">
        <?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>
    </div>
</fieldset>
<?php echo Form::close(); ?>
