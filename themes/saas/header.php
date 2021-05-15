<?php defined("APP") or die() ?>
<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1.0" />
    <meta name="description" content="<?php echo Main::description() ?>" />
    <meta name="keywords" content="<?php echo $this->config["keywords"] ?>" />
    <!-- Open Graph Tags -->
    <?php echo Main::ogp(); ?>

    <title><?php echo Main::title() ?></title>

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-P5FPWMW');</script>
	<!-- End Google Tag Manager -->

	<!-- Facebook Pixel Code -->
	<script>
	!function(f,b,e,v,n,t,s)
	{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];
	s.parentNode.insertBefore(t,s)}(window, document,'script',
	'https://connect.facebook.net/en_US/fbevents.js');
	fbq('init', '714042089284247');
	fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none"
	src="https://www.facebook.com/tr?id=714042089284247&ev=PageView&noscript=1"
	/></noscript>
	<!-- End Facebook Pixel Code -->

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $this->config["url"] ?>/static/css/bootstrap.min.css" rel="stylesheet">
    <!-- Component CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo saasStyle("{$this->config["url"]}/themes/{$this->config["theme"]}") ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->config["url"] ?>/static/css/components.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->config["url"] ?>/static/css/fa-all.min.css">
    <!-- Required Javascript Files -->
    <script  src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script defer src="<?php echo $this->config["url"] ?>/static/bootstrap.min.js"></script>
    <script defer src="<?php echo $this->config["url"] ?>/static/application.fn.js"></script>

    <script type="text/javascript">
      var appurl="<?php echo $this->config["url"] ?>";
      var token="<?php echo $this->config["public_token"] ?>";
    </script>
    <?php Main::enqueue() // Add scripts when needed ?>
    <script type="text/javascript" src="<?php echo $this->config["url"] ?>/static/application.js"></script>
    <script type="text/javascript" src="<?php echo $this->config["url"] ?>/static/server.js"></script>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body<?php echo Main::body_class() ?> id="body">
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P5FPWMW"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

    <a href="#body" id="back-to-top"><i class="glyphicon glyphicon-chevron-up upboot"></i></a>
    <?php if($this->isUser): // Show header for logged user ?>
      <header class="app">
        <div class="navbar" role="navigation">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-2">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse, .sidebar">
                    <i class="ti-menu"></i>
                  </button>
                  <a class="navbar-brand" href="<?php echo $this->config["url"] ?>">
                    <?php if (!empty($this->config["logo"])): ?>
                    <img src="<?php echo $this->config["url"] ?>/content/<?php echo $this->config["logo"] ?>" alt="<?php echo $this->config["title"] ?>">
                    <?php else: ?>
                      <?php echo $this->config["title"] ?>
                    <?php endif ?>
                  </a>
                </div>
                <a href="#" class="sidebar-collapse pull-right hidden-xs"><i class="ti-menu"></i></a>
              </div>
              <div class="col-sm-10">
                <div class="navbar-collapse collapse">
                  <ul class="nav navbar-nav navbar-right">
                    <?php if($this->admin()):?>
                      <li><a href="<?php echo $this->config["url"] ?>/admin" class="active"><?php echo e("Admin") ?></a></li>
                    <?php endif ?>
                    <?php if($this->config["blog"]):?>
                      <li><a href="<?php echo $this->config["url"] ?>/blog"><?php echo e("Blog") ?></a></li>
                    <?php endif ?>
                    <?php if(!$this->pro() && $this->config["pro"]): ?>
                      <li><a href="<?php echo Main::href("pricing") ?>" class="active"><?php echo e("Upgrade") ?></a></li>
                    <?php endif ?>
                    <li class="dropdown">
                      <a href="<?php echo Main::href("user") ?>"><span><?php echo ucfirst($this->user->username) ?> <i class="glyphicon glyphicon-chevron-down"></i></span> <img src="<?php echo $this->user->avatar ?>" alt="<?php echo e("My Account") ?>"> </a>
                      <ul class="dropdown-nav">
                        <li>
                          <h3><?php echo ucfirst($this->user->username) ?> <span class="label label-primary"><?php echo $this->pro() ? e($this->user->plan->name) : e("Free") ?></span></h3>
                        </li>
                        <li><a href="<?php echo Main::href("user") ?>"><i class="ti-dashboard"></i> <?php echo e("Dashboard") ?></a></li>
                        <li><a href="<?php echo Main::href("profile/{$this->user->username}") ?>"><i class="ti-user"></i> <?php echo e("Public Profile") ?></a></li>
                        <li><a href="<?php echo Main::href("user/builder") ?>"><i class="ti-ruler-pencil"></i> <?php echo e("Profile Builder") ?></a></li>
                        <li><a href="<?php echo Main::href("user/membership") ?>"><i class="ti-credit-card"></i> <?php echo e("Membership") ?></a></li>
                        <li><a href="<?php echo Main::href("user/tools") ?>"><i class="ti-shortcode"></i> <?php echo e("Developer Tools") ?></a></li>
                        <li><a href="<?php echo Main::href("user/settings") ?>"><i class="ti-settings"></i> <?php echo e("Settings") ?></a></li>
                        <li><a href="<?php echo Main::href("user/logout") ?>"><i class="ti-power-off"></i> <?php echo e("Logout") ?></a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>
      <section>
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-2 sidebar">
              <?php echo $this->user_menu() ?>
            </div>
            <div class="col-sm-10 content">
    <?php else: ?>
      <?php if($this->headerShow): // Show header ?>
        <header>
          <div class="navbar" role="navigation">
            <div class="container">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="ti-menu"></span>
                </button>
                <a class="navbar-brand" href="<?php echo $this->config["url"] ?>">
                  <?php if (!empty($this->config["logo"])): ?>
                  <img src="<?php echo $this->config["url"] ?>/content/<?php echo $this->config["logo"] ?>" alt="<?php echo $this->config["title"] ?>">
                  <?php else: ?>
                    <?php echo $this->config["title"] ?>
                  <?php endif ?>
                </a>
              </div>
              <div class="navbar-collapse collapse">
                <?php echo $this->menu([["href" => Main::href("#mainto"), "text" => e("Features")]]) ?>
                <div class="languages">
                <a href="#lang" id="show-language"><i class="ti-world"></i> <?php saasCurrentLang() ?></a>
                <div class="langs">
                  <?php echo $this->lang(0) ?>
                </div>
              </div>
              </div>
            </div>
          </div>
        </header>
      <?php endif ?>
    <?php endif ?>