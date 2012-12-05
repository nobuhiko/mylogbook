<script>
$(document).ready(function() {
    $("#form_report").select2({
        tags:<?php echo Model_Creature::getList(); ?>,
            tokenSeparators: [","]});

        $("#form_diving_shop").select2({
            tags:<?php echo Model_Post::getTypeaheadList('diving_shop'); ?>,
                tokenSeparators: [","]});

            $("#form_location").select2({
                tags:<?php echo Model_Post::getTypeaheadList('location'); ?>,
                    tokenSeparators: [","]});

                $("#form_point").select2({
                    tags:<?php echo Model_Post::getTypeaheadList('point'); ?>,
                        tokenSeparators: [","]});
});


$(function() {
    $("#before_one").click(function(){
        location.href = "<?=Uri::create('log/create/');?>" + $("#form_serial_dive_no").val();
        return false;
    });
});
</script>

<?php echo Form::open(array('name' =>'form', 'class' => 'form-horizontal')); ?>
<fieldset>
    <legend><?= $title ?></legend>
    <?php echo render('error'); ?>

    <?php $field_name = 'serial_dive_no'; ?>
    <div class="control-group <?php if($fieldset->field($field_name)->has_error()):?>error<?php endif;?>">
        <?= $fieldset->field($field_name)->label_text(array('class'=>"control-label")) ?>
        <div class="controls">
            <?=$fieldset->field($field_name)->field_text(array('class'=>'span4'))?>
            <span class="help-inline"><a href="#" id="before_one" class="btn btn-small btn-primary">1本前のデータを利用する</a><?= $fieldset->field($field_name)->error_text()?></span>
        </div>
    </div>

    <?php $field_name = 'date'; ?>
    <div class="control-group <?php if($fieldset->field($field_name)->has_error()):?>error<?php endif;?>">
        <?= $fieldset->field($field_name)->label_text(array('class'=>"control-label")) ?>
        <div class="controls">
            <?=$fieldset->field($field_name)->field_text(array('class'=>'span4 datepicker', 'data-date-format'=>'yyyy-mm-dd'))?>
            <span class="help-inline"><?= $fieldset->field($field_name)->error_text()?></span>
        </div>
    </div>

    <?php $field_name = 'location'; ?>
    <div class="control-group <?php if($fieldset->field($field_name)->has_error()):?>error<?php endif;?>">
        <?= $fieldset->field($field_name)->label_text(array('class'=>"control-label")) ?>
        <div class="controls">
            <?=$fieldset->field($field_name)->field_text(array('style' => 'width:375px'))?>
            <span class="help-inline"><?= $fieldset->field($field_name)->error_text()?></span>
        </div>
    </div>

    <?php $field_name = 'point'; ?>
    <div class="control-group <?php if($fieldset->field($field_name)->has_error()):?>error<?php endif;?>">
        <?= $fieldset->field($field_name)->label_text(array('class'=>"control-label")) ?>
        <div class="controls">
            <?=$fieldset->field($field_name)->field_text(array('style' => 'width:375px'))?>
            <span class="help-inline"><?= $fieldset->field($field_name)->error_text()?></span>
        </div>
    </div>

    <?php $field_name = 'point_type'; ?>
    <div class="control-group <?php if($fieldset->field($field_name)->has_error()):?>error<?php endif;?>">
        <div class="controls">
            <?=$fieldset->field($field_name)->field_text(array('class'=>'span4'))?>
            <span class="help-inline"><?= $fieldset->field($field_name)->error_text()?></span>
        </div>
    </div>

    <?php $field_name = 'diving_shop'; ?>
    <div class="control-group <?php if($fieldset->field($field_name)->has_error()):?>error<?php endif;?>">
        <?= $fieldset->field($field_name)->label_text(array('class'=>"control-label")) ?>
        <div class="controls">
            <?=$fieldset->field($field_name)->field_text(array('style' => 'width:375px'))?>
            <span class="help-inline"><?= $fieldset->field($field_name)->error_text()?></span>
        </div>
    </div>

    <?php $field_name = 'entry'; ?>
    <div class="control-group <?php if($fieldset->field($field_name)->has_error()):?>error<?php endif;?>">
        <?= $fieldset->field($field_name)->label_text(array('class'=>"control-label")) ?>
        <div class="controls">
            <?=$fieldset->field($field_name)->field_text(array('class'=>'span4', 'placeholder' => 'time'))?>
            <span class="help-inline"><?= $fieldset->field($field_name)->error_text()?></span>
        </div>
    </div>
    <?php $field_name = 'pressure_start'; ?>
    <div class="control-group <?php if($fieldset->field($field_name)->has_error()):?>error<?php endif;?>">
        <div class="controls">
            <div class="input-append">
                <?=$fieldset->field($field_name)->field_text(array('class'=>'span2', 'placeholder' => 'Air', 'id' => 'appendedInput'))?>
                <span class="add-on">bar</span>
            </div>
            <span class="help-inline"><?= $fieldset->field($field_name)->error_text()?></span>
        </div>
    </div>

    <?php $field_name = 'exit'; ?>
    <div class="control-group <?php if($fieldset->field($field_name)->has_error()):?>error<?php endif;?>">
        <?= $fieldset->field($field_name)->label_text(array('class'=>"control-label")) ?>
        <div class="controls">
            <?=$fieldset->field($field_name)->field_text(array('class'=>'span4', 'placeholder' => 'time'))?>
            <span class="help-inline"><?= $fieldset->field($field_name)->error_text()?></span>
        </div>
    </div>

    <?php $field_name = 'pressure_end'; ?>
    <div class="control-group <?php if($fieldset->field($field_name)->has_error()):?>error<?php endif;?>">
        <div class="controls">
            <div class="input-append">
                <?=$fieldset->field($field_name)->field_text(array('class'=>'span2', 'placeholder' => 'Air', 'id' => 'appendedInput'))?>
                <span class="add-on">bar</span>
            </div>
            <span class="help-inline"><?= $fieldset->field($field_name)->error_text()?></span>
        </div>
    </div>

    <?php foreach(array('depth_of_water_ave','depth_of_water_max') as $field_name) : ?>
    <div class="control-group <?php if($fieldset->field($field_name)->has_error()):?>error<?php endif;?>">
        <?= $fieldset->field($field_name)->label_text(array('class'=>"control-label")) ?>
        <div class="controls">
            <div class="input-append">
                <?=$fieldset->field($field_name)->field_text(array('class'=>'span2', 'placeholder' => '', 'id' => 'appendedInput'))?>
                <span class="add-on">m</span>
            </div>
            <span class="help-inline"><?= $fieldset->field($field_name)->error_text()?></span>
        </div>
    </div>
    <?php endforeach;?>

    <?php foreach(array('water_temp_bottom','air_temp') as $field_name) : ?>
    <div class="control-group <?php if($fieldset->field($field_name)->has_error()):?>error<?php endif;?>">
        <?= $fieldset->field($field_name)->label_text(array('class'=>"control-label")) ?>
        <div class="controls">
            <div class="input-append">
                <?=$fieldset->field($field_name)->field_text(array('class'=>'span2', 'placeholder' => '', 'id' => 'appendedInput'))?>
                <span class="add-on">℃</span>
            </div>
            <span class="help-inline"><?= $fieldset->field($field_name)->error_text()?></span>
        </div>
    </div>
    <?php endforeach;?>

    <?php foreach(array('weather', 'suit') as $field_name): ?>
    <div class="control-group <?php if($fieldset->field($field_name)->has_error()):?>error<?php endif;?>">
        <?= $fieldset->field($field_name)->label_text(array('class'=>"control-label")) ?>
        <div class="controls">
            <?=$fieldset->field($field_name)->field_text(array('class'=>'span4'))?>
            <span class="help-inline"><?= $fieldset->field($field_name)->error_text()?></span>
        </div>
    </div>
    <?php endforeach;?>

    <?php $field_name = 'suit_thickness'; ?>
    <div class="control-group <?php if($fieldset->field($field_name)->has_error()):?>error<?php endif;?>">
        <div class="controls">
            <div class="input-append">
                <?=$fieldset->field($field_name)->field_text(array('class'=>'span2', 'placeholder' => '', 'id' => 'appendedInput'))?>
                <span class="add-on">mm</span>
            </div>
            <span class="help-inline"><?= $fieldset->field($field_name)->error_text()?></span>
        </div>
    </div>

    <?php $field_name = 'weight'; ?>
    <div class="control-group <?php if($fieldset->field($field_name)->has_error()):?>error<?php endif;?>">
        <?= $fieldset->field($field_name)->label_text(array('class'=>"control-label")) ?>
        <div class="controls">
            <div class="input-append">
                <?=$fieldset->field($field_name)->field_text(array('class'=>'span2', 'placeholder' => '', 'id' => 'appendedInput'))?>
                <span class="add-on">kg</span>
            </div>
            <span class="help-inline"><?= $fieldset->field($field_name)->error_text()?></span>
        </div>
    </div>

    <?php $field_name = 'tank'; ?>
    <div class="control-group <?php if($fieldset->field($field_name)->has_error()):?>error<?php endif;?>">
        <?= $fieldset->field($field_name)->label_text(array('class'=>"control-label")) ?>
        <div class="controls">
            <?=$fieldset->field($field_name)->field_text(array('class'=>'span4'))?>
            <span class="help-inline"><?= $fieldset->field($field_name)->error_text()?></span>
        </div>
    </div>

    <?php $field_name = 'tank_cap'; ?>
    <div class="control-group <?php if($fieldset->field($field_name)->has_error()):?>error<?php endif;?>">
        <div class="controls">
            <div class="input-append">
                <?=$fieldset->field($field_name)->field_text(array('class'=>'span2', 'placeholder' => '', 'id' => 'appendedInput'))?>
                <span class="add-on">L</span>
            </div>
            <span class="help-inline"><?= $fieldset->field($field_name)->error_text()?></span>
        </div>
    </div>

    <?php foreach(array('visibility') as $field_name): ?>
    <div class="control-group <?php if($fieldset->field($field_name)->has_error()):?>error<?php endif;?>">
        <?= $fieldset->field($field_name)->label_text(array('class'=>"control-label")) ?>
        <div class="controls">
            <?=$fieldset->field($field_name)->field_text(array('class'=>'span4'))?>
            <span class="help-inline"><?= $fieldset->field($field_name)->error_text()?></span>
        </div>
    </div>
    <?php endforeach;?>

    <?php $field_name = 'report'; ?>
    <div class="control-group <?php if($fieldset->field($field_name)->has_error()):?>error<?php endif;?>">
        <?= $fieldset->field($field_name)->label_text(array('class'=>"control-label")) ?>
        <div class="controls">
            <?=$fieldset->field($field_name)->field_text(array('style' => 'width:620px'))?>
            <span class="help-block">※カナ入力にすると補完が効きやすく便利です</span>
            <span class="help-block">※入力された魚やウミウシの名前は補完に利用されますので出来るだけ正確な名称を入力お願いします</span>
            <span class="help-inline"><?= $fieldset->field($field_name)->error_text()?></span>
        </div>
    </div>

    <?php $field_name = 'comment'; ?>
    <div class="control-group <?php if($fieldset->field($field_name)->has_error()):?>error<?php endif;?>">
        <?= $fieldset->field($field_name)->label_text(array('class'=>"control-label")) ?>
        <div class="controls">
            <?=$fieldset->field($field_name)->field_text(array('class' => 'span8', 'rows' => 8))?>
            <span class="help-inline"><?= $fieldset->field($field_name)->error_text()?></span>
        </div>
    </div>

    <?php $field_name = 'status'; ?>
    <div class="control-group <?php if($fieldset->field($field_name)->has_error()):?>error<?php endif;?>">
        <?= $fieldset->field($field_name)->label_text(array('class'=>"control-label")) ?>
        <div class="controls">
            <?=$fieldset->field($field_name)->field_text(array('class'=>'span4'))?>
            <span class="help-inline"><?= $fieldset->field($field_name)->error_text()?></span>
        </div>
    </div>

    <div class="form-actions">
        <?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

    </div>
    <?php echo Form::close(); ?>
