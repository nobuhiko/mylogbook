<div class="hero-unit">
    <h1>僕のログブックへようこそ！</h1>
    <hr>
    <p>
    僕のログブックはダイビングのログを登録しダイビングプロフィールを作成出来ます<br>
    自分がどんなダイバーなのか自分が見直すきっかけに<br>
    初めて行ったショップで説明するのに使える<br>
    そんなサービスを目指しています
    </p>
    <p>
    <?php if (!Auth::check()): ?>
    <a href="/auth/session/twitter" class="btn btn-primary btn-large">
        利用を開始する
    </a>
    <?php endif;?>
    <a href="/user/redsnow_" class="btn btn-large">
        例を見てみる
    </a>
    </p>
</div>
