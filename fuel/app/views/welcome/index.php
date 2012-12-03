<style type="text/css">
    body {
        min-height: 100%; /* html要素をウィンドウサイズにフィット */
        background:url('http://farm8.staticflickr.com/7061/6928105627_f3f68404df_b.jpg') no-repeat center; /* 背景画像をhtml要素に表示 */
        background-size:cover; /* 背景画像をhtml要素にフィット */
    }

    .hero-unit h1 {
        margin-bottom:15px;
    }
    .fb_iframe_widget {
        background-color:#fff;
    }
</style>

<div class="row">
    <div class="span8">

        <div class="hero-unit">
            <h1>僕のログブック</h1>
            <p class="lead">
            ダイビングのログを登録しプロフィールを作成出来ます
            <ul>
                <li>自分がどんなダイバーなのか自分が見直すきっかけに</li>
                <li>初めて行ったショップで説明するのに使える</li>
            </ul>
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
    </div>
    <div class="span3">
        <fb:like-box href="https://www.facebook.com/pages/%E5%83%95%E3%81%AE%E3%83%AD%E3%82%B0%E3%83%96%E3%83%83%E3%82%AF/382466838502809" width="292" show_faces="true" stream="true" header="true"></fb:like-box>
    </div>
</div>
