<?php if (have_posts()) : ?>

	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	  <?php /* If this is a category archive */ if (is_category()) { ?>
	<h2 class="pagetitle">Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>
	  <?php 
	    content_for('title', single_cat_title('', false).' - Categories'.' - '.get_bloginfo('name'));
	    content_for('breadcrumbs', array(link_to('Categories', '#', array(), false), link_to(single_cat_title('', false), '#', array(), false)));
	  ?>
	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
	<h2 class="pagetitle">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
	  <?php 
	    content_for('title', single_tag_title('', false).' - Tags'.' - '.get_bloginfo('name'));
	    content_for('breadcrumbs', array(link_to('Tags', '#', array(), false),link_to(single_tag_title('', false), '#', array(), false)));
	  ?>
	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
	<h2 class="pagetitle">Archive for <?php the_time('F jS, Y'); ?></h2>
	  <?php 
	    content_for('breadcrumbs', array(link_to(get_the_time('F jS, Y'), '#', array(), false)));
	  ?>
	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
	<h2 class="pagetitle">Archive for <?php the_time('F, Y'); ?></h2>
	  <?php 
	    content_for('breadcrumbs', array(link_to(get_the_time('F, Y'), '#', array(), false)));
	  ?>
	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
	<h2 class="pagetitle">Archive for <?php the_time('Y'); ?></h2>
	  <?php 
	    content_for('breadcrumbs', array(link_to(get_the_time('Y'), '#', array(), false)));
	  ?>
  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
	<h2 class="pagetitle">Author Archive</h2>
	  <?php 
	    content_for('breadcrumbs', array(link_to('Author Archive', '#', array(), false)));
	  ?>
	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
	<h2 class="pagetitle">Blog Archives</h2>
	  <?php 
	    content_for('breadcrumbs', array(link_to('Blog Archives', '#', array(), false)));
	  ?>
	  <?php } ?>


	<div class="navigation">
		<span class="left"><?php next_posts_link('Older Entries') ?></span>
		<span class="right"><?php previous_posts_link('Newer Entries') ?></span>
	</div>

	<?php while (have_posts()) : the_post(); ?>
	<div <?php post_class() ?>>
	    <?php post_datestamp($post->post_date, true) ?>
			<h3 id="post-<?php the_ID(); ?>" class="archivetitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
      <small>by <?php the_author() ?></small>
			<div class="entry">
				<?php the_content('Continue') ?>
			</div>
			<p class="meta"><?php render_partial('meta'); ?></a>
		</div>

	<?php endwhile; ?>

<?php else :

	if ( is_category() ) { // If this is a category archive
		printf("<h2 class='center'>Sorry, but there aren't any posts in the %s category yet.</h2>", single_cat_title('',false));
	} else if ( is_date() ) { // If this is a date archive
		echo("<h2>Sorry, but there aren't any posts with this date.</h2>");
	} else if ( is_author() ) { // If this is a category archive
		$userdata = get_userdatabylogin(get_query_var('author_name'));
		printf("<h2 class='center'>Sorry, but there aren't any posts by %s yet.</h2>", $userdata->display_name);
	} else {
		echo("<h2 class='center'>No posts found.</h2>");
	}
	get_search_form();

endif;
?>
