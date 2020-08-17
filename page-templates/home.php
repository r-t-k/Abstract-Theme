<?php
/* Template Name: Home */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();


?>
<div class="uk-width-1-1">
	<div uk-grid>
		<div id="left" class="uk-width-2-3@l uk-height-viewport">
			<div class="uk-flex uk-flex-left">
				<h1 class="title"><span>KYSER.DEV</span></h1>
			</div>
			<hr class="uk-divider-icon color-black">
			<div class="uk-flex uk-flex-left left-content">
				<div class="uk-width-2-3@l">
					<h1 class="uk-heading-large lead">Building sites for the modern era.</h1>
					<div class="uk-width-1-1 uk-flex first-about">
						<div class="uk-card uk-card-default uk-card-body uk-width-1-1 about-1 about-card">
							<div class="uk-card-header about-1-header">
								<h3 class="uk-card-title">{{card1title}}</h3>
							</div>
							<div class="uk-article">{{card1 type=html editor=wysiwyg}}</div>
						</div>
					</div>
					<div class="uk-width-1-1 uk-flex">
						<div class="uk-card uk-card-default uk-card-body uk-width-1-1 about-2 about-card">
							<div class="uk-card-header about-2-header">
								<h3 class="uk-card-title">{{card2title}}</h3>
							</div>
							<div class="uk-article">{{card2 type=html editor=wysiwyg}}</div>
						</div>
					</div>
					<!--<div class="uk-width-1-1 uk-flex">
						&lt;!&ndash;<form class="uk-width-1-1">
							<fieldset class="uk-fieldset">
								<legend class="uk-legend">Project Cost Estimator</legend>
								<div class="uk-margin">
                                  <label>Type</label>
									<select class="uk-select">
										<option>Website</option>
										<option>Application</option>
									</select>
								</div>
								<div class="uk-margin">
									<textarea class="uk-textarea" rows="5" placeholder="Textarea"></textarea>
								</div>
								<div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
									<label><input class="uk-radio" type="radio" name="radio2" checked> A</label>
									<label><input class="uk-radio" type="radio" name="radio2"> B</label>
								</div>

								<div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
									<label><input class="uk-checkbox" type="checkbox" checked> A</label>
									<label><input class="uk-checkbox" type="checkbox"> B</label>
								</div>

								<div class="uk-margin">
									<input class="uk-range" type="range" value="2" min="0" max="10" step="0.1">
								</div>

							</fieldset>
						</form>&ndash;&gt;
					</div>-->
				</div>

			</div>

		</div>
		<div id="right" class="uk-width-1-3@l  uk-height-viewport">
			<div class="uk-flex uk-flex-center uk-height-1-1 right-content" uk-grid>
				<!--<div class="uk-width-1-1">
				</div>-->


				<?php
				while ( have_rows( 'services_repeater' ) ) :
					the_row();
					$title = get_sub_field( 'srv_title' );
					//$desc_rpt = get_sub_field( 'srv_desc' );
					?>
					<dl class="uk-description-list uk-width-1-3@l uk-width-1-2 ">
						<dt><?= $title ?></dt>
						<?php
						while ( have_rows( 'desc_repeater' ) ) :
							the_row();
							$desc = get_sub_field( 'srv-desc' );
							?>
							<dd><?= $desc ?></dd>
						<?php endwhile; ?>
					</dl>
				<?php endwhile; ?>
				<!--form-->
				<div class="uk-width-1-1">
					<span class="uk-legend">Contact</span>
					{{#form contact}}
					{{name}}
					{{message long=true}}
					{{/form}}
					<!--<form class="uk-form-width-large">
						<fieldset class="uk-fieldset">
							<legend class="uk-legend">Contact</legend>
							<div class="uk-margin">
								<input class="uk-input" type="text" placeholder="Name">
							</div>
							<div class="uk-margin">
								<input class="uk-input" type="email" placeholder="Email">
							</div>
							<div class="uk-margin">
								<textarea class="uk-textarea" rows="5" placeholder="Message"></textarea>
							</div>
							<button class="uk-button uk-button-default uk-width-1-1">Submit</button>
						</fieldset>
					</form>-->
				</div>
				<!--Stripe Modal-->
				<div class="uk-width-1-1">
					<a class="uk-button uk-button-default " href="#modal-center" uk-toggle>Stripe Compliance</a>
					<div id="modal-center" class="uk-flex-top" uk-modal>
						<div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

							<button class="uk-modal-close-default" type="button" uk-close></button>
							{{stripe type=html editor=wysiwyg}}

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php get_footer(); ?>
