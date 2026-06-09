<?php
/**
 * Template Name: Fiche équipage (archive Norlanda's Cup)
 *
 * Template page utilisable pour les 4 fiches équipages prioritaires (slugs Google indexés à préserver) :
 * - /equipage/cane-normandie-developpement/
 * - /masselin-sogea/
 * - /super-u-2/
 * - /l2-architectes/
 *
 * Pour V1, le contenu est hardcoded sur l'exemple Cane Normandie Développement (édition 2016).
 * À terme, lire les Custom Fields WP pour chaque équipage (CPT `equipage`).
 *
 * @package Norlandascup
 */
get_header();

// Cane Normandie Développement, équipage confirmé Groupe C édition 2018 (vu sur la page /les-equipages/ Wayback 2018).
// Données vérifiées : nom équipage, classe (J/80 monotype), port (Caen Ouistreham), édition.
// Données NON disponibles dans le Wayback : skipper, équipiers, classement détaillé.
$eq = array(
	'name'    => __( 'Cane Normandie Développement', 'norlandascup' ),
	'mono'    => 'CN',
	'boat'    => __( 'J/80', 'norlandascup' ),
	'sub'     => __( 'Équipage Groupe C, édition 2018', 'norlandascup' ),
	'year'    => '2018',
	'sponsor' => 'Caen Normandie Développement',
	'class'   => 'J/80 monotype',
	'port'    => 'Caen Ouistreham',
	'group'   => 'C',
);

?>

<div class="wrap">
<?php
norlandascup_archive_banner( array(
	'label'        => sprintf( __( 'Archive édition %s', 'norlandascup' ), $eq['year'] ),
	'text'         => __( 'Page d\'archive. Édition non reconduite depuis 2018. Contenu conservé pour la postérité de la compétition.', 'norlandascup' ),
	'badge_label'  => __( 'Édition', 'norlandascup' ),
	'badge_value'  => $eq['year'],
	'badge_suffix' => __( 'Manche', 'norlandascup' ),
) );
?>
</div>

<header class="wrap eq-hero">
	<div class="eq-photo" style="background-image:url('<?php echo esc_url( NORLANDASCUP_URI . '/assets/img/eq-portrait-bateau.webp' ); ?>')" aria-label="<?php echo esc_attr( sprintf( __( 'Photo du bateau %s en course', 'norlandascup' ), $eq['boat'] ) ); ?>"></div>
	<div class="eq-body">
		<span class="eq-flag"><?php esc_html_e( 'Fiche équipage', 'norlandascup' ); ?></span>
		<h1><?php echo esc_html( $eq['name'] ); ?></h1>
		<p class="eq-sub"><?php echo esc_html( $eq['sub'] ); ?></p>
		<div class="eq-chips">
			<span class="eq-chip"><span class="k"><?php esc_html_e( 'Groupe', 'norlandascup' ); ?></span><span class="v"><?php echo esc_html( $eq['group'] ); ?></span></span>
			<span class="eq-chip"><span class="k"><?php esc_html_e( 'Classe', 'norlandascup' ); ?></span><span class="v"><?php echo esc_html( $eq['class'] ); ?></span></span>
			<span class="eq-chip"><span class="k"><?php esc_html_e( 'Port d\'attache', 'norlandascup' ); ?></span><span class="v"><?php echo esc_html( $eq['port'] ); ?></span></span>
		</div>
	</div>
</header>

<section class="eqsec alt">
	<div class="wrap">
		<span class="sec-label"><?php esc_html_e( 'L\'équipage', 'norlandascup' ); ?></span>
		<h2 class="sec-h"><?php esc_html_e( 'Identité et palmarès', 'norlandascup' ); ?></h2>
		<div class="eq-split">
			<div class="idcard">
				<div class="id-head"><span><?php esc_html_e( 'Identité', 'norlandascup' ); ?></span><span><?php esc_html_e( 'Fiche technique', 'norlandascup' ); ?></span></div>
				<div class="idrow"><span class="k"><?php esc_html_e( 'Sponsor principal', 'norlandascup' ); ?></span><span class="v"><?php echo esc_html( $eq['sponsor'] ); ?></span></div>
				<div class="idrow"><span class="k"><?php esc_html_e( 'Groupe d\'engagement', 'norlandascup' ); ?></span><span class="v"><?php echo esc_html( $eq['group'] ); ?><small><?php esc_html_e( '8 équipages par groupe', 'norlandascup' ); ?></small></span></div>
				<div class="idrow"><span class="k"><?php esc_html_e( 'Classe', 'norlandascup' ); ?></span><span class="v">J/80<small><?php esc_html_e( 'Monotype fourni par l\'organisation', 'norlandascup' ); ?></small></span></div>
				<div class="idrow"><span class="k"><?php esc_html_e( 'Longueur', 'norlandascup' ); ?></span><span class="v">8,00 m</span></div>
				<div class="idrow"><span class="k"><?php esc_html_e( 'Port d\'attache', 'norlandascup' ); ?></span><span class="v"><?php echo esc_html( $eq['port'] ); ?></span></div>
				<div class="idrow"><span class="k"><?php esc_html_e( 'Édition', 'norlandascup' ); ?></span><span class="v"><?php echo esc_html( $eq['year'] ); ?><small><?php esc_html_e( '9e édition, dernière disputée', 'norlandascup' ); ?></small></span></div>
				<div class="idrow"><span class="k"><?php esc_html_e( 'Skipper et équipiers', 'norlandascup' ); ?></span><span class="v"><?php esc_html_e( 'Information non publiée', 'norlandascup' ); ?><small><?php esc_html_e( 'Voir contact pour compléter', 'norlandascup' ); ?></small></span></div>
			</div>
			<div>
				<div class="ptable-wrap">
					<table class="ptable">
						<thead>
							<tr>
								<th><?php esc_html_e( 'Édition', 'norlandascup' ); ?></th>
								<th><?php esc_html_e( 'Groupe', 'norlandascup' ); ?></th>
								<th class="num"><?php esc_html_e( 'Participation', 'norlandascup' ); ?></th>
								<th><?php esc_html_e( 'Statut classement', 'norlandascup' ); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr><td class="yr">2018</td><td class="win">C</td><td class="num"><?php esc_html_e( 'Confirmée', 'norlandascup' ); ?></td><td class="anec"><?php esc_html_e( 'Présence vérifiée sur la liste officielle des 32 équipages. Classement détaillé en cours de reconstitution.', 'norlandascup' ); ?></td></tr>
						</tbody>
					</table>
				</div>
				<p style="margin-top:14px;font-family:var(--mono);font-size:11.5px;letter-spacing:.06em;color:#8a8175;line-height:1.6"><?php esc_html_e( 'Les classements édition par édition sont en cours de reconstitution à partir des archives partielles. Vous avez participé ou disposez de documents ? Contactez la rédaction.', 'norlandascup' ); ?></p>
			</div>
		</div>
	</div>
</section>

<section class="eqsec">
	<div class="wrap">
		<span class="sec-label"><?php esc_html_e( 'Récit de la régate', 'norlandascup' ); ?></span>
		<h2 class="sec-h"><?php printf( esc_html__( 'Édition %s', 'norlandascup' ), esc_html( $eq['year'] ) ); ?></h2>
		<div class="recit" style="margin-top:24px">
			<p class="lede"><?php esc_html_e( 'Cane Normandie Développement, structure publique de promotion économique du territoire caennais, a engagé un équipage dans le Groupe C de la 9e édition de la Norlanda\'s Cup, disputée à Caen du 28 mai au 1er juin 2018.', 'norlandascup' ); ?></p>
			<p><?php esc_html_e( 'Comme l\'ensemble des 32 équipages engagés sur cette édition, Cane Normandie Développement a couru sur le J/80 monotype fourni par l\'organisation, dans le format Match Race propre à la régate, où chaque manche oppose deux bateaux strictement identiques. Le format gomme la dimension matérielle pour mettre l\'accent sur la tactique, le départ et la cohésion de l\'équipage.', 'norlandascup' ); ?></p>
			<p><?php esc_html_e( 'Sur cette édition, la phase de groupe s\'est déroulée du lundi au jeudi, suivie des demi-finales et de la finale le vendredi. Le classement détaillé par groupe et le tableau final des éditions 2010 à 2018 sont conservés en archive partielle.', 'norlandascup' ); ?></p>
		</div>
	</div>
</section>

<section class="eqsec alt">
	<div class="wrap">
		<span class="sec-label"><?php esc_html_e( 'Galerie', 'norlandascup' ); ?></span>
		<h2 class="sec-h"><?php printf( esc_html__( 'En course, édition %s', 'norlandascup' ), esc_html( $eq['year'] ) ); ?></h2>
		<div class="galerie">
			<?php
			$gallery = array(
				array( 'img' => 'eq-galerie-baie-seine.webp',    'ph' => 'J/80 au portant, baie de Seine, 4:5',                  'caption' => 'Baie de Seine' ),
				array( 'img' => 'eq-galerie-empannage.webp',     'ph' => 'Empannage sous spi en Match Race, 4:5',                 'caption' => 'Phase de groupe' ),
				array( 'img' => 'eq-galerie-rappel.webp',        'ph' => 'Équipage au rappel sur plat-bord J/80, 4:5',            'caption' => 'Au près' ),
				array( 'img' => 'eq-galerie-retour-ponton.webp', 'ph' => 'Retour au ponton de Caen Ouistreham, 4:5',              'caption' => 'Caen Ouistreham · port' ),
			);
			foreach ( $gallery as $g ) : ?>
				<figure class="gphoto">
					<div class="ph r45" style="background-image:url(<?php echo esc_url( NORLANDASCUP_URI . '/assets/img/' . $g['img'] ); ?>);background-size:cover;background-position:center" data-ph="<?php echo esc_attr( $g['ph'] ); ?>"></div>
					<figcaption><?php echo esc_html( $g['caption'] ); ?></figcaption>
				</figure>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="eqsec">
	<div class="wrap">
		<span class="sec-label"><?php printf( esc_html__( 'Édition %s', 'norlandascup' ), esc_html( $eq['year'] ) ); ?></span>
		<h2 class="sec-h"><?php esc_html_e( 'Autres équipages de cette édition', 'norlandascup' ); ?></h2>
		<div class="eqcards">
			<?php
			// Autres équipages réels du Groupe C, édition 2018 (vérifié sur Wayback /les-equipages/ snapshot 2018).
			$others = array(
				array( 'mono' => 'BC', 'cls' => 'Groupe C', 'name' => 'Biocombustibles',          'sponsor' => 'Biocombustibles SAS',          'href' => '/equipage/biocombustibles/' ),
				array( 'mono' => 'CY', 'cls' => 'Groupe C', 'name' => 'Caen Yacht Club',          'sponsor' => 'Club nautique de Caen',         'href' => '/equipage/caen-yacht-club/' ),
				array( 'mono' => 'SU', 'cls' => 'Groupe C', 'name' => 'Super U Hérouville',       'sponsor' => 'Super U Hérouville Saint-Clair', 'href' => '/super-u-2/' ),
			);
			foreach ( $others as $o ) : ?>
				<a class="eqcard" href="<?php echo esc_url( home_url( $o['href'] ) ); ?>">
					<div class="ec-cartouche">
						<span class="ec-sail" aria-hidden="true"><?php norlandascup_sail_svg(); ?></span>
						<span class="ec-cls"><?php echo esc_html( $o['cls'] ); ?></span>
						<span class="ec-mono"><?php echo esc_html( $o['mono'] ); ?></span>
					</div>
					<div class="ec-body">
						<h3 class="ec-boat"><?php echo esc_html( $o['name'] ); ?></h3>
						<span class="ec-skip"><?php echo esc_html( $o['sponsor'] ); ?></span>
						<div class="ec-foot">
							<span class="ec-year"><?php printf( esc_html__( 'Édition %s', 'norlandascup' ), esc_html( $eq['year'] ) ); ?></span>
							<span class="ec-link"><?php esc_html_e( 'Voir la fiche', 'norlandascup' ); ?><span class="arr">→</span></span>
						</div>
					</div>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<a class="eq-back" href="<?php echo esc_url( home_url( '/les-equipages/' ) ); ?>">
	<div class="wrap">
		<span>
			<span class="bk-k"><?php esc_html_e( 'Archive des équipages', 'norlandascup' ); ?></span>
			<span class="bk-t"><?php esc_html_e( 'Tous les équipages, 2010 à 2018', 'norlandascup' ); ?></span>
		</span>
		<span class="bk-arr" aria-hidden="true">→</span>
	</div>
</a>

<?php get_footer();
