<?php
/**
 * Template Name: Listing des équipages (archive)
 *
 * Assigner ce template à la page WP de slug `les-equipages` (URL Google indexée à préserver).
 * Contenu : listing complet des 32 équipages de l'édition 2018 et 32 équipages de l'édition 2016,
 * tous reconstitués depuis Wayback Machine (snapshots /les-equipages/ 2016 et 2018).
 *
 * @package Norlandascup
 */
get_header();
?>

<header class="wrap page-head">
	<span class="kicker"><?php esc_html_e( 'Archive de la compétition', 'norlandascup' ); ?></span>
	<h1><?php esc_html_e( 'Les équipages de la Norlanda\'s Cup, 2010 à 2018', 'norlandascup' ); ?></h1>
	<p class="sub"><?php esc_html_e( 'Liste vérifiée des équipages engagés sur les éditions 2016 et 2018, reconstituée depuis les archives Wayback. Reconstitution en cours pour les 7 autres éditions.', 'norlandascup' ); ?></p>
	<div class="meta-row">
		<span><b>32</b> <?php esc_html_e( 'équipages en 2018', 'norlandascup' ); ?></span>
		<span><b>32</b> <?php esc_html_e( 'équipages en 2016', 'norlandascup' ); ?></span>
		<span><?php esc_html_e( '4 groupes par édition (A, B, C, D)', 'norlandascup' ); ?></span>
	</div>
</header>

<?php
norlandascup_archive_banner( array(
	'label'        => __( 'Archive des équipages', 'norlandascup' ),
	'text'         => __( 'Page d\'archive. Édition non reconduite depuis 2018. Contenu conservé pour la postérité de la compétition.', 'norlandascup' ),
	'badge_label'  => __( 'Total cumulé', 'norlandascup' ),
	'badge_value'  => '64',
	'badge_suffix' => __( 'équipages 2016+2018', 'norlandascup' ),
) );

/**
 * Données reconstituées depuis Wayback :
 * - https://web.archive.org/web/2018/http://norlandascup.fr/les-equipages/
 * - https://web.archive.org/web/2016/http://norlandascup.fr/les-equipages/
 *
 * Chaque équipage = [ name, sponsor (rappel/format long), slug (pour lien fiche, optionnel) ]
 * Les 4 slugs prioritaires Google indexés sont marqués comme tels.
 */
$editions = array(
	'2018' => array(
		'label'  => __( '9e édition, 28 mai - 1er juin 2018', 'norlandascup' ),
		'note'   => __( 'Dernière édition de la compétition. 32 équipages, 4 groupes de 8, finales le vendredi 1er juin.', 'norlandascup' ),
		'groups' => array(
			'A' => array(
				array( 'name' => 'Département du Calvados' ),
				array( 'name' => 'Vitalépargne' ),
				array( 'name' => 'Normandie Aménagement' ),
				array( 'name' => 'Eurovia, Signature' ),
				array( 'name' => 'Ville de Mondeville' ),
				array( 'name' => 'Sogea Nord-Ouest' ),
				array( 'name' => 'Architectes Bernard Thouin Bossuyt, ECIB' ),
				array( 'name' => 'Teim, Cuisine et Cave Vire' ),
			),
			'B' => array(
				array( 'name' => 'CCI Port Caen Ouistreham' ),
				array( 'name' => 'Bureau Vallée, Manpower' ),
				array( 'name' => 'L2 Architectes', 'slug' => 'l2-architectes' ),
				array( 'name' => 'Omnipesage, Omnimat Services' ),
				array( 'name' => 'Festou Interim, Garczynski Traploir' ),
				array( 'name' => 'GRDF, Larcher' ),
				array( 'name' => 'Shoreteam Yard, La Case à Bières' ),
				array( 'name' => 'GIC Immobilier' ),
			),
			'C' => array(
				array( 'name' => 'Caen Normandie Développement', 'slug' => 'equipage/cane-normandie-developpement' ),
				array( 'name' => 'Biocombustibles' ),
				array( 'name' => 'Caen Yacht Club' ),
				array( 'name' => 'Super U Hérouville', 'slug' => 'super-u-2' ),
				array( 'name' => 'Eiffage, Guintoli' ),
				array( 'name' => 'TSO, NGE' ),
				array( 'name' => 'Colas IDFN, Colas Rail' ),
				array( 'name' => 'Comptoir de la Mer' ),
			),
			'D' => array(
				array( 'name' => 'PNA' ),
				array( 'name' => 'IGC' ),
				array( 'name' => 'Haret Déco, Pierre Peinture' ),
				array( 'name' => 'Caisse des Dépôts' ),
				array( 'name' => 'Ville de Caen, Caen la Mer' ),
				array( 'name' => 'Transdev, Egis' ),
				array( 'name' => 'Vallois' ),
				array( 'name' => 'Région Normandie' ),
			),
		),
	),
	'2016' => array(
		'label'  => __( '7e édition, fin mai 2016', 'norlandascup' ),
		'note'   => __( '32 équipages, 4 groupes de 8, compétition disputée sur 7 jours.', 'norlandascup' ),
		'groups' => array(
			'A' => array(
				array( 'name' => 'GRDF, Larcher' ),
				array( 'name' => 'CCI Port Caen Ouistreham' ),
				array( 'name' => 'Groupe Eiffage' ),
				array( 'name' => 'Synergia' ),
				array( 'name' => 'Caisse des Dépôts' ),
				array( 'name' => 'Caen Yacht Club' ),
				array( 'name' => 'ELDIM' ),
				array( 'name' => 'Clear Channel' ),
			),
			'B' => array(
				array( 'name' => 'AD Normandie' ),
				array( 'name' => 'France Sécurité' ),
				array( 'name' => 'L2 Architectes', 'slug' => 'l2-architectes' ),
				array( 'name' => 'Haret Déco, Pierre Peinture' ),
				array( 'name' => 'Omnipesage' ),
				array( 'name' => 'CEGELEC, Nexity' ),
				array( 'name' => 'Ville de Mondeville' ),
				array( 'name' => 'Ordre des architectes de Basse-Normandie' ),
			),
			'C' => array(
				array( 'name' => 'TEIM, DBEG' ),
				array( 'name' => 'Bureau Vallée, L\'AGENCE' ),
				array( 'name' => 'Termaloc' ),
				array( 'name' => 'Super U, Molay Littry / Port en Bessin' ),
				array( 'name' => 'Ville de Caen' ),
				array( 'name' => 'Conseil Départemental du Calvados' ),
				array( 'name' => 'Masselin Tertiaire, SOGÉA', 'slug' => 'masselin-sogea' ),
				array( 'name' => 'Caisse d\'Épargne' ),
			),
			'D' => array(
				array( 'name' => 'Axians' ),
				array( 'name' => 'IGC' ),
				array( 'name' => 'Biocombustibles SAS' ),
				array( 'name' => 'Eurovia' ),
				array( 'name' => 'Colin Vautier Coiffeur' ),
				array( 'name' => 'Shore Team, La Case à Bières' ),
				array( 'name' => 'Super U, Hérouville Saint-Clair', 'slug' => 'super-u-2' ),
				array( 'name' => 'C.R. de Normandie' ),
			),
		),
	),
);

foreach ( $editions as $year => $ed ) :
	$alt = ( $year === '2016' ) ? ' alt' : '';
	?>
	<section class="editorial<?php echo esc_attr( $alt ); ?>">
		<div class="wrap">
			<div class="fx" style="margin-bottom:32px;max-width:720px">
				<span class="sec-label"><?php printf( esc_html__( 'Édition %s', 'norlandascup' ), esc_html( $year ) ); ?></span>
				<h2 style="font-family:var(--serif);font-weight:600;font-size:clamp(25px,3vw,36px);line-height:1.08;color:var(--marine);letter-spacing:-.01em"><?php echo esc_html( $ed['label'] ); ?></h2>
				<p style="margin-top:14px;color:#4a4f55;font-size:16px;line-height:1.6"><?php echo esc_html( $ed['note'] ); ?></p>
			</div>
			<?php foreach ( $ed['groups'] as $group_letter => $crews ) : ?>
				<div class="fx" style="margin-bottom:36px">
					<h3 style="font-family:var(--mono);font-size:12px;letter-spacing:.18em;text-transform:uppercase;color:var(--rouille);margin-bottom:18px;display:flex;gap:12px;align-items:center">
						<span style="display:block;width:26px;height:1px;background:var(--rouille)"></span>
						<?php printf( esc_html__( 'Groupe %s', 'norlandascup' ), esc_html( $group_letter ) ); ?>
						<span style="color:#8a8175;font-weight:400;letter-spacing:.08em"><?php esc_html_e( '8 équipages', 'norlandascup' ); ?></span>
					</h3>
					<ul class="equipages-list">
						<?php foreach ( $crews as $crew ) :
							$has_slug = ! empty( $crew['slug'] );
							$href = $has_slug ? home_url( '/' . $crew['slug'] . '/' ) : '#';
							$tag  = $has_slug ? 'a' : 'span';
							?>
							<li>
								<<?php echo esc_html( $tag ); ?> class="equipage-item<?php echo $has_slug ? ' has-link' : ''; ?>"<?php if ( $has_slug ) : ?> href="<?php echo esc_url( $href ); ?>"<?php endif; ?>>
									<span class="eq-name"><?php echo esc_html( $crew['name'] ); ?></span>
									<?php if ( $has_slug ) : ?>
										<span class="eq-arr" aria-hidden="true">→</span>
									<?php endif; ?>
								</<?php echo esc_html( $tag ); ?>>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endforeach; ?>
		</div>
	</section>
<?php endforeach; ?>

<section class="editorial">
	<div class="wrap">
		<div class="next-head fx">
			<span class="sec-label"><?php esc_html_e( 'Poursuivre', 'norlandascup' ); ?></span>
			<h2><?php esc_html_e( 'Continuer dans les archives', 'norlandascup' ); ?></h2>
		</div>
		<div class="next-grid fx">
			<a class="next-card" href="<?php echo esc_url( home_url( '/la-norlandas-cup/' ) ); ?>">
				<div class="ph" style="background-image:url(<?php echo esc_url( NORLANDASCUP_URI . '/assets/img/archive-hero.webp' ); ?>);background-size:cover;background-position:center" data-ph="<?php esc_attr_e( 'Vue aérienne d\'une régate en J/80', 'norlandascup' ); ?>"></div>
				<div class="nc-body">
					<span class="nc-k"><?php esc_html_e( 'Archive · L\'épreuve', 'norlandascup' ); ?></span>
					<h3><?php esc_html_e( 'La Norlanda\'s Cup', 'norlandascup' ); ?></h3>
					<p><?php esc_html_e( 'Format Match Race en J/80, parcours, éditions et partenaires institutionnels de la régate inter-entreprises caennaise.', 'norlandascup' ); ?></p>
					<span class="read"><?php esc_html_e( 'Voir le dossier', 'norlandascup' ); ?><span class="arr">→</span></span>
				</div>
			</a>
			<a class="next-card" href="<?php echo esc_url( home_url( '/format-sportif-2018/' ) ); ?>">
				<div class="ph" style="background-image:url(<?php echo esc_url( NORLANDASCUP_URI . '/assets/img/archive-next-format.webp' ); ?>);background-size:cover;background-position:center" data-ph="<?php esc_attr_e( 'Instructions de course, marques du parcours', 'norlandascup' ); ?>"></div>
				<div class="nc-body">
					<span class="nc-k"><?php esc_html_e( 'Archive · Règlement', 'norlandascup' ); ?></span>
					<h3><?php esc_html_e( 'Format sportif 2018', 'norlandascup' ); ?></h3>
					<p><?php esc_html_e( 'Le règlement de la dernière édition : Match Race, classes, jauge et instructions de course.', 'norlandascup' ); ?></p>
					<span class="read"><?php esc_html_e( 'Lire le règlement', 'norlandascup' ); ?><span class="arr">→</span></span>
				</div>
			</a>
		</div>
	</div>
</section>

<style>
.equipages-list{list-style:none;display:grid;grid-template-columns:repeat(2,1fr);gap:9px;padding:0;margin:0}
.equipages-list li{display:block}
.equipage-item{display:flex;justify-content:space-between;align-items:center;gap:14px;padding:14px 18px;border:1px solid var(--line);border-radius:3px;background:var(--creme-pure);font-family:var(--sans);font-size:14.5px;color:var(--marine);transition:.2s}
.equipage-item.has-link{cursor:pointer}
.equipage-item.has-link:hover{border-color:var(--rouille);background:#fff;transform:translateY(-1px);box-shadow:var(--shadow)}
.equipage-item .eq-name{flex:1;line-height:1.3}
.equipage-item.has-link .eq-name{color:var(--rouille-700);font-weight:600}
.equipage-item .eq-arr{font-family:var(--mono);font-size:13px;color:var(--rouille);transition:transform .25s}
.equipage-item.has-link:hover .eq-arr{transform:translateX(4px)}
@media(max-width:760px){.equipages-list{grid-template-columns:1fr}}
</style>

<?php get_footer();
