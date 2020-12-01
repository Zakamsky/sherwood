<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );

$phone1 = get_field( 'telefon', 5 );
$phone2 = get_field( 'telefon_2', 5 );
$pattern = "/[^0-9]/";
$replacement = "";
$phone_num1 = preg_replace($pattern, $replacement, $phone1);
$phone_num2 = preg_replace($pattern, $replacement, $phone2);
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper bg-dark" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">
		<div class="row">
			<div class="col-lg-2 d-none d-lg-block">
				<!-- Your site title as branding in the menu -->
				<?php if ( has_custom_logo() ) {
					the_custom_logo();
				} ?><!-- end custom logo -->
			</div>
			<div class="col-md-6 phones py-4">

				<a href="tel:+<?php echo $phone_num1 ?>" class="phones--item text-warning h4 d-block">
					<?php echo $phone1 ?>
				</a>

				<a href="tel:+<?php echo $phone_num2 ?>" class="phones--item text-warning h4 d-block">
					<?php echo $phone2 ?>
				</a>
			</div>
			<address class="col-6 col-md-3 col-lg-2 address text-warning py-4">
				<h6 class="title"><?php the_field( 'addres_title', 5 ); ?></h6>
				<p>
					<?php the_field( 'city', 5 ); ?>
				</p>
				<p>
					<?php the_field( 'addres', 5 ); ?>
				</p>
			</address>
			<div class="col-6 col-md-3 col-lg-2 address text-warning text-right text-md-left py-4">
				<h6 class="title">
					<?php the_field( 'hours_title', 5 ); ?>
				</h6>
				<p>
					<?php the_field( 'hours', 5 ); ?>
				</p>
				<p>
					<?php the_field( 'break_title', 5 ); ?>
					</br>
					<?php the_field( 'break', 5 ); ?>
				</p>
			</div>
		</div>

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer d-flex justify-content-between" id="colophon">

					<div class="site-info">

                        <div class="site-info-copyright">
                            <a class="text-warning" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url">
                                <span class="lead"><?php echo get_bloginfo('name'); ?></span> &copy; 2016 - <?php echo date('Y'); ?>
                            </a>
                        </div>
                        <div class="site-info--description text-warning">
                            <?php echo get_bloginfo('description'); ?>
                        </div>

					</div><!-- .site-info -->
                    <div class="developer-copyright text-primary mt-auto">
                        Разработка и сопровождение - Елькин Алексей 2019
                    </div>

				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->


<div class="parallax--inner_deep"></div>
<div class="parallax--inner"></div>
<div class="parallax--background__left d-none d-md-block"></div>
<div class="parallax--background__right d-none d-md-block"></div>
<div class="parallax--foreground_left d-none d-lg-block"></div>
<div class="parallax--foreground_right d-none d-lg-block"></div>

</div><!-- .parallax & #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

