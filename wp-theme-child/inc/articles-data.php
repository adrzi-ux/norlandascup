<?php
/**
 * Articles data — source unique pour les cards (home, magazine) et la page article (page-article.php).
 *
 * Chaque entrée correspond à une page WP enfant de /magazine/ (slug exposé en URL `/magazine/{slug}/`).
 * Le template `page-article.php` lit ces données via le slug courant.
 *
 * @package Norlandascup
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'norlandascup_articles' ) ) :
/**
 * Catalogue complet des articles magazine.
 *
 * @return array<string, array<string, mixed>>
 */
function norlandascup_articles() {
	static $articles = null;
	if ( null !== $articles ) {
		return $articles;
	}

	$articles = array(

		// ============= HOME LEAD =============
		'trophee-manche-raz-barfleur' => array(
			'rub'       => 'regates',
			'tag'       => 'Régates',
			'title'     => 'Trophée de la Manche, la flotte IRC joue la marée pour franchir le raz de Barfleur',
			'excerpt'   => "Sur un parcours côtier de 38 milles, les équipages ont composé avec un courant de trois nœuds et une brise de suroît instable. Récit d'une bordée décisive entre Saint Vaast et Cherbourg.",
			'img'       => 'home-lead-trophee.webp',
			'ph'        => "Voilier au près serré sous spi, embruns, ratio 3:2",
			'date'      => '06.06.2026',
			'date_long' => '6 juin 2026',
			'read'      => '8 min',
			'body'      => "<p class=\"lede\">Le parcours côtier de la deuxième manche du Trophée de la Manche reliait Saint Vaast la Hougue à Cherbourg, soit 38 milles le long du Cotentin. Vingt huit voiliers IRC ont coupé la ligne de départ dans une brise de suroît annoncée fraîche, déjà tournante avant la première bouée.</p>
<h2>Un raz négocié sur la pointe des pieds</h2>
<p>La difficulté du parcours tient au raz de Barfleur. Le courant atteint trois nœuds en vive eau, contre une mer formée de cap d'ouest. Les équipages disposaient d'une fenêtre courte, le passage devait se faire à l'étale ou à mi marée descendante pour ne pas être bloqué par un contre courant côtier.</p>
<p>Les premiers groupes ont choisi la route au plus près de la côte, profitant d'une zone de courant moins marqué. Les bateaux moins manœuvrants ont préféré contourner large, perdant en distance mais gardant de la vitesse.</p>
<h2>Une brise tournante qui sépare la flotte</h2>
<p>À mi parcours, une bascule de quinze degrés vers l'ouest a redistribué les positions. Les tactiques ont dû relancer une bordée vers le large, plusieurs équipages ont été contraints à un empannage tendu sous spi. Une rupture de drisse signalée sur l'un des bateaux a obligé un retrait.</p>
<h2>Arrivée à Cherbourg dans un grain</h2>
<p>Le passage de ligne devant la grande rade s'est joué dans un grain de pluie froide. Le vainqueur en temps réel franchit en quatre heures et vingt minutes, soit une moyenne supérieure à neuf nœuds. Le classement IRC en temps compensé sera publié en fin de semaine.</p>",
		),

		// ============= HOME CARDS (6) =============
		'winches-self-tailing-comparatif' => array(
			'rub'       => 'materiel',
			'tag'       => 'Matériel',
			'title'     => 'Winches self tailing, cinq modèles passés au banc en conditions de gros temps',
			'excerpt'   => "Couple, rendement et entretien, comparatif des références adaptées aux croiseurs côtiers de 9 à 12 mètres.",
			'img'       => 'home-card-winch.webp',
			'ph'        => "Cabestan et winch, gros plan cordage, 4:5",
			'date'      => '04.06.2026',
			'date_long' => '4 juin 2026',
			'read'      => '5 min',
			'body'      => "<p class=\"lede\">Le winch self tailing tient la corde à un détail près. Au près serré sous trente nœuds, l'équipier au piano apprécie de pouvoir border sans tenir l'étalingure. Cinq modèles ont été comparés sur un même croiseur de dix mètres.</p>
<h2>Un protocole de test simple</h2>
<p>Chaque winch a été monté en remplacement du modèle d'origine, sur le côté tribord du cockpit. Trois bordées de quarante minutes, vent réel de vingt cinq à trente cinq nœuds, route au près serré. Mesure du couple à la manivelle, de l'usure du cordage, du temps moyen pour border le génois sur vingt centimètres.</p>
<h2>Le rendement, premier critère</h2>
<p>Les écarts mesurés sont nets sur les modèles à deux vitesses contre trois vitesses. Sur les trois vitesses, le passage en grande démultiplication accepte des charges supérieures sans à coups. Les cordages testés en quatorze millimètres polyester ont accroché correctement sur tous les modèles, sauf un dont la spire du dessus laisse glisser au delà de quatre cents kilos.</p>
<h2>L'entretien fait la différence à long terme</h2>
<p>Tous les fabricants documentent un démontage annuel. Deux modèles imposent un outil spécifique, les trois autres se démontent à la clé Allen. L'écart de prix entre le plus simple et le plus complet du panel est de quatre cents euros, à fonction équivalente.</p>",
		),

		'honfleur-mouiller-avant-port' => array(
			'rub'       => 'spots',
			'tag'       => 'Spots',
			'title'     => "Honfleur, mouiller dans l'avant port, accès, marnage et règles du chenal",
			'excerpt'   => "Guide pratique pour entrer et sortir de l'estuaire de la Seine sans se faire piéger par le jusant.",
			'img'       => 'home-card-honfleur.webp',
			'ph'        => "Port de Honfleur à marée basse, 4:5",
			'date'      => '02.06.2026',
			'date_long' => '2 juin 2026',
			'read'      => '7 min',
			'body'      => "<p class=\"lede\">Honfleur tient en équilibre entre la Seine et la mer. L'avant port reste accessible aux voiliers de croisière, à condition de lire l'horaire de marée avec précision et de connaître le règlement du chenal.</p>
<h2>Une fenêtre d'accès dictée par la marée</h2>
<p>Le port de Honfleur est protégé par une porte qui s'ouvre une heure et demie avant la pleine mer et se referme une demi heure après. Hors créneau, le bassin reste à flot mais ne se franchit pas. Pour un voilier remontant l'estuaire, l'arrivée doit donc se programmer à l'avance.</p>
<h2>Le chenal de la Seine, un trafic à respecter</h2>
<p>L'entrée se fait par le chenal de Rouen, partagé avec le trafic commercial. La règle est claire, les cargos remontent à dix nœuds, ne se déroutent pas. Le voilier doit rester en marge du chenal balisé, à l'extérieur des bouées rouges en remontant.</p>
<h2>Le piège du jusant</h2>
<p>Sortir de Honfleur sur la fin du jusant expose à un courant de quatre nœuds sortant. Mieux vaut programmer la sortie en début de descendante pour profiter du courant, ou attendre l'étale de basse mer. Une erreur d'une heure peut transformer la sortie en bataille de plusieurs heures contre le courant.</p>",
		),

		'skipper-cote-nacre-dix-saisons' => array(
			'rub'       => 'portraits',
			'tag'       => 'Portraits',
			'title'     => "Skipper de la Côte de Nacre, dix saisons à régater entre Ouistreham et Courseulles",
			'excerpt'   => "Rencontre avec une figure du circuit régional, de la planche à la course au large en double.",
			'img'       => 'home-card-skipper.webp',
			'ph'        => "Portrait skipper mains gantées à la barre, 4:5",
			'date'      => '30.05.2026',
			'date_long' => '30 mai 2026',
			'read'      => '9 min',
			'body'      => "<p class=\"lede\">À cinquante deux ans, il barre depuis trente cinq saisons. La régate côtière l'a pris à dix sept ans, sur un dériveur de club. Aujourd'hui, il arme un croiseur de neuf mètres et court le circuit de la Côte de Nacre, de Ouistreham à Courseulles.</p>
<h2>La planche pour comprendre le vent</h2>
<p>Avant le voilier habitable, il y a eu la planche à voile. Quatre saisons sur la plage de Riva Bella, du débutant en glisse jusqu'au longue distance. La planche, dit il, apprend à lire le vent dans l'eau bien avant de le sentir sur le visage. Une formation qu'il considère décisive pour la suite.</p>
<h2>Le passage au croiseur</h2>
<p>L'achat d'un First trente, en copropriété avec deux amis, marque le tournant. Régates de club, puis circuit régional. Il découvre la tactique de groupe, le pilote automatique en navigation longue, la lecture de la carte au crayon.</p>
<h2>La course au large en double</h2>
<p>Depuis cinq saisons, il s'est tourné vers le double. Course autour de Belle Île, traversée de la Manche en course. Le double impose une économie de la fatigue, des quarts négociés bateau par bateau, une gestion du sommeil bien plus stricte qu'en équipage complet. Il y trouve une exigence qui le rapproche du grand large sans en avoir le coût.</p>",
		),

		'lire-grain-suroit-baie-seine' => array(
			'rub'       => 'meteo',
			'tag'       => 'Météo',
			'title'     => "Lire un grain de suroît, les signes du ciel avant la bascule sur la baie de Seine",
			'excerpt'   => "Nuages, houle croisée, chute de pression. Méthode pour anticiper les rafales sous la côte.",
			'img'       => 'home-card-etretat.webp',
			'ph'        => "Ciel de grain au large d'Étretat, 4:5",
			'date'      => '28.05.2026',
			'date_long' => '28 mai 2026',
			'read'      => '4 min',
			'body'      => "<p class=\"lede\">Le grain de suroît arrive vite et fort sur la baie de Seine. Anticiper, c'est gagner le temps de réduire la toile avant la bascule. Trois signaux à surveiller, lisibles à l'œil nu depuis le pont.</p>
<h2>La ligne de nuages, premier indice</h2>
<p>Une bande de cumulus alignée au suroît, en formation dense et plate à la base, sombre dessus, annonce un grain à passer en moins de vingt minutes. La distance d'observation utile dépasse rarement dix milles, soit une demi heure de marge selon la vitesse du grain.</p>
<h2>La houle croisée trahit le rotor</h2>
<p>Sur la baie de Seine, un léger croisement entre la houle de fond d'ouest et un train court de suroît signale l'arrivée d'un secteur tournant. Le vent va monter de dix à quinze nœuds, puis basculer de trente à cinquante degrés. C'est le moment de prendre un ris ou de changer de voile d'avant.</p>
<h2>La chute du baromètre, signal de dernière minute</h2>
<p>Un baromètre qui perd deux hectopascals en une heure indique un passage actif. Si la chute coïncide avec la ligne de nuages observée, on est dans l'heure du grain. Préparer le pont, fermer les hublots, briefer l'équipage sur les manœuvres prévues.</p>",
		),

		'garde-robe-voiles-manche' => array(
			'rub'       => 'materiel',
			'tag'       => 'Matériel',
			'title'     => "Garde robe de voiles pour la Manche, choisir son jeu entre laize lourde et tissus membranés",
			'excerpt'   => "Ce que change la mer formée de la Manche sur la durabilité et la tenue de forme des voiles.",
			'img'       => 'home-card-voilerie.webp',
			'ph'        => "Voilerie, coupe de grand voile à plat, 4:5",
			'date'      => '25.05.2026',
			'date_long' => '25 mai 2026',
			'read'      => '6 min',
			'body'      => "<p class=\"lede\">La mer formée de la Manche fatigue la voile plus vite que la Méditerranée. Le choix du tissu pèse sur la durabilité, la tenue de forme et le budget. Comparaison entre la laize lourde traditionnelle et la membrane moderne.</p>
<h2>Laize lourde, le choix de la durabilité</h2>
<p>La grand voile en dacron neuf cents grammes au mètre carré reste la référence pour un programme côtier intensif. Elle accepte sans broncher cent à cent trente sorties par saison, supporte les replis humides, tolère les erreurs de manœuvre. La forme s'affaiblit après trois saisons, sans jamais devenir inutilisable.</p>
<h2>Membrane, la tenue de forme</h2>
<p>Les voiles membrane, polymère renforcé de fibres aramide, gardent leur profil de coupe d'origine sur deux saisons d'usage intensif. Au près serré, l'écart de cap mesuré atteint trois à quatre degrés en faveur de la membrane sur la même bordée. C'est précieux en régate, moins critique en croisière.</p>
<h2>Le coût comparé</h2>
<p>Le surcoût initial d'une membrane oscille entre quarante et soixante pour cent. La durée de vie utile se compte différemment, en heures de navigation cumulées. Pour un programme régate sérieux, la membrane se justifie. Pour une croisière côtière, la laize lourde reste plus rationnelle.</p>",
		),

		'ouverture-saison-deauville' => array(
			'rub'       => 'regates',
			'tag'       => 'Régates',
			'title'     => "Ouverture de saison à Deauville, trente bateaux sur la ligne pour le rallye côtier",
			'excerpt'   => "Classements, conditions et premiers enseignements d'un printemps venté sur la Côte Fleurie.",
			'img'       => 'home-card-deauville.webp',
			'ph'        => "Pontons de Deauville, mâts alignés au petit matin, 4:5",
			'date'      => '22.05.2026',
			'date_long' => '22 mai 2026',
			'read'      => '5 min',
			'body'      => "<p class=\"lede\">Trente voiliers se sont alignés sur la baie de Deauville pour l'ouverture officielle de la saison régionale. Conditions soutenues, vent d'ouest à vingt deux nœuds, mer formée mais navigable. Une journée test pour la flotte côtière de Normandie.</p>
<h2>Un parcours triangulaire de douze milles</h2>
<p>Le comité de course a tracé un triangle entre la pointe de Deauville, une bouée mouillée au large et un retour côtier. Douze milles, deux tours pour les croiseurs de moins de neuf mètres, trois tours pour la classe IRC. Le vent stable a permis un déroulement sans modification de parcours.</p>
<h2>La classe Croiseur emmenée par un J/97</h2>
<p>En croiseur côtier, un J/97 s'est imposé en temps compensé avec quatre minutes d'avance. Le second, un Sun Fast 30, a souffert d'une avarie de barre franche au troisième empannage. La troisième place revient à un voilier de Courseulles, déjà placé sur les régates de l'an passé.</p>
<h2>Premiers enseignements pour la saison</h2>
<p>Les conditions de la journée annoncent un printemps sportif. Les programmes de régate sont au complet sur la baie de Seine. Le calendrier des manches qualificatives pour le championnat régional reprend dès la première semaine de juin.</p>",
		),

		// ============= MAGAZINE FEATURE =============
		'trophee-manche-2026-saint-vaast' => array(
			'rub'       => 'regates',
			'tag'       => 'Régates',
			'title'     => "Le Trophée Manche 2026 démarre à Saint Vaast",
			'excerpt'   => "La première manche de la saison s'élance de Saint Vaast la Hougue. Parcours côtier, marée de vives eaux et flotte IRC attendue à une trentaine d'engagements.",
			'img'       => 'mag-feature-trophee.webp',
			'ph'        => "Départ du Trophée Manche à Saint Vaast la Hougue, 16:9",
			'date'      => '07.06.2026',
			'date_long' => '7 juin 2026',
			'read'      => '8 min',
			'body'      => "<p class=\"lede\">Le Trophée Manche, circuit IRC régional du Cotentin et de la baie de Seine, a lancé sa saison 2026 depuis Saint Vaast la Hougue. La première manche, prévue sur trois jours, doit emmener la flotte jusqu'à Cherbourg avec retour par le raz de Barfleur.</p>
<h2>Une trentaine d'engagements confirmés</h2>
<p>La société des régates de Cherbourg, organisatrice, annonce vingt huit voiliers engagés, soit deux unités de plus qu'en 2025. Les classes IRC un à trois sont représentées, avec une forte proportion de croiseurs de neuf à onze mètres. Plusieurs équipages de la Côte de Nacre et de la baie de Seine ont rejoint la flotte du Cotentin pour cette manche d'ouverture.</p>
<h2>Vives eaux et parcours côtier</h2>
<p>Le coefficient de marée annoncé culmine à cent quatre le jour du départ. Le parcours longe la côte est du Cotentin, contourne la pointe de Barfleur et termine devant la grande rade de Cherbourg. La règle de course impose un passage extérieur des cailloux de Saint Vaast, sans coupe possible.</p>
<h2>Les enjeux de la première manche</h2>
<p>Le classement général du Trophée Manche se joue sur cinq manches au total, retenues sur six courues. La première compte donc, les écarts ne se rattrapent qu'avec une régularité sur toute la saison. La météo annoncée pour le week end donne du vent d'ouest, force quatre à cinq, sans grosse perturbation.</p>",
		),

		// ============= MAGAZINE CARDS (11) =============
		'tour-belle-ile-depart-caen' => array(
			'rub'       => 'regates',
			'tag'       => 'Régates',
			'title'     => "Tour de Belle Île, départ de Caen confirmé",
			'excerpt'   => "Le convoyage groupé partira de Caen Ouistreham. Inscriptions ouvertes pour les croiseurs côtiers de la façade normande.",
			'img'       => 'mag-card-tour-belle-ile.webp',
			'ph'        => "Convoyage au portant, flotte de croiseurs, 4:5",
			'date'      => '05.06.2026',
			'date_long' => '5 juin 2026',
			'read'      => '4 min',
			'body'      => "<p class=\"lede\">L'édition 2026 du Tour de Belle Île, organisée par la société nautique de La Trinité, ouvre la porte à un convoyage groupé au départ de Caen. Une vingtaine de croiseurs normands sont attendus sur ce trajet de descente, prévu mi juillet.</p>
<h2>Un convoyage cadré</h2>
<p>Le départ collectif depuis Ouistreham est confirmé pour le huit juillet à la sortie d'écluse. Le convoi traverse la Manche en deux étapes, passage par Cherbourg puis l'Aber Wrach avant la descente sur la Bretagne sud. La logistique d'assistance reste à la charge de chaque bateau, mais une veille radio commune est prévue toutes les quatre heures.</p>
<h2>Une régate qui mobilise mille voiliers</h2>
<p>Le Tour de Belle Île reste l'une des plus grosses régates en flotte ouverte d'Europe, avec environ neuf cent cinquante bateaux engagés ces dernières années. Le format, un seul tour de l'île en temps compensé, attire des croiseurs côtiers comme des bateaux de course pure.</p>
<h2>Les inscriptions restent ouvertes</h2>
<p>Les engagements pour le convoyage normand sont à déposer auprès de la société des régates de Caen avant le vingt juin. La participation au Tour lui même est gérée directement par l'organisateur breton, sans lien obligatoire avec le convoyage.</p>",
		),

		'port-en-bessin-baie-seine' => array(
			'rub'       => 'spots',
			'tag'       => 'Spots',
			'title'     => "Port en Bessin, l'autre départ de la baie de Seine",
			'excerpt'   => "Accès, marée et abris du port. Ce qu'il faut savoir pour rallier la zone de course depuis l'ouest du Calvados.",
			'img'       => 'mag-card-portenbessin.webp',
			'ph'        => "Port en Bessin, criée et bassin à flot, 4:5",
			'date'      => '03.06.2026',
			'date_long' => '3 juin 2026',
			'read'      => '6 min',
			'body'      => "<p class=\"lede\">Port en Bessin reste discret sur la carte des régates de Normandie. Pourtant, le port offre un point de départ utile pour rallier les zones de course de la baie de Seine, à l'écart des routes commerciales du chenal de Rouen.</p>
<h2>Un port à deux bassins</h2>
<p>L'entrée se fait par un chenal balisé court, accessible deux heures avant et deux heures après la pleine mer. Le bassin extérieur, à flot, peut recevoir des voiliers de croisière côtière. Le bassin intérieur, à porte, accueille principalement la flotte de pêche et reste fermé aux unités de passage.</p>
<h2>Un abri d'opportunité</h2>
<p>Pour un voilier descendant le long de la côte d'ouest en est, Port en Bessin offre un repli intéressant si la météo se gâte. La distance à la zone de course du Trophée Manche reste raisonnable, dix à douze milles selon la position de la ligne de départ.</p>
<h2>La criée, vie du port</h2>
<p>Au delà de l'usage nautique, le port reste actif côté pêche. La criée matinale, animée six jours sur sept, donne au port son caractère. Une halte d'une nuit permet de prendre la mesure du lieu, entre activité professionnelle et plaisance discrète.</p>",
		),

		'cherbourg-dix-mouillages' => array(
			'rub'       => 'spots',
			'tag'       => 'Spots',
			'title'     => "Cherbourg, dix mouillages à connaître avant la saison",
			'excerpt'   => "De la grande rade aux criques du Cotentin, repères de mouillage et conditions de tenue par vent d'ouest.",
			'img'       => 'mag-card-cherbourg.webp',
			'ph'        => "Grande rade de Cherbourg vue du large, 4:5",
			'date'      => '31.05.2026',
			'date_long' => '31 mai 2026',
			'read'      => '7 min',
			'body'      => "<p class=\"lede\">La grande rade de Cherbourg et les côtes voisines du Cotentin offrent une variété de mouillages utile à connaître avant la saison. Voici dix repères, sélectionnés pour leur abri par vent d'ouest dominant.</p>
<h2>Dans la grande rade</h2>
<p>L'anse Saint Anne, au sud est de la rade, offre une bonne tenue par fond de sable et de vase. Trois mètres au plus bas sur quinze mètres de chaîne suffisent. L'anse du Becquet, plus au nord, est utile par vent de sud mais inconfortable sur les coups de nord ouest.</p>
<h2>À l'est de la rade</h2>
<p>Le mouillage de Querqueville, à proximité du port, accueille des voiliers de croisière en escale courte. La tenue est correcte, à condition de mouiller au delà de la zone des bouées blanches. Plus loin, l'anse de Sciotot reste accessible par temps maniable.</p>
<h2>Les criques de la côte ouest</h2>
<p>Au cap de la Hague, plusieurs criques offrent un abri de circonstance. La baie d'Écalgrain est l'une des plus utilisées, fond de sable, abritée du nord ouest. Attention au courant fort dans le raz Blanchard tout proche, prévoir une marge de sécurité pour la sortie au moteur.</p>",
		),

		'voiles-avant-tissu-cousu-membrane' => array(
			'rub'       => 'materiel',
			'tag'       => 'Matériel',
			'title'     => "Voiles d'avant, le débat du tissu cousu contre la membrane",
			'excerpt'   => "Durabilité, tenue de forme et budget. Comparaison des deux familles de tissus pour la mer formée de la Manche.",
			'img'       => 'mag-card-genois.webp',
			'ph'        => "Génois en cours de réglage au près, 4:5",
			'date'      => '29.05.2026',
			'date_long' => '29 mai 2026',
			'read'      => '6 min',
			'body'      => "<p class=\"lede\">Le choix d'un nouveau génois met chaque skipper devant la même question. Tissu cousu traditionnel ou membrane moderne, le débat ne se tranche pas en quelques chiffres. Voici les paramètres qui pèsent vraiment sur la décision.</p>
<h2>Le tissu cousu, robustesse éprouvée</h2>
<p>Le génois en dacron lourd, panneaux cousus en triradial, reste la référence pour la croisière côtière. Durée de vie utile estimée à six à huit saisons sur un programme normal, avec une perte progressive de forme. Le tissu accepte sans dommage les rangements humides et les manipulations à l'avant.</p>
<h2>La membrane, performance et exigence</h2>
<p>La membrane offre une stabilité de forme bien supérieure. Sur les premiers trois mille milles, la voile garde son profil d'origine. Au delà, le polymère commence à fatiguer, surtout dans les zones de pli répétés. Une membrane mal repliée perd en performance plus vite qu'un dacron mal traité.</p>
<h2>Le bon choix selon le programme</h2>
<p>Pour un usage régate quasi exclusif, la membrane se justifie. Pour la croisière côtière mixte, le dacron reste rationnel. La régate occasionnelle se traite très correctement en dacron de bonne qualité, avec un coupe travaillée.</p>",
		),

		'compas-tactiques-1500-euros' => array(
			'rub'       => 'materiel',
			'tag'       => 'Matériel',
			'title'     => "Compas tactiques sous 1500 euros, le tour des modèles",
			'excerpt'   => "Lecture, fixation et fiabilité. Cinq compas de pont passés en revue pour la régate côtière.",
			'img'       => 'mag-card-compas.webp',
			'ph'        => "Compas de pont, gros plan instrument, 4:5",
			'date'      => '27.05.2026',
			'date_long' => '27 mai 2026',
			'read'      => '5 min',
			'body'      => "<p class=\"lede\">Le compas tactique reste un instrument décisif en régate côtière. Lecture immédiate, fiabilité, fixation soignée. Le marché propose plusieurs modèles sous mille cinq cents euros, voici un tour des références utiles.</p>
<h2>Lecture, le critère premier</h2>
<p>Un bon compas tactique doit se lire en moins d'une seconde, depuis la barre comme depuis le piano. Les afficheurs à grande aiguille, lisibles à trois mètres, gardent l'avantage sur les modèles numériques par mauvais temps. Le rétroéclairage reste indispensable pour les régates de fin d'après midi.</p>
<h2>Fixation, ne pas sous estimer</h2>
<p>La fixation murale, sur cloison de cockpit, permet une lecture binoculaire correcte. La fixation sur étambot, classique en croisière, ne convient pas à la régate. Plusieurs modèles testés acceptent les deux configurations, c'est un plus.</p>
<h2>Fiabilité au long cours</h2>
<p>Les compas étanches IP67 résistent sans problème à un programme côtier intensif. Trois des cinq modèles testés ont parcouru plus de quatre saisons sans entretien autre qu'un nettoyage à l'eau douce après les sorties. La compensation magnétique reste à refaire tous les deux ans sur le bateau.</p>",
		),

		'lire-vent-ouest-cote-nacre' => array(
			'rub'       => 'meteo',
			'tag'       => 'Météo',
			'title'     => "Lire le vent d'ouest sur la Côte de Nacre",
			'excerpt'   => "Renforcement de brise thermique et effet de côte. Méthode pour anticiper les bascules entre Courseulles et Ouistreham.",
			'img'       => 'mag-card-ciel-ouest.webp',
			'ph'        => "Ciel d'ouest sur la Côte de Nacre, 4:5",
			'date'      => '24.05.2026',
			'date_long' => '24 mai 2026',
			'read'      => '4 min',
			'body'      => "<p class=\"lede\">Le vent d'ouest, dominant sur la Côte de Nacre, ne souffle pas de la même façon à Courseulles et à Ouistreham. Effet de côte, brise thermique, bascule de fin de journée. Quelques règles utiles pour le régatier local.</p>
<h2>Le matin, vent d'origine synoptique</h2>
<p>Jusqu'à dix heures environ, le vent reflète la situation synoptique. À cap d'ouest, la pression atmosphérique commande directement, l'effet de côte reste limité. C'est la fenêtre la plus stable pour une régate longue distance.</p>
<h2>Midi, la brise thermique se lève</h2>
<p>Entre midi et quinze heures, l'écart de température entre la mer froide et la terre chaude génère une brise thermique de nord ouest. Elle se superpose au flux synoptique, peut renforcer ou tourner selon la composante d'origine. À Courseulles, la bascule observée tourne en moyenne de quinze à vingt degrés vers la droite.</p>
<h2>Fin d'après midi, bascule sur Ouistreham</h2>
<p>Sur la zone est de la Côte de Nacre, la bascule de seize heures se prolonge plus tard, jusqu'à dix sept heures. Le vent revient progressivement à l'ouest pur quand la thermique faiblit. Pour finir la régate, prévoir une route qui anticipe ce retour.</p>",
		),

		'maree-tourne-tactiques' => array(
			'rub'       => 'meteo',
			'tag'       => 'Météo',
			'title'     => "Quand la marée tourne, les tactiques aussi",
			'excerpt'   => "Courant de jusant contre vent établi. Comment recaler son parcours côtier au moment de la renverse.",
			'img'       => 'mag-card-maree.webp',
			'ph'        => "Courant de marée sur un caillou balisé, 4:5",
			'date'      => '22.05.2026',
			'date_long' => '22 mai 2026',
			'read'      => '5 min',
			'body'      => "<p class=\"lede\">La renverse de marée modifie le rapport entre vent et courant, donc la cap optimal à tenir. Sur un parcours côtier de plusieurs heures, le tactique doit anticiper la transition pour ne pas se laisser surprendre.</p>
<h2>Avant la renverse, lire la direction prévue</h2>
<p>L'horaire de l'étale, donné par les annuaires, marque le repère théorique. Sur le terrain, l'étale s'observe d'abord près des cailloux balisés où le courant s'effiloche en premier. Vingt à trente minutes avant l'étale annoncée, le débit perd déjà en force.</p>
<h2>Pendant l'étale, recaler le tracé</h2>
<p>Pendant l'étale, le vent reprend le dessus. Une route qui exploitait le courant en bordée doit se rejouer. C'est le bon moment pour empanner si l'on était bloqué sur une bordée défavorable. Les écarts de classement se font ici, sur dix à quinze minutes critiques.</p>
<h2>Après la renverse, jouer le courant inverse</h2>
<p>Une fois le courant établi dans le sens opposé, les zones de courant faible changent. Si la bordée précédente longeait la côte pour profiter du courant portant, il faut maintenant chercher le contre courant côtier ou s'éloigner au large. Lire la carte des courants devient prioritaire.</p>",
		),

		'antoine-gouville-vingt-ans-mer' => array(
			'rub'       => 'portraits',
			'tag'       => 'Portraits',
			'title'     => "Antoine de Gouville, vingt ans de mer entre Caen et le Havre",
			'excerpt'   => "Du dériveur au croiseur, le parcours d'un régatier régulier des plans d'eau de la baie de Seine.",
			'img'       => 'mag-card-portrait-barreur.webp',
			'ph'        => "Portrait barreur à la godille, 4:5",
			'date'      => '20.05.2026',
			'date_long' => '20 mai 2026',
			'read'      => '9 min',
			'body'      => "<p class=\"lede\">Antoine de Gouville barre depuis vingt ans la baie de Seine. Du dériveur des débuts au croiseur côtier d'aujourd'hui, son parcours raconte une fidélité au plan d'eau autant qu'une progression technique régulière.</p>
<h2>Les dériveurs de Cabourg</h2>
<p>L'école de voile de Cabourg, années deux mille, marque le point de départ. Optimist, puis Laser. Quatre saisons en compétition régionale, jamais loin du haut du tableau mais sans prétention nationale. Le plaisir tactique du dériveur, dit il, lui sert encore aujourd'hui.</p>
<h2>Le passage au croiseur</h2>
<p>Achat d'un Romanée six cinquante en copropriété à vingt cinq ans, premières régates côtières sous IRC à vingt sept. Antoine raconte les premières années comme une école de la mer, plus que de la course. Apprendre à régler le bateau, comprendre la voile, écouter l'équipage.</p>
<h2>Une régularité comme signature</h2>
<p>Sur le circuit du Trophée Manche, Antoine de Gouville figure dans les dix premiers presque chaque saison. Sa marque, ne jamais tenter le coup tactique risqué. Il préfère lire les autres et ajuster en conséquence. Une école d'équipier autant qu'une école de barreur.</p>",
		),

		'equipieres-trophee-manche' => array(
			'rub'       => 'portraits',
			'tag'       => 'Portraits',
			'title'     => "Les équipières du Trophée Manche",
			'excerpt'   => "Elles arment plusieurs bateaux de la flotte. Rencontre avec des équipières engagées sur le circuit normand.",
			'img'       => 'mag-card-equipiere.webp',
			'ph'        => "Équipière au rappel sous le vent, 4:5",
			'date'      => '17.05.2026',
			'date_long' => '17 mai 2026',
			'read'      => '7 min',
			'body'      => "<p class=\"lede\">Sur la flotte du Trophée Manche, près d'un équipage sur trois compte au moins une équipière régulière. Numéros un, piano, tacticienne. Le circuit régional s'est ouvert au mixte, sans discours, sans fanfare. Portrait de plusieurs d'entre elles.</p>
<h2>Numéro un, poste de force et de précision</h2>
<p>Au pied du mât, le numéro un gère les changements de voile d'avant. Sur un J/97, l'envoi du spi asymétrique demande coordination et timing. Deux équipières du circuit normand tiennent ce poste depuis cinq saisons. La force ne suffit pas, le geste fait tout.</p>
<h2>Piano, le poste qui orchestre</h2>
<p>Au piano, l'équipier gère les drisses, les écoutes secondaires, les réglages de cunningham. Une équipière de Caen tient ce poste sur un croiseur côtier depuis trois saisons, après six ans en dériveur. Le piano demande de la lecture, de la régularité, du calme dans la manœuvre.</p>
<h2>Une présence qui ne fait plus question</h2>
<p>Les équipières interrogées disent toutes la même chose. Le mixte sur le bateau ne se discute plus, le poste se prend sur la compétence. Ce qui reste à construire, c'est la formation et l'accès aux postes de skipper, encore largement masculin sur le circuit IRC normand.</p>",
		),

		'calendrier-regates-cotieres-2026' => array(
			'rub'       => 'regates',
			'tag'       => 'Régates',
			'title'     => "Saison 2026, le calendrier des régates côtières normandes",
			'excerpt'   => "Dates, lieux et niveaux des épreuves du Cotentin à la Côte Fleurie. Le programme de l'été à l'eau.",
			'img'       => 'mag-card-tableau-course.webp',
			'ph'        => "Tableau officiel de course au club, 4:5",
			'date'      => '15.05.2026',
			'date_long' => '15 mai 2026',
			'read'      => '3 min',
			'body'      => "<p class=\"lede\">La saison régate côtière de Normandie démarre fin mai et court jusqu'au début octobre. Le calendrier compte une trentaine d'épreuves significatives, ouvertes aux croiseurs et habitables. Tour d'horizon des rendez vous à inscrire à l'agenda.</p>
<h2>Mai à juillet, montée en puissance</h2>
<p>L'ouverture officielle se joue à Deauville, fin mai. La première manche du Trophée Manche s'élance de Saint Vaast à la mi juin. Les Régates de la Côte de Nacre, organisées à Ouistreham, occupent le dernier week end de juin. Juillet voit le Tour de la baie de Seine.</p>
<h2>Août, les classiques régionales</h2>
<p>Le Trophée d'arrière saison à Port en Bessin se court mi août, format court mais ouvert à tous les niveaux. La Coupe de Caen la Mer, organisée par le Caen Yacht Club, se tient début août. Une vingtaine de bateaux y sont attendus.</p>
<h2>Septembre, manches de classement</h2>
<p>Le mois de septembre concentre les manches de classement IRC. Les écarts de la saison se ferment, plusieurs équipages choisissent de courir trois manches sur cinq pour finaliser leur score. La saison s'achève traditionnellement par un rallye amical entre Cherbourg et Deauville début octobre.</p>",
		),

		'ouistreham-franchir-ecluse' => array(
			'rub'       => 'spots',
			'tag'       => 'Spots',
			'title'     => "Ouistreham, franchir l'écluse un jour de course",
			'excerpt'   => "Horaires de bassin, sas et signaux. Organiser sa sortie vers la zone de course sans manquer son départ.",
			'img'       => 'mag-card-ouistreham.webp',
			'ph'        => "Écluse de Ouistreham, sas ouvert, 4:5",
			'date'      => '13.05.2026',
			'date_long' => '13 mai 2026',
			'read'      => '5 min',
			'body'      => "<p class=\"lede\">L'écluse de Ouistreham reste la porte d'entrée et de sortie obligatoire pour la flotte de Caen et du canal. Un jour de régate, mal gérer la fenêtre d'écluse peut coûter le départ. Voici comment caler la sortie.</p>
<h2>Connaître les horaires de bassin</h2>
<p>L'écluse de Ouistreham ouvre selon un horaire connu à l'avance, accordé à la marée et au trafic commercial. Trois ouvertures par marée en général, espacées d'une heure. La capitainerie publie le programme la veille, à consulter avant le briefing équipage.</p>
<h2>Anticiper l'attente</h2>
<p>Un jour de régate, plusieurs voiliers peuvent se présenter en même temps. Prévoir d'arriver vingt minutes avant l'ouverture, mouiller au ponton d'attente côté Caen. Une fois l'éclusée commencée, le sas peut accueillir une dizaine de voiliers selon le tonnage.</p>
<h2>Le signal sonore et lumineux</h2>
<p>Le feu vert autorise l'entrée dans le sas. Un feu rouge fixe signale la fermeture des portes, ne pas tenter l'entrée. Une corne de brume du capitaine du sas peut signaler une situation particulière. Garder une veille radio sur le canal VHF dédié pour les annonces.</p>",
		),

	);

	return $articles;
}
endif;

if ( ! function_exists( 'norlandascup_article_by_slug' ) ) :
/**
 * Récupérer un article par son slug.
 *
 * @param string $slug Slug de la page WP courante.
 * @return array<string, mixed>|null
 */
function norlandascup_article_by_slug( $slug ) {
	$articles = norlandascup_articles();
	return isset( $articles[ $slug ] ) ? $articles[ $slug ] : null;
}
endif;

if ( ! function_exists( 'norlandascup_articles_by_rubrique' ) ) :
/**
 * Filtrer les articles par rubrique (ou tous si 'all').
 *
 * @param string $rubrique 'all' ou slug rubrique.
 * @return array<string, array<string, mixed>>
 */
function norlandascup_articles_by_rubrique( $rubrique ) {
	$articles = norlandascup_articles();
	if ( 'all' === $rubrique || empty( $rubrique ) ) {
		return $articles;
	}
	return array_filter( $articles, function ( $a ) use ( $rubrique ) {
		return isset( $a['rub'] ) && $a['rub'] === $rubrique;
	} );
}
endif;
