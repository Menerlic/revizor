<div class="header-block">
  <header id="navbar" class="<?php print $navbar_classes; ?>">
    <div class="<?php print $container_class; ?>">
      <div class="navbar-header">
        <?php if (!empty($site_name)): ?>
          <a class="name navbar-brand" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><span class="icon-pen"></span><?=$site_name?></a>
        <?php endif; ?>

        <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only"><?php print t('Toggle navigation'); ?></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        <?php endif; ?>
      </div>

      <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
        <div class="navbar-collapse collapse">
          <nav>
		    <div>
				<?php if (!empty($secondary_nav)): ?>
				  <?php print render($secondary_nav); ?>
				<?php endif; ?>
			</div>
			<div>
				<?php if (!empty($primary_nav)): ?>
				  <?php print render($primary_nav); ?>
				<?php endif; ?> 
			</div>
			<div>		
				<?php if (!empty($page['navigation'])): ?>
				  <?php print render($page['navigation']); ?>
				<?php endif; ?>
			</div>
          </nav>
        </div>
      <?php endif; ?>
    </div>
  </header>
</div>

<?php if(!$is_front):?>

<div class="page-title">
  <div class="container ">
    <div class='row'>
      <div class='col-md-12'>
        <?php print render($title_prefix); ?>
        <?php if (!empty($title)): ?>
          <h1 class="page-header"><?php print $title; ?></h1>
        <?php endif; ?>
        <?php print render($title_suffix); ?>
      </div>
    </div>
  </div>
</div>

<div class="main-container <?php print $container_class; ?>">

  <header id="page-header">
    <?php if (!empty($site_slogan)): ?>
      <p class="lead"><?php print $site_slogan; ?></p>
    <?php endif; ?>

    <?php print render($page['header']); ?>
  </header> <!-- /#page-header -->

  <div class="row">

    <?php if (!empty($page['sidebar_first'])): ?>
      <aside class="col-sm-3" role="complementary">
        <?php print render($page['sidebar_first']); ?>
      </aside>  <!-- /#sidebar-first -->
    <?php endif; ?>

    <section<?php print $content_column_class; ?>>
      <?php
      if (!empty($breadcrumb)): print $breadcrumb;
      endif;
      ?>
      <a id="main-content"></a>
      <?php print $messages; ?>
      <?php if (!empty($tabs)): ?>
        <?php print render($tabs); ?>
      <?php endif; ?>
      <?php if (!empty($page['help'])): ?>
        <?php print render($page['help']); ?>
      <?php endif; ?>
      <?php if (!empty($action_links)): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
    </section>

    <?php if (!empty($page['sidebar_second'])): ?>
      <aside class="col-sm-3" role="complementary">
        <?php print render($page['sidebar_second']); ?>
      </aside>  <!-- /#sidebar-second -->
    <?php endif; ?>

  </div>
</div>

<?php else:?>
	<?php print render($page['content']); ?>
<?php endif?>

<div class="divider02">
	<div class="container text-center">
		<h3>Есть вопросы или пожелания?</h3>
		<a class="btn btn-lg btn-theme2" type="button" href="/feedback">Напишите нам!</a>
	</div>
</div>

<div class="footer-block">
  <footer class="footer <?php print $container_class; ?>">
    <div class="row">
      <div class="col-md-4">
		<h3>Контакты</h3>
		<p><!--<span class="icon-location"></span> Москва, ул. Новослободская, д.9 <br/>-->
			<span class="icon-phone"></span> +7 (916) 416-85-22, +7 (925) 476-66-49 <br>
			<span class="icon-envelope"></span> <a href="mailto:info@le-revizor.ru">info@le-revizor.ru</a>
		</p>
	  </div>
      <div class="col-md-4">
	    <h3>Поиск</h3>
        <?php if (!empty($page['footer'])): ?>
          <?php print render($page['footer']); ?>
        <?php endif; ?>
      </div>
	  <div class="col-md-4">
	    <h3>Подписаться на новости</h3>
		<?php if (!empty($page['highlighted'])): ?>
			<div><?php print render($page['highlighted']); ?></div>
        <?php endif; ?>
      </div>
	</div>
  </footer>
</div>

<div class="copyright-block">
  <div class="<?php print $container_class; ?>">
	<div class="row">
		<div class="col-lg-9">
			<p>&copy;<?=date('Y')?> Ревизор. Все права защищены.</p>
		</div>
		<div class="col-lg-3 text-right">
			<p><a href="/terms">Условия использования</a></p>
		</div>
	</div>
  </div>
</div>