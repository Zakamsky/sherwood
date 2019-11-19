<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php if ( is_front_page() || is_home() ) : ?>
    <?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>

    <div class="wrapper" id="index-wrapper">

        <div class="scroll_wrap <?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

            <div class="row scroll_row">

                <div class="col-12">
                    <ul class="advantages nav nav-justified mb-1 py-2" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="btn btn-lg btn-success nav-link active" id="first-tab" data-toggle="tab" href="#first" role="tab"
                               aria-controls="first" aria-selected="true">
                                <?php the_field( 'tab_title_1' ); ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-lg btn-success nav-link" id="second-tab" data-toggle="tab" href="#second" role="tab"
                               aria-controls="second" aria-selected="false">
                                <?php the_field( 'tab_title_2' ); ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-lg btn-success nav-link" id="third-tab" data-toggle="tab" href="#third" role="tab"
                               aria-controls="third" aria-selected="false">
                                <?php the_field( 'tab_title_3' ); ?>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="first" role="tabpanel" aria-labelledby="first-tab">
                            <?php the_field( 'tab_content_1' ); ?>
                        </div>
                        <div class="tab-pane fade" id="second" role="tabpanel" aria-labelledby="second-tab">
                            <?php the_field( 'tab_content_2' ); ?>
                        </div>
                        <div class="tab-pane fade" id="third" role="tabpanel" aria-labelledby="third-tab">
                            <?php the_field( 'tab_content_3' ); ?>

                        </div>
                    </div>
                </div>

                <main class="col-12 site-main" id="main">

                        <?php if ( have_posts() ) : ?>

                            <?php /* Start the Loop */ ?>

                            <?php while ( have_posts() ) : the_post(); ?>

                                <?php get_template_part( 'loop-templates/content', 'page' ); ?>

                            <?php endwhile; ?>

                        <?php else : ?>

                            <?php get_template_part( 'loop-templates/content', 'none' ); ?>

                        <?php endif; ?>

                </main><!-- #main -->

            </div><!-- .row -->

        </div><!-- #content -->

    </div><!-- #index-wrapper --> <!-- 111 -->

<?php get_footer();
