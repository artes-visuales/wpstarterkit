<?php


// Prepara el tema para su traducción
// Traducción con el fichero que se encuentra en /languages/ directory
load_theme_textdomain( 'your-theme', TEMPLATEPATH . '/languages' );

$locale = get_locale();
$locale_file = TEMPLATEPATH . "/languages/$locale.php";
if ( is_readable($locale_file) )
        require_once($locale_file);


// Obtener el número de página
function get_page_number() {
    if (get_query_var('paged')) {
        print ' | ' . __( 'Page ' , 'your-theme') . get_query_var('paged');
    }
} // Fin get_page_number


// Para listar categorías en los archivos de categoría. Devuelve otras categorías salvo la actual para evitar redundancias.
function cats_meow($glue) {
        $current_cat = single_cat_title( '', false );
        $separator = "\n";
        $cats = explode( $separator, get_the_category_list($separator) );
        foreach ( $cats as $i => $str ) {
                if ( strstr( $str, ">$current_cat<" ) ) {
                        unset($cats[$i]);
                        break;
                }
        }
        if ( empty($cats) )
                return false;

        return trim(join( $glue, $cats ));
} // end cats_meow


// Para listas de tag y archivos. Devuelve otras salvo la actual para evitar redundancias.
function tag_ur_it($glue) {
        $current_tag = single_tag_title( '', '',  false );
        $separator = "\n";
        $tags = explode( $separator, get_the_tag_list( "", "$separator", "" ) );
        foreach ( $tags as $i => $str ) {
                if ( strstr( $str, ">$current_tag<" ) ) {
                        unset($tags[$i]);
                        break;
                }
        }
        if ( empty($tags) )
                return false;

        return trim(join( $glue, $tags ));
} // end tag_ur_it


// Declara la zona de sidebar widget 
	if (function_exists('register_sidebar')) {
		register_sidebar(array(
			'name' => 'Sidebar Widgets I',
			'id'   => 'sidebar-widgets',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>'
		));
	}
	  if (function_exists('register_sidebar')) {
		register_sidebar(array(
			'name' => 'Sidebar Widgets II',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>'
		));
	}

//Registro de los menús
	if (function_exists('register_nav_menus')) {
		register_nav_menus(
			array(
				'main_nav' => 'Top Navigation Menu',
				'cat_nav' => 'Cat Navigation Menu',
			)
		);
	}   


// Avatar image con hCard-compliant photo class
function commenter_link() {
    $commenter = get_comment_author_link();
    if ( ereg( '<a[^>]* class=[^>]+>', $commenter ) ) {
            $commenter = ereg_replace( '(<a[^>]* class=[\'"]?)', '\\1url ' , $commenter );
    } else {
            $commenter = ereg_replace( '(<a )/', '\\1class="url "' , $commenter );
    }
    $avatar_email = get_comment_author_email();
    $avatar = str_replace( "class='avatar", "class='photo avatar", get_avatar( $avatar_email, 50 ) );
    echo $avatar . ' <span class="fn n">' . $commenter . '</span>';
} // end commenter_link


// Personalización de comentarios
function custom_comments($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment;
        $GLOBALS['comment_depth'] = $depth;
  ?>
    <li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
        <div class="comment-author vcard"><?php commenter_link() ?></div>
        <div class="comment-meta"><?php printf(__('Posted %1$s at %2$s <span class="meta-sep">|</span> <a href="%3$s" title="Permalink to this comment">Permalink</a>', 'your-theme'),
            get_comment_date(),
            get_comment_time(),
            '#comment-' . get_comment_ID() );
            edit_comment_link(__('Edit', 'your-theme'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?></div>
<?php if ($comment->comment_approved == '0') _e("\t\t\t\t\t<span class='unapproved'>Your comment is awaiting moderation.</span>\n", 'your-theme') ?>
  <div class="comment-content">
        <?php comment_text() ?>
        </div>
        <?php // echo the comment reply link
	        if($args['type'] == 'all' || get_comment_type() == 'comment') :
                comment_reply_link(array_merge($args, array(
                        'reply_text' => __('Reply','your-theme'), 
                        'login_text' => __('Log in to reply.','your-theme'),
                        'depth' => $depth,
                        'before' => '<div class="comment-reply-link">', 
                        'after' => '</div>'
                )));
	        endif;
        ?>
<?php } // end custom_comments


// Personalización callback to list pings
function custom_pings($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	?>
    <li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
        <div class="comment-author"><?php printf(__('By %1$s on %2$s at %3$s', 'your-theme'),
            get_comment_author_link(),
            get_comment_date(),
            get_comment_time() );
            edit_comment_link(__('Edit', 'your-theme'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?>
        </div>
	<?php if ($comment->comment_approved == '0') _e('\t\t\t\t\t<span class="unapproved">Your trackback is awaiting moderation.</span>\n', 'your-theme') ?>
    <div class="comment-content">
        <?php comment_text() ?>
    </div>
<?php } // end custom_pings