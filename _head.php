<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php $this->yield('title') ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> &raquo; Articles Feed" href="<?php bloginfo('wpurl') ?>?feed=rss2" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> &raquo; All Comments Feed" href="<?php bloginfo('wpurl') ?>?feed=comments-rss2" />
<?php wp_enqueue_script('theme', THEME_SCRIPT, array('jquery')); ?>
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>
</head>