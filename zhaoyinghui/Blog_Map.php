<?php 
/*
	Template Name: Blog Map
*/
 ?>
<?php get_header(); ?>
<div class="single_container">
	<button class="icon-reorder btn btn-default"></button>
	<div class="control">
		<h1>Map Control</h1>
		<p>There is no limit to knowledge.</p>
		<button class="btn btn-success">Start</button>
	</div>
	<div class="container map">
		<div class="row">
			<div class="col-md-3">
				<img src="<?php bloginfo('template_url'); ?>/images/MDN.png" alt="">
			</div>
			<div class="col-md-3">
				<img src="<?php bloginfo('template_url'); ?>/images/stackoverflow.png" alt="">
			</div>
			<div class="col-md-3">
				<img src="<?php bloginfo('template_url'); ?>/images/linux.png" alt="">
			</div>
			<div class="col-md-3">
				<img src="<?php bloginfo('template_url'); ?>/images/github.png" alt="">
			</div>
		</div>
	</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>