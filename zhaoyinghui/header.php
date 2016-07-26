<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>个人博客</title>
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/lib/reset.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/page/responsive.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/Font-Awesome/css/font-awesome.min.css">
	<?php wp_head(); ?>
</head>
<body>
	<header class="navbar navbar-default" role="navigation">
		<h1><span>M</span>y Blog</h1>
		<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-responsive-collapse">
			<span class="sr-only">Toggle Navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<div class="collapse navbar-collapse navbar-responsive-collapse">
				<ul class="nav navbar-nav">
					<li<?php if (is_home()) { echo ' class="current-cat"';} ?>><a title="Home" href="/wordpress">Parent Page</a></li>
					<?php
						$currentcategory = '';
						if  (is_category() || is_single()) {
   						$catsy = get_the_category();
    					$myCat = $catsy[0]->cat_ID;
    					$currentcategory = '&current_category='.$myCat;
					}
					wp_list_categories('depth=1&title_li=&show_count=0&hide_empty=0&child_of=0'.$currentcategory);
					wp_list_pages('depth=1&title_li=&sort_column=menu_order');
					?>
				</ul>
		</div>
	</header>