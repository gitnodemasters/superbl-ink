<?php defined("APP") or die() // Footer ?>
  <?php if ($this->isUser): // Show user page footer ?>
              <footer class="appmain">
                <div class="row">
                  <div class="col-sm-5">
                    <?php echo date("Y") ?> &copy; <?php echo $this->config["title"] ?>.
                  </div>
                  <div class="col-sm-7 text-right">
                    <?php foreach ($pages as $page):?>
                      <a href='<?php echo $this->config["url"]?>/page/<?php echo $page->seo ?>' title='<?php echo e($page->name)?>'><?php echo e($page->name)?></a>
                    <?php endforeach; ?>
                    <?php if ($this->config["blog"]): ?>
                      <a href="<?php echo $this->config["url"]?>/blog" title='<?php echo e("Blog")?>'><?php echo e("Blog")?></a>
                    <?php endif ?>
                    <?php if ($this->config["report"]): ?>
                      <a href='<?php echo Main::href("report") ?>' title='<?php echo e("Report Link")?>'><?php echo e("Report Link")?></a>
                    <?php endif ?>
                    <a href='<?php echo $this->config["url"]?>/contact' title='<?php echo e("Contact")?>'><?php echo e("Contact")?></a>
                    <div class="languages">
                      <a href="#lang" class="active" id="show-language"><i class="ti-world"></i> <?php saasCurrentLang() ?></a>
                      <div class="langs">
                        <?php echo $this->lang(0) ?>
                      </div>
                    </div>
                  </div>
                </div>
            </footer>
          </div><!--/.content-->
        </div><!--/.row-->
      </div><!--/.container-->
    </section>
  <?php else: // Show general footer ?>
    <?php if ($this->footerShow): ?>
      <footer class="main">
        <div class="container">
          <a href="<?php echo $this->config["url"] ?>">
          <?php if (!empty($this->config["logo"])): ?>
            <img src="<?php echo $this->config["url"] ?>/content/<?php echo $this->config["logo"] ?>" alt="<?php echo $this->config["title"] ?>" height="45">
          <?php else: ?>
            <h2><?php echo e($this->config["title"]) ?></h2>
          <?php endif ?>
          </a>
          <p class="description"><?php echo e($this->config["description"]) ?></p>
          <ul class="social-icons">
            <?php if (!empty($this->config["facebook"])): ?>
              <li><a href="<?php echo $this->config["facebook"] ?>" target="_blank"><i class="ti-facebook"></i></a></li>
            <?php endif ?>
            <?php if (!empty($this->config["twitter"])): ?>
              <li><a href="<?php echo $this->config["twitter"] ?>" target="_blank"><i class="ti-twitter"></i></a></li>
            <?php endif ?>
          </ul>
          <div class="row">
            <div class="col-sm-5">
              <p><?php echo date("Y") ?> &copy; <?php echo e($this->config["title"]) ?>.</p>
            </div>
            <div class="col-sm-7 text-right">
              <?php foreach ($pages as $page):?>
                <a href='<?php echo $this->config["url"]?>/<?php echo $page->seo ?>' title='<?php echo e($page->name)?>'><?php echo e($page->name)?></a>
              <?php endforeach; ?>
              <?php if ($this->config["blog"]): ?>
                      <a href="<?php echo $this->config["url"]?>/blog" title='<?php echo e("Blog")?>'><?php echo e("Blog")?></a>
                    <?php endif ?>
                    <?php if ($this->config["report"]): ?>
                      <a href='<?php echo Main::href("report") ?>' title='<?php echo e("Report Link")?>'><?php echo e("Report Link")?></a>
                    <?php endif ?>
              <a href='<?php echo $this->config["url"]?>/contact' title='<?php echo e("Contact")?>'><?php echo e("Contact")?></a>
              <!--<div class="languages">
                <a href="#lang" id="show-language"><i class="ti-world"></i> <?php saasCurrentLang() ?></a>
                <div class="langs">
                  <?php echo $this->lang(0) ?>
                </div>
              </div> -->
            </div>
          </div>
        </div>
      </footer>
    <?php endif ?>
  <?php endif ?>
  <script type="text/javascript">
    <?php
      $js_lang = array(
        "del" => e("Delete"),
        "url" => e("URL"),
        "count" => e("Country"),
        "copied"  =>  e("Copied"),
        "geo" => e("Geotargeting data for"),
        "error" => e('Please enter a valid URL.'),
        "success" => e('URL has been successfully shortened. Click Copy or CRTL+C to Copy it.'),
        "stats" => e('You can access the statistic page via this link'),
        "copy" => e('Copied to clipboard.'),
        "from" => e('Redirect from'),
        "to" => e('Redirect to'),
        "share" => e('Share this on'),
        "congrats"  => e('Congratulation! Your URL has been successfully shortened. You can share it on Facebook or Twitter by clicking the links below.'),
        "qr" => e('Save QR Code'),
        "continue"  =>  e("Continue"),
        "cookie" => e("This website uses cookies to ensure you get the best experience on our website."),
        "cookieok" => e("Got it!"),
        "cookiemore" => e("Learn more"),
        "couponinvalid" => e("The coupon enter is not valid"),
        "minurl" => e("You must select at least 1 url."),
        "minsearch" => e("Keyword must be more than 3 characters!"),
        "typed" => [e("Marketers."), e("Influencers."), e("Youtubers."), e("Artists."), e("Corporate."), e("Everyone.")],
        "modal" => [
          "title" => e("Are you sure you want to proceed?"),
          "proceed" => e("Proceed"),
          "cancel" => e("Cancel"),
          "close" => e("Close"),
          "content" => e("Note that this action is permanent. Once you click proceed, you <strong>may not undo</strong> this. Click anywhere outside this modal or click <a href='#close' class='close-modal'>close</a> to close this.")
        ]
      );
    ?>
    var lang = <?php echo json_encode($js_lang) ?>;
  </script>
	<?php Main::enqueue('footer') ?>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.6/typed.min.js"></script>
    <script type="text/javascript" src="<?php echo $this->theme("assets/js/main.js") ?>"></script>
	</body>
</html>