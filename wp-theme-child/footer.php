<?php
/**
 * Norlandascup footer with 4-column layout + bottom bar.
 *
 * @package Norlandascup
 */
?>
<footer class="site">
	<div class="wrap">
		<div class="cols">
			<div class="brand-col">
				<?php norlandascup_brand_block(); ?>
				<p class="f-about"><?php esc_html_e( 'Magazine éditorial indépendant dédié à la voile, aux régates et au tourisme nautique en Normandie côtière. Gardien des archives de la Norlanda\'s Cup.', 'norlandascup' ); ?></p>
			</div>
			<div>
				<h4><?php esc_html_e( 'Le magazine', 'norlandascup' ); ?></h4>
				<ul>
					<li><a href="<?php echo esc_url( home_url( '/magazine/?rubrique=regates' ) ); ?>"><?php esc_html_e( 'Régates', 'norlandascup' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/spots-de-voile-normandie/' ) ); ?>"><?php esc_html_e( 'Spots de voile', 'norlandascup' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/materiel-voile/' ) ); ?>"><?php esc_html_e( 'Matériel', 'norlandascup' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/magazine/?rubrique=meteo' ) ); ?>"><?php esc_html_e( 'Météo', 'norlandascup' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/magazine/?rubrique=portraits' ) ); ?>"><?php esc_html_e( 'Portraits', 'norlandascup' ); ?></a></li>
				</ul>
			</div>
			<div>
				<h4><?php esc_html_e( 'L\'archive', 'norlandascup' ); ?></h4>
				<ul>
					<li><a href="<?php echo esc_url( home_url( '/la-norlandas-cup/' ) ); ?>"><?php esc_html_e( 'La Norlanda\'s Cup', 'norlandascup' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/les-equipages/' ) ); ?>"><?php esc_html_e( 'Les équipages', 'norlandascup' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/format-sportif-2018/' ) ); ?>"><?php esc_html_e( 'Format sportif 2018', 'norlandascup' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/interview-economique/' ) ); ?>"><?php esc_html_e( 'Interviews d\'époque', 'norlandascup' ); ?></a></li>
				</ul>
			</div>
			<div>
				<h4><?php esc_html_e( 'La rédaction', 'norlandascup' ); ?></h4>
				<ul>
					<li><a href="<?php echo esc_url( home_url( '/a-propos/' ) ); ?>"><?php esc_html_e( 'À propos', 'norlandascup' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact', 'norlandascup' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/mentions-legales/' ) ); ?>"><?php esc_html_e( 'Mentions légales', 'norlandascup' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/politique-de-confidentialite/' ) ); ?>"><?php esc_html_e( 'Confidentialité', 'norlandascup' ); ?></a></li>
				</ul>
			</div>
		</div>
		<div class="botbar">
			<span class="crd"><?php printf( esc_html__( 'Magazine indépendant · Normandie côtière · %d', 'norlandascup' ), (int) wp_date( 'Y' ) ); ?></span>
			<div class="lgl">
				<a href="<?php echo esc_url( home_url( '/mentions-legales/' ) ); ?>"><?php esc_html_e( 'Mentions légales', 'norlandascup' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/politique-de-confidentialite/' ) ); ?>"><?php esc_html_e( 'Confidentialité', 'norlandascup' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact', 'norlandascup' ); ?></a>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
