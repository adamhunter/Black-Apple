<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<?php render_partial('head') ?>

<body <?php body_class(); ?>>

<?php render_partial('navigation') ?>

<div id="container">

<?php render_partial('header') ?>

<div id="content-container">
  <?php breadcrumbs($this->yield('breadcrumbs', false)) ?>
  <div id="content">
    <?php $this->yield() ?>
  </div><!-- #content -->
</div>

<?php render_partial('sidebar') ?>

<?php render_partial('footer') ?>

</div><!-- #container -->

</body>
</html>