<?php
/**
 * Template Name: Authors Page
 * Description: Страница для отображения всех авторов.
 */

get_header(); ?>

<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center pt-80 pb-100">
            <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
            <h1>Our Team</h1>
            <div class="subtitle px-lg-5"></div>
            </div>
        </div>
    </div>
</section>

<section id="authors" class="py-100">
    <div class="container">
        <div class="row">
            <?php
            // Получаем всех пользователей с ролью 'author' или выше
            $args = array(
                'role__in' => array('Author'),
                'orderby' => 'display_name',
                'order' => 'ASC',
            );
            $users = get_users($args);

            if (!empty($users)) {
                foreach ($users as $user) {
                    // Получаем URL аватара пользователя
                    $avatar = get_avatar($user->ID, 300, '', '', array('class' => 'card-img-top'));
                    // Получаем значение поля "Position"
                    $position = get_user_meta($user->ID, 'position', true);
                    $facebook = get_user_meta($user->ID, 'facebook', true);
                    $twitter = get_user_meta($user->ID, 'twitter', true);
                    $linkedin = get_user_meta($user->ID, 'linkedin', true);
                    // Получаем ссылку на страницу автора
                    $author_posts_url = get_author_posts_url($user->ID);
                    ?>
                    <div class="col-lg-3 col-md-4 text-center mb-4">
                        <div class="card h-100">
                            <a href="<?php echo esc_url($author_posts_url); ?>">
                                <?php echo $avatar; ?>
                            </a>
                            <div class="card-body">
                                <h5 class="card-title"><a href="<?php echo esc_url($author_posts_url); ?>"><?php echo esc_html($user->display_name); ?></a></h5>
                                <div class="card-meta">
                                    <?php if ($facebook) : ?>
                                        <span><a href="<?php echo esc_url($facebook); ?>"><i class="fab fa-facebook-f"></i></a></span>
                                    <?php endif; ?>
                                    <?php if ($twitter) : ?>
                                        <span><a href="<?php echo esc_url($twitter); ?>"><i class="fab fa-x-twitter"></i></a></span>
                                    <?php endif; ?>
                                    <?php if ($linkedin) : ?>
                                        <span><a href="<?php echo esc_url($linkedin); ?>"><i class="fab fa-linkedin-in"></i></a></span>
                                    <?php endif; ?>
                                </div>
                                <p class="card-text"><?php echo esc_html($position); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo '<p>No authors found.</p>';
            }
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?> 