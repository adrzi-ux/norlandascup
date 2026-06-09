<?php
/**
 * Template Name: Contact (formulaire uniquement)
 *
 * Assigner ce template à la page WP de slug `contact`.
 * Aucune adresse email, aucun numéro de téléphone, aucune adresse postale (standard skill cam,
 * cf. mémoire feedback_astro_vps_deploy).
 *
 * Le formulaire est rendu via CF7 ou WPForms si l'un d'eux est actif (shortcode placeholder
 * à remplacer dans l'admin). Sans plugin, un fallback HTML inerte est affiché.
 *
 * @package Norlandascup
 */
get_header();
?>

<header class="wrap page-head" style="text-align:center;max-width:720px;margin-left:auto;margin-right:auto">
	<span class="kicker"><?php esc_html_e( 'La rédaction', 'norlandascup' ); ?></span>
	<h1 style="max-width:none"><?php esc_html_e( 'Nous contacter', 'norlandascup' ); ?></h1>
	<p class="sub" style="margin-left:auto;margin-right:auto"><?php esc_html_e( 'Le magazine Norlanda\'s Cup répond exclusivement via le formulaire ci-dessous. Question éditoriale, suggestion d\'article, signalement DMCA, demande de partenariat : utilisez le sujet correspondant.', 'norlandascup' ); ?></p>
</header>

<section class="editorial">
	<div class="wrap" style="max-width:680px">
		<?php
		$sujet_get = isset( $_GET['sujet'] ) ? sanitize_text_field( wp_unslash( $_GET['sujet'] ) ) : '';
		$valid_sujets = array( 'question', 'suggestion', 'dmca', 'partenariat', 'newsletter', 'autre' );
		$selected = in_array( $sujet_get, $valid_sujets, true ) ? $sujet_get : '';

		// Si un shortcode contact est configuré (CF7/WPForms), il est inséré ici par l'admin via
		// le contenu de la page (the_content). Le bloc shortcode peut être [contact-form-7 id="X"]
		// ou [wpforms id="X"].
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				$content = get_the_content();
				if ( has_shortcode( $content, 'contact-form-7' ) || has_shortcode( $content, 'wpforms' ) ) {
					the_content();
				} else {
					// Fallback HTML inerte (pas de submit handler par défaut) ; instructions admin en commentaire.
					?>
					<form class="nbox fx" style="display:flex;flex-direction:column;gap:14px" action="#" method="post" aria-label="<?php esc_attr_e( 'Formulaire de contact', 'norlandascup' ); ?>">
						<label style="display:flex;flex-direction:column;gap:8px;font-family:var(--mono);font-size:11.5px;letter-spacing:.1em;text-transform:uppercase;color:#8a8175">
							<?php esc_html_e( 'Sujet', 'norlandascup' ); ?>
							<select name="sujet" required style="padding:14px 16px;border:1px solid var(--marine);border-radius:2px;background:var(--creme-pure);font-family:var(--sans);font-size:15px;color:var(--encre)">
								<option value=""><?php esc_html_e( 'Choisir un sujet', 'norlandascup' ); ?></option>
								<option value="question"<?php selected( $selected, 'question' ); ?>><?php esc_html_e( 'Question éditoriale', 'norlandascup' ); ?></option>
								<option value="suggestion"<?php selected( $selected, 'suggestion' ); ?>><?php esc_html_e( 'Suggestion d\'article', 'norlandascup' ); ?></option>
								<option value="dmca"<?php selected( $selected, 'dmca' ); ?>><?php esc_html_e( 'Signalement DMCA', 'norlandascup' ); ?></option>
								<option value="partenariat"<?php selected( $selected, 'partenariat' ); ?>><?php esc_html_e( 'Partenariat', 'norlandascup' ); ?></option>
								<option value="newsletter"<?php selected( $selected, 'newsletter' ); ?>><?php esc_html_e( 'Inscription à la lettre', 'norlandascup' ); ?></option>
								<option value="autre"<?php selected( $selected, 'autre' ); ?>><?php esc_html_e( 'Autre', 'norlandascup' ); ?></option>
							</select>
						</label>

						<label style="display:flex;flex-direction:column;gap:8px;font-family:var(--mono);font-size:11.5px;letter-spacing:.1em;text-transform:uppercase;color:#8a8175">
							<?php esc_html_e( 'Votre nom', 'norlandascup' ); ?>
							<input type="text" name="nom" required style="padding:14px 16px;border:1px solid var(--marine);border-radius:2px;background:var(--creme-pure);font-family:var(--sans);font-size:15px;color:var(--encre)">
						</label>

						<label style="display:flex;flex-direction:column;gap:8px;font-family:var(--mono);font-size:11.5px;letter-spacing:.1em;text-transform:uppercase;color:#8a8175">
							<?php esc_html_e( 'Votre adresse de messagerie', 'norlandascup' ); ?>
							<input type="email" name="email" required style="padding:14px 16px;border:1px solid var(--marine);border-radius:2px;background:var(--creme-pure);font-family:var(--sans);font-size:15px;color:var(--encre)">
						</label>

						<label style="display:flex;flex-direction:column;gap:8px;font-family:var(--mono);font-size:11.5px;letter-spacing:.1em;text-transform:uppercase;color:#8a8175">
							<?php esc_html_e( 'Message', 'norlandascup' ); ?>
							<textarea name="message" rows="6" required style="padding:14px 16px;border:1px solid var(--marine);border-radius:2px;background:var(--creme-pure);font-family:var(--sans);font-size:15px;color:var(--encre);resize:vertical;min-height:140px"></textarea>
						</label>

						<label style="display:flex;gap:10px;align-items:flex-start;font-family:var(--mono);font-size:11px;letter-spacing:.04em;color:#5a564c;line-height:1.5">
							<input type="checkbox" name="rgpd" required style="margin-top:3px">
							<span><?php esc_html_e( 'J\'accepte que les données saisies servent uniquement à traiter ma demande. Aucune réutilisation commerciale, aucun partage avec un tiers.', 'norlandascup' ); ?></span>
						</label>

						<button type="submit" class="btn btn-primary" style="align-self:flex-start"><?php esc_html_e( 'Envoyer le message', 'norlandascup' ); ?><span class="arr">→</span></button>

						<p style="font-family:var(--mono);font-size:10.5px;color:#8a8175;margin-top:6px"><?php esc_html_e( 'Fallback HTML actif. Pour activer le traitement, installer Contact Form 7 ou WPForms, créer un formulaire avec les mêmes champs et coller son shortcode dans le contenu de cette page.', 'norlandascup' ); ?></p>
					</form>
					<?php
				}
			endwhile;
		endif;
		?>
	</div>
</section>

<?php get_footer();
