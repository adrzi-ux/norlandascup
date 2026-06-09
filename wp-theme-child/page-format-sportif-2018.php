<?php
/**
 * Template Name: Format sportif 2018 (archive règlement)
 *
 * Assigner ce template à la page WP de slug `format-sportif-2018` (URL Google indexée à préserver).
 *
 * @package Norlandascup
 */
get_header();
?>

<header class="wrap page-head">
	<span class="kicker"><?php esc_html_e( 'Archive · Règlement', 'norlandascup' ); ?></span>
	<h1><?php esc_html_e( 'Format sportif 2018, le règlement de la dernière édition', 'norlandascup' ); ?></h1>
	<p class="sub"><?php esc_html_e( 'Format Match Race en J/80 monotype, phases de groupe et finales, calé du lundi 28 mai au vendredi 1er juin 2018. Cinq jours de compétition, parcours en baie de Seine, équipages d\'entreprises et collectivités.', 'norlandascup' ); ?></p>
	<div class="meta-row">
		<span><b>9e édition</b></span>
		<span><?php esc_html_e( '28 mai - 1er juin 2018', 'norlandascup' ); ?></span>
		<span><?php esc_html_e( 'Format Match Race J/80', 'norlandascup' ); ?></span>
		<span><b>32</b> <?php esc_html_e( 'équipages', 'norlandascup' ); ?></span>
	</div>
</header>

<?php
norlandascup_archive_banner( array(
	'label'        => __( 'Règlement d\'archive', 'norlandascup' ),
	'text'         => __( 'Règlement de la dernière édition disputée en 2018. Document de référence conservé, non opposable. Aucune édition n\'est programmée depuis.', 'norlandascup' ),
	'badge_label'  => __( 'Édition', 'norlandascup' ),
	'badge_value'  => '2018',
	'badge_suffix' => __( '9e et dernière', 'norlandascup' ),
) );
?>

<section class="editorial">
	<div class="wrap split">
		<div class="col-head fx">
			<span class="sec-label"><?php esc_html_e( 'Bateau', 'norlandascup' ); ?></span>
			<h2><?php esc_html_e( 'Le J/80 monotype', 'norlandascup' ); ?></h2>
			<p class="note"><?php esc_html_e( 'Quillard sportif 8 m', 'norlandascup' ); ?><br><?php esc_html_e( 'Classe internationale', 'norlandascup' ); ?><br><?php esc_html_e( 'Fourni par l\'organisation', 'norlandascup' ); ?></p>
		</div>
		<div class="prose fx">
			<p class="lede"><?php esc_html_e( 'L\'épreuve se court sur un seul modèle de bateau, le J/80, voilier monotype à quille fixe de 8 mètres conçu par les frères Johnstone. Tous les équipages courent sur des bateaux strictement identiques, fournis par l\'organisation pour garantir l\'égalité matérielle.', 'norlandascup' ); ?></p>
			<p><?php esc_html_e( 'Le J/80, classe internationale créée en 1992, équipage de quatre à cinq personnes, voiles d\'avant solent et spinnaker symétrique. Le format monotype donne à chaque manche un duel pur, où la lecture du vent, la qualité du départ et la stratégie de bord pèsent davantage que la préparation matérielle.', 'norlandascup' ); ?></p>
		</div>
	</div>
</section>

<section class="editorial alt">
	<div class="wrap split">
		<div class="col-head fx">
			<span class="sec-label"><?php esc_html_e( 'Format', 'norlandascup' ); ?></span>
			<h2><?php esc_html_e( 'Le Match Race', 'norlandascup' ); ?></h2>
			<p class="note"><?php esc_html_e( 'Duels deux par deux', 'norlandascup' ); ?><br><?php esc_html_e( '4 groupes de 8', 'norlandascup' ); ?><br><?php esc_html_e( 'Phases puis finales', 'norlandascup' ); ?></p>
		</div>
		<div class="fx" style="min-width:0">
			<div class="format">
				<div class="fmt-grid">
					<div class="fmt-item">
						<span class="n"><?php esc_html_e( '01 · Phases de groupe', 'norlandascup' ); ?></span>
						<h3><?php esc_html_e( 'Lundi au jeudi', 'norlandascup' ); ?></h3>
						<p><?php esc_html_e( '32 équipages répartis en 4 groupes de 8 (A, B, C, D), chaque groupe joue toutes les confrontations possibles entre ses membres. Les meilleurs de chaque groupe se qualifient pour les phases finales.', 'norlandascup' ); ?></p>
					</div>
					<div class="fmt-item">
						<span class="n"><?php esc_html_e( '02 · Demi-finales', 'norlandascup' ); ?></span>
						<h3><?php esc_html_e( 'Vendredi matin', 'norlandascup' ); ?></h3>
						<p><?php esc_html_e( 'Les qualifiés s\'affrontent en duels au meilleur des manches. Le format compressé de 2017 avait imposé 137 matchs sur la semaine, soit un rythme soutenu.', 'norlandascup' ); ?></p>
					</div>
					<div class="fmt-item">
						<span class="n"><?php esc_html_e( '03 · Finale', 'norlandascup' ); ?></span>
						<h3><?php esc_html_e( 'Vendredi après-midi', 'norlandascup' ); ?></h3>
						<p><?php esc_html_e( 'La finale oppose les deux meilleurs équipages restants pour désigner le vainqueur au scratch. Petite finale pour la 3e place. Remise des prix à terre en clôture.', 'norlandascup' ); ?></p>
					</div>
				</div>
				<div class="fmt-cta">
					<span class="lab"><?php esc_html_e( 'Programme détaillé jour par jour : du lundi 28 mai au vendredi 1er juin 2018. Briefing terre chaque matin, mise à l\'eau coordonnée par l\'organisation.', 'norlandascup' ); ?></span>
					<a href="<?php echo esc_url( home_url( '/les-equipages/' ) ); ?>" class="btn btn-dark"><?php esc_html_e( 'Voir les 32 équipages', 'norlandascup' ); ?><span class="arr">→</span></a>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="editorial">
	<div class="wrap">
		<div class="fx" style="margin-bottom:30px;max-width:620px">
			<span class="sec-label"><?php esc_html_e( 'Programme', 'norlandascup' ); ?></span>
			<h2 style="font-family:var(--serif);font-weight:600;font-size:clamp(25px,3vw,36px);line-height:1.08;color:var(--marine);letter-spacing:-.01em"><?php esc_html_e( 'Cinq jours de compétition', 'norlandascup' ); ?></h2>
			<p style="margin-top:14px;color:#4a4f55;font-size:16px;line-height:1.6"><?php esc_html_e( 'Le calendrier officiel de l\'édition 2018, depuis l\'arrivée des équipages le dimanche jusqu\'à la remise des prix le vendredi.', 'norlandascup' ); ?></p>
		</div>
		<div class="ptable-wrap fx">
			<table class="ptable">
				<thead>
					<tr>
						<th><?php esc_html_e( 'Jour', 'norlandascup' ); ?></th>
						<th><?php esc_html_e( 'Date', 'norlandascup' ); ?></th>
						<th><?php esc_html_e( 'Phase', 'norlandascup' ); ?></th>
						<th><?php esc_html_e( 'Détail', 'norlandascup' ); ?></th>
					</tr>
				</thead>
				<tbody>
					<tr><td class="yr"><?php esc_html_e( 'Lundi', 'norlandascup' ); ?></td><td class="win">28 mai 2018</td><td><?php esc_html_e( 'Phase de groupe, jour 1', 'norlandascup' ); ?></td><td class="anec"><?php esc_html_e( 'Briefing, jauge, premières manches en duels.', 'norlandascup' ); ?></td></tr>
					<tr><td class="yr"><?php esc_html_e( 'Mardi', 'norlandascup' ); ?></td><td class="win">29 mai 2018</td><td><?php esc_html_e( 'Phase de groupe, jour 2', 'norlandascup' ); ?></td><td class="anec"><?php esc_html_e( 'Poursuite des duels par groupe.', 'norlandascup' ); ?></td></tr>
					<tr><td class="yr"><?php esc_html_e( 'Mercredi', 'norlandascup' ); ?></td><td class="win">30 mai 2018</td><td><?php esc_html_e( 'Phase de groupe, jour 3', 'norlandascup' ); ?></td><td class="anec"><?php esc_html_e( 'Journée la plus intense, décrite comme une journée de folie en édito officiel.', 'norlandascup' ); ?></td></tr>
					<tr><td class="yr"><?php esc_html_e( 'Jeudi', 'norlandascup' ); ?></td><td class="win">31 mai 2018</td><td><?php esc_html_e( 'Phase de groupe, fin', 'norlandascup' ); ?></td><td class="anec"><?php esc_html_e( 'Dernières manches de poule, qualifications pour les phases finales.', 'norlandascup' ); ?></td></tr>
					<tr><td class="yr"><?php esc_html_e( 'Vendredi', 'norlandascup' ); ?></td><td class="win">1er juin 2018</td><td><?php esc_html_e( 'Finales', 'norlandascup' ); ?></td><td class="anec"><?php esc_html_e( 'Demi-finales le matin, finale et petite finale l\'après-midi, remise des prix à terre.', 'norlandascup' ); ?></td></tr>
				</tbody>
				<tfoot>
					<tr><td colspan="4"><?php esc_html_e( 'Programme officiel reconstitué depuis l\'archive Wayback de la page "/le-programme-en-cours/" snapshot 2018.', 'norlandascup' ); ?></td></tr>
				</tfoot>
			</table>
		</div>
	</div>
</section>

<section class="editorial alt">
	<div class="wrap">
		<div class="next-head fx">
			<span class="sec-label"><?php esc_html_e( 'Poursuivre', 'norlandascup' ); ?></span>
			<h2><?php esc_html_e( 'Continuer dans les archives', 'norlandascup' ); ?></h2>
		</div>
		<div class="next-grid fx">
			<a class="next-card" href="<?php echo esc_url( home_url( '/les-equipages/' ) ); ?>">
				<div class="ph" style="background-image:url(<?php echo esc_url( NORLANDASCUP_URI . '/assets/img/archive-next-equipages.webp' ); ?>);background-size:cover;background-position:center" data-ph="<?php esc_attr_e( 'Liste des 64 équipages 2016 + 2018', 'norlandascup' ); ?>"></div>
				<div class="nc-body">
					<span class="nc-k"><?php esc_html_e( 'Archive · Les équipages', 'norlandascup' ); ?></span>
					<h3><?php esc_html_e( 'Tous les équipages 2018', 'norlandascup' ); ?></h3>
					<p><?php esc_html_e( '32 équipages engagés sur la 9e édition, répartis en 4 groupes de 8. Liste vérifiée depuis l\'archive officielle.', 'norlandascup' ); ?></p>
					<span class="read"><?php esc_html_e( 'Voir le listing', 'norlandascup' ); ?><span class="arr">→</span></span>
				</div>
			</a>
			<a class="next-card" href="<?php echo esc_url( home_url( '/la-norlandas-cup/' ) ); ?>">
				<div class="ph" style="background-image:url(<?php echo esc_url( NORLANDASCUP_URI . '/assets/img/archive-hero.webp' ); ?>);background-size:cover;background-position:center" data-ph="<?php esc_attr_e( 'Vue aérienne d\'une régate', 'norlandascup' ); ?>"></div>
				<div class="nc-body">
					<span class="nc-k"><?php esc_html_e( 'Archive · L\'épreuve', 'norlandascup' ); ?></span>
					<h3><?php esc_html_e( 'Le dossier complet', 'norlandascup' ); ?></h3>
					<p><?php esc_html_e( 'Histoire, format, partenaires institutionnels et neuf éditions de la Norlanda\'s Cup.', 'norlandascup' ); ?></p>
					<span class="read"><?php esc_html_e( 'Voir le dossier', 'norlandascup' ); ?><span class="arr">→</span></span>
				</div>
			</a>
		</div>
	</div>
</section>

<?php get_footer();
