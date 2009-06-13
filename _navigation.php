<div id="nav" class="clearfix">
<ul>
  <li class="page_item <?php if(is_front_page()){echo ' current_page_item';}?>">
    <?php link_to('<span>Home</span>', get_bloginfo('wpurl'), array('class' => 'home')) ?>
  </li>
  <?php wp_list_pages(array('depth' => 1, 'title_li' => '')) ?>
  <li class="search">
	  <?php render_partial('search') ?>
	</li>
</ul>
</div>