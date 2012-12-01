<div class="row">
    <div class="span4">
        <div class="row">
            <div class="span1">
                <img src="<?=$user->profile->image?>" class="img-polaroid">
            </div>
            <div class="span3">
            <h2><?=$user->profile->full_name;?></h2>
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
            <li><i class="icon-home"></i> <?= $home_location ?></li>
            <li><i class="icon-camera"></i> <?=$user->profile->camera?></li>
            <li><i class="icon-map-marker"></i> <?=$user->profile->location?></li>
            <li><i class="icon-bookmark"></i> <a href="<?=$user->profile->website?>" target="_blank"><?=$user->profile->website?></a></li>
            <li><a href="<?=$user->profile->twitter?>" class="twitter-follow-button" data-show-count="false" data-lang="ja">@<?=$user->username?>さんをフォロー</a>
            </li>
        </ul>
        <hr>
        <p>
            <?= nl2br($user->profile->description);?>
        </p>
        <hr>
        <?php echo render('social_buttons'); ?>
        <?php echo render('af_square'); ?>
    </div>
    <div class="span8">
        <?=$content?>
    </div>
</div>
