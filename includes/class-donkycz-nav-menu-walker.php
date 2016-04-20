<?php
/**
 * The file that defines walker for primary navigation menu
 *
 * @since 1.0
 * @author Ondřej Doněk, <ondrejd@gmail.com>
 * @license http://www.gnu.org/licenses/gpl-2.0.html GPLv2 or later
 * @link https://bitbucket.com/ondrejd/odwp-donkycz-theme
 * @package odwp-donkycz-theme
 * @subpackage odwp-donkycz-theme/includes
 */

if ( ! class_exists( 'DonkyCz_Nav_Menu_Walker' ) ) :

/**
 * Walker for primary navigation menu.
 *
 * @see Walker_Nav_Menu
 * @since 1.0
 * @author Ondřej Doněk, <ondrejd@gmail.com>
 * @package odwp-donkycz-theme
 * @subpackage odwp-donkycz-theme/includes
 */
class DonkyCz_Nav_Menu_Walker extends Walker_Nav_Menu {

	/**
	 * Starts the list before the elements are added.
	 *
	 * @see Walker_Nav_Menu::start_lvl()
	 *
	 * @since 1.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int    $depth  Depth of menu item. Used for padding.
	 * @param array  $args   An array of arguments. @see wp_nav_menu()
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"footer-menu\" role=\"navigation\">\n";
	}

	/**
	 * Start the element output.
	 *
	 * @see Walker_Nav_Menu::start_el()
	 *
	 * @since 1.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item   Menu item data object.
	 * @param int    $depth  Depth of menu item. Used for padding.
	 * @param array  $args   An array of arguments. @see wp_nav_menu()
	 * @param int    $id     Current item ID.
	 *
	 * @uses get_post()
	 * @uses get_template_directory_uri()
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent  = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$output .= $indent . '<li>';

		$post    = get_post( $item->object_id );
		$slug    = str_replace( '-', '_', $post->post_name );
		$img_uri = get_template_directory_uri() . '/images/text-%s.png';

		$output .= '<a class="'. $slug .'" data-pageId="' . $slug . '" href="#">';
		$output .= '<img src="' . str_replace( '%s', $slug, $img_uri ) . '" alt="' . $item->title . '"/>';
		$output .= '</a>';
	}
}

endif;