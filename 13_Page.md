### page.php ###

Las páginas son la otra parte de wordpress, el complemento perfecto de los post. Entre ambos podemos establecer un complejo sistema de información que cubra todas las necesidades de un website.

¿Cuando utilizamos cada uno de ellos?.

  * Post cuando añadimos entradas constantes de información a lo largo del tiempo. Es decir puede ser un sistema de noticias, de novedades, de promociones, etc... Es el alma de un blog.

  * Las páginas para crear aquellas áreas del sitio que son fijas, es la base de un website.

Por definición las páginas son más simples a nivel de información que las entradas de un blog, de hecho lo habitual es que las páginas no muestren el título del autor, la fecha de publicación, la categoría o las etiquetas, etc... salvo tal vez los comentarios puesto que si que soportan la publicación de comentarios.

Bueno este es el código con el que podemos crear una buena página en wordpress. Lógicamente es una página simple que podemos convertir en mucho más sofisticada.

```
<?php get_header(); ?>
 
<div id="twocols"> 
	 <div id="maincol">
 
	<?php the_post(); ?>
 
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'your-theme' ) . '&after=</div>') ?>                                       
        </div><!-- .entry-content -->
    </div><!-- #post-<?php the_ID(); ?> -->                 
 
	<?php if ( get_post_custom_values('comments') ) comments_template() // Add a custom field with Name and Value of "comments" to enable comments on this page ?>                  
 
    </div><!-- #maincol -->    
 
    <?php get_sidebar(); ?> 
 
</div><!-- #twocols -->
 
<?php get_footer(); ?>
```