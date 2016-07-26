<?php get_header(); ?>
			<div class="container single_container">
			 <button class="btn btn-default icon-reorder"></button>
				<div class="row">
					<?php if(have_posts()) : ?>
						<?php while(have_posts()) : the_post(); ?>
							<div class="single col-md-12 id="post-<?php the_ID(); ?>" ">
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<div class="entry">
									<?php the_content(); ?>
									<p class="postmetadata">
									<?php _e('Filed under&#58;'); ?> 
									<?php the_category(', ') ?><br /> 
									<?php _e('by'); ?><br /> 
									<?php  the_author(); ?><br />
									<?php comments_popup_link('No Comments', '1 Comment', '% Comments;'); ?><br />
									<button class="btn btn-primary">Edit<?php edit_post_link('', '', ''); ?></button>
									<?php the_tags('标签：',',',''); ?>
									</p>
								</div>
							</div>
						<?php endwhile; ?>
						<div class="navigation col-md-12">
						<p class="clearfix"><?php previous_posts_link('&lt;&lt; 查看新文章', 0); ?><span class="float right"><?php next_posts_link('查看旧文章 &gt;&gt;', 0); ?></span></p>
						</div>
					<?php else : ?>
					<div class="post">
						<h2><?php _e('Not Found'); ?></h2>
					</div>
				<?php endif; ?>
				</div>
			</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>

