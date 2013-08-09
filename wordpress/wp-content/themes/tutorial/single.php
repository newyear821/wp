
	<?php get_header();?>
	<?php get_sidebar();?>
	<div id="container">
		<?php if(have_posts()): ?><?php while(have_posts()): the_post(); ?>
			<div class="post" id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="entry">
					<?php the_content(); ?>
					<ul class="postmetadata"><!--日志元数据-->
		                <li>
			                <span><?php _e('所属目录:');?></span>
			                <?php the_category(',');?><!--调用日志的分类-->
		            	</li>
		            	<li>
			                <span><?php _e('作者：');?></span><!--使用_e()创建可翻译的主题-->
			                <?php the_author('');?><!--调用日志作者-->
		                </li>
		                <li>
		                	<?php comments_popup_link('No 条评论»','1 条评论»','% 条评论»');?><!--调用一个弹出的留言窗口，如果这个功能没有激活，则是显示留言列表-->
		            	</li>
		            	<li>
		                	<?php edit_post_link('编辑文章','','');?><!--只有在登陆后才可见到，对日志进行编辑的链接-->
		            	</li>
	                </ul>
					<?php link_pages('<p><strong>Pages:</strong>','</p>','number'); ?>
				</div>
				<div class="comments-template">
					<?php comments_template(); ?> 
				</div>
			</div>
		<?php endwhile; ?>
			<div class="navigation">
				<?php previous_post_link('? %link'); ?><?php next_post_link('? %link'); ?>
			</div>
		<?php else: ?>
			<div class="post">
				<h2><?php _e('Not Found');?></h2>
			</div>
		<?php endif; ?>
	
	</div>

	
	<?php get_footer();?>