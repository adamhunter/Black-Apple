<?php content_for('title', get_bloginfo('name') . ' - Welcome!') ?>

<?php if (have_posts()) : ?>

	<?php while (have_posts()) : the_post(); ?>

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
		  <?php post_datestamp($post->post_date, true) ?>
			<h3 class="archivetitle">
			  <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			</h3>
			<small>by <?php the_author() ?></small>

			<div class="entry">
				<?php the_content('Continue'); ?>
			</div>

			<p class="meta"><?php render_partial('meta'); ?></a>

		</div>

	<?php endwhile; ?>

	<div class="navigation">
		<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
		<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
	</div>

<?php else : ?>

	<h2 class="center">Not Found</h2>
	<p class="center">Sorry, but you are looking for something that isn't here.</p>

<?php endif; ?>

<?php /* Silence is overrated */ ?>
