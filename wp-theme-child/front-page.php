<?php
/**
 * Front page (home) template.
 * Hero + conditions strip + magazine grid (featured lead + 6 cards) + archive banner + newsletter.
 *
 * Content is hardcoded for V1 (visual parity with Claude Design proto). It will move to WP_Query
 * + posts content once Wisewand starts publishing (étape 5).
 *
 * @package Norlandascup
 */
get_header();
$img_base = get_stylesheet_directory_uri() . '/assets/img/';
?>

<section class="hero">
	<div class="ph dark" style="background-image:url(<?php echo esc_url( $img_base . 'home-hero.webp' ); ?>);background-size:cover;background-position:center" data-ph="<?php esc_attr_e( 'Photo régate gros temps, Côte de Nacre, ratio 16:9', 'norlandascup' ); ?>"></div>
	<div class="hero-veil"></div>
	<div class="wrap">
		<div class="hero-body">
			<span class="kicker"><?php esc_html_e( 'Magazine indépendant · Voile et régates de Normandie', 'norlandascup' ); ?></span>
			<h1><em>Sous le vent</em> de la Manche. De Cherbourg à la Côte de Nacre.</h1>
			<p class="deck"><?php esc_html_e( 'Le magazine indépendant des régates normandes. Calendrier régional, spots, essais matériel, portraits de skippers, et les archives de la Norlanda\'s Cup éditions 2010 à 2018.', 'norlandascup' ); ?></p>
			<div class="hero-cta">
				<a href="#magazine" class="btn btn-primary"><?php esc_html_e( 'Lire le magazine', 'norlandascup' ); ?><span class="arr">→</span></a>
				<a href="<?php echo esc_url( home_url( '/calendrier-regates-normandie/' ) ); ?>" class="btn btn-ghost"><?php esc_html_e( 'Calendrier des régates', 'norlandascup' ); ?><span class="arr">→</span></a>
			</div>
		</div>
	</div>
	<div class="hero-credit"><?php esc_html_e( 'Port en Bessin, départ classe IRC', 'norlandascup' ); ?></div>
</section>

<div class="cond">
	<div class="wrap">
		<?php
		norlandascup_cond_tile( __( 'Vent baie de Seine', 'norlandascup' ), '22 nds', __( 'O / SO', 'norlandascup' ) );
		norlandascup_cond_tile( __( 'Mer', 'norlandascup' ), __( 'Agitée', 'norlandascup' ), '1,8 m' );
		norlandascup_cond_tile( __( 'Prochaine régate', 'norlandascup' ), __( 'Trophée Manche', 'norlandascup' ), __( '14 juin', 'norlandascup' ) );
		norlandascup_cond_tile( __( 'Archive en ligne', 'norlandascup' ), '2010 à 2018', __( '16 équipages', 'norlandascup' ) );
		?>
	</div>
</div>

<section class="sec wrap" id="magazine">
	<div class="sec-head fx">
		<div class="lhs">
			<span class="kicker"><?php esc_html_e( 'Le magazine', 'norlandascup' ); ?></span>
			<h2><?php esc_html_e( 'Derniers articles', 'norlandascup' ); ?></h2>
			<p><?php esc_html_e( 'La rédaction couvre les plans d\'eau normands, le matériel et les hommes qui les arment.', 'norlandascup' ); ?></p>
		</div>
		<div class="filters" role="tablist" aria-label="<?php esc_attr_e( 'Rubriques', 'norlandascup' ); ?>">
			<a class="chip active" href="<?php echo esc_url( home_url( '/magazine/' ) ); ?>"><?php esc_html_e( 'Tout', 'norlandascup' ); ?></a>
			<a class="chip" href="<?php echo esc_url( home_url( '/magazine/?rubrique=regates' ) ); ?>"><?php esc_html_e( 'Régates', 'norlandascup' ); ?></a>
			<a class="chip" href="<?php echo esc_url( home_url( '/magazine/?rubrique=spots' ) ); ?>"><?php esc_html_e( 'Spots', 'norlandascup' ); ?></a>
			<a class="chip" href="<?php echo esc_url( home_url( '/magazine/?rubrique=materiel' ) ); ?>"><?php esc_html_e( 'Matériel', 'norlandascup' ); ?></a>
			<a class="chip" href="<?php echo esc_url( home_url( '/magazine/?rubrique=meteo' ) ); ?>"><?php esc_html_e( 'Météo', 'norlandascup' ); ?></a>
			<a class="chip" href="<?php echo esc_url( home_url( '/magazine/?rubrique=portraits' ) ); ?>"><?php esc_html_e( 'Portraits', 'norlandascup' ); ?></a>
		</div>
	</div>

	<?php
	$all_articles    = norlandascup_articles();
	$lead_slug       = 'trophee-manche-raz-barfleur';
	$lead            = isset( $all_articles[ $lead_slug ] ) ? $all_articles[ $lead_slug ] : null;
	$home_card_slugs = array(
		'winches-self-tailing-comparatif',
		'honfleur-mouiller-avant-port',
		'skipper-cote-nacre-dix-saisons',
		'lire-grain-suroit-baie-seine',
		'garde-robe-voiles-manche',
		'ouverture-saison-deauville',
	);
	?>

	<?php if ( $lead ) : ?>
	<article class="lead fx">
		<a class="lead-media" href="<?php echo esc_url( home_url( '/magazine/' . $lead_slug . '/' ) ); ?>" aria-label="<?php esc_attr_e( "Lire l'article à la une", 'norlandascup' ); ?>" style="display:block">
			<div class="ph r32" style="background-image:url(<?php echo esc_url( $img_base . $lead['img'] ); ?>);background-size:cover;background-position:center" data-ph="<?php echo esc_attr( $lead['ph'] ); ?>"></div>
		</a>
		<div class="lead-txt">
			<span class="tag"><?php echo esc_html( $lead['tag'] ); ?></span>
			<h3><a href="<?php echo esc_url( home_url( '/magazine/' . $lead_slug . '/' ) ); ?>" style="color:inherit;text-decoration:none"><?php echo esc_html( $lead['title'] ); ?></a></h3>
			<p><?php echo esc_html( $lead['excerpt'] ); ?></p>
			<div class="byline">
				<span><?php esc_html_e( 'Par la rédaction', 'norlandascup' ); ?></span><span class="dot"></span>
				<span><?php echo esc_html( $lead['date_long'] ); ?></span><span class="dot"></span>
				<span><?php echo esc_html( $lead['read'] ); ?></span>
			</div>
			<a href="<?php echo esc_url( home_url( '/magazine/' . $lead_slug . '/' ) ); ?>" class="read"><?php esc_html_e( "Lire l'article", 'norlandascup' ); ?><span class="arr">→</span></a>
		</div>
	</article>
	<?php endif; ?>

	<div class="grid">
		<?php
		foreach ( $home_card_slugs as $slug ) :
			if ( empty( $all_articles[ $slug ] ) ) {
				continue;
			}
			$c         = $all_articles[ $slug ];
			$card_href = home_url( '/magazine/' . $slug . '/' );
			?>
			<a class="card fx" href="<?php echo esc_url( $card_href ); ?>" style="text-decoration:none;color:inherit;display:block">
				<div class="ph r45" style="background-image:url(<?php echo esc_url( $img_base . $c['img'] ); ?>);background-size:cover;background-position:center" data-ph="<?php echo esc_attr( $c['ph'] ); ?>"></div>
				<div class="meta">
					<span class="tag"><?php echo esc_html( $c['tag'] ); ?></span>
					<span class="dot"></span>
					<span><?php echo esc_html( $c['date'] ); ?></span>
					<span class="dot"></span>
					<span><?php echo esc_html( $c['read'] ); ?></span>
				</div>
				<h3><?php echo esc_html( $c['title'] ); ?></h3>
				<p><?php echo esc_html( $c['excerpt'] ); ?></p>
			</a>
		<?php endforeach; ?>
	</div>

	<div class="sec-foot fx">
		<a href="<?php echo esc_url( home_url( '/magazine/' ) ); ?>" class="btn btn-dark"><?php esc_html_e( 'Tous les articles du magazine', 'norlandascup' ); ?><span class="arr">→</span></a>
	</div>
</section>

<section class="archive" id="archive">
	<div class="wrap">
		<div class="arch-left fx">
			<span class="arch-flag"><i></i><?php esc_html_e( 'Page d\'archive · éditions 2010 à 2018', 'norlandascup' ); ?></span>
			<h2><?php esc_html_e( 'La Norlanda\'s Cup,', 'norlandascup' ); ?> <em><?php esc_html_e( 'la régate inter-entreprises de Caen', 'norlandascup' ); ?></em></h2>
			<p class="a-deck"><?php esc_html_e( 'Match Race en J/80 monotype, disputé chaque mois de mai à Caen de 2010 à 2018. Neuf éditions, 8 à 32 équipages d\'entreprises et de collectivités, 137 matchs au sommet en 2017. Ses archives restent consultables.', 'norlandascup' ); ?></p>
			<div class="a-cta">
				<a href="<?php echo esc_url( home_url( '/la-norlandas-cup/' ) ); ?>" class="btn btn-primary"><?php esc_html_e( 'Explorer l\'archive', 'norlandascup' ); ?><span class="arr">→</span></a>
				<a href="<?php echo esc_url( home_url( '/les-equipages/' ) ); ?>" class="btn btn-ghost"><?php esc_html_e( 'Les équipages', 'norlandascup' ); ?><span class="arr">→</span></a>
			</div>
		</div>
		<div class="palmares fx">
			<div class="ph-head"><span><?php esc_html_e( 'Évolution', 'norlandascup' ); ?></span><span><?php esc_html_e( 'Équipages au départ', 'norlandascup' ); ?></span></div>
			<ul>
				<?php
				// Vraies données reconstituées depuis le Wayback. Vainqueurs scratch non récupérés (souvent en PDF image non archivés).
				$editions = array(
					array( 'year' => '2018', 'label' => '9e édition', 'count' => '32' ),
					array( 'year' => '2016', 'label' => '7e édition', 'count' => '32' ),
					array( 'year' => '2015', 'label' => '6e édition', 'count' => '32' ),
					array( 'year' => '2012', 'label' => '3e édition', 'count' => '24' ),
					array( 'year' => '2010', 'label' => '1re édition', 'count' => '8' ),
				);
				foreach ( $editions as $row ) : ?>
					<li>
						<span class="yr"><?php echo esc_html( $row['year'] ); ?></span>
						<span class="win"><?php echo esc_html( $row['label'] ); ?></span>
						<span class="cls"><?php echo esc_html( $row['count'] ); ?> équipages</span>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</section>

<section class="news" id="news">
	<div class="wrap">
		<div class="news-txt fx">
			<span class="kicker"><?php esc_html_e( 'Calendrier des régates', 'norlandascup' ); ?></span>
			<h2><?php esc_html_e( 'Recevez chaque mois les rendez vous du littoral normand', 'norlandascup' ); ?></h2>
			<p><?php esc_html_e( 'Dates, lieux et niveaux des régates de la Côte de Nacre au Cotentin. Une lettre sobre, sans publicité.', 'norlandascup' ); ?></p>
		</div>
		<form class="nbox fx" action="<?php echo esc_url( home_url( '/contact/?sujet=newsletter' ) ); ?>" method="get">
			<input type="hidden" name="sujet" value="newsletter">
			<div class="row">
				<input type="email" name="email" placeholder="<?php esc_attr_e( 'Votre adresse de messagerie', 'norlandascup' ); ?>" aria-label="<?php esc_attr_e( 'Adresse de messagerie', 'norlandascup' ); ?>" required>
				<button class="btn btn-primary" type="submit"><?php esc_html_e( 'Recevoir le calendrier', 'norlandascup' ); ?><span class="arr">→</span></button>
			</div>
			<span class="fine"><?php esc_html_e( 'Désinscription en un clic. Vos données restent dans la rédaction.', 'norlandascup' ); ?></span>
		</form>
	</div>
</section>

<?php get_footer();
