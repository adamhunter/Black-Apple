<?php

define('THEME_PATH', dirname(__FILE__));
define('THEME_URL', get_bloginfo('template_url'));
define('THEME_SCRIPT', THEME_URL . '/script.js');

require THEME_PATH . '/renderer.php';
require THEME_PATH . '/time_since.php';


register_sidebar(array(
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h3 class="widget-title">',
	'after_title'   => '<span></span></h3>',
));

function is_login()
{
  return 'wp-login.php' ==  basename($_SERVER['SCRIPT_FILENAME']);
}

function is_any_feed()
{
  return !empty($_GET['feed']);
}

function breadcrumbs($crumbs=array())
{
  echo '<div id="breadcrumbs" class="clearfix"><ul>';
  echo '<li><a href="' . get_bloginfo('wpurl') . '" class="home"><span>Home</span></a></li>';
  if (!empty($crumbs)) :
    foreach ($crumbs as $link) :
      echo "<li>$link</li>";
    endforeach;
  endif;
  echo '</ul></div>';
}

function post_datestamp($datetime, $small=false) 
{
  $class = $small ? 'small' : 'large';
  $format = '<ul id="date" class="'.$class.'">'
          . '<li id="month">%B</li>'
          . '<li id="day">%d</li>'
          . '<li id="year">%Y</li>'
          . '</ul>';
  echo strftime($format, strtotime($datetime));
}

add_filter('get_comment_date', create_function('$date', 'return strftime("%m/%e/%g", strtotime($date))."<br/>";'));

if ( defined('WP_USE_THEMES') && constant('WP_USE_THEMES') && !is_any_feed()) :  
  global $r;
  $r = new Renderer();
endif;