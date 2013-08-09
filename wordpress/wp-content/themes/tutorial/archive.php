
	<?php get_header();?>
	<?php get_sidebar();?>
	<div id="container">
		<?php if(have_posts()): ?><?php while(have_posts()): the_post(); ?>
			<div class="post" id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="entry">
					<?php the_excerpt(); ?>
					<p class="postmetadata"><!--日志元数据-->
	                <?php _e('Filed under:');?>
	                <?php the_category(',');?><!--调用日志的分类-->
	                <?php _e('by');?><!--使用_e()创建可翻译的主题-->
	                <?php the_author('');?><!--调用日志作者-->
	                <br />
	                <?php comments_popup_link('No Comments»','1 Comments»','% Comment»');?><!--调用一个弹出的留言窗口，如果这个功能没有激活，则是显示留言列表-->
	                <?php edit_post_link('Edit','|','');?><!--只有在登陆后才可见到，对日志进行编辑的链接-->
	                </p>
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