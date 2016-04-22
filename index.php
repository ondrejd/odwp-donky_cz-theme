<?php
/**
 * The main template file
 *
 * @author Ondřej Doněk, <ondrejd@gmail.com>
 * @license http://www.gnu.org/licenses/gpl-2.0.html GPLv2 or later
 * @link https://github.com/ondrejd/odwp-donkycz-theme
 * @package odwp-donkycz-theme
 * @since 1.0
 */

get_header(); ?>

<div id="main-content" class="main-content">
	<div class="price-labels" role="contentinfo">
		<div class="price-label left-label">
			<div class="label-header"><h2></h2></div>
			<div class="label-content">
				<p class="details"></p>
				<p class="description"></p>
			</div>
		</div>
		<div class="price-label right-label">
			<div class="label-header"><h2></h2></div>
			<div class="label-content">
				<p class="details"></p>
				<p class="description"></p>
			</div>
		</div>
	</div><!-- .price-labels -->
	<div class="toys-navigation" role="navigation">
		<table class="nav-links">
			<tr>
				<td class="left">
					<a href="#" title="<?php echo esc_attr( __( 'Předchozí hračka', 'odwp-donkycz-theme' ) ); ?>">
						<span class="meta-nav meta-nav-prev"></span>
					</a>
				</td>
				<td class="middle"></td>
				<td class="right">
					<a href="#" title="<?php echo esc_attr( __( 'Další hračka', 'odwp-donkycz-theme' ) ); ?>">
						<span class="meta-nav meta-nav-next"></span>
					</a>
				</td>
			</tr>
		</table>
	</div><!-- .toys-navigation -->
	<div class="toys-panel">
	<?php if ( have_posts() ) : $i = 0; $ii = 0; ?>
		<?php while ( have_posts() ) : 
			the_post();

			$slug = str_replace( '-', '_', $post->post_name );
			$description = get_post_meta( $post->ID, 'toy_description', true );
			$material = get_post_meta( $post->ID, 'toy_material', true );
			$dimensions = get_post_meta( $post->ID, 'toy_dimensions', true );

			if ( ( $i + 1 ) % 2 ) :
		?>
		<div class="toys-pair toys-pair-<?php echo $ii; ?>" data-pairIndex="<?php echo $ii; ?>">
			<div class="rack">
				<div class="part left"></div>
				<div class="part center"></div>
				<div class="part right"></div>
				<div class="clearfix"></div>
			</div>
			<div class="panel panel-left">
				<img src="<?php echo DonkyCz_Custom_Post_Type_Toy::get_toy_image( $post->ID ); ?>" 
				     alt="<?php the_title(); ?>" 
				     class="<?php echo $slug; ?>" 
				     data-toyId="<?php the_ID(); ?>" 
				     data-title="<?php the_title(); ?>" 
				     data-details="<?php sprintf( __( 'Vel.: %s[BR]Materiál: %s', 'odwp-donkycz-theme' ), $dimensions, $material );?>" 
				     data-description="<?php echo $description; ?>"/>
			</div>
		<?php else : $ii++; ?>
			<div class="panel panel-right">
				<img src="<?php echo DonkyCz_Custom_Post_Type_Toy::get_toy_image( $post->ID ); ?>" 
				     alt="<?php the_title(); ?>" 
				     class="<?php echo $slug; ?>" 
				     data-toyId="<?php the_ID(); ?>" 
				     data-title="<?php the_title(); ?>" 
				     data-details="<?php sprintf( __( 'Vel.: %s[BR]Materiál: %s', 'odwp-donkycz-theme' ), $dimensions, $material );?>" 
				     data-description="<?php echo $description; ?>"/>
			</div>
		</div><!-- .toys-pair -->
		<?php 
			endif;
			$i++; 
			endwhile;
		?>
	<?php endif; ?>
	</div><!-- .toys-panel -->
</div><!-- .main-content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>