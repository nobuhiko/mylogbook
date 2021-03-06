<div class="row">
    <div class="span4">
        <div class="row">
            <div class="span1">
                <img src="<?=$user->profiles->image?>" class="img-polaroid">
            </div>
            <div class="span3">
                <h2><?=$user->profiles->full_name;?></h2>
<?php if (Auth::check() and $user->username == $current_user->username)
echo Html::anchor('setting/profile', 'プロフィールを編集する') ?>
            </div>
        </div>

        <ul class="stats unstyled">
            <li>
            <a href="/user/<?=$user->username;?>"><strong><?=$log?></strong>ログ</a>
            </li>
            <li>
            <a href="/user/<?=$user->username;?>/creatures"><strong><?=$creature?></strong>見た生き物</a>
            </li>
            <li>
            </li>
        </ul>

        <ul class="unstyled">
            <li><i class="icon-calendar"></i> <small>Started on </small><?= $first_date ?></li>
            <li><i class="icon-time"></i> <?= sprintf("%02dh %02dm", floor($total_dive_time/60), $total_dive_time%60); ?></li>
            <li><i class="icon-camera"></i> <?=$user->profiles->camera?></li>
            <li><i class="icon-map-marker"></i> <?=$user->profiles->location?></li>
            <li><i class="icon-bookmark"></i> <a href="<?=$user->profiles->website?>" target="_blank"><?=$user->profiles->website?></a></li>
            </li>
        </ul>
        <hr>
        <p>
        <?= nl2br($user->profiles->description);?>
        </p>
        <hr>
        <div class="row">
            <div class="span2">
                <?php if (is_array($yearly)) : ?>
                <ul class="unstyled">
                    <?php foreach($yearly as $year): ?>
                    <li><a href="<?=Uri::create('user/' . $user->username . '/year/' . $year['year'])?>"><?=$year['year']?>年 (<?=$year['count']?>)</a></li>
                    <?php endforeach;?>
                </ul>
                <?php endif;?>
            </div>
            <div class="span2">
                <?php if (is_array($location)) : ?>
                <ul class="unstyled">
                    <?php foreach($location as $l): ?>
                    <li><a href="<?=Uri::create('user/' . $user->username . '/location/' . $l['name'])?>"><?=$l['name']?> (<?=$l['count']?>)</a></li>
                    <?php endforeach;?>
                </ul>
                <?php endif;?>
            </div>
        </div>
        <?php echo render('social_buttons'); ?>
        <?php echo render('af_square'); ?>
    </div>
    <div class="span8">
        <?=$content?>
    </div>
</div>
