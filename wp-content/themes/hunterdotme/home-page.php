<?php
 /* Template Name: Home page */
 ?>
<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<body>

	<ul id="menu">
		<a href="#Me"><li class="Me" data-menuanchor="Me">Me</li></a>
		<a  href="#Portfolio"><li class="Portfolio"data-menuanchor="Portfolio">Portfolio</li></a>
		<a  href="#Contact"><li class="Contact" data-menuanchor="Contact">Contact</li></a>
	</ul>

	<div id="fullpage">
	<?php $first_bg_image = get_field('first_bg_image');
		  $second_bg_image = get_field('second_bg_image');
		  $third_bg_image = get_field('third_bg_image'); ?>
		<div class="section" id="Me-page" style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('<?php echo $first_bg_image; ?>');">
				<div class="inner-me-page row">

						<div class="col-xs-12 col-md-6">
							<?php

							$image = get_field('main_image');

							if( !empty($image) ): ?>

							<div id="headshot-container" style="background-image: url('<?php echo get_site_url(); ?>/wp-content/uploads/2017/09/jazzy-90s-solo-cup-design-t-shirt-2338.jpg');"> <img class="img-responsive" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /></div>

							<?php endif; ?>

						</div>
						<div class="col-xs-12 col-md-6">
							<div id="intro-container">
							 <h1>hunter kempton</h1>
							    <p><?php echo the_content(); ?></p>
                  <a href="https://github.com/hunter-k/" target="_blank"><i class="fa fa-github social" aria-hidden="true"></i></a>
                  <span class="social">&nbsp;&nbsp;</span>
                  <a href="https://www.linkedin.com/in/hunterskempton/" target="_blank"><i class="fa fa-linkedin social" aria-hidden="true"></i></a>
							</div>
						</div>

			</div>
		</div>


		<div class="section" id="Portfolio-page" style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('<?php echo $second_bg_image; ?>');">
			<?php
				$projects = new WP_Query(
						array(
							'post_type' => 'portfolio_item',
							'order_by' => 'date',
							'order' => 'ASC'
							)
					);
				while ($projects->have_posts()) : $projects->the_post();


					$featured_image = get_field('main_image');
					$short_text = get_field('short_text');
					$second_image = get_field('third_image');
					$third_image = get_field('third_image');

			 ?>
					<div class="slide" data-anchor="<?php echo get_the_title(); ?>">
						<div class="row">
							<div class="project col-md-8 col-md-offset-2">
								<h1><?php echo get_the_title(); ?></h1>
								<span><img width="200" height="40" class="main-project-image img-responsive" src="<?php echo $featured_image["sizes"]["large"]; ?>"></span>
								<p><?php echo $short_text; ?></p>
							</div>
						</div>
					</div>
			<?php endwhile; ?>
	</div>

	<div class="section" id="Contact-page" style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('<?php echo $third_bg_image; ?>'">

				<div class="row">
					<div class="col-md-4 col-md-offset-4 contact-form"
						<h1 style="text-align: center;">Contact Me</h1>
						<?php echo do_shortcode( '[contact-form-7 id="23" title="Contact form 1"]' ); ?>
					</div>
				</div>
	</div>

<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
