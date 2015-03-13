## La plantilla de búsqueda: search.php ##

No tengo nada claro que una plantilla de búsqueda interna sea la mejor solución para nuestro tema de wordpress. Es más posiblemente creo que no lo es. Pienso que es mejor trabajar con los buscadores personalizados de Google. ¿Por qué?. Pues porque pienso que al utilizar estos buscadores personalizados obligas a Google a realizar un indexado constante y profundo de tu sitio web. Es el único modo en que pueda después ofrecer resultados relevantes en la búsqueda dentro de tu sitio.
No tengo datos comprobables de que esto sea así, pero el sentido común me hace pensar que es así.

En todo caso ambos métodos son buenos y es preciso conocerlos de modo que vamos a verlos.

Para realizar una página de búsqueda de nuestro sitio empezamos creando una página **search.php**, cuya estructura html ya es conocida:

```
<?php get_header(); ?>
  <div id="twocols"> 
   <div id="maincol">
 
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    </div><!– #post-<?php the_ID(); ?> –>   
    
    <div id="nav-below" class="navigation">
    </div><!– #nav-below –>     
    
   </div><!– #twocols –>  
  <?php get_sidebar(); ?>
  </div><!– #maincol –>
<?php get_footer(); ?>
```

En **search.php** recuperamos el loop pero esta vez con un condicional if por si no tenemos ningún post que recorrer. De hecho es así como va a funcionar, si tenemos post que coincidan con la cadena de búsqueda que estamos utilizando, se ejecuta el bucle a través de ellos, en caso contrario no, avisamos al visitante y le damos la oportunidad de buscar de nuevo.

¿Cual es la estructura básica?

```
<?php get_header(); ?>
  <div id="twocols"> 
   <div id="maincol">
  
	<?php if ( have_posts() ) : ?>     
	<?php while ( have_posts() ) : the_post() ?>
 
	<!– this is our loop –>
	<?php endwhile; ?> 
 
	<?php else : ?>
	 
	<!– Formulario de búsqueda si no hay resultados. –>
	 
	<?php endif; ?>   
	 
	</div><!– #maincol –>  
	<?php get_sidebar(); ?>
	</div><!– #twocols –>
<?php get_footer(); ?>
```

Tengamos en cuenta otra consideración: la búsqueda se va a realizar entre páginas y post, pero posiblemente sea una buena idea diferenciar en los resultados ambas.

¿Como?. Veámoslo con el resultado que nos ofrece una búsqueda.
￼He buscado diseño en mi CMS y recibo este resultado. El primer resultado es una página, el segundo un post. Como puedes ver la diferencia entre ambas son las etiquetas meta, que en el caso de la página no se muestran y en el del post si. De hecho vemos como fue escrito por admin el 6 noviembre 2008, que pertenece a la categoría de libros, que tiene un comentario, etc...

La etiqueta que permite discriminar entre ambos tipos es:

`<?php if ( $post->post_type == 'post' ) { ?> <!-- Muestra tag de autor y fecha publicación -->`

En el caso de que no haya resultados

```
<?php else : ?> <!-- Si no hay resultados -->
 
 <div id="post-0" class="post no-results not-found"> 
 <h2 class="entry-title"><?php _e( 'Nothing Found', 'your-theme' ) ?></h2>
 <div class="entry-content">
 <p><?php _e( 'No siento no hay resultados a su búsqueda, por favor pruebe con otras palabras.', 'your-theme' ); ?></p>		
<?php get_search_form(); ?>                                             
</div><!-- .entry-content -->
</div>
```

El código completo lo tienes en el sitio del tema.

### La búsqueda personalizada de Google. ###

Accedemos a esta funcionalidad de Google mediante http://www.google.es/cse/
￼
Creamos un nuevo motor de búsqueda personalizado.

Y rellenamos todos los datos teniendo en cuenta varias cuestiones:
  * ay dos versiones una gratis que muestra anuncios, pero podemos vincular a adsense para obtener algún  beneficio, y otra de pago que no los muestra.
  * odemos indexar-buscar en sitios completos o bien en partes concretas del sitio.
  * odemos buscar dominios completos.
￼
Una vez completado el proceso tenemos un panel de control correspondiente al motor de búsqueda.