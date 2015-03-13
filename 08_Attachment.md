## Attachment.php ##

No hay mucha gente que utilice adjuntos al post además de imágenes, pero por supuesto podemos adjuntar mucho más que imágenes. Vamos a realizar una plantilla attachment.php que podemos adaptar a distintos tipos de adjuntos como vídeo, audio y aplicaciones, creando las correspondientes plantillas video.php, audio.php, y application.php.

**La forma más fácil de proceder para este objetivo es duplicar single.php, cambiarle el nombre por attachment.php y hacer los siguientes cambios.**

En primer lugar eliminar la barra de navegación superior. No la necesitamos. Colocar un título de página que vincule de nuevo al mensaje principal después de page-title.

```
<?php get_header(); ?>
 
<div id="twocols"> 
	 <div id="maincol">
 
	<?php the_post(); ?>
 
    <h1 class="page-title"><a href="<?php echo get_permalink($post->post_parent) ?>" title="<?php printf( __( 'Return to %s', 'your-theme' ), wp_specialchars( get_the_title($post->post_parent), 1 ) ) ?>" rev="attachment"><span class="meta-nav">&laquo; </span><?php echo get_the_title($post->post_parent) ?></a></h1>
Puesto que el título de la página está contenido en etiquetas <h1> es buena idea colocar el título de la entrada con etiquetas <h2>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h2 class="entry-title"><?php the_title(); ?></h2>
Las etiquetas metas las dejamos tal cual están.
Ahora vamos a comprobar que la mayoría de los adjuntos van a ser imágenes mediante una sentencia if
<div class="entry-meta">
                <span class="meta-prep meta-prep-author"><?php _e('By ', 'your-theme'); ?></span>
                <span class="author vcard"><a class="url fn n" href="<?php echo get_author_link( false, $authordata->ID, $authordata->user_nicename ); ?>" title="<?php printf( __( 'View all posts by %s', 'your-theme' ), $authordata->display_name ); ?>"><?php the_author(); ?></a></span>
                <span class="meta-sep"> | </span>
                <span class="meta-prep meta-prep-entry-date"><?php _e('Published ', 'your-theme'); ?></span>
                <span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
                <?php edit_post_link( __( 'Edit', 'your-theme' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t" ) ?>                                               
        </div><!-- .entry-meta -->
 
        <div class="entry-content">
                <div class="entry-attachment">                                  
<?php if ( wp_attachment_is_image( $post->id ) ) : $att_image = wp_get_attachment_image_src( $post->id, "medium"); ?>
                <p class="attachment"><a href="<?php echo wp_get_attachment_url($post->id); ?>" title="<?php the_title(); ?>" rel="attachment"><img src="<?php echo $att_image[0];?>" width="<?php echo $att_image[1];?>" height="<?php echo $att_image[2];?>"  class="attachment-medium" alt="<?php $post->post_excerpt; ?>" /></a>
                </p>
<?php else : ?>         
                <a href="<?php echo wp_get_attachment_url($post->ID) ?>" title="<?php echo wp_specialchars( get_the_title($post->ID), 1 ) ?>" rel="attachment"><?php echo basename($post->guid) ?></a>          
<?php endif; ?>         
        </div>                          
 
        <div class="entry-caption"><?php if ( !empty($post->post_excerpt) ) the_excerpt() ?></div>
 
		<?php the_content( __( 'Continue reading <span class="meta-nav">&raquo;</span>', 'your-theme' )  ); ?>
		<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'your-theme' ) . '&after=</div>') ?>
 
        </div><!-- .entry-content -->
```

Publicamos ahora la información referente a las características del post como categoría, tag, bookmark, etc.. Eliminamos la navegación inferior y ya está la plantilla attachment.php.