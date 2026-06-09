<?php
/**
 * Template Name: Archive Norlanda's Cup
 *
 * Assigner ce template à la page WP de slug `la-norlandas-cup` (URL Google indexée à préserver).
 *
 * @package Norlandascup
 */
get_header();
?>

<div class="archive-hero" style="background-image:url('<?php echo esc_url( NORLANDASCUP_URI . '/assets/img/archive-hero.webp' ); ?>')" aria-label="<?php esc_attr_e( 'Vue d\'une régate côtière, ambiance Norlanda\'s Cup', 'norlandascup' ); ?>"></div>

<header class="wrap page-head">
	<span class="kicker"><?php esc_html_e( 'Archive de la compétition', 'norlandascup' ); ?></span>
	<h1><?php esc_html_e( 'Norlanda\'s Cup, la régate inter-entreprises de Caen', 'norlandascup' ); ?></h1>
	<p class="sub"><?php esc_html_e( 'Neuf éditions de Match Race en J/80 monotype, disputées chaque mois de mai à Caen, en baie de Seine. Un dossier d\'archive consacré à l\'épreuve, son format sportif et ses équipages.', 'norlandascup' ); ?></p>
	<div class="meta-row">
		<span><b>2010 à 2018</b></span>
		<span><?php esc_html_e( 'Caen · baie de Seine', 'norlandascup' ); ?></span>
		<span><?php esc_html_e( 'Match Race J/80 monotype', 'norlandascup' ); ?></span>
		<span><b>32</b> <?php esc_html_e( 'équipages en 2018', 'norlandascup' ); ?></span>
	</div>
</header>

<?php
norlandascup_archive_banner( array(
	'label'        => __( 'Page d\'archive', 'norlandascup' ),
	'text'         => __( 'Page d\'archive. Édition non reconduite depuis 2018. Contenu conservé pour la postérité de la compétition.', 'norlandascup' ),
	'badge_label'  => __( 'Éditions', 'norlandascup' ),
	'badge_value'  => '2010 / 2018',
	'badge_suffix' => __( 'Manche', 'norlandascup' ),
) );
?>

<section class="editorial">
	<div class="wrap split">
		<div class="col-head fx">
			<span class="sec-label"><?php esc_html_e( 'L\'épreuve', 'norlandascup' ); ?></span>
			<h2><?php esc_html_e( 'Une régate inter-entreprises née à Caen', 'norlandascup' ); ?></h2>
			<p class="note"><?php esc_html_e( 'Match Race en J/80', 'norlandascup' ); ?><br><?php esc_html_e( 'Caen, baie de Seine', 'norlandascup' ); ?><br><?php esc_html_e( '2010 à 2018', 'norlandascup' ); ?></p>
		</div>
		<div class="prose fx">
			<p class="lede"><?php esc_html_e( 'La Norlanda\'s Cup a été l\'un des grands rendez vous de la voile sportive normande, format Match Race disputé en J/80 monotype dans la baie de Seine, à deux pas du centre-ville de Caen.', 'norlandascup' ); ?></p>
			<p><?php esc_html_e( 'Régate inter-entreprises par construction, l\'épreuve réunissait chaque année des équipages portés par des entreprises et des collectivités locales. Le format Match Race, des duels en bateau strictement identique, gomme l\'avantage matériel et fait reposer le résultat sur la tactique, la lecture du vent et la cohésion d\'équipage. Le J/80, quillard sportif de 8 mètres, est la monture commune à tous les participants.', 'norlandascup' ); ?></p>
			<p><?php esc_html_e( 'Inscrite dans le calendrier de la Quinzaine du nautisme, la Norlanda\'s Cup ouvrait la saison régionale fin mai. De 8 équipages pour la première édition de 2010, la flotte est montée à 32 équipages en 2015, puis a maintenu ce format en 2016 et 2018. En 2017, l\'édition compressée en 5 jours a produit 137 matchs.', 'norlandascup' ); ?></p>
			<p><?php esc_html_e( 'L\'édition 2018 a été la dernière. Faute de reconduction, la compétition n\'a pas repris depuis, mais ses formats, ses équipages et ses partenaires institutionnels restent documentés ici, dans une archive ouverte et durable.', 'norlandascup' ); ?></p>
		</div>
	</div>
</section>

<section class="editorial alt">
	<div class="wrap split">
		<div class="col-head fx">
			<span class="sec-label"><?php esc_html_e( 'Le format', 'norlandascup' ); ?></span>
			<h2><?php esc_html_e( 'Du Match Race monotype en J/80', 'norlandascup' ); ?></h2>
			<p class="note"><?php esc_html_e( 'Format Match Race', 'norlandascup' ); ?><br><?php esc_html_e( 'J/80 monotype', 'norlandascup' ); ?><br><?php esc_html_e( '5 à 7 jours, fin mai', 'norlandascup' ); ?></p>
		</div>
		<div class="fx" style="min-width:0">
			<div class="format">
				<div class="fmt-grid">
					<div class="fmt-item">
						<span class="n"><?php esc_html_e( '01 · Format', 'norlandascup' ); ?></span>
						<h3><?php esc_html_e( 'Match Race en duels', 'norlandascup' ); ?></h3>
						<p><?php esc_html_e( 'Format de régate en confrontation directe, deux bateaux par manche, gomme l\'avantage matériel et fait reposer la victoire sur la tactique et le départ. 137 matchs disputés sur l\'édition compressée de 2017.', 'norlandascup' ); ?></p>
					</div>
					<div class="fmt-item">
						<span class="n"><?php esc_html_e( '02 · Bateau', 'norlandascup' ); ?></span>
						<h3><?php esc_html_e( 'J/80 monotype', 'norlandascup' ); ?></h3>
						<p><?php esc_html_e( 'Quillard sportif de 8 mètres, classe internationale monotype. Tous les équipages courent sur le même modèle, fourni par l\'organisation pour égaliser les conditions.', 'norlandascup' ); ?></p>
					</div>
					<div class="fmt-item">
						<span class="n"><?php esc_html_e( '03 · Déroulé', 'norlandascup' ); ?></span>
						<h3><?php esc_html_e( 'Phases puis finales', 'norlandascup' ); ?></h3>
						<p><?php esc_html_e( '32 équipages répartis en 4 groupes de 8 (A, B, C, D), phases de poules en début de semaine, puis demi-finales et finale le vendredi. 5 à 7 jours de compétition selon les éditions.', 'norlandascup' ); ?></p>
					</div>
				</div>
				<div class="fmt-cta">
					<span class="lab"><?php esc_html_e( 'Le règlement complet de la dernière édition, instructions de course et jauge, est conservé dans l\'archive dédiée.', 'norlandascup' ); ?></span>
					<a href="<?php echo esc_url( home_url( '/format-sportif-2018/' ) ); ?>" class="btn btn-dark"><?php esc_html_e( 'Format sportif 2018', 'norlandascup' ); ?><span class="arr">→</span></a>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="editorial">
	<div class="wrap">
		<div class="fx" style="margin-bottom:30px;max-width:620px">
			<span class="sec-label"><?php esc_html_e( 'Les éditions', 'norlandascup' ); ?></span>
			<h2 style="font-family:var(--serif);font-weight:600;font-size:clamp(25px,3vw,36px);line-height:1.08;color:var(--marine);letter-spacing:-.01em"><?php esc_html_e( 'Neuf éditions, 2010 à 2018', 'norlandascup' ); ?></h2>
			<p style="margin-top:14px;color:#4a4f55;font-size:16px;line-height:1.6"><?php esc_html_e( 'Évolution annuelle du nombre d\'équipages et de la durée de l\'épreuve, des premières manches de 2010 à la dernière édition de 2018.', 'norlandascup' ); ?></p>
		</div>
		<div class="ptable-wrap fx">
			<table class="ptable">
				<thead>
					<tr>
						<th><?php esc_html_e( 'Édition', 'norlandascup' ); ?></th>
						<th><?php esc_html_e( 'Année', 'norlandascup' ); ?></th>
						<th><?php esc_html_e( 'Dates', 'norlandascup' ); ?></th>
						<th class="num"><?php esc_html_e( 'Équipages', 'norlandascup' ); ?></th>
						<th class="num"><?php esc_html_e( 'Durée', 'norlandascup' ); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php
					// Données reconstituées depuis le Wayback (concept 2015, programme 2018, post 8e édition 2017).
					$rows = array(
						array( 'ed' => '9e',  'year' => '2018', 'dates' => '28 mai - 1er juin', 'count' => '32', 'days' => '5 jours', 'last' => true ),
						array( 'ed' => '8e',  'year' => '2017', 'dates' => 'fin mai',           'count' => '32', 'days' => '5 jours' ),
						array( 'ed' => '7e',  'year' => '2016', 'dates' => 'fin mai',           'count' => '32', 'days' => '7 jours' ),
						array( 'ed' => '6e',  'year' => '2015', 'dates' => '18 - 29 mai',       'count' => '32', 'days' => '7 jours' ),
						array( 'ed' => '1re', 'year' => '2010', 'dates' => 'mai',               'count' => '8',  'days' => '-' ),
					);
					foreach ( $rows as $r ) : ?>
						<tr>
							<td class="yr"><?php echo esc_html( $r['ed'] ); ?><?php if ( ! empty( $r['last'] ) ) : ?><span class="last-tag"><?php esc_html_e( 'Dernière', 'norlandascup' ); ?></span><?php endif; ?></td>
							<td class="win"><?php echo esc_html( $r['year'] ); ?></td>
							<td><?php echo esc_html( $r['dates'] ); ?></td>
							<td class="num"><?php echo esc_html( $r['count'] ); ?></td>
							<td class="num"><?php echo esc_html( $r['days'] ); ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
				<tfoot>
					<tr><td colspan="5"><?php esc_html_e( 'Annuelle, fin mai - début juin · 137 matchs sur l\'édition 2017 · classements détaillés en cours de reconstitution', 'norlandascup' ); ?></td></tr>
				</tfoot>
			</table>
		</div>
	</div>
</section>

<section class="editorial alt">
	<div class="wrap">
		<div class="fx" style="margin-bottom:32px;max-width:620px">
			<span class="sec-label"><?php esc_html_e( 'Soutiens', 'norlandascup' ); ?></span>
			<h2 style="font-family:var(--serif);font-weight:600;font-size:clamp(25px,3vw,36px);line-height:1.08;color:var(--marine);letter-spacing:-.01em"><?php esc_html_e( 'Partenaires institutionnels de l\'épreuve', 'norlandascup' ); ?></h2>
			<p style="margin-top:14px;color:#4a4f55;font-size:16px;line-height:1.6"><?php esc_html_e( 'Collectivités et institutions nautiques qui ont accompagné les éditions de la compétition.', 'norlandascup' ); ?></p>
		</div>
		<div class="partners-grid fx">
			<?php
			// Partenaires reconstitués depuis le Wayback : départements/collectivités participants comme équipages 2016/2018 + ligue de voile mentionnée en édito 2017.
			$partners = array(
				array( 'name' => __( 'Conseil départemental du Calvados', 'norlandascup' ), 'sub' => __( 'Collectivité', 'norlandascup' ) ),
				array( 'name' => __( 'Région Normandie', 'norlandascup' ),                 'sub' => __( 'Collectivité', 'norlandascup' ) ),
				array( 'name' => __( 'Ville de Caen', 'norlandascup' ),                    'sub' => __( 'Commune', 'norlandascup' ) ),
				array( 'name' => __( 'Caen la Mer', 'norlandascup' ),                      'sub' => __( 'Agglomération', 'norlandascup' ) ),
				array( 'name' => __( 'Ligue de voile de Normandie', 'norlandascup' ),      'sub' => __( 'Ligue', 'norlandascup' ) ),
				array( 'name' => __( 'CCI Port Caen Ouistreham', 'norlandascup' ),         'sub' => __( 'Institution', 'norlandascup' ) ),
			);
			foreach ( $partners as $p ) : ?>
				<div class="plogo">
					<div class="pl-in">
						<span class="pl-mark" aria-hidden="true">
							<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
								<path d="M12 3 L12 17 M12 5 L18 14 L12 14 Z M12 7 L6 14 L12 14 Z M7 17 H17"/>
							</svg>
						</span>
						<span class="pl-name"><?php echo nl2br( esc_html( $p['name'] ) ); ?></span>
						<span class="pl-sub"><?php echo esc_html( $p['sub'] ); ?></span>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<p class="partners-note"><?php esc_html_e( 'Logos institutionnels présentés à titre d\'archive, en niveaux de gris.', 'norlandascup' ); ?></p>
	</div>
</section>

<section class="editorial">
	<div class="wrap">
		<div class="next-head fx">
			<span class="sec-label"><?php esc_html_e( 'Poursuivre', 'norlandascup' ); ?></span>
			<h2><?php esc_html_e( 'Continuer dans les archives', 'norlandascup' ); ?></h2>
		</div>
		<div class="next-grid fx">
			<a class="next-card" href="<?php echo esc_url( home_url( '/les-equipages/' ) ); ?>">
				<div class="ph" style="background-image:url(<?php echo esc_url( NORLANDASCUP_URI . '/assets/img/archive-next-equipages.webp' ); ?>);background-size:cover;background-position:center" data-ph="<?php esc_attr_e( 'Pontons, flotte d\'équipages au départ, 16:9', 'norlandascup' ); ?>"></div>
				<div class="nc-body">
					<span class="nc-k"><?php esc_html_e( 'Archive · Les équipages', 'norlandascup' ); ?></span>
					<h3><?php esc_html_e( 'Les équipages', 'norlandascup' ); ?></h3>
					<p><?php esc_html_e( 'Les engagements des éditions 2010 à 2018, leurs bateaux, leurs classes et leurs résultats sur le parcours côtier.', 'norlandascup' ); ?></p>
					<span class="read"><?php esc_html_e( 'Voir les équipages', 'norlandascup' ); ?><span class="arr">→</span></span>
				</div>
			</a>
			<a class="next-card" href="<?php echo esc_url( home_url( '/format-sportif-2018/' ) ); ?>">
				<div class="ph" style="background-image:url(<?php echo esc_url( NORLANDASCUP_URI . '/assets/img/archive-next-format.webp' ); ?>);background-size:cover;background-position:center" data-ph="<?php esc_attr_e( 'Instructions de course, marques du parcours, 16:9', 'norlandascup' ); ?>"></div>
				<div class="nc-body">
					<span class="nc-k"><?php esc_html_e( 'Archive · Règlement', 'norlandascup' ); ?></span>
					<h3><?php esc_html_e( 'Format sportif 2018', 'norlandascup' ); ?></h3>
					<p><?php esc_html_e( 'Le règlement de la dernière édition : parcours côtier, classes IRC et Osiris, jauge et instructions de course.', 'norlandascup' ); ?></p>
					<span class="read"><?php esc_html_e( 'Lire le règlement', 'norlandascup' ); ?><span class="arr">→</span></span>
				</div>
			</a>
		</div>
	</div>
</section>

<?php get_footer();
