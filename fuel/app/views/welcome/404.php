<div class="hero-unit">
    <h1>404 NOT FOUND</h1>
    <p>ページがみつかりません。</p>
    <p>
    <?php if (!Auth::check()): ?>
        <a href="/auth/session/twitter" class="btn btn-primary btn-large">Login with Twitter</a>
    <?php endif;?>
    </p>
</div>
