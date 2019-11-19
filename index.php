<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php if ( is_front_page() && is_home() ) : ?>
	<?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>

<div class="wrapper" id="index-wrapper">

	<div class="scroll_wrap <?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row scroll_row">

            <!--<div class="col-12">
                <ul class="advantages nav flex-column flex-sm-row nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="btn btn-success nav-link active" id="first-tab" data-toggle="tab" href="#first" role="tab"
                           aria-controls="first" aria-selected="true">
                            first
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-success nav-link" id="second-tab" data-toggle="tab" href="#second" role="tab"
                           aria-controls="second" aria-selected="false">
                            second
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-success nav-link" id="third-tab" data-toggle="tab" href="#third" role="tab"
                           aria-controls="third" aria-selected="false">
                            third
                        </a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="first" role="tabpanel" aria-labelledby="first-tab">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur consequuntur corporis eligendi
                        hic impedit ipsam labore magnam natus omnis provident quae quo, reprehenderit sapiente tempora totam
                        vitae voluptates? Deserunt facere libero minima minus veniam! Commodi culpa, debitis eos fugiat
                        ipsam itaque laborum maxime minima officiis pariatur quidem, velit voluptas, voluptate....
                    </div>
                    <div class="tab-pane fade" id="second" role="tabpanel" aria-labelledby="second-tab">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus delectus dolores eius facilis
                        incidunt molestiae nesciunt nihil officiis qui quibusdam quidem quod, similique ut? Accusantium
                        asperiores assumenda beatae debitis dolor exercitationem id, in laudantium neque nobis obcaecati
                        officiis provident quaerat quasi saepe sunt totam ut voluptates. Alias earum repellat vel....
                    </div>
                    <div class="tab-pane fade" id="third" role="tabpanel" aria-labelledby="third-tab">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A alias aperiam eveniet facilis fugiat,
                        ipsam iure nemo nisi qui sapiente sint veritatis. Ab consequuntur deleniti dolores iure labore
                        maxime nemo odit qui, quos reprehenderit totam unde velit? Ab ad aperiam ea exercitationem explicabo
                        in iure quasi sed, suscipit, vero voluptatibus....
                    </div>
                </div>
            </div>-->

			<!-- Do the left sidebar check and opens the primary div -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">
                <div class="row">
				    <?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<?php

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'loop-templates/content', get_post_format() );
						?>

					<?php endwhile; ?>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>
                </div>
			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #index-wrapper -->

<?php get_footer();
