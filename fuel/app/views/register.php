<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Sign in &middot; 僕のログブック</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        <?php echo Asset::css('bootstrap.css'); ?>
        <style type="text/css">
            body {
                padding-top: 40px;
                padding-bottom: 40px;
                background-color: #f5f5f5;
            }

            .form-signin {
                max-width: 300px;
                padding: 19px 29px 29px;
                margin: 0 auto 20px;
                background-color: #fff;
                border: 1px solid #e5e5e5;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border-radius: 5px;
                -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
            }
            .form-signin .form-signin-heading,
            .form-signin .checkbox {
                margin-bottom: 10px;
            }
            .form-signin input[type="text"],
            .form-signin input[type="password"] {
                font-size: 16px;
                height: auto;
                margin-bottom: 15px;
                padding: 7px 9px;
            }

        </style>

        <?php echo Asset::css('bootstrap-responsive.css'); ?>
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Fav and touch icons -->
        <link rel="shortcut icon" href="/favicon.ico">
    </head>

    <body>

        <div class="container">
            <?php echo Form::open(null, array('id' => 'register', 'class' => 'form-signin')); ?>
                <h2 class="form-signin-heading">ユーザー登録</h2>

<?php if (isset($error)): ?>
<span class="error"><?php echo $error; ?></span>
<?php endif; ?>

<p>
<label for="email">Email</label>
<?php echo Form::input('email', $user->email) ?>
</p>
<?php echo Form::submit('submit', null, array('class' => 'btn btn-large btn-primary')) ?>

<?php echo Form::close() ?>

        </div> <!-- /container -->

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



