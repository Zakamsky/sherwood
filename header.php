<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
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
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'wp_body_open' ); ?>

<div class="site parallax" id="page">

<!--    --><?php //the_ID() ?>
	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar" class="wrapper-header d-flex flex-column" itemscope itemtype="http://schema.org/WebSite">

		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

		<nav class="navbar navbar-expand-lg order-lg-last">

		<?php if ( 'container' == $container ) : ?>
			<div class="container">
		<?php endif; ?>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
					<span class="navbar-toggler-icon"></span>
				</button>

                <div id="navbarNavDropdown" class="navbar-collapse collapse" >

				<!-- The WordPress Menu goes here -->

                    <?php wp_nav_menu(
                        array(
                            'theme_location'  => 'primary',
                            'container'       => false,
    //						'container_class' => 'collapse navbar-collapse',
    //						'container_id'    => 'navbarNavDropdown',
                            'menu_class'      => 'navbar-nav mr-auto',
                            'fallback_cb'     => '',
                            'menu_id'         => 'main-menu',
                            'depth'           => 4,
                            'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
                        )
                    ); ?>
                    <ul class="navbar-nav">
                        <li class="nav-item d-lg-none">
                            <a class="nav-link text-warning" href="<?php echo $phone_num1 ?>">
                                <?php echo $phone1 ?>
                            </a>
                        </li>
                        <li class="nav-item d-lg-none">
                            <a class="nav-link text-warning" href="<?php echo $phone_num2 ?>">
                                <?php echo $phone2 ?>
                            </a>
                        </li>
                    </ul>


                    <?php get_search_form(); ?>

                    <div class="row d-md-none pt-3">
                        <div class="col-6 address small text-warning">
                            <h6 class="title"><?php the_field( 'addres_title', 5 ); ?></h6>
                            <p>
                                <?php the_field( 'city', 5 ); ?>
                            </p>
                            <p>
                                <?php the_field( 'addres', 5 ); ?>
                            </p>
                        </div>
                        <div class="col-6 address small text-warning">
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

                </div><!-- .navbar-collapse -->

			<?php if ( 'container' == $container ) : ?>
			</div><!-- .container -->
			<?php endif; ?>

		</nav><!-- .site-navigation -->

        <div class="container">
            <section class="row align-items-center">
				<?php if ( is_front_page() || is_home() ) : ?>
					<h2 class="super-title text-center text-warning col-12">
						<?php echo get_bloginfo('description'); ?>
					</h2>
				<?php endif; ?>

                <div class="col-md-4">
                    <!-- Your site title as branding in the menu -->
                    <?php if ( ! has_custom_logo() ) { ?>

						<?php if ( is_front_page() && is_home() ) : ?>

							<h1 class=""><a class="text-warning" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

						<?php else : ?>

							<a class="text-warning" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>

						<?php endif; ?>


                    <?php } else {
                        the_custom_logo();
                    } ?><!-- end custom logo -->
                </div>
                <div class="col-md-4 phones d-none d-lg-block py-4">

                    <a href="tel:+<?php echo $phone_num1 ?>" class="phones--item text-warning h4 d-block">
                        <?php echo $phone1 ?>
                    </a>

                    <a href="tel:+<?php echo $phone_num2 ?>" class="phones--item text-warning h4 d-block">
                        <?php echo $phone2 ?>
                    </a>
                </div>
                <address class="col-6 col-md-2 address text-warning d-none d-lg-block py-4">
                    <h6 class="title"><?php the_field( 'addres_title', 5 ); ?></h6>
                    <p>
                        <?php the_field( 'city', 5 ); ?>
                    </p>
                    <p>
                        <?php the_field( 'addres', 5 ); ?>
                    </p>
                </address>
                <div class="col-6 col-md-2 address text-warning d-none d-lg-block py-4">
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
            </section>
			<?php if ( is_front_page() ||  is_home()) : ?>
<!--				<div class="row justify-content-even">-->
				<div class="brand-block">
<!--					<section class="brand-block__item  border border-warning rounded">-->
<!--						<a href="https://vk.com/archery_74" class="brand-block__link d-block" >-->
<!--							<img src="https://placekitten.com/300/300" alt="" class="brand-block__img">-->
<!--							<h2 class="brand-block__title">Спортивная секция</h2>-->
<!--							<p class="brand-block__text">-->
<!--								Если Вы ищете хорошую секцию для своего ребенка или ребенок сам хочет заняться чем-то интересным - Стрельба из лука это ВЕРНЫЙ выбор!👍🏻-->
<!--							</p>-->
<!--						</a>-->
<!--					</section>-->
<!--					<section class="brand-block__item border border-warning rounded">-->
<!--						<a href="https://vk.com/archery_74" class="brand-block__link d-block" >-->
<!--							<img src="https://placekitten.com/300/300" alt="" class="brand-block__img">-->
<!--							<h2 class="brand-block__title">Спортивная секция</h2>-->
<!--							<p class="brand-block__text">-->
<!--								Если Вы ищете хорошую секцию для своего ребенка или ребенок сам хочет заняться чем-то интересным - Стрельба из лука это ВЕРНЫЙ выбор!👍🏻-->
<!--							</p>-->
<!--						</a>-->
<!--					</section>-->
<!---->
<!--					<section class="brand-block__item border border-warning rounded">-->
<!--						<a href="https://vk.com/archery_74" class="brand-block__link d-block" >-->
<!--							<img src="https://placekitten.com/300/300" alt="" class="brand-block__img">-->
<!--							<h2 class="brand-block__title">Спортивная секция</h2>-->
<!--							<p class="brand-block__text">-->
<!--								Если Вы ищете хорошую секцию для своего ребенка или ребенок сам хочет заняться чем-то интересным - Стрельба из лука это ВЕРНЫЙ выбор!👍🏻-->
<!--							</p>-->
<!--						</a>-->
<!--					</section>-->
<!--					<section class="brand-block__item border border-warning rounded">-->
<!--						<a href="https://vk.com/archery_74" class="brand-block__link d-block" >-->
<!--							<img src="https://placekitten.com/300/300" alt="" class="brand-block__img">-->
<!--							<h2 class="brand-block__title">Спортивная секция</h2>-->
<!--							<p class="brand-block__text">-->
<!--								Если Вы ищете хорошую секцию для своего ребенка или ребенок сам хочет заняться чем-то интересным - Стрельба из лука это ВЕРНЫЙ выбор!👍🏻-->
<!--							</p>-->
<!--						</a>-->
<!--					</section>-->
<!--test aqui-->
					<?php if ( have_rows( 'section-1', 'option' ) ) : ?>
						<?php while ( have_rows( 'section-1', 'option' ) ) : the_row(); ?>

							<?php $url = get_sub_field( 'url' ); ?>
							<section class="brand-block__item <?php if ( get_sub_field( 'main' ) ) echo 'brand-block__item--main'; ?> border border-warning rounded">
								<a href="<?php if ( $url ) echo $url; ?>" class="brand-block__link" >
									<?php $img = get_sub_field( 'img' ); ?>
									<?php if ( $img ) { ?>

										<?php echo wp_get_attachment_image( $img, 'medium', false, ['class' => 'brand-block__img'] ); ?>
									<?php } ?>
									<!--									<img src="https://placekitten.com/300/300" alt="" class="brand-block__img">-->
									<h2 class="brand-block__title">
										<?php the_sub_field( 'title' ); ?>
									</h2>
									<p class="brand-block__text">
										<?php the_sub_field( 'description' ); ?>
									</p>
								</a>
							</section>
						<?php endwhile; ?>
					<?php endif; ?>
					<?php if ( have_rows( 'section-2', 'option' ) ) : ?>
						<?php while ( have_rows( 'section-2', 'option' ) ) : the_row(); ?>

							<?php $url = get_sub_field( 'url' ); ?>
							<section class="brand-block__item <?php if ( get_sub_field( 'main' ) ) echo 'brand-block__item--main'; ?> border border-warning rounded">
								<a href="<?php if ( $url ) echo $url; ?>" class="brand-block__link" >
									<?php $img = get_sub_field( 'img' ); ?>
									<?php if ( $img ) { ?>

										<?php echo wp_get_attachment_image( $img, 'medium', false, ['class' => 'brand-block__img'] ); ?>
									<?php } ?>
									<!--									<img src="https://placekitten.com/300/300" alt="" class="brand-block__img">-->
									<h2 class="brand-block__title">
										<?php the_sub_field( 'title' ); ?>
									</h2>
									<p class="brand-block__text">
										<?php the_sub_field( 'description' ); ?>
									</p>
								</a>
							</section>
						<?php endwhile; ?>
					<?php endif; ?>
					<?php if ( have_rows( 'section-3', 'option' ) ) : ?>
						<?php while ( have_rows( 'section-3', 'option' ) ) : the_row(); ?>

							<?php $url = get_sub_field( 'url' ); ?>
							<section class="brand-block__item <?php if ( get_sub_field( 'main' ) ) echo 'brand-block__item--main'; ?> border border-warning rounded">
								<a href="<?php if ( $url ) echo $url; ?>" class="brand-block__link" >
									<?php $img = get_sub_field( 'img' ); ?>
									<?php if ( $img ) { ?>

										<?php echo wp_get_attachment_image( $img, 'medium', false, ['class' => 'brand-block__img'] ); ?>
									<?php } ?>
									<!--									<img src="https://placekitten.com/300/300" alt="" class="brand-block__img">-->
									<h2 class="brand-block__title">
										<?php the_sub_field( 'title' ); ?>
									</h2>
									<p class="brand-block__text">
										<?php the_sub_field( 'description' ); ?>
									</p>
								</a>
							</section>
						<?php endwhile; ?>
					<?php endif; ?>
					<?php if ( have_rows( 'section-4', 'option' ) ) : ?>
						<?php while ( have_rows( 'section-4', 'option' ) ) : the_row(); ?>

							<?php $url = get_sub_field( 'url' ); ?>
							<section class="brand-block__item <?php if ( get_sub_field( 'main' ) ) echo 'brand-block__item--main'; ?> border border-warning rounded">
								<a href="<?php if ( $url ) echo $url; ?>" class="brand-block__link" >
									<?php $img = get_sub_field( 'img' ); ?>
									<?php if ( $img ) { ?>

										<?php echo wp_get_attachment_image( $img, 'medium', false, ['class' => 'brand-block__img'] ); ?>
									<?php } ?>
									<!--									<img src="https://placekitten.com/300/300" alt="" class="brand-block__img">-->
									<h2 class="brand-block__title">
										<?php the_sub_field( 'title' ); ?>
									</h2>
									<p class="brand-block__text">
										<?php the_sub_field( 'description' ); ?>
									</p>
								</a>
							</section>
						<?php endwhile; ?>
					<?php endif; ?>
					<?php if ( have_rows( 'section-5', 'option' ) ) : ?>
						<?php while ( have_rows( 'section-5', 'option' ) ) : the_row(); ?>

							<?php $url = get_sub_field( 'url' ); ?>
							<section class="brand-block__item <?php if ( get_sub_field( 'main' ) ) echo 'brand-block__item--main'; ?> border border-warning rounded">
								<a href="<?php if ( $url ) echo $url; ?>" class="brand-block__link" >
									<?php $img = get_sub_field( 'img' ); ?>
									<?php if ( $img ) { ?>

										<?php echo wp_get_attachment_image( $img, 'medium', false, ['class' => 'brand-block__img'] ); ?>
									<?php } ?>
									<!--									<img src="https://placekitten.com/300/300" alt="" class="brand-block__img">-->
									<h2 class="brand-block__title">
										<?php the_sub_field( 'title' ); ?>
									</h2>
									<p class="brand-block__text">
										<?php the_sub_field( 'description' ); ?>
									</p>
								</a>
							</section>
						<?php endwhile; ?>
					<?php endif; ?>
<!--test aqui-->
				</div>
			<?php endif; ?>
        </div>


	</div><!-- #wrapper-navbar end -->
