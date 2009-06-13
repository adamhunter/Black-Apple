<?php
  ob_start(); the_category('</li><li>');
  $cats = ob_get_clean();
  content_for('title', the_title(null, ' - ', false) . get_bloginfo('name'));
  content_for('breadcrumbs', array(
    $cats,
    link_to(the_title(null, null, false), get_permalink($post->ID), array(), false)
  ));
?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

  <div class="navigation">
    <span class="right"><?php previous_post_link('%link') ?></span>
    <span class="left"><?php next_post_link('%link') ?></span>
  </div>

	<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
	  <?php post_datestamp($post->post_date); ?>
		<h1 class="title"><?php link_to(the_title(null, null, false), get_permalink($post->ID)); ?></h1>
    <small>by <?php the_author() ?></small>
		<div class="entry">
			<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>

			<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			<p class="meta">
					This entry was posted
					<?php $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; ?>
					on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?>. 
					<?php if ( comments_open() && pings_open() ) {
						// Both Comments and Pings are open ?>
						You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site.

					<?php } elseif ( !comments_open() && pings_open() ) {
						// Only Pings are Open ?>
						Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site.

					<?php } elseif ( comments_open() && !pings_open() ) {
						// Comments are open, Pings are not ?>
						You can skip to the end and leave a response. Pinging is currently not allowed.

					<?php } elseif ( !comments_open() && !pings_open() ) {
						// Neither Comments, nor Pings are open ?>
						Both comments and pings are currently closed.
					<?php } ?>
          <?php render_partial('meta') ?>
			</p>

		</div><!-- .entry -->
	</div>

<div id="comments-container">
<?php comments_template(); ?>
<span id="comments-rss"><?php post_comments_feed_link('Article Comments RSS'); ?></p>
</div>

<?php endwhile; else: ?>

	<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>
