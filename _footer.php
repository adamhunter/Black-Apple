<div id="footer">
  <h2><?php link_to(get_bloginfo('name'), get_bloginfo('wpurl')) ?></h2>
  <?php content_tag('h4', get_bloginfo('description'))?>
	
	&lsaquo; <a href="http://wordpress.org/">WordPress</a> &rsaquo;
	<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
  
  <?php wp_footer(); ?>
</div>