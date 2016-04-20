<?php
/**
 * The template for displaying the footer
 *
 * @author Ondřej Doněk, <ondrejd@gmail.com>
 * @license http://www.gnu.org/licenses/gpl-2.0.html GPLv2 or later
 * @link https://github.com/ondrejd/odwp-donkycz-theme
 * @package odwp-donkycz-theme
 * @since 1.0
 */
?>
	</div><!-- .site-main -->
</div><!-- .site -->

<footer class="site-footer">
	<?php
		$args = array(
			'post_type' => 'page',
			'no_paging' => true,
			'posts_per_page' => -1
		);

		$pages = new WP_Query( $args );
		
		while ( $pages->have_posts() ) {
			$pages->the_post();
			odwpdct_render_page_content( $pages->post );
		}
		
		wp_reset_postdata();
	?>
	<nav class="menu main"><?php
		$walker = new DonkyCz_Nav_Menu_Walker();
		wp_nav_menu( array(
			'container' => 'div',
			'container_class' => 'footer-menu-cont',
			'theme_location' => 'primary',
			'menu_class' => 'footer-menu',
			'depth' => 0,
			'walker' => $walker
		) );
	?></nav><!-- .main -->
</footer><!-- .site-footer -->

<?php wp_footer(); ?>
</body>
</html>