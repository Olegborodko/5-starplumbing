<?php
$header_addess          = plumbio_get_options( 'header_addess' );
$header_email           = plumbio_get_options( 'header_email' );
$header_hours           = plumbio_get_options( 'header_hours' );
$header_phone_title     = plumbio_get_options( 'header_phone_title' );
$header_phone_number    = plumbio_get_options( 'header_phone_number' );
$header_social_title    = plumbio_get_options( 'header_social_title' );
$header_social_facebook = plumbio_get_options( 'header_social_facebook' );
$header_social_insta    = plumbio_get_options( 'header_social_insta' );
$header_social_twitter  = plumbio_get_options( 'header_social_twitter' );
$header_social_linkedin = plumbio_get_options( 'header_social_linkedin' );
$header_social_skype    = plumbio_get_options( 'header_social_skype' );
$header_button_text     = plumbio_get_options( 'header_button_text' );
$header_button_url      = plumbio_get_options( 'header_button_url' );
$header_sidebar_onoff   = plumbio_get_options( 'header_sidebar_onoff' );
$header_cart_onoff      = plumbio_get_options( 'header_cart_onoff' );
$header_top_bar_social  = plumbio_get_options( 'header_top_bar_social' );
if ( $header_sidebar_onoff ) {
	$class = '';
} else {
	$class = 'pr-20';
}
?>
<header class="tt-header lock-padding" id="js-header">
	<div class="row-header-info">
		<div class="tt-header-holder">
			<?php if ( $header_hours || $header_addess || $header_email ) { ?>
			<div class="tt-col tt-col__wide">
				<div class="h-info-list">
					<address class="tt-visible-xl"><?php echo esc_html( $header_addess ); ?></address>
					<address class="tt-visible-xl"><?php echo wp_kses( $header_email, 'code_contxt' ); ?></address>
					<address>
						<i class="icon">
							<svg viewBox="-21 -47 682.66669 682"><path d="m552.011719-1.332031h-464.023438c-48.515625 0-87.988281 39.472656-87.988281 87.988281v283.972656c0 48.421875 39.300781 87.824219 87.675781 87.988282v128.871093l185.183594-128.859375h279.152344c48.515625 0 87.988281-39.472656 87.988281-88v-283.972656c0-48.515625-39.472656-87.988281-87.988281-87.988281zm-83.308594 330.011719h-297.40625v-37.5h297.40625zm0-80h-297.40625v-37.5h297.40625zm0-80h-297.40625v-37.5h297.40625zm0 0"/></svg>
						</i> <?php echo esc_html( $header_hours ); ?>
					</address>
				</div>
			</div>
			<?php } ?>
			<?php if ( $header_social_twitter || $header_social_facebook || $header_social_linkedin || $header_social_skype ) { ?>
			<div class="tt-col">
				<div class="h-icon">
					<?php if ( $header_social_title ) { ?>
					<div class="h-icon__title"><?php echo esc_html( $header_social_title ); ?></div>
					<?php } ?>
					<ul class="h-icon__list">
					<?php if ( $header_social_twitter ) { ?>
						<li><a href="<?php echo esc_url( $header_social_twitter ); ?>">
							<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
							<g>
								<g>
									<path d="M512,97.248c-19.04,8.352-39.328,13.888-60.48,16.576c21.76-12.992,38.368-33.408,46.176-58.016
										c-20.288,12.096-42.688,20.64-66.56,25.408C411.872,60.704,384.416,48,354.464,48c-58.112,0-104.896,47.168-104.896,104.992
										c0,8.32,0.704,16.32,2.432,23.936c-87.264-4.256-164.48-46.08-216.352-109.792c-9.056,15.712-14.368,33.696-14.368,53.056
										c0,36.352,18.72,68.576,46.624,87.232c-16.864-0.32-33.408-5.216-47.424-12.928c0,0.32,0,0.736,0,1.152
										c0,51.008,36.384,93.376,84.096,103.136c-8.544,2.336-17.856,3.456-27.52,3.456c-6.72,0-13.504-0.384-19.872-1.792
										c13.6,41.568,52.192,72.128,98.08,73.12c-35.712,27.936-81.056,44.768-130.144,44.768c-8.608,0-16.864-0.384-25.12-1.44
										C46.496,446.88,101.6,464,161.024,464c193.152,0,298.752-160,298.752-298.688c0-4.64-0.16-9.12-0.384-13.568
										C480.224,136.96,497.728,118.496,512,97.248z"/>
								</g>
							</g>
							<g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
						</svg>
						</a></li>
						<?php } ?>
						<?php if ( $header_social_facebook ) { ?>
						<li><a href="<?php echo esc_url( $header_social_facebook ); ?>">
							<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								viewBox="0 0 96.124 96.123" style="enable-background:new 0 0 96.124 96.123;"
								 xml:space="preserve">
								<g>
								<path d="M72.089,0.02L59.624,0C45.62,0,36.57,9.285,36.57,23.656v10.907H24.037c-1.083,0-1.96,0.878-1.96,1.961v15.803
									c0,1.083,0.878,1.96,1.96,1.96h12.533v39.876c0,1.083,0.877,1.96,1.96,1.96h16.352c1.083,0,1.96-0.878,1.96-1.96V54.287h14.654
									c1.083,0,1.96-0.877,1.96-1.96l0.006-15.803c0-0.52-0.207-1.018-0.574-1.386c-0.367-0.368-0.867-0.575-1.387-0.575H56.842v-9.246
									c0-4.444,1.059-6.7,6.848-6.7l8.397-0.003c1.082,0,1.959-0.878,1.959-1.96V1.98C74.046,0.899,73.17,0.022,72.089,0.02z"/>
								</g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
							</svg>
						</a></li>
						<?php } ?>
						<?php if ( $header_social_linkedin ) { ?>
						<li><a href="<?php echo esc_url( $header_social_linkedin ); ?>">
							<svg id="Bold" enable-background="new 0 0 24 24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m23.994 24v-.001h.006v-8.802c0-4.306-.927-7.623-5.961-7.623-2.42 0-4.044 1.328-4.707 2.587h-.07v-2.185h-4.773v16.023h4.97v-7.934c0-2.089.396-4.109 2.983-4.109 2.549 0 2.587 2.384 2.587 4.243v7.801z"/><path d="m.396 7.977h4.976v16.023h-4.976z"/><path d="m2.882 0c-1.591 0-2.882 1.291-2.882 2.882s1.291 2.909 2.882 2.909 2.882-1.318 2.882-2.909c-.001-1.591-1.292-2.882-2.882-2.882z"/></svg>
						</a></li>
						<?php } ?>
						<?php if ( $header_social_skype ) { ?>
						<li><a href="<?php echo esc_url( $header_social_skype ); ?>">
							<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
								<g>
								<g>
									<path d="M497.28,310.336c3.712-16.672,5.632-33.952,5.632-51.68c0-132.96-109.312-240.768-244.192-240.768
										c-14.208,0-28.16,1.216-41.76,3.52C195.136,7.872,169.312,0,141.632,0C63.392,0,0,62.496,0,139.648
										c0,25.76,7.104,49.856,19.456,70.624c-3.232,15.616-4.96,31.808-4.96,48.384c0,132.992,109.344,240.8,244.192,240.8
										c15.296,0,30.24-1.408,44.736-4.032C323.392,505.984,346.176,512,370.4,512c78.208,0,141.6-62.528,141.6-139.616
										C512,350.08,506.688,329.056,497.28,310.336z M383.968,373.728c-11.296,15.776-27.968,28.256-49.632,37.088
										c-21.408,8.8-47.04,13.28-76.288,13.28c-35.072,0-64.48-6.08-87.456-18.112c-16.416-8.736-29.92-20.544-40.192-35.2
										c-10.4-14.72-15.616-29.344-15.616-43.488c0-8.8,3.424-16.448,10.176-22.688c6.688-6.24,15.264-9.344,25.504-9.344
										c8.384,0,15.616,2.464,21.504,7.36c5.6,4.704,10.432,11.68,14.304,20.608c4.32,9.792,9.024,18.048,13.984,24.48
										c4.832,6.304,11.712,11.552,20.512,15.68c8.864,4.096,20.8,6.24,35.456,6.24c20.192,0,36.768-4.256,49.184-12.64
										c12.192-8.16,18.08-18.016,18.08-30.048c0-9.472-3.104-16.96-9.408-22.816c-6.656-6.144-15.424-10.912-26.048-14.208
										c-11.104-3.392-26.176-7.104-44.8-10.944c-25.376-5.344-46.912-11.68-64-18.88c-17.504-7.36-31.648-17.536-41.952-30.272
										c-10.496-12.96-15.808-29.184-15.808-48.256c0-18.176,5.568-34.56,16.576-48.704c10.912-14.048,26.848-25.024,47.424-32.48
										c20.256-7.392,44.352-11.136,71.648-11.136c21.792,0,40.96,2.496,56.992,7.424c16.096,4.928,29.664,11.584,40.32,19.808
										c10.752,8.32,18.752,17.12,23.744,26.336c5.056,9.28,7.648,18.528,7.648,27.456c0,8.608-3.36,16.448-10.016,23.232
										c-6.72,6.88-15.168,10.336-25.088,10.336c-9.024,0-16.128-2.208-21.024-6.464c-4.576-4-9.344-10.24-14.592-19.136
										c-6.08-11.392-13.472-20.384-21.92-26.752c-8.224-6.176-21.92-9.248-40.8-9.248c-17.472,0-31.744,3.456-42.304,10.304
										c-10.176,6.56-15.136,14.112-15.136,23.072c0,5.472,1.6,10.048,4.896,13.984c3.456,4.224,8.352,7.84,14.56,10.912
										c6.4,3.168,13.024,5.728,19.648,7.52c6.784,1.856,18.144,4.64,33.792,8.192c19.776,4.16,37.92,8.864,53.984,13.952
										c16.288,5.088,30.304,11.392,41.824,18.784c11.68,7.52,20.928,17.12,27.52,28.64c6.592,11.616,9.92,25.856,9.92,42.432
										C401.056,339.84,395.296,357.92,383.968,373.728z"/>
								</g>
								</g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
							</svg>
						</a></li>
						<?php } ?>
						<?php if ( $header_social_insta ) { ?>
						<li><a href="<?php echo esc_url( $header_social_insta ); ?>">
							<svg height="511pt" viewBox="0 0 511 511.9" width="511pt" xmlns="http://www.w3.org/2000/svg"><path d="m510.949219 150.5c-1.199219-27.199219-5.597657-45.898438-11.898438-62.101562-6.5-17.199219-16.5-32.597657-29.601562-45.398438-12.800781-13-28.300781-23.101562-45.300781-29.5-16.296876-6.300781-34.898438-10.699219-62.097657-11.898438-27.402343-1.300781-36.101562-1.601562-105.601562-1.601562s-78.199219.300781-105.5 1.5c-27.199219 1.199219-45.898438 5.601562-62.097657 11.898438-17.203124 6.5-32.601562 16.5-45.402343 29.601562-13 12.800781-23.097657 28.300781-29.5 45.300781-6.300781 16.300781-10.699219 34.898438-11.898438 62.097657-1.300781 27.402343-1.601562 36.101562-1.601562 105.601562s.300781 78.199219 1.5 105.5c1.199219 27.199219 5.601562 45.898438 11.902343 62.101562 6.5 17.199219 16.597657 32.597657 29.597657 45.398438 12.800781 13 28.300781 23.101562 45.300781 29.5 16.300781 6.300781 34.898438 10.699219 62.101562 11.898438 27.296876 1.203124 36 1.5 105.5 1.5s78.199219-.296876 105.5-1.5c27.199219-1.199219 45.898438-5.597657 62.097657-11.898438 34.402343-13.300781 61.601562-40.5 74.902343-74.898438 6.296876-16.300781 10.699219-34.902343 11.898438-62.101562 1.199219-27.300781 1.5-36 1.5-105.5s-.101562-78.199219-1.300781-105.5zm-46.097657 209c-1.101562 25-5.300781 38.5-8.800781 47.5-8.601562 22.300781-26.300781 40-48.601562 48.601562-9 3.5-22.597657 7.699219-47.5 8.796876-27 1.203124-35.097657 1.5-103.398438 1.5s-76.5-.296876-103.402343-1.5c-25-1.097657-38.5-5.296876-47.5-8.796876-11.097657-4.101562-21.199219-10.601562-29.398438-19.101562-8.5-8.300781-15-18.300781-19.101562-29.398438-3.5-9-7.699219-22.601562-8.796876-47.5-1.203124-27-1.5-35.101562-1.5-103.402343s.296876-76.5 1.5-103.398438c1.097657-25 5.296876-38.5 8.796876-47.5 4.101562-11.101562 10.601562-21.199219 19.203124-29.402343 8.296876-8.5 18.296876-15 29.398438-19.097657 9-3.5 22.601562-7.699219 47.5-8.800781 27-1.199219 35.101562-1.5 103.398438-1.5 68.402343 0 76.5.300781 103.402343 1.5 25 1.101562 38.5 5.300781 47.5 8.800781 11.097657 4.097657 21.199219 10.597657 29.398438 19.097657 8.5 8.300781 15 18.300781 19.101562 29.402343 3.5 9 7.699219 22.597657 8.800781 47.5 1.199219 27 1.5 35.097657 1.5 103.398438s-.300781 76.300781-1.5 103.300781zm0 0"/><path d="m256.449219 124.5c-72.597657 0-131.5 58.898438-131.5 131.5s58.902343 131.5 131.5 131.5c72.601562 0 131.5-58.898438 131.5-131.5s-58.898438-131.5-131.5-131.5zm0 216.800781c-47.097657 0-85.300781-38.199219-85.300781-85.300781s38.203124-85.300781 85.300781-85.300781c47.101562 0 85.300781 38.199219 85.300781 85.300781s-38.199219 85.300781-85.300781 85.300781zm0 0"/><path d="m423.851562 119.300781c0 16.953125-13.746093 30.699219-30.703124 30.699219-16.953126 0-30.699219-13.746094-30.699219-30.699219 0-16.957031 13.746093-30.699219 30.699219-30.699219 16.957031 0 30.703124 13.742188 30.703124 30.699219zm0 0"/></svg>
						</a></li>
							<?php if ( isset( $header_top_bar_social ) && ! empty( $header_top_bar_social ) ) : ?> 
								<?php foreach ( $header_top_bar_social as $social ) { ?>
								<li>
									<a href="<?php echo esc_url( $social['url'] ); ?>">
										<img src="<?php echo esc_url( $social['image'] ); ?>" alt="<?php echo esc_attr( $social['title'] ); ?>"/>
									</a>
								</li>
							<?php } ?>
						<?php endif; ?>
						<?php } ?>
					</ul>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
	<div class="row-header-layout" id="js-init-sticky">
		<div class="tt-header-holder">
			<div class="tt-col tt-obj-logo">
				<?php do_action( 'plumbio_header_logo' ); ?>
			</div>
			<div class="tt-col tt-col__wide tt-col__wrapper tt-col__corner">
				<div class="tt-col tt-col__wide">
					<?php do_action( 'plumbio_header_menu' ); ?>
				</div>
			</div>
			<div class="tt-col tt-col__wrapper tt-col__objects <?php echo esc_attr( $class ); ?>">
			<?php if ( $header_phone_number ) { ?>
				<div class="tt-col__item">
					<div class="h-infobox">
						<span class="tt-text"><?php echo esc_html( $header_phone_title ); ?></span>
						<address>
							<a href="tel:<?php echo esc_attr( $header_phone_number ); ?>">
							<i>
								<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								viewBox="0 0 401.998 401.998" style="enable-background:new 0 0 401.998 401.998;"
								 xml:space="preserve">
							<g>
								<path d="M401.129,311.475c-1.137-3.426-8.371-8.473-21.697-15.129c-3.61-2.098-8.754-4.949-15.41-8.566
									c-6.662-3.617-12.709-6.95-18.13-9.996c-5.432-3.045-10.521-5.995-15.276-8.846c-0.76-0.571-3.139-2.234-7.136-5
									c-4.001-2.758-7.375-4.805-10.14-6.14c-2.759-1.327-5.473-1.995-8.138-1.995c-3.806,0-8.56,2.714-14.268,8.135
									c-5.708,5.428-10.944,11.324-15.7,17.706c-4.757,6.379-9.802,12.275-15.126,17.7c-5.332,5.427-9.713,8.138-13.135,8.138
									c-1.718,0-3.86-0.479-6.427-1.424c-2.566-0.951-4.518-1.766-5.858-2.423c-1.328-0.671-3.607-1.999-6.845-4.004
									c-3.244-1.999-5.048-3.094-5.428-3.285c-26.075-14.469-48.438-31.029-67.093-49.676c-18.649-18.658-35.211-41.019-49.676-67.097
									c-0.19-0.381-1.287-2.19-3.284-5.424c-2-3.237-3.333-5.518-3.999-6.854c-0.666-1.331-1.475-3.283-2.425-5.852
									s-1.427-4.709-1.427-6.424c0-3.424,2.713-7.804,8.138-13.134c5.424-5.327,11.326-10.373,17.7-15.128
									c6.379-4.755,12.275-9.991,17.701-15.699c5.424-5.711,8.136-10.467,8.136-14.273c0-2.663-0.666-5.378-1.997-8.137
									c-1.332-2.765-3.378-6.139-6.139-10.138c-2.762-3.997-4.427-6.374-4.999-7.139c-2.852-4.755-5.799-9.846-8.848-15.271
									c-3.049-5.424-6.377-11.47-9.995-18.131c-3.615-6.658-6.468-11.799-8.564-15.415C98.986,9.233,93.943,1.997,90.516,0.859
									C89.183,0.288,87.183,0,84.521,0c-5.142,0-11.85,0.95-20.129,2.856c-8.282,1.903-14.799,3.899-19.558,5.996
									c-9.517,3.995-19.604,15.605-30.264,34.826C4.863,61.566,0.01,79.271,0.01,96.78c0,5.135,0.333,10.131,0.999,14.989
									c0.666,4.853,1.856,10.326,3.571,16.418c1.712,6.09,3.093,10.614,4.137,13.56c1.045,2.948,2.996,8.229,5.852,15.845
									c2.852,7.614,4.567,12.275,5.138,13.988c6.661,18.654,14.56,35.307,23.695,49.964c15.03,24.362,35.541,49.539,61.521,75.521
									c25.981,25.98,51.153,46.49,75.517,61.526c14.655,9.134,31.314,17.032,49.965,23.698c1.714,0.568,6.375,2.279,13.986,5.141
									c7.614,2.854,12.897,4.805,15.845,5.852c2.949,1.048,7.474,2.43,13.559,4.145c6.098,1.715,11.566,2.905,16.419,3.576
									c4.856,0.657,9.853,0.996,14.989,0.996c17.508,0,35.214-4.856,53.105-14.562c19.219-10.656,30.826-20.745,34.823-30.269
									c2.102-4.754,4.093-11.273,5.996-19.555c1.909-8.278,2.857-14.985,2.857-20.126C401.99,314.814,401.703,312.819,401.129,311.475z"
									/>
							</g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
							</svg>
							</i>
							<?php echo esc_html( $header_phone_number ); ?>
							</a>
						</address>
					</div>
				</div>
			<?php } ?>
				<?php if ( $header_button_text ) { ?>
				<div class="tt-col__item">
					<?php if ( $header_button_url ) { ?>
					<a href="<?php echo esc_url( $header_button_url ); ?>" class="tt-btn"><span><?php echo esc_html( $header_button_text ); ?></span></a>
					<?php } else { ?>
						<div class="tt-btn" data-modal="schedule" data-modal-size="modal__size-lg"><span><?php echo esc_html( $header_button_text ); ?></span></div>
					<?php } ?>
				</div>
				<?php } ?>
				<?php if ( $header_cart_onoff ) { ?>
					<?php
					if ( class_exists( 'WooCommerce' ) ) :
						$items_count = WC()->cart->get_cart_contents_count();
						?>
						<div class="tt-cart__btn">
							<a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'cart' ) ) ); ?>"><i class="icon-cart"></i>
							<?php if ( $items_count > 0 ) : ?>
								<div class="tt-obj__badge"><?php echo esc_html( $items_count ); ?></div>
							<?php endif; ?>
							</a>
						</div>
				<?php endif; ?>
				<?php } ?>
				<?php if ( $header_sidebar_onoff ) { ?>
				<div class="tt-col__item">
					<div class="tt-popup" id="js-popup" data-ajax-check="true">
						<div class="tt-popup__toggle" aria-hidden="true">
							<span class="tt-icon"></span>
						</div>
						<div class="tt-popup__dropdown"></div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</header>