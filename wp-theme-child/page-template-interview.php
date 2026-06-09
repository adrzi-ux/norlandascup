<?php
/**
 * Template Name: Interview archive (Norlanda's Cup)
 *
 * Template réutilisable pour les pages d'interview archive. Le contenu spécifique est sélectionné
 * d'après le slug de la page WP (économique → Dominique Goutte, antoine → Antoine de Gouville,
 * etc.).
 *
 * Slugs URLs Google indexées prioritaires :
 *  - /interview-economique/  → Dominique GOUTTE, Caen la Mer
 *  - /interview-antoine/     → Antoine DE GOUVILLE, CCI Port Caen Ouistreham
 *
 * @package Norlandascup
 */
get_header();

$slug = get_post_field( 'post_name', get_post() );

// Table des interviews reconstituées depuis Wayback (cf. content/wayback-recovered-2026-06-08.md).
$interviews = array(
	'interview-economique' => array(
		'name'    => 'Dominique GOUTTE',
		'role'    => __( 'Vice-président de Caen la Mer, développement économique', 'norlandascup' ),
		'context' => __( 'À l\'occasion de la Norlanda\'s Cup, échange avec Dominique Goutte, vice-président de l\'agglomération de Caen la Mer en charge du développement économique, mais aussi de l\'enseignement supérieur et de la recherche.', 'norlandascup' ),
		'qa' => array(
			array(
				'q' => __( 'On parle de développement économique, c\'est vrai que pour des entreprises, qu\'est-ce que l\'agglomération peut apporter, et quels sont les souhaits du président ?', 'norlandascup' ),
				'a' => __( 'D\'abord, il faut être très humble, le développement économique ce n\'est pas nous qui allons le faire, ce sont les entreprises car ce sont eux qui créent de la richesse économique et créent des emplois. Ce que nous avons l\'ambition de faire, c\'est de les aider. On peut les accueillir, et il faut être capable de leur offrir un lieu et puis il faut les accompagner, les toutes jeunes pousses avec un enseignement de coaching comme celles qui sortent d\'un incubateur comme Normandie Incubation qui viennent juste de créer leur entreprise. Ensuite on les accueille dans un hôtel d\'entreprises et là elles sont censées prendre leur envol. Et puis l\'animation, c\'est ce qui explique qu\'on soit ici aujourd\'hui. Bien sûr le territoire et plein d\'entrepreneurs qui se connaissent plus ou moins et qui ont intérêt à se rencontrer et à échanger car c\'est une occasion pour eux de créer du business à terme.', 'norlandascup' ),
			),
			array(
				'q' => __( 'Il a été annoncé des filières à regarder de près comme le numérique, mais il n\'y a pas que ça. Il y a un travail que souhaite faire l\'agglomération pour soutenir toutes les entreprises ?', 'norlandascup' ),
				'a' => __( 'Absolument, on a des filières très importantes sur notre territoire. La filière agroalimentaire est évidemment une filière majeure dans notre région comme la filière équine c\'est quelque chose que nous soutenons aussi. Mais bon où nous avons défini un certain nombre de priorités, c\'est sur les pépites que nous avons en terme de spécialités de recherche en particulier donc le numérique bien sûr. On sait qu\'on a été leader de French Tech. Caen a une avance très notable dans ce domaine là. La santé aussi, l\'innovation en matière de santé en particulier.', 'norlandascup' ),
			),
		),
	),
	'interview-antoine' => array(
		'name'    => 'Antoine DE GOUVILLE',
		'role'    => __( 'CCI Port Caen Ouistreham', 'norlandascup' ),
		'context' => __( 'À l\'occasion de la Norlanda\'s Cup, Antoine de Gouville présente les projets et les chiffres de la chambre de commerce et d\'industrie, gestionnaire du port de Caen Ouistreham.', 'norlandascup' ),
		'qa' => array(
			array(
				'q' => __( 'Quels sont les projets de la CCI Port Caen Ouistreham ?', 'norlandascup' ),
				'a' => __( 'La chambre de commerce est présente en matière portuaire sur trois activités maritimes, le commerce, la pêche et la plaisance. En termes de ports de commerce elle gère le port de Caen Ouistreham. Nous gérons également trois ports de plaisance, Caen Ouistreham et depuis un an maintenant Dives Cabourg Houlgate, et en matière de pêche nous sommes présents sur Grandcamp, Port en Bessin et Ouistreham.', 'norlandascup' ),
			),
			array(
				'q' => __( 'Comment se répartissent les compétences sur le port de Caen Ouistreham ?', 'norlandascup' ),
				'a' => __( 'La répartition des compétences sur le port de Caen Ouistreham est divisée entre deux acteurs, la chambre de commerce pour les super-structures et les infrastructures qui sont assumées par Ports Normands Associés. Le port traite à peu près 4 millions de tonnes par an donc c\'est un port qui compte dans le monde des ports maritimes.', 'norlandascup' ),
			),
			array(
				'q' => __( 'Quelles sont les grandes activités du port ?', 'norlandascup' ),
				'a' => __( 'Il y a deux grandes activités majeures : une à l\'aval des écluses pour les activités trans-Manche avec un million de passagers, et une partie à l\'amont des écluses où l\'on traite une polyvalence de marchandises. La capacité qu\'offre un port de commerce comme celui-ci donne accès à un certain nombre d\'outillages qui peuvent être employés à beaucoup de finalités. C\'est parce que le port de commerce de Caen Ouistreham dispose d\'un certain nombre d\'outils et d\'espace qu\'on peut les déployer pour des manifestations comme la Norlanda\'s Cup.', 'norlandascup' ),
			),
		),
	),
);

$interview = isset( $interviews[ $slug ] ) ? $interviews[ $slug ] : null;
?>

<?php if ( $interview ) : ?>

<header class="wrap page-head">
	<span class="kicker"><?php esc_html_e( 'Archive · Interview', 'norlandascup' ); ?></span>
	<h1><?php printf( esc_html__( 'Interview %s', 'norlandascup' ), esc_html( $interview['name'] ) ); ?></h1>
	<p class="sub"><?php echo esc_html( $interview['role'] ); ?></p>
	<div class="meta-row">
		<span><b><?php esc_html_e( 'Archive', 'norlandascup' ); ?></b></span>
		<span><?php esc_html_e( 'Format vidéo originel', 'norlandascup' ); ?></span>
		<span><?php esc_html_e( 'Transcript conservé', 'norlandascup' ); ?></span>
	</div>
</header>

<?php
norlandascup_archive_banner( array(
	'label'        => __( 'Archive éditoriale', 'norlandascup' ),
	'text'         => __( 'Interview enregistrée à l\'occasion d\'une édition de la Norlanda\'s Cup. Transcript conservé pour la postérité de la compétition.', 'norlandascup' ),
	'badge_label'  => __( 'Format', 'norlandascup' ),
	'badge_value'  => __( 'Vidéo', 'norlandascup' ),
	'badge_suffix' => __( 'Transcript', 'norlandascup' ),
) );
?>

<section class="editorial">
	<div class="wrap split">
		<div class="col-head fx">
			<span class="sec-label"><?php esc_html_e( 'Contexte', 'norlandascup' ); ?></span>
			<h2><?php echo esc_html( $interview['name'] ); ?></h2>
			<p class="note"><?php echo nl2br( esc_html( $interview['role'] ) ); ?></p>
		</div>
		<div class="prose fx">
			<p class="lede"><?php echo esc_html( $interview['context'] ); ?></p>
		</div>
	</div>
</section>

<section class="editorial alt">
	<div class="wrap">
		<div class="fx" style="margin-bottom:32px;max-width:720px">
			<span class="sec-label"><?php esc_html_e( 'Échange', 'norlandascup' ); ?></span>
			<h2 style="font-family:var(--serif);font-weight:600;font-size:clamp(25px,3vw,36px);line-height:1.08;color:var(--marine);letter-spacing:-.01em"><?php esc_html_e( 'L\'entretien', 'norlandascup' ); ?></h2>
		</div>
		<div class="prose fx" style="max-width:760px">
			<?php foreach ( $interview['qa'] as $i => $pair ) : ?>
				<p style="font-family:var(--serif);font-weight:600;font-size:clamp(17px,1.9vw,21px);color:var(--marine);margin-top:<?php echo $i === 0 ? '0' : '34px'; ?>;margin-bottom:18px;line-height:1.35">
					<span style="color:var(--rouille);font-family:var(--mono);font-size:13px;letter-spacing:.1em;margin-right:9px"><?php printf( esc_html__( 'Q%d', 'norlandascup' ), $i + 1 ); ?></span>
					<?php echo esc_html( $pair['q'] ); ?>
				</p>
				<p><?php echo esc_html( $pair['a'] ); ?></p>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="editorial">
	<div class="wrap">
		<div class="next-head fx">
			<span class="sec-label"><?php esc_html_e( 'Poursuivre', 'norlandascup' ); ?></span>
			<h2><?php esc_html_e( 'Autres interviews d\'archive', 'norlandascup' ); ?></h2>
		</div>
		<div class="next-grid fx">
			<?php
			$other_slug = ( $slug === 'interview-antoine' ) ? 'interview-economique' : 'interview-antoine';
			$other      = $interviews[ $other_slug ];
			?>
			<a class="next-card" href="<?php echo esc_url( home_url( '/' . $other_slug . '/' ) ); ?>">
				<div class="ph" style="background-image:url(<?php echo esc_url( NORLANDASCUP_URI . '/assets/img/mag-card-portrait-barreur.webp' ); ?>);background-size:cover;background-position:center" data-ph="<?php echo esc_attr( $other['name'] . ', ' . $other['role'] ); ?>"></div>
				<div class="nc-body">
					<span class="nc-k"><?php esc_html_e( 'Archive · Interview', 'norlandascup' ); ?></span>
					<h3><?php echo esc_html( $other['name'] ); ?></h3>
					<p><?php echo esc_html( $other['role'] ); ?></p>
					<span class="read"><?php esc_html_e( 'Lire l\'interview', 'norlandascup' ); ?><span class="arr">→</span></span>
				</div>
			</a>
			<a class="next-card" href="<?php echo esc_url( home_url( '/les-equipages/' ) ); ?>">
				<div class="ph" style="background-image:url(<?php echo esc_url( NORLANDASCUP_URI . '/assets/img/archive-next-equipages.webp' ); ?>);background-size:cover;background-position:center" data-ph="<?php esc_attr_e( 'Listing 64 équipages 2016 + 2018', 'norlandascup' ); ?>"></div>
				<div class="nc-body">
					<span class="nc-k"><?php esc_html_e( 'Archive · Les équipages', 'norlandascup' ); ?></span>
					<h3><?php esc_html_e( 'Tous les équipages', 'norlandascup' ); ?></h3>
					<p><?php esc_html_e( 'Liste complète des 32 équipages 2016 et 32 équipages 2018, par groupe (A, B, C, D).', 'norlandascup' ); ?></p>
					<span class="read"><?php esc_html_e( 'Voir le listing', 'norlandascup' ); ?><span class="arr">→</span></span>
				</div>
			</a>
		</div>
	</div>
</section>

<?php else : ?>

<header class="wrap page-head">
	<span class="kicker"><?php esc_html_e( 'Archive · Interview', 'norlandascup' ); ?></span>
	<h1><?php esc_html_e( 'Interview non disponible', 'norlandascup' ); ?></h1>
	<p class="sub"><?php esc_html_e( 'Cette interview n\'est pas encore reconstituée. Voir la liste des équipages et le dossier principal.', 'norlandascup' ); ?></p>
</header>

<section class="editorial">
	<div class="wrap" style="text-align:center">
		<a href="<?php echo esc_url( home_url( '/la-norlandas-cup/' ) ); ?>" class="btn btn-primary"><?php esc_html_e( 'Voir le dossier d\'archive', 'norlandascup' ); ?><span class="arr">→</span></a>
	</div>
</section>

<?php endif; ?>

<?php get_footer();
