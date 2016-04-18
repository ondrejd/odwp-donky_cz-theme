<?php
/**
 * The template for displaying the header
 *
 * @author Ondřej Doněk, <ondrejd@gmail.com>
 * @license http://www.gnu.org/licenses/gpl-2.0.html GPLv2 or later
 * @link https://github.com/ondrejd/odwp-donkycz-theme
 * @package odwp-donkycz-theme
 * @since 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo( 'template_directory' ); ?>/images/favicon.ico"/>
	<link rel="fluid-icon" href="<?php bloginfo( 'template_directory' ); ?>/images/icon-512.png" title="<?php _e( 'Donky.cz', 'odwp-donkycz-theme' ); ?>"/>
	<link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo( 'template_directory' ); ?>/images/icon-57.png"/>
	<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo( 'template_directory' ); ?>/images/icon-72.png"/>
	<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo( 'template_directory' ); ?>/images/icon-114.png"/>
	<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo( 'template_directory' ); ?>/images/icon-144.png"/>
	<meta name="msapplication-TileImage" content="<?php bloginfo( 'template_directory' ); ?>/images/icon-144.png">
	<meta name="msapplication-TileColor" content="#FFFFFF">
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<?php wp_head(); ?>
</head>
<body class="home blog">
<div id="page" class="hfeed site">
	<header class="site-header" role="banner">
		<div class="header-main">
			<h1 class="site-title">
				<a href="<?php bloginfo( 'url' ); ?>" rel="home">
					<img src="<?php bloginfo( 'template_directory' ); ?>/images/header-logo.png" alt="<?php _e( 'Donky.cz', 'odwp-donkycz-theme' ); ?>"/>
				</a>
			</h1>
		</div>
	</header>
	<div id="main" class="site-main">