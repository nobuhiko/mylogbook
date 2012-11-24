<div class="row">
    <div class="span4">
        <ul class="nav nav-tabs nav-stacked">
            <li class="">
                <?php echo Html::anchor('/setting/profile', 'Profile') ?>
            </li>
        </ul>

        <?php echo render('af_square'); ?>
    </div>
    <div class="span8">
        <?php echo render('setting/_form'); ?>
        <ul class="pager">
            <li><?php echo Html::anchor('user/' . $current_user->username, 'Back'); ?></li>
        </ul>
    </div>
</div>
