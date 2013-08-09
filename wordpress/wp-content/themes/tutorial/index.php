
	<?php get_header();?>
	<?php get_sidebar();?>
	<div id="container">
		<?php if(have_posts()): ?><?php while(have_posts()): the_post(); ?>
			<div class="post" id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="entry">
					<!--?php the_content(); ?-->
					<!--?php the_excerpt(); ?-->
					<?php echo mb_strimwidth(strip_tags($post->post_content), 0, 150, '....'); ?>
					
				</div>
			</div>
		<?php endwhile; ?>
			<div class="navigation">
				<?php posts_nav_link('in between','before','after'); ?>
			</div>
		<?php else: ?>
			<div class="post">
				<h2><?php _e('Not Found');?></h2>
			</div>
		<?php endif; ?>
	
	</div>

	
	<?php get_footer();?>