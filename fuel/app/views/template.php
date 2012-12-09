<!DOCTYPE html>
<html xmlns:fb="http://ogp.me/ns/fb#">
  <head>
    <meta charset="utf-8">
    <title><?php echo '僕のログブック' . $title; ?></title>
    <?php echo Asset::css('bootstrap.css'); ?>

    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>


    <!--<![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="_UPWDoKwABDx9Ij0-VXbrLhzq4atj_ubT98HPsvkuB0">

<?php
$meta = array(
  array('name' => 'robots', 'content' => 'no-cache'),
  array('name' => 'description',
  'content' => isset($description) ? $description : '
  眠っているログブック
  登録しましょう！
  前に○○行った時寒かったっけ？
  ウェイトはいくつだったっけ？
  どんなもの見たっけ？
  紙のログブックだと探すのに時間がかかりませんか？？
  僕のログブックはログブックを登録しておくことで過去の経験を見つけやすくするサービス
  さあ、あなたのダイビングを可視化しましょう！
  ' ),
  array('name' => 'keywords', 'content' => isset($keywords) ? $keywords : '僕のログブック,ダイビング,ログブック,ライフログ,プロフィール'),
);
echo Html::meta($meta);
?>

<?php echo Asset::css(array(
  'bootstrap-responsive.css',
  'responsive-tables.css',
  'datepicker.css',
  'select2.css',
)); ?>

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<?php echo Asset::js(array(
  'http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js',
  'bootstrap.js',
  'responsive-tables.js'
)); ?>

<link rel="shortcut icon" href="/favicon.ico">
<script type="text/javascript">
$(function(){
  $('.dropdown-toggle').dropdown();
  $('.datepicker').datepicker();
});
</script>
<script type="text/javascript">

(function (w, d) {
  <?php if (Fuel::$env == \Fuel::PRODUCTION): ?>
  w._gaq = [["_setAccount", "UA-11221610-17"],["_trackPageview"]];
  <?php endif;?>
  w.___gcfg = {lang: "ja"};
  var s, e = d.getElementsByTagName("script")[0],
    a = function (u, i) {
      if (!d.getElementById(i)) {
        s = d.createElement("script");
        s.src = u;
        if (i) {s.id = i;}
        e.parentNode.insertBefore(s, e);
      }
    };
  a(("https:" == location.protocol ? "//ssl" : "//www") + ".google-analytics.com/ga.js", "ga");
  a("https://apis.google.com/js/plusone.js");
  a("//b.st-hatena.com/js/bookmark_button_wo_al.js");
  a("//platform.twitter.com/widgets.js", "twitter-wjs");
  a("//connect.facebook.net/ja_JP/all.js#xfbml=1", "facebook-jssdk");
})(this, document);
</script>

<meta property="og:title" content="僕のログブック<?=$title?>">
<meta property="og:type" content="article">
<meta property="og:url" content="<?=Uri::current()?>">
<meta property="og:image" content="<?=Uri::base(false);?>assets/img/title.jpg">
<meta property="og:site_name" content="僕のログブック">
<meta property="og:locale" content="ja_JP">
<meta property="fb:app_id" content="469589996416610">
    </head>
    <body>
      <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </a>
            <?php echo Html::anchor('/', '僕のログブック', array('class' => 'brand')) ?>
            <div class="nav-collapse collapse">
              <div class="btn-group pull-right">
                <?php if (Auth::check()): ?>
                <a href="/user/<?= Auth::get_screen_name()?>" class="btn btn-small"><i class="icon-user"></i>  <?= Auth::get_screen_name()?></a>
                <a href="/log/create" class="btn btn-small"><i class="icon-pencil"></i></a>
                <a href="/setting/profile" class="btn btn-small"><i class="icon-wrench"></i></a>
                <?php else: ?>
                <a href="/auth/session/twitter" class="btn">Login with Twitter</a>
                <?php endif; ?>
              </div>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="span12">
          <?php if (Session::get_flash('success')): ?>
          <div class="alert alert-success">
            <button class="close" data-dismiss="alert">×</button>
            <strong>Success!</strong><br>
            <?= implode('<br>', array(Session::get_flash('success'))); ?>
          </div>
          <?php endif; ?>
          <?php if (Session::get_flash('flash_message')): ?>
          <div class="alert alert-info">
            <button class="close" data-dismiss="alert">×</button>
            <?= Session::get_flash('flash_message'); ?>
          </div>
          <?php endif; ?>
        </div>
        <div class="span12">
          <?php echo $content; ?>
        </div>
      </div>
      <hr/>
      <footer>
      <p class="pull-right"><a href="#">Back to top</a></p>
      <p>&copy;僕のログブック | support <a href="https://twitter.com/#!/redsnow_" target="_blank">Twitter</a> <a href="https://www.facebook.com/pages/%E5%83%95%E3%81%AE%E3%83%AD%E3%82%B0%E3%83%96%E3%83%83%E3%82%AF/382466838502809" target="_blank">Facebook</a>
      </p>

      <div class="btn-group">
        <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?= Uri::base()?>" data-via="" data-hashtags="mylogbook">Tweet</a>
        <div class="g-plusone" data-size="medium" data-href="<?= Uri::base()?>"></div>
        <a href="http://b.hatena.ne.jp/entry/<?= Uri::base()?>" class="hatena-bookmark-button" data-hatena-bookmark-layout="standard-balloon" title="このエントリーをはてなブックマークに追加"><img src="http://b.st-hatena.com/images/entry-button/button-only.gif" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a>
        <fb:like href="<?= Uri::base()?>" send="false" layout="button_count" width="450" show_faces="false"></fb:like>
      </div>

      <!-- <div class="fb-like-box" data-href="https://www.facebook.com/pages/%E5%83%95%E3%81%AE%E3%83%AD%E3%82%B0%E3%83%96%E3%83%83%E3%82%AF/382466838502809" data-width="450" data-height="200" data-show-faces="true" data-stream="true" data-header="true"></div> -->

      </footer>
    </div>
<?php echo Asset::js(array(
  'bootstrap-datepicker.js',
  'bootstrap-transition.js',
  'bootstrap-dropdown.js',
  'bootstrap-alert.js',
  'bootstrap-button.js',
  'bootstrap-carousel.js',
  'bootstrap-collapse.js',
  'bootstrap-affix.js',
  'bootstrap-typeahead.js',
  'select2.js',
)); ?>
      </body>
    </html>
    <?php /* " vim:set ts=8 sts=2 sw=2 tw=0: */?>
