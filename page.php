<?php
  content_for('title', get_bloginfo('name') . the_title(' - ', null, false)); 
  content_for('breadcrumbs', array(link_to(the_title(null, null, false), get_permalink($post->ID), array(), false)));
?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="post" id="post-<?php the_ID(); ?>">
<h1><?php the_title(); ?></h1>
	<div class="entry">
	  <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
		<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

		<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

	</div>
</div>
<?php endwhile; endif; ?>
<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
