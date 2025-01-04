<?php
/**
 * SpicaBlog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package SpicaBlog
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.2.3' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function spicablog_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on SpicaBlog, use a find and replace
		* to change 'spicablog' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'spicablog', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'spicablog' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'spicablog_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	add_theme_support( 'rank-math-breadcrumbs' );
}
add_action( 'after_setup_theme', 'spicablog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function spicablog_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'spicablog_content_width', 0 );
}
add_action( 'after_setup_theme', 'spicablog_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function spicablog_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'spicablog' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'spicablog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'spicablog_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function spicablog_scripts() {
	// Enqueue Bootstrap 5 CSS from CDN.
    wp_enqueue_style( 'bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css', array(), '5.3.0' );

    // Enqueue Google Font Roboto.
    wp_enqueue_style( 'google-font-roboto', 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap', false );	

    // Enqueue the main stylesheet.
    wp_enqueue_style( 'spicablog-style', get_stylesheet_uri(), array(), _S_VERSION );
    wp_style_add_data( 'spicablog-style', 'rtl', 'replace' );   

	// Enqueue Font Awesome.
	wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css', false );
	
	// Enqueue flag icons.
	wp_enqueue_style( 'flag-icons', get_template_directory_uri() . '/css/flag-icon.min.css', false );

    wp_enqueue_style('prism-css', 'https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-twilight.min.css');

    // Enqueue Bootstrap 5 JS from CDN.
    wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array( 'jquery' ), '5.3.0', true );

    wp_enqueue_script('prism-js', 'https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js', [], null, true);
    wp_enqueue_script('prism-line-numbers-js', 'https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/line-numbers/prism-line-numbers.min.js', ['prism-js'], null, true);
    wp_enqueue_script('prism-python-js', 'https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-python.min.js', ['prism-js'], null, true);

}
add_action( 'wp_enqueue_scripts', 'spicablog_scripts' );

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Bootstrap Navwalker
 */
class Bootstrap_Navwalker extends Walker_Nav_Menu {

    // Начало элемента списка
    public function start_lvl( &$output, $depth = 0, $args = null ) {
        $indent = str_repeat("\t", $depth);
        $submenu = ($depth > 0) ? ' sub-menu' : '';
        $output .= "\n$indent<ul class=\"dropdown-menu$submenu\">\n";
    }

    // Элементы меню
    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
        $classes[] = 'nav-item';
        $classes[] = 'nav-item-' . $item->ID;

        if (in_array('current-menu-item', $classes)) {
            $classes[] = 'active';
        }

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names .'>';

        $atts = array();
        $atts['title'] = ! empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = ! empty($item->target) ? $item->target : '';
        $atts['rel'] = ! empty($item->xfn) ? $item->xfn : '';
        $atts['href'] = ! empty($item->url) ? $item->url : '';

        if ($args->walker->has_children) {
            $atts['class'] = 'nav-link dropdown-toggle';
            $atts['data-bs-toggle'] = 'dropdown';
            $atts['aria-expanded'] = 'false';
        } else {
            $atts['class'] = 'nav-link';
        }

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    // Конец элемента списка
    public function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= "</li>\n";
    }
}

function spicablog_numeric_posts_nav() {
    if ( is_singular() ) {
        return;
    }

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if ( $wp_query->max_num_pages <= 1 ) {
        return;
    }

    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );

    /** Initialize links array */
    $links = array();

    /** Add current page to the array */
    if ( $paged >= 1 ) {
        $links[] = $paged;
    }

    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 1;
        $links[] = $paged + 2;
    }

    echo '<nav class="pt-60"aria-label="Page navigation">';
    echo '<ul class="pagination">';

    /** Previous Post Link */
    if ( get_previous_posts_link() ) {
		// Получаем ссылку "Previous"
        $prev_link = get_previous_posts_link( 'Previous' );
        if ( $prev_link ) {
            // Добавляем класс "page-link" к ссылке "Previous"
            $prev_link = preg_replace( '/<a /', '<a class="page-link" ', $prev_link );
            printf( '<li class="page-item">%s</li>', $prev_link );
        }
    } else {
        echo '<li class="page-item disabled"><a class="page-link" href="#" tabindex="-1">Previous</a></li>';
    }

    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $active = 1 == $paged ? ' active' : '';
        printf(
            '<li class="page-item%s"><a class="page-link" href="%s">1</a></li>',
            $active,
            esc_url( get_pagenum_link( 1 ) )
        );

        if ( ! in_array( 2, $links ) ) {
            echo '<li class="page-item disabled"><a class="page-link" href="#">…</a></li>';
        }
    }

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $active = $paged == $link ? ' active' : '';
        printf(
            '<li class="page-item%s"><a class="page-link" href="%s">%s%s</a></li>',
            $active,
            esc_url( get_pagenum_link( $link ) ),
            $link,
            $active ? ' <span class="sr-only">(current)</span>' : ''
        );
    }

    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) ) {
            echo '<li class="page-item disabled"><a class="page-link" href="#">…</a></li>';
        }

        $active = $paged == $max ? ' active' : '';
        printf(
            '<li class="page-item%s"><a class="page-link" href="%s">%s</a></li>',
            $active,
            esc_url( get_pagenum_link( $max ) ),
            $max
        );
    }

    /** Next Post Link */
    if ( get_next_posts_link() ) {
        // Получаем ссылку "Next"
        $next_link = get_next_posts_link( 'Next' );
        if ( $next_link ) {
            // Добавляем класс "page-link" к ссылке "Next"
            $next_link = preg_replace( '/<a /', '<a class="page-link" ', $next_link );
            printf( '<li class="page-item">%s</li>', $next_link );
        }
    } else {
        echo '<li class="page-item disabled"><a class="page-link" href="#">Next</a></li>';
    }

    echo '</ul>';
    echo '</nav>';
}

/**
 * Добавляем поле для загрузки аватара на страницах профиля пользователя
 */
function spicablog_user_profile_picture_field( $user ) {
    // Проверяем, есть ли уже сохранённый URL аватара
    $avatar_url = get_user_meta( $user->ID, 'profile_picture', true );
    ?>
    <h3><?php esc_html_e('Profile Picture', 'spicablog'); ?></h3>
    <table class="form-table">
        <tr>
            <th>
                <label for="profile_picture"><?php esc_html_e('Upload Profile Picture', 'spicablog'); ?></label>
            </th>
            <td style="vertical-align: middle;">
                <!-- Отображаем загруженную картинку, если есть -->
                <?php if ( $avatar_url ) : ?>
                    <img style="display:block; margin-bottom:10px; max-width:150px;" src="<?php echo esc_url( $avatar_url ); ?>" alt="<?php esc_attr_e('Profile Picture', 'spicablog'); ?>">
                <?php endif; ?>

                <!-- Поле для загрузки файла -->
                <input type="file" name="profile_picture" id="profile_picture" accept="image/*" />

                <!-- Если нужно убрать загруженный аватар -->
                <?php if ( $avatar_url ) : ?>
                    <br>
                    <input type="checkbox" name="remove_profile_picture" value="1" />
                    <label for="remove_profile_picture"><?php esc_html_e('Remove current picture', 'spicablog'); ?></label>
                <?php endif; ?>

                <p class="description">
                    <?php esc_html_e('Upload an image for your profile avatar. Recommended size: 150x150px.', 'spicablog'); ?>
                </p>
            </td>
        </tr>
    </table>
    <?php
}

// Подключаем поле как для собственного профиля, так и для профилей других пользователей
add_action( 'show_user_profile', 'spicablog_user_profile_picture_field' );
add_action( 'edit_user_profile', 'spicablog_user_profile_picture_field' );

/**
 * Сохраняем загруженную картинку в meta пользователя
 */
function spicablog_save_user_profile_picture_field( $user_id ) {
    // Проверяем права пользователя
    if ( ! current_user_can( 'edit_user', $user_id ) ) {
        return false;
    }
    
    // Если пользователь отметил галочку "Remove current picture", то удаляем meta
    if ( isset( $_POST['remove_profile_picture'] ) && '1' === $_POST['remove_profile_picture'] ) {
        delete_user_meta( $user_id, 'profile_picture' );
    }
    
    // Проверяем, загружен ли новый файл
    if ( ! empty( $_FILES['profile_picture']['name'] ) ) {
        // Подключаем необходимые функции WP для работы с медиа
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
        require_once( ABSPATH . 'wp-admin/includes/media.php' );
        require_once( ABSPATH . 'wp-admin/includes/image.php' );

        // Загружаем файл в медиа-библиотеку
        $attachment_id = media_handle_upload( 'profile_picture', 0 );
        
        // Если загрузка прошла успешно
        if ( ! is_wp_error( $attachment_id ) ) {
            // Получаем URL загруженного файла
            $attachment_url = wp_get_attachment_url( $attachment_id );
            // Сохраняем в meta пользователя
            update_user_meta( $user_id, 'profile_picture', esc_url_raw( $attachment_url ) );
        }
    }
}
add_action( 'personal_options_update', 'spicablog_save_user_profile_picture_field' );
add_action( 'edit_user_profile_update', 'spicablog_save_user_profile_picture_field' );

/**
 * Фильтруем вывод аватара, чтобы показывать загруженный файл, если он есть
 */
function spicablog_custom_user_avatar( $avatar, $id_or_email, $size, $default, $alt, $args ) {
    $user_id = 0;

    // Определяем, передан ли $id_or_email как объект WP_User, число (ID) или email.
    if ( is_numeric( $id_or_email ) ) {
        $user_id = (int) $id_or_email;
    } elseif ( is_object( $id_or_email ) && ! empty( $id_or_email->ID ) ) {
        $user_id = (int) $id_or_email->ID;
    } else {
        // Пытаемся получить ID по email
        $user = get_user_by( 'email', $id_or_email );
        if ( $user ) {
            $user_id = $user->ID;
        }
    }

    // Если есть user_id, то смотрим, есть ли у него пользовательская картинка
    if ( $user_id ) {
        $profile_picture_url = get_user_meta( $user_id, 'profile_picture', true );
        if ( $profile_picture_url ) {
            // Собираем HTML для <img>
            $avatar = sprintf(
                '<img alt="%s" src="%s" class="%s" height="%d" width="%d" />',
                esc_attr( $alt ),
                esc_url( $profile_picture_url ),
                esc_attr( $args['class'] ), // с WP 5.9+ можно передавать class через аргументы
                (int) $size,
                (int) $size
            );
        }
    }

    return $avatar;
}
add_filter( 'get_avatar', 'spicablog_custom_user_avatar', 10, 6 );

/**
 * Добавляем enctype к форме редактирования пользователя,
 * чтобы можно было загружать файлы
 */
function spicablog_user_edit_form_tag() {
    echo ' enctype="multipart/form-data"';
}
add_action( 'user_edit_form_tag', 'spicablog_user_edit_form_tag' );
add_action( 'show_user_profile_form_tag', 'spicablog_user_edit_form_tag' );

// Добавление поля "Position" в профиль пользователя
function spicablog_add_position_field($user) {
    ?>
    <h3><?php _e("Additional Information", "spicablog"); ?></h3>
    <table class="form-table">
        <tr>
            <th><label for="position"><?php _e("Position", "spicablog"); ?></label></th>
            <td>
                <input type="text" name="position" id="position" value="<?php echo esc_attr(get_the_author_meta('position', $user->ID)); ?>" class="regular-text" /><br />
                <span class="description"><?php _e("Please enter your position.", "spicablog"); ?></span>
            </td>
        </tr>
		<tr>
            <th><label for="facebook"><?php _e("Facebook", "spicablog"); ?></label></th>
            <td>
                <input type="text" name="facebook" id="facebook" value="<?php echo esc_attr(get_the_author_meta('facebook', $user->ID)); ?>" class="regular-text" /><br />
                <span class="description"><?php _e("Please enter your Facebook URL.", "spicablog"); ?></span>
            </td>
        </tr>
		<tr>
            <th><label for="twitter"><?php _e("Twitter", "spicablog"); ?></label></th>
            <td>
                <input type="text" name="twitter" id="twitter" value="<?php echo esc_attr(get_the_author_meta('twitter', $user->ID)); ?>" class="regular-text" /><br />
                <span class="description"><?php _e("Please enter your Twitter URL.", "spicablog"); ?></span>
            </td>
        </tr>
		<tr>
            <th><label for="linkedin"><?php _e("Linkedin", "spicablog"); ?></label></th>
            <td>
                <input type="text" name="linkedin" id="linkedin" value="<?php echo esc_attr(get_the_author_meta('linkedin', $user->ID)); ?>" class="regular-text" /><br />
                <span class="description"><?php _e("Please enter your Linkedin URL.", "spicablog"); ?></span>
            </td>
        </tr>
    </table>
    <?php
}
add_action('show_user_profile', 'spicablog_add_position_field');
add_action('edit_user_profile', 'spicablog_add_position_field');

// Сохранение значения поля "Position"
function spicablog_save_position_field($user_id) {
    if (!current_user_can('edit_user', $user_id)) {
        return false;
    }

    if (isset($_POST['position'])) {
        update_user_meta($user_id, 'position', sanitize_text_field($_POST['position']));
    }

	if (isset($_POST['facebook'])) {
        update_user_meta($user_id, 'facebook', sanitize_text_field($_POST['facebook']));
    }

	if (isset($_POST['twitter'])) {
        update_user_meta($user_id, 'twitter', sanitize_text_field($_POST['twitter']));
    }

	if (isset($_POST['linkedin'])) {
        update_user_meta($user_id, 'linkedin', sanitize_text_field($_POST['linkedin']));
    }
}
add_action('personal_options_update', 'spicablog_save_position_field');
add_action('edit_user_profile_update', 'spicablog_save_position_field');

/**
 * Подключаем наш REST-эндпоинт под названием /wp-json/spicablog/v1/update-zip
 * Он будет вызван при вебхуке GitHub (Release, Push и т.п.).
 */
add_action('rest_api_init', function () {
    register_rest_route('spicablog/v1', '/update-zip', [
        'methods'  => 'POST',
        'callback' => 'spicablog_update_via_zip',
        // Разрешаем доступ без авторизации WP (GitHub стучится извне)
        'permission_callback' => '__return_true',
    ]);
});

/**
 * Обработчик вебхука на событие Release (или Push) для приватного репозитория.
 * Скачивает zip-архив через wp_remote_get (с токеном) и распаковывает поверх темы.
 *
 * @param  \WP_REST_Request  $request
 * @return array|\WP_REST_Response
 */
function spicablog_update_via_zip(\WP_REST_Request $request) {
    error_log($request->get_body());
    // 1. Проверяем X-Hub-Signature-256, чтобы убедиться, что запрос пришёл от GitHub
    // ------------------------------------------------------------------------------
    $signatureHeader = $request->get_header('x-hub-signature-256');
    $ourSecret       = 'YOUR_WEBHOOK_SECRET_123'; // Задайте свой Secret из GitHub Webhook

    if (!spicablog_verify_github_signature($request->get_body(), $signatureHeader, $ourSecret)) {
        return new \WP_REST_Response(['error' => 'Invalid signature'], 403);
    }

    // 2. Извлекаем URL zip-архива из payload'а
    // ------------------------------------------------------------------------------
    // При событии "release" в payload обычно есть $payload['release']['zipball_url']
    // Проверьте структуру, если используете другое событие (Push).
    $payload = json_decode($request->get_body(), true);

    if (!isset($payload['release']['zipball_url'])) {
        return new \WP_REST_Response(['error' => 'No zip URL found in webhook payload'], 400);
    }

    $zipUrl = $payload['release']['zipball_url'];

    // 3. Готовим Personal Access Token (PAT) для приватного репо
    // ------------------------------------------------------------------------------
    // В реальном проекте лучше хранить его в wp-config.php:
    // define('GITHUB_PERSONAL_TOKEN', 'abc123...');
    // $github_token = GITHUB_PERSONAL_TOKEN;
    //
    // Или через переменные окружения: $github_token = getenv('GITHUB_TOKEN');

    $github_token = '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'; // <-- ВПИШИТЕ СВОЙ TOKEN

    // 4. Скачиваем zip-архив с GitHub, используя wp_remote_get + заголовок Authorization
    // ------------------------------------------------------------------------------
    $args = [
        'headers' => [
            'Authorization' => 'token ' . $github_token,
            // При необходимости, GitHub может требовать User-Agent:
            // 'User-Agent' => 'MySiteUpdater/1.0',
        ],
    ];

    $response = wp_remote_get($zipUrl, $args);

    if (is_wp_error($response)) {
        return new \WP_REST_Response([
            'error'   => 'Failed to download zip (wp_remote_get error)',
            'details' => $response->get_error_message()
        ], 500);
    }

    $status_code = wp_remote_retrieve_response_code($response);
    if ($status_code !== 200) {
        return new \WP_REST_Response([
            'error'  => 'Non-200 response when fetching zip',
            'status' => $status_code,
        ], 500);
    }

    // 5. Сохраняем бинарное содержимое zip-архива во временный файл
    // ------------------------------------------------------------------------------
    $body      = wp_remote_retrieve_body($response);
    $temp_file = wp_tempnam(); // создаёт уникальное имя файла в системной tmp
    
    if (!$temp_file) {
        return new \WP_REST_Response([
            'error' => 'Could not create temp file',
        ], 500);
    }

    file_put_contents($temp_file, $body);

    // 6. Распаковываем zip в ещё одну временную папку
    // ------------------------------------------------------------------------------
    // (так, чтобы потом скопировать файлы поверх вашей темы)

    $temp_dir = wp_tempnam(); // снова имя файла, удалим и создадим директорию
    unlink($temp_dir);
    mkdir($temp_dir);

    // unzip_file — встроенная в WP функция (wp-admin/includes/file.php)
    $res = unzip_file($temp_file, $temp_dir);
    if (is_wp_error($res)) {
        return new \WP_REST_Response([
            'error'   => 'Failed to unzip',
            'details' => $res->get_error_message()
        ], 500);
    }

    // 7. Ищем основную распакованную папку (GitHub обычно кладёт в /user-repo-commitHash/)
    // ------------------------------------------------------------------------------
    $extracted_dirs = glob($temp_dir . '/*', GLOB_ONLYDIR);
    if (!$extracted_dirs || !isset($extracted_dirs[0])) {
        return new \WP_REST_Response(['error' => 'No extracted folder found'], 500);
    }

    $extracted_main_folder = $extracted_dirs[0];

    // Папка вашей темы (предполагаем, что slug = 'spicablog')
    $theme_path = get_theme_root() . '/spicablog';

    // 8. Копируем все файлы поверх (или можете сначала удалить старую папку)
    // ------------------------------------------------------------------------------
    spicablog_copy_directory($extracted_main_folder, $theme_path);

    // 9. Удаляем временные файлы
    // ------------------------------------------------------------------------------
    unlink($temp_file);
    // Рекурсивно удалить $temp_dir при необходимости (например, через WP_Filesystem или custom-функцию)

    // 10. Возвращаем ответ
    // ------------------------------------------------------------------------------
    return [
        'success' => true,
        'zipUrl'  => $zipUrl,
    ];
}

/**
 * Проверка X-Hub-Signature-256 от GitHub,
 * чтобы убедиться, что вебхук действительно пришёл от GitHub.
 *
 * @param string $payload        Тело запроса (JSON)
 * @param string $signatureHeader Заголовок X-Hub-Signature-256
 * @param string $secret          Секрет, указанный в настройках Webhook
 * @return bool
 */
function spicablog_verify_github_signature($payload, $signatureHeader, $secret) {
    if (!$signatureHeader) {
        return false;
    }

    // GitHub присылает хеш в формате: sha256=xxxxxx
    [$algo, $hash] = explode('=', $signatureHeader, 2);

    // Считаем hmac текущего payload'а с использованием нашего секрета
    $payloadHash = hash_hmac($algo, $payload, $secret);

    return hash_equals($hash, $payloadHash);
}

/**
 * Рекурсивное копирование всех файлов/папок из $source в $destination.
 * Сохранение структуры директорий.
 *
 * @param string $source
 * @param string $destination
 * @return void
 */
function spicablog_copy_directory($source, $destination) {
    if (!file_exists($destination)) {
        mkdir($destination, 0755, true);
    }
    $dir = opendir($source);

    while(false !== ($file = readdir($dir))) {
        if ($file === '.' || $file === '..') {
            continue;
        }

        $src = $source . '/' . $file;
        $dst = $destination . '/' . $file;

        if (is_dir($src)) {
            spicablog_copy_directory($src, $dst);
        } else {
            copy($src, $dst);
        }
    }

    closedir($dir);
}
