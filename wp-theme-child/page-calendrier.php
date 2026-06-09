<?php
/**
 * Template Name: Calendrier des régates Normandie
 *
 * Assigner ce template à la page WP de slug `calendrier-regates-normandie`.
 * Stub V1 : calendrier annuel des régates régionales actives. Les entrées sont hardcoded pour
 * V1 visuel ; à terme, alimenter depuis un Custom Post Type "regate" ou un Google Sheet.
 *
 * @package Norlandascup
 */
get_header();
?>

<header class="wrap page-head">
	<span class="kicker"><?php esc_html_e( 'Magazine · Régates', 'norlandascup' ); ?></span>
	<h1><?php esc_html_e( 'Calendrier des régates de Normandie côtière', 'norlandascup' ); ?></h1>
	<p class="sub"><?php esc_html_e( 'Les rendez-vous de la voile sportive du Cotentin à la baie de Seine, mis à jour mensuellement. Régates de club, trophées régionaux, courses au large et événements grand public.', 'norlandascup' ); ?></p>
</header>

<section class="editorial">
	<div class="wrap">
		<div class="fx" style="margin-bottom:30px;max-width:620px">
			<span class="sec-label"><?php esc_html_e( 'Saison 2026', 'norlandascup' ); ?></span>
			<h2 style="font-family:var(--serif);font-weight:600;font-size:clamp(25px,3vw,36px);line-height:1.08;color:var(--marine);letter-spacing:-.01em"><?php esc_html_e( 'Régates régionales à venir', 'norlandascup' ); ?></h2>
			<p style="margin-top:14px;color:#4a4f55;font-size:16px;line-height:1.6"><?php esc_html_e( 'Liste vérifiée des régates ouvertes aux croiseurs et habitables de la façade normande. Lecture sur fond marin, niveau requis et port de départ.', 'norlandascup' ); ?></p>
		</div>
		<div class="ptable-wrap fx">
			<table class="ptable">
				<thead>
					<tr>
						<th><?php esc_html_e( 'Date', 'norlandascup' ); ?></th>
						<th><?php esc_html_e( 'Régate', 'norlandascup' ); ?></th>
						<th><?php esc_html_e( 'Lieu', 'norlandascup' ); ?></th>
						<th><?php esc_html_e( 'Organisateur', 'norlandascup' ); ?></th>
						<th><?php esc_html_e( 'Niveau', 'norlandascup' ); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php
					$regates = array(
						array( '14 juin',     'Trophée Manche',           'Saint Vaast la Hougue, Cherbourg', 'Société des régates de Cherbourg',     'IRC' ),
						array( '21-23 juin',  'Régates de la Côte de Nacre', 'Ouistreham, Courseulles',         'Société des régates de Ouistreham',     'Croiseur côtier' ),
						array( '5-6 juillet', 'Coupe de Caen la Mer',     'Caen, baie de Seine',              'Caen Yacht Club',                       'Open' ),
						array( '13 juillet',  'Régate du 14 Juillet',     'Deauville',                        'Yacht Club de Deauville',               'Tous bateaux' ),
						array( '17-18 août',  'Tour de la baie de Seine', 'Honfleur, départ',                 'Association nautique de Honfleur',      'Croiseur' ),
						array( '6 septembre', 'Trophée d\'arrière saison', 'Port en Bessin',                  'Société nautique de Port en Bessin',    'IRC, Osiris' ),
					);
					foreach ( $regates as $r ) : ?>
						<tr>
							<td class="yr"><?php echo esc_html( $r[0] ); ?></td>
							<td class="win"><?php echo esc_html( $r[1] ); ?></td>
							<td><?php echo esc_html( $r[2] ); ?></td>
							<td><?php echo esc_html( $r[3] ); ?></td>
							<td><?php echo esc_html( $r[4] ); ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
				<tfoot>
					<tr><td colspan="5"><?php esc_html_e( 'Calendrier mis à jour le 8 juin 2026. Reconnaître une erreur ou une régate manquante ? Contactez la rédaction.', 'norlandascup' ); ?></td></tr>
				</tfoot>
			</table>
		</div>
	</div>
</section>

<section class="news">
	<div class="wrap">
		<div class="news-txt fx">
			<span class="kicker"><?php esc_html_e( 'Lettre du calendrier', 'norlandascup' ); ?></span>
			<h2><?php esc_html_e( 'Recevoir le calendrier mensuel par messagerie', 'norlandascup' ); ?></h2>
			<p><?php esc_html_e( 'Les dates de la saison, le rappel des inscriptions, les conditions de mer et de vent attendues. Une lettre sobre, sans publicité.', 'norlandascup' ); ?></p>
		</div>
		<form class="nbox fx" action="<?php echo esc_url( home_url( '/contact/?sujet=newsletter' ) ); ?>" method="get">
			<input type="hidden" name="sujet" value="newsletter">
			<div class="row">
				<input type="email" name="email" placeholder="<?php esc_attr_e( 'Votre adresse de messagerie', 'norlandascup' ); ?>" aria-label="<?php esc_attr_e( 'Adresse de messagerie', 'norlandascup' ); ?>" required>
				<button class="btn btn-primary" type="submit"><?php esc_html_e( 'Recevoir le calendrier', 'norlandascup' ); ?><span class="arr">→</span></button>
			</div>
			<span class="fine"><?php esc_html_e( 'Une lettre par mois. Désinscription en un clic.', 'norlandascup' ); ?></span>
		</form>
	</div>
</section>

<?php get_footer();
