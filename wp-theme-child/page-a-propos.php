<?php
/**
 * Template Name: À propos de la rédaction
 *
 * Assigner ce template à la page WP de slug `a-propos`.
 * Équipe éditoriale fictive, sans fondateurs (cf. mémoire feedback_remontage_zero_reference_anciens_gerants).
 *
 * @package Norlandascup
 */
get_header();
?>

<header class="wrap page-head">
	<span class="kicker"><?php esc_html_e( 'La rédaction', 'norlandascup' ); ?></span>
	<h1><?php esc_html_e( 'Le magazine, sa ligne et son équipe', 'norlandascup' ); ?></h1>
	<p class="sub"><?php esc_html_e( 'Norlanda\'s Cup est un magazine éditorial indépendant dédié à la voile, aux régates et au tourisme nautique en Normandie côtière. Il porte aussi la mémoire de la régate inter-entreprises du même nom, organisée à Caen entre 2010 et 2018.', 'norlandascup' ); ?></p>
</header>

<section class="editorial">
	<div class="wrap split">
		<div class="col-head fx">
			<span class="sec-label"><?php esc_html_e( 'La ligne', 'norlandascup' ); ?></span>
			<h2><?php esc_html_e( 'Sobre, technique, indépendante', 'norlandascup' ); ?></h2>
			<p class="note"><?php esc_html_e( 'Magazine éditorial', 'norlandascup' ); ?><br><?php esc_html_e( 'Voile et régates', 'norlandascup' ); ?><br><?php esc_html_e( 'Normandie côtière', 'norlandascup' ); ?></p>
		</div>
		<div class="prose fx">
			<p class="lede"><?php esc_html_e( 'Norlanda\'s Cup couvre les régates régionales actives du Cotentin à la baie de Seine, les spots de voile et le matériel utiles aux pratiquants, la météo de la Manche et les portraits de skippers. La rédaction privilégie le terrain, le factuel, et un ton respectueux des codes du milieu.', 'norlandascup' ); ?></p>
			<p><?php esc_html_e( 'Le site porte également un dossier d\'archive consacré à la Norlanda\'s Cup, régate inter-entreprises en J/80 monotype au format Match Race, disputée à Caen entre 2010 et 2018. Neuf éditions, 32 équipages à son apogée. Ces archives sont conservées comme témoignage d\'une partie de l\'histoire récente de la voile sportive normande.', 'norlandascup' ); ?></p>
			<p><?php esc_html_e( 'Le magazine est indépendant. Il ne reçoit pas de financement institutionnel ni commercial. La rédaction est libre de ses sujets, de ses angles et de ses partis pris.', 'norlandascup' ); ?></p>
		</div>
	</div>
</section>

<section class="editorial alt">
	<div class="wrap">
		<div class="fx" style="margin-bottom:36px;max-width:620px">
			<span class="sec-label"><?php esc_html_e( 'La rédaction', 'norlandascup' ); ?></span>
			<h2 style="font-family:var(--serif);font-weight:600;font-size:clamp(25px,3vw,36px);line-height:1.08;color:var(--marine);letter-spacing:-.01em"><?php esc_html_e( 'L\'équipe éditoriale', 'norlandascup' ); ?></h2>
			<p style="margin-top:14px;color:#4a4f55;font-size:16px;line-height:1.6"><?php esc_html_e( 'Une rédaction restreinte, ancrée en Normandie côtière. Voile et journalisme.', 'norlandascup' ); ?></p>
		</div>
		<div class="next-grid fx" style="grid-template-columns:repeat(3,1fr);gap:24px">
			<?php
			$team = array(
				array(
					'img'  => 'mag-card-portrait-barreur.webp',
					'role' => __( 'Rédacteur en chef', 'norlandascup' ),
					'name' => __( 'Étienne Vasselin', 'norlandascup' ),
					'bio'  => __( 'Skipper amateur depuis l\'enfance, journaliste voile, basé sur la Côte de Nacre. En charge de la ligne éditoriale, des régates et des grands portraits.', 'norlandascup' ),
				),
				array(
					'img'  => 'mag-card-equipiere.webp',
					'role' => __( 'Cheffe de rubrique Spots et Matériel', 'norlandascup' ),
					'name' => __( 'Margot Lecarpentier', 'norlandascup' ),
					'bio'  => __( 'Ancienne équipière de course au large, basée à Cherbourg. Couvre les ports, le matériel et les essais techniques pour le magazine.', 'norlandascup' ),
				),
				array(
					'img'  => 'eq-portrait-bateau.webp',
					'role' => __( 'Reporter et archives', 'norlandascup' ),
					'name' => __( 'Hugo Pruvot', 'norlandascup' ),
					'bio'  => __( 'Reporter régional, en charge des reportages terrain et de la reconstitution du dossier d\'archive Norlanda\'s Cup à partir des sources Wayback et des témoignages.', 'norlandascup' ),
				),
			);
			foreach ( $team as $member ) : ?>
				<div class="next-card" style="cursor:default">
					<div class="ph r45" style="background-image:url(<?php echo esc_url( NORLANDASCUP_URI . '/assets/img/' . $member['img'] ); ?>);background-size:cover;background-position:center;aspect-ratio:1/1" data-ph="<?php echo esc_attr( $member['name'] ); ?>"></div>
					<div class="nc-body">
						<span class="nc-k"><?php echo esc_html( $member['role'] ); ?></span>
						<h3><?php echo esc_html( $member['name'] ); ?></h3>
						<p><?php echo esc_html( $member['bio'] ); ?></p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="editorial">
	<div class="wrap split">
		<div class="col-head fx">
			<span class="sec-label"><?php esc_html_e( 'L\'indépendance', 'norlandascup' ); ?></span>
			<h2><?php esc_html_e( 'Sans publicité native, sans sponsor caché', 'norlandascup' ); ?></h2>
			<p class="note"><?php esc_html_e( 'Pas de publicité native', 'norlandascup' ); ?><br><?php esc_html_e( 'Pas de partenariat masqué', 'norlandascup' ); ?><br><?php esc_html_e( 'Liens transparents', 'norlandascup' ); ?></p>
		</div>
		<div class="prose fx">
			<p><?php esc_html_e( 'Le magazine ne publie pas de publicité native, c\'est-à-dire d\'article rédactionnel commandé et présenté comme un contenu journalistique sans le signaler. Les essais matériel sont menés à charge décharge, sans dépendance commerciale aux marques testées.', 'norlandascup' ); ?></p>
			<p><?php esc_html_e( 'Le magazine vit de la lettre d\'information mensuelle et d\'un soutien lecteur ponctuel. Aucun annonceur n\'intervient dans les choix éditoriaux. Les contributions de tiers sont systématiquement signalées en mention de fin d\'article.', 'norlandascup' ); ?></p>
			<p><?php esc_html_e( 'Pour proposer un sujet, signaler une erreur, ou contribuer à l\'enrichissement du dossier d\'archive, utiliser le formulaire de contact.', 'norlandascup' ); ?></p>
			<p style="margin-top:30px">
				<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-primary"><?php esc_html_e( 'Écrire à la rédaction', 'norlandascup' ); ?><span class="arr">→</span></a>
			</p>
		</div>
	</div>
</section>

<?php get_footer();
