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
	<div class="footer-page-cont footer-page-kontakt">
		<div class="inner-page-cont">
			<h3><?php _e( 'Kontakt', 'odwp-donkycz-theme' ); ?></h3>
			<p><b><code>XXX</code> Contact form!</b></p>
			<div class="progress-area" style="display: none;">
				<p>
					<image src="<?php bloginfo( 'template_directory' ); ?>/images/progress-blue-circle.gif"/><br/><br/>
					<?php _e( 'Chvíli strpení, formulář se odesílá&hellip;'); ?>
				</p>
				<p id="request-result"></p>
				<p id="form-final-message">
					<?php _e( 'Panel bude zavřen za několik sekund (<a href="#">ihned zavřít</a>)&hellip;', 'odwp-donkycz-theme' ); ?>
				</p>
			</div>
		</div>
	</div>
	<div class="footer-page-cont footer-page-skladem">
		<div class="inner-page-cont">
			<h3><?php _e( 'Skladem', 'odwp-donkycz-theme' ); ?></h3>
			<p><?php _e( 'Pokud jste si vybrali hračku, která není skladem, počítejte prosím alespoň se dvěma týdny na její výrobu a dodání.', 'odwp-donkycz-theme' ); ?></p>
			<?php 
			/** 
			 * @todo render_shopstock();
			 */
			?>
		</div>
	</div>
	<div class="footer-page-cont footer-page-za_kolik">
		<div class="inner-page-cont">
			<h3><?php _e( 'Za kolik?', 'odwp-donkycz-theme' ); ?></h3>
			<p><?php _e( 'Ceny postaviček jsou dány jejich velikostí:', 'odwp-donkycz-theme' ); ?></p>
			<ul style="margin-left: 100px; text-align: left;">
				<li><?php _e( 'postavička vel. L &ndash; cca 45cm &ndash; 1500,-&nbsp;Kč', 'odwp-donkycz-theme' ); ?></li>
				<li><?php _e( 'panenka s našitými vlásky vel. L &ndash; cca 45cm &ndash; 2000,-&nbsp;Kč', 'odwp-donkycz-theme' ); ?></li>
				<li><?php _e( 'postavička vel. M &ndash; cca 20cm &ndash; 750,-&nbsp;Kč', 'odwp-donkycz-theme' ); ?></li>
				<li><?php _e( 'postavička vel. S &ndash; cca 15cm &ndash; 550,-&nbsp;Kč', 'odwp-donkycz-theme' ); ?></li>
				<li><?php _e( 'doplňky pro hračky dle domluvy'); ?></li>
			</ul>
			<p><?php _e( 'Poštovné v rámci České republiky je zdarma.', 'odwp-donkycz-theme' ); ?></p>
			<p><?php _e( 'Hračku Vám zdarma i pěkně dárkově zabalíme.', 'odwp-donkycz-theme' ); ?></p>
		</div>
	</div>
	<div class="footer-page-cont footer-page-jak_koupit">
		<div class="inner-page-cont">
			<h3><?php _e( 'Jak koupit?', 'odwp-donkycz-theme' ); ?></h3>
			<p><?php _e( 'Máte-li zájem o některou z uvedených hraček, vyplňte a odešlete nám kontaktní formulář.<br/>Pokud se Vám naše práce líbí, a pro své dítko byste potřebovali něco specifického,<br/>můžeme mu navrhnout a vytvořit hračku přímo na míru.', 'odwp-donkycz-theme' ); ?></p>
			<p><?php _e( 'Potřebné informace nebo Vaši představu uveďte do objednávkového formuláře<br/>a ostatní můžete nechat na nás.<br/>Do políčka specifikace nezapomeňte vyplnit upřesňující informace (např. velikost, barevnost apod.)<br/>Jakmile obdržíme Vaši objednávku, ozveme se Vám buď e-mailem nebo telefonicky.', 'odwp-donkycz-theme' ); ?></p>
			<p><?php _e( '<strong>Upozornění</strong>: Nešijeme hračky podle postaviček z animovaných filmů či seriálů.', 'odwp-donkycz-theme' ); ?></p>
		</div>
	</div>
	<div class="footer-page-cont footer-page-o_nas">
		<div class="inner-page-cont">
			<h3><?php _e( 'O nás', 'odwp-donkycz-theme' ); ?></h3>
			<p><?php _e( '<strong>Donky.cz</strong> je malé studio, ve kterém vznikají originální hračky od počátečního návrhu až po zhotovení.<br/>Snažíme se vytvářet nápadité a milé figurky, se kterými si budou děti rády hrát.', 'odwp-donkycz-theme' ); ?></p>
			<p><?php _e( 'Naše hračky jsou ušité z kvalitních a hlavně příjemných materiálů.<br/>Používáme většinou bavlněné látky a hračky plníme dutým vláknem, vhodným i pro alergiky.<br/>Většinu hraček je možno i vyprat.<br/>Vše vyrábíme ručně a především s láskou.', 'odwp-donkycz-theme' ); ?></p>
			<p><?php _e( 'Tento web funguje jako ukázka našich realizovaných prací a zároveň si zde můžete hračku objednat.<br/>Pokud byste měli zájem o některou z uvedených postaviček, nebo pokud byste chtěli hračku na míru,<br/>s radostí ji pro Vás navrhneme a vytvoříme.<br/>Dejte nám vědět.', 'odwp-donkycz-theme' ); ?></p>
		</div>
	</div>
	<div class="footer-menu-cont">
		<ul class="footer-menu" role="navigation">
			<li>
				<a class="o_nas" data-pageId="o_nas" href="#">
					<img src="<?php bloginfo( 'template_directory' ); ?>/images/text-o_nas.png" alt="<?php _e( 'O nás', 'odwp-donkycz-theme' ); ?>"/>
				</a>
			</li>
			<li>
				<a class="jak_koupit" data-pageId="jak_koupit" href="#">
					<img src="<?php bloginfo( 'template_directory' ); ?>/images/text-jak_koupit.png" alt="<?php _e( 'Jak koupit?', 'odwp-donkycz-theme' ); ?>"/>
				</a>
			</li>
			<li>
				<a class="za_kolik" data-pageId="za_kolik" href="#">
					<img src="<?php bloginfo( 'template_directory' ); ?>/images/text-za_kolik.png" alt="<?php _e( 'Za kolik?', 'odwp-donkycz-theme' ); ?>"/>
				</a>
			</li>
			<!-- <li>
				<a class="skladem" data-pageId="skladem" href="#">
					<img src="<?php bloginfo( 'template_directory' ); ?>/images/text-skladem.png" alt="<?php _e( 'Skladem', 'odwp-donkycz-theme' ); ?>"/>
				</a>
			</li> -->
			<li>
				<a class="kontakt" data-pageId="kontakt" href="#">
					<img src="<?php bloginfo( 'template_directory' ); ?>/images/text-kontakt.png" alt="<?php _e( 'Kontakt', 'odwp-donkycz-theme' ); ?>"/>
				</a>
			</li>
		</ul>
		<div class="clearfix"></div>
	</div>
</footer>

<!--
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
?></nav><!-- .main -- >
-->

<?php wp_footer(); ?>
</body>
</html>