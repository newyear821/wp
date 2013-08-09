<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/1999/xhtml">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
	<title>
		<?php bloginfo('name');?><?php wp_title();?>
	</title>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset');?>" />
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_rul'); ?>" type="text/css" media="screen" />
	<link rel="altemate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss_url');?>"/>
	<link rel="altemate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url');?>"/>
	<link rel="altemate" type="application/rss+xml" title="Atom 0.3" href="<?php bloginfo('atom_url');?>"/>
	<link rel="pingback" href="<?php bloginfo('pingback_url');?>"/>

	<link rel="stylesheet" href="./wp-content/themes/tutorial/style.css" type="text/css" />

	<?php wp_get_archives('type=monthly&format=link');?>
	<?php //comments_popup_script(); //off by default ?>
	
	
</head>
<body>

	<div id="header">
		<h1><a href="<?php bloginfo('url'); ?>" ><?php bloginfo('name'); ?></a></h1>
		<!--p><?php bloginfo('description'); ?></p-->
		<div id="toolbar">
			<ul>
				<li id="list"><a></a></li>
				<li id="grid"><a></a></li>
			</ul>
			<!--input /-->
			<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'twentyeleven' ); ?>" />
				<input type="submit" class="submit" name="submit" id="searchsubmit" value="" />
			</form>
		</div>
	</div>
	<div id="wrapper">