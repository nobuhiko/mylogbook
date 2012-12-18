<div class="row">
    <div class="span10 offset1">

        <div class="page-header">
            <h1>
                眠っているログブック<br>登録しましょう！
            </h1>
        </div>
        <p class="lead">
        前に○○行った時寒かったっけ？<br>
            ウェイトはいくつだったっけ？<br>
            どんなもの見たっけ？<br>
        紙のログブックだと探すのに時間がかかりませんか？？
        </p>
        <p class="lead">
        僕のログブックはログブックを登録しておくことで過去の経験を見つけやすくするサービス<br>
        さあ、あなたのダイビングを可視化しましょう！
        </p>

        <p>
<?php if (Auth::check()): ?>
        <a href="<?= Uri::create('auth/session/twitter')?>" class="btn btn-large btn-primary">Sign in with Twitter</a>
<?php endif; ?>
        <a href="<?= Uri::create('user/redsnow_')?>" class="btn btn-large">Demo</a>
        </p>
    </div>
</div>
