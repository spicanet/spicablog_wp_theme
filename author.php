<?php
/**
 * The template for displaying Author Archive pages
 *
 * @package spicablog
 */

get_header(); ?>

<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center pt-80 pb-100">
                <?php $author = get_queried_object();

                if ($author) :
                    $avatar = get_avatar($author->ID, 150, '', '', array('class' => 'rounded-circle'));
                    $position = get_user_meta($author->ID, 'position', true);
                    $bio = get_the_author_meta('description', $author->ID);
                    $facebook = get_user_meta($author->ID, 'facebook', true);
                    $twitter = get_user_meta($author->ID, 'twitter', true);
                    $linkedin = get_user_meta($author->ID, 'linkedin', true);
                ?>

                    <div class="author-header text-center mb-5">
                        <?php if ($avatar) : ?>
                            <div class="author-avatar mb-3">
                                <?php echo $avatar; ?>
                            </div>
                        <?php endif; ?>

                        <h1 class="author-name"><?php echo esc_html($author->display_name); ?></h1>

                        <div class="entry-meta mb-3">
                            <?php if ($facebook) : ?>
                                <span><a href="<?php echo esc_url($facebook); ?>"><i class="fab fa-facebook-f"></i></a></span>
                            <?php endif; ?>
                            <?php if ($twitter) : ?>
                                <span><a href="<?php echo esc_url($twitter); ?>"><i class="fa-brands fa-x-twitter"></i></a></span>
                            <?php endif; ?>
                            <?php if ($linkedin) : ?>
                                <span><a href="<?php echo esc_url($linkedin); ?>"><i class="fab fa-linkedin-in"></i></a></span>
                            <?php endif; ?>
                        </div>

                        <?php if ($position) : ?>
                            <p class="author-position"><?php echo esc_html($position); ?></p>
                        <?php endif; ?>

                        <?php if ($bio) : ?>
                            <div class="author-bio">
                                <p><?php echo esc_html($bio); ?></p>
                            </div>
                        <?php endif; ?>

                    </div>

                <?php else : ?>
                    <h1>Author not found</h1>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section id="author-posts" class="py-100">
    <div class="container">
        <div class="row">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <a href="<?php the_permalink(); ?>">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <img src="<?php the_post_thumbnail_url( 'medium' ); ?>" class="card-img-top" alt="<?php the_title_attribute(); ?>">
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/default-thumbnail.png" class="card-img-top" alt="Default Image">
                                <?php endif; ?>
                            </a>
                            <div class="card-body">
                                <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                <div class="card-meta mb-3">
                                    <span><i class="fas fa-calendar-alt"></i> <?php echo get_the_date(); ?></span>
                                    <span><i class="fas fa-user"></i> <?php the_author(); ?></span>
                                    <span><i class="fas fa-comments"></i> <?php comments_number( '0', '1', '%' ); ?></span>
                                </div>
                                <p class="card-text"><?php echo wp_trim_words( get_the_excerpt(), 15, '...' ); ?></p>																				
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php spicablog_numeric_posts_nav(); ?>
            <?php else : ?>
                <p>Author has no posts yet.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>