
<div class="row">
    <div class="span8">
        <ul class="thumbnails">

            <?php $key = 'serial_dive_no';?>
            <?php if ($post->$key): ?>
            <li class="span2">
            <span class="label"><?=__($key)?></span><p><?=$post->$key; ?></p>
            </li>
            <?php endif;?>

            <?php $key = 'date';?>
            <?php if ($post->$key): ?>
            <li class="span2">
            <span class="label"><?=__($key)?></span><p><?=$post->$key; ?></p>
            </li>
            <?php endif;?>

            <?php $key = 'location';?>
            <?php if ($post->$key): ?>
            <li class="span2">
            <span class="label"><?=__($key)?></span><p><?=$post->$key; ?></p>
            </li>
            <?php endif;?>

            <?php $key = 'point';?>
            <?php if ($post->$key): ?>
            <li class="span2">
            <span class="label"><?=__($key)?></span><p><?=$post->$key; ?>
            <?php if ($post->point_type): ?>(<?=Model_Lookup::item('post_point_type', $post->point_type)?>)<?php endif;?></p>
            </li>
            <?php endif;?>

            <?php $key = 'dive_time';?>
            <?php if ($post->$key): ?>
            <li class="span2">
            <span class="label"><?=__($key)?></span><p><?=$post->$key;?> <?=__('min')?></p>
            </li>
            <?php endif;?>

            <?php $key = 'entry';?>
            <?php if ($post->$key): ?>
            <li class="span2">
            <span class="label"><?=__($key)?></span><p><?=nl2br($post->$key); ?></p>
            </li>
            <?php endif;?>

            <?php $key = 'exit';?>
            <?php if ($post->$key): ?>
            <li class="span2">
            <span class="label"><?=__($key)?></span><p><?=nl2br($post->$key); ?></p>
            </li>
            <?php endif;?>

            <?php $key = 'depth_of_water_ave';?>
            <?php if ($post->$key): ?>
            <li class="span2">
            <span class="label"><?=__($key)?></span><p><?=nl2br($post->$key); ?> m</p>
            </li>
            <?php endif;?>

            <?php $key = 'depth_of_water_max';?>
            <?php if ($post->$key): ?>
            <li class="span2">
            <span class="label"><?=__($key)?></span><p><?=nl2br($post->$key); ?> m</p>
            </li>
            <?php endif;?>

            <?php $key = 'pressure_start';?>
            <?php if ($post->$key): ?>
            <li class="span2">
            <span class="label"><?=__($key)?></span><p><?=nl2br($post->$key); ?> bar</p>
            </li>
            <?php endif;?>

            <?php $key = 'pressure_end';?>
            <?php if ($post->$key): ?>
            <li class="span2">
            <span class="label"><?=__($key)?></span><p><?=nl2br($post->$key); ?> bar</p>
            </li>
            <?php endif;?>

            <?php $key = 'water_temp_bottom';?>
            <?php if ($post->$key): ?>
            <li class="span2">
            <span class="label"><?=__($key)?></span><p><?=nl2br($post->$key); ?> ℃</p>
            </li>
            <?php endif;?>

            <?php $key = 'air_temp';?>
            <?php if ($post->$key): ?>
            <li class="span2">
            <span class="label"><?=__($key)?></span><p><?=nl2br($post->$key); ?> ℃</p>
            </li>
            <?php endif;?>

            <?php $key = 'weather';?>
            <?php if ($post->$key): ?>
            <li class="span2">
            <span class="label"><?=__($key)?></span><p><?=Model_Lookup::item('post_weather', $post->$key)?>
            </p>
            </li>
            <?php endif;?>

            <?php $key = 'suit';?>
            <?php if ($post->$key): ?>
            <li class="span2">
            <span class="label"><?=__($key)?></span><p><?=Model_Lookup::item('post_suit', $post->$key)?>
            <?php if ($post->suit_thickness): ?><?=$post->suit_thickness; ?> mm<? endif;?>
            </p>
            </li>
            <?php endif;?>

            <?php $key = 'weight';?>
            <?php if ($post->$key): ?>
            <li class="span2">
            <span class="label"><?=__($key)?></span><p><?=nl2br($post->$key); ?> kg</p>
            </li>
            <?php endif;?>

            <?php $key = 'tank';?>
            <?php if ($post->$key): ?>
            <li class="span2">
            <span class="label"><?=__($key)?></span><p><?=Model_Lookup::item('post_tank', $post->$key)?>
            <?php if ($post->tank_cap): ?><?=$post->tank_cap; ?> L<? endif;?>
            </p>
            </li>
            <?php endif;?>

            <?php $key = 'visibility';?>
            <?php if ($post->$key): ?>
            <li class="span2">
            <span class="label"><?=__($key)?></span><p><?=nl2br($post->$key); ?></p>
            </li>
            <?php endif;?>
        </ul>
        <?php $key = 'report';?>
        <?php if ($post->$key): ?>
        <span class="label"><?=__($key)?></span><p><?=nl2br($post->$key); ?></p>
        <?php endif;?>

        <?php $key = 'comment';?>
        <?php if ($post->$key): ?>
        <span class="label"><?=__($key)?></span><p><?=nl2br($post->$key); ?></p>
        <?php endif;?>

    </div>
    <div class="span4">
        <div class="row">
            <div class="span1">
                <img src="<?=$post->users->profile->image?>" class="img-polaroid">
            </div>
            <div class="span3">
                <h2><a href="/user/<?=$post->users->username;?>"><?=$post->users->profile->full_name;?></a></h2>
                </div>
        </div>
        <ul class="unstyled">
            <li><i class="icon-camera"></i> <?=$post->users->profile->camera?></li>
            <li><i class="icon-map-marker"></i> <?=$post->users->profile->location?></li>
            <li><i class="icon-bookmark"></i> <a href="<?=$post->users->profile->website?>" target="_blank"><?=$post->users->profile->website?></a></li>
            <li><a href="<?=$post->users->profile->twitter?>" class="twitter-follow-button" data-show-count="false" data-lang="ja">@<?=$post->users->username?>さんをフォロー</a>
            </li>
        </ul>
        <hr>
        <p>
            <?= nl2br($post->users->profile->description);?>
        </p>
        <?php echo render('social_buttons'); ?>
        <?php echo render('af_square'); ?>
    </div>
</div>

<ul class="pager">
    <li><?php echo Html::anchor('log/edit/'.$post->id, 'Edit'); ?></li>
    <li><?php echo Html::anchor('log/delete/'.$post->id, 'Delete'); ?></li>
</ul>
