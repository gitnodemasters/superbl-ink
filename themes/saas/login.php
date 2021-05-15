<?php defined("APP") or die() ?>
<section class="section-full-page">
  <div class="container-fluid">
    <div class="row">
      <div class="left-side col-sm-4">
        <a class="navbar-brand" href="<?php echo $this->config["url"] ?>">
          <?php if (!empty($this->config["logo"])): ?>
            <?php logo() ?>
          <?php else: ?>
            <?php echo $this->config["title"] ?>
          <?php endif ?>
        </a>
        <div class="inner-text text-center">

          <?php if($this->config["user"] && !$this->config["private"] && !$this->config["maintenance"]): ?>
            <h2><?php echo e("Don't have an account?")?></h2>
            <a href="<?php echo Main::href("user/register") ?>" class="btn btn-transparent-white btn-lg"><?php echo e("Create account") ?></a>
          <?php else: ?>
            <h2><?php echo e("A great tool for savvy marketers") ?></h2>
          <?php endif ?>
        </div>

        <div class="footer">
          <div class="row">
            <div class="col-md-5 col-sm-12">
              <?php echo date("Y") ?> &copy; <?php echo $this->config["title"] ?>.
            </div>
            <div class="col-md-7 hidden-sm text-right">
              <?php foreach ($this->db->get("page", ["menu" => "1"], ["limit" => 4]) as $i => $page):?>
                <a href='<?php echo $this->config["url"]?>/page/<?php echo $page->seo ?>' title='<?php echo e($page->name)?>'><?php echo e($page->name)?></a>
              <?php endforeach; ?>
              <a href='<?php echo $this->config["url"]?>/contact' title='<?php echo e("Contact")?>'><?php echo e("Contact")?></a>
            </div>
          </div>
        </div>
      </div>

      <div class="right-side col-sm-8">
        <div class="centered form">
          <?php echo Main::message() ?>
          <?php if(!$this->config["private"] && !$this->config["maintenance"] && $this->config["user"] && ($this->config["fb_connect"] || $this->config["tw_connect"] || $this->config["gl_connect"])):?>
            <div class="social">
              <h3><?php echo e("Login using a social network") ?></h3>
              <?php if($this->config["fb_connect"]):?>
              <a href="<?php echo $this->config["url"]?>/user/login/facebook" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f"></i> <?php echo e("Sign in with Facebook") ?></a>
              <?php endif;?>
              <?php if($this->config["tw_connect"]):?>
              <a href="<?php echo $this->config["url"]?>/user/login/twitter" class="btn btn-twitter btn-block"><i class="fab fa-twitter"></i> <?php echo e("Sign in with Twitter") ?></a>
              <?php endif;?>
              <?php if($this->config["gl_connect"]):?>
              <a href="<?php echo $this->config["url"]?>/user/login/google" class="btn btn-google btn-block">
                <svg viewBox="0 0 533.5 544.3" xmlns="http://www.w3.org/2000/svg"><path d="M533.5 278.4c0-18.5-1.5-37.1-4.7-55.3H272.1v104.8h147c-6.1 33.8-25.7 63.7-54.4 82.7v68h87.7c51.5-47.4 81.1-117.4 81.1-200.2z" fill="#4285f4"/><path d="M272.1 544.3c73.4 0 135.3-24.1 180.4-65.7l-87.7-68c-24.4 16.6-55.9 26-92.6 26-71 0-131.2-47.9-152.8-112.3H28.9v70.1c46.2 91.9 140.3 149.9 243.2 149.9z" fill="#34a853"/><path d="M119.3 324.3c-11.4-33.8-11.4-70.4 0-104.2V150H28.9c-38.6 76.9-38.6 167.5 0 244.4l90.4-70.1z" fill="#fbbc04"/><path d="M272.1 107.7c38.8-.6 76.3 14 104.4 40.8l77.7-77.7C405 24.6 339.7-.8 272.1 0 169.2 0 75.1 58 28.9 150l90.4 70.1c21.5-64.5 81.8-112.4 152.8-112.4z" fill="#ea4335"/></svg>
                 <?php echo e("Sign in with Google") ?></a>
              <?php endif;?>
            </div>
          <?php endif;?>
          <form role="form" class="live_form form" id="login_form" method="post" action="<?php echo Main::href("user/login")?>">
            <div class="form-group">
              <label for="email"><?php echo e("Email or username") ?></label>
              <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
              <i class="ti-user hidden-sm hidden-md hidden-lg"></i>
            </div>
            <div class="form-group">
              <label for="pass"><?php echo e("Password")?></label>
              <input type="password" class="form-control" id="pass" placeholder="Password" name="password">
              <i class="ti-eye"></i>
            </div>
            <p><?php echo $captcha = Main::captcha() ?></p>
            <div class="form-group">
              <label>
                  <input type="checkbox" name="rememberme" value="1" data-class="aero">
                  <span class="check-box"><?php echo e("Remember me")?></span>
              </label>
            </div>
            <?php echo Main::csrf_token(TRUE) ?>
            <button type="submit" class="btn btn-primary"><?php echo e("Login")?></button>
            <small><a href="#forgot" id="forgot-password"><?php echo e("Forgot Password")?></a></small>
          </form>

          <form role="form" class="live_form" id="forgot_form" method="post" action="<?php echo Main::href("user/forgot")?>">
            <div class="form-group">
              <label for="email1"><?php echo e("Email address")?></label>
              <input type="email" class="form-control" id="email1" placeholder="Enter email" name="email">
            </div>
            <p><?php echo $captcha ?></p>
            <?php echo Main::csrf_token(TRUE) ?>
            <button type="submit" class="btn btn-primary"><?php echo e("Reset Password")?></button>
            <small><a href="<?php echo Main::href("user/login") ?>"><?php echo e("Back to login")?></a></small>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>