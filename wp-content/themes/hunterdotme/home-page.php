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

		<div class="section" id="Me-page">
			<div class="row">
				<div class="col-xs-12">
					<div class="col-xs-12 col-md-6">
						<?php 

							$image = get_field('main_image');

						if( !empty($image) ): ?>

						<div id="headshot-container"> <img class="img-responsive" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /></div>

						<?php endif; ?>
						
					</div>
					<div class="col-xs-12 col-md-6">
						<div id="intro-container"> <h1>hunter kempton</h1></div>
						<?php echo the_content(); ?>
					</div>
				</div>
			</div>
		</div>


		<div class="section" id="Portfolio-page">
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

	<div class="section" id="Contact-page">
		
			<h1 style="text-align: center;">Contact Me</h1>
				
				<div class="row">
					<div class="col-md-10 col-md-offset-1 contact-form"
						<?php echo do_shortcode( '[contact-form-7 id="23" title="Contact form 1"]' ); ?>
					</div>
				</div>
			
			
	</div>




<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>