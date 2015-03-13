## Plantilla y estructura de las páginas ##

Un tema mínimo se define con dos páginas, una plantilla index.php y un archivo style.css. No obstante los temas se definen con algunas páginas más.

Nuestro tema mínimo incluirá 6 ficheros. Crea una carpeta en wp-content/themes/ para el tema de este tutorial, y crea los siguientes archivos en la carpeta nueva (no te preocupes, van a estar en blanco hasta que completemos los pasos siguientes).

index.php
header.php
sidebar.php
footer.php
functions.php
style.css

Ahora vamos a abrir el último archivo que hemos creado, style.css , en Dreamweaver o un editor de texto. Lo primero que tenemos que hacer es añadir una sección en la parte superior de este archivo a modo de "comentarios" contenidos entre los símbolos /**y**/ . Es en esta área de comentarios donde tenemos que poner la información para WordPress sobre el tema. Sin ella, el tema no se mostrará en el panel de temas.

```
/*   
Theme Name: Your Theme
Theme URI: http://example.com/example/
Description: A search engine optimized website framework for WordPress.
Author: You
Author URI: http://example.com/
Version: 1.0
Tags: Comma-separated tags that describe your theme
.
Your theme can be your copyrighted work.
Like WordPress, this work is released under GNU General Public License, version 2 (GPL).
http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
.
*/
```

**Un consejo:** mucha de esta información es opcional. En realidad, sólo necesitamos el nombre del tema. Pero si planeamos liberar el tema, o si estamos haciendo un tema personalizado para alguien, no es mala idea completar todos los datos disponibles.

Una vez salvado el css podemos activar el tema e ir al sitio de prueba. Hemos hecho el tema en blanco por excelencia!

### Estructura del HTML ###

Ahora tenemos que utilizar la estructura HTML de la lección anterior. Pero primero una mini-lección sobre WordPress y plantillas.

WordPress realmente sólo necesita un archivo de plantilla, index.php . Podemos necesitar, y se añaden, una serie de archivos de plantilla que puede utilizarse en lugar de index.php para determinadas situaciones (post individuales, páginas de categorías, etc), pero desde el principio, index.php es todo lo que necesitamos.

Pensemos en cada una de esas páginas web, como las historias, con un principio, un desarrollo y un final.

Cada una de las páginas del tema tendrá esa estructura:

Comenzará por el principio denominado header.php.
Se desarrollará en el contenido: index.php, single.php, category.php, home.php, etc...
Y finalizará con footer.php.

Es decir cuando escribimos nuestra página index.php (y más tarde nuestra single.php, category.php , etc) nos vamos a concentrar sólo en el desarrollo, el contenido. Pero... Vamos a llamar al principio del documento a - header.php - y al final del mismo a - footer.php - en todas y cada una de ellas. Puede que tengamos que hacer nuestros contenidos en cada página, pero sólo vamos a hacer el header y el footer una vez.

### Header.php y footer.php ###

Rescate la estructura HTML que creamos en la lección anterior y copie todo hasta e incluyendo <div><i>en <b>header.php</b> y guárdelo. Debe tener este aspecto:</i>

<pre><code>&lt;!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"&gt;<br>
&lt;html&gt;<br>
 <br>
&lt;head&gt;<br>
&lt;title&gt;Layout&lt;/title&gt;<br>
&lt;meta http-equiv="content-type" content="text/html;charset=utf-8" /&gt;<br>
 &lt;link rel="stylesheet" type="text/css" href="styles/layout.css" /&gt;<br>
&lt;/head&gt;<br>
 <br>
&lt;body&gt;<br>
 <br>
&lt;div id="pagewidth" class="hfeed"&gt;<br>
 <br>
	&lt;div id="header"&gt;&lt;h2&gt;Head&lt;/h2&gt;<br>
		&lt;div id="branding"&gt; &lt;/div&gt;&lt;!– #branding –&gt; <br>
		&lt;div id="access"&gt; &lt;/div&gt;&lt;!– #access –&gt; <br>
	&lt;/div&gt; &lt;!– #header –&gt;<br>
 <br>
	&lt;div id="wrapper" class="clearfix"&gt;<br>
</code></pre>

Después vamos a copiar hasta e incluyendo hasta el final del div<!-- #main --> en <b>footer.php</b> de modo que tenga el siguiente aspecto:<br>
<br>
<pre><code>	&lt;/div&gt; &lt;!– #wrapper –&gt; <br>
 <br>
	&lt;div id="footer"&gt;&lt;h2&gt;Footer&lt;/h2&gt;&lt;/div&gt;<br>
 <br>
&lt;/div&gt; &lt;!– #pagewidth –&gt; <br>
 <br>
&lt;/body&gt;<br>
&lt;/html&gt;<br>
</code></pre>

Como ves la estructura a falta del contenido está creada.<br>
<br>
<h3>Index.php</h3>

Ahora para crear la página index.php nos vamos a centrar en la estructura del contenido y a llamar a header.php y footer.php en nuestra página.<br>
<br>
Escribimos la estructura dentro del div #main en index.php de modo que tenga la siguiente forma:<br>
<br>
<pre><code>	&lt;div id="twocols"&gt; <br>
		&lt;div id="maincol"&gt;&lt;h1&gt;Main Content Column&lt;/h1&gt;&lt;/div&gt;<br>
		&lt;div id="rightcol"&gt; &lt;h2&gt;right Column&lt;/h2&gt;&lt;/div&gt;<br>
	&lt;/div&gt; &lt;!– #twocols –&gt;<br>
</code></pre>

Con dos pequeñas modificaciones tenemos listo el tema de wordpress. Tenemos que poner en el encabezado y pie de página al tema. En la parte superior de index.php, antes que cualquier otro código, agregue la etiqueta siguiente a la plantilla.<br>
<br>
<pre><code>&lt;?php get_header(); ?&gt;<br>
</code></pre>

Creo que es bastante obvio lo que esta etiqueta hace. Pone el encabezado. Es buena idea echar un vistazo a esta etiqueta de la plantilla, sobre todo si eres nuevo en PHP. Quiero que te des cuenta de algunas cosas.<br>
<br>
- En primer lugar, nuestra función de PHP llamada get_header (), comienza con <?php y termina con ?>.<br>
<br>
- En segundo lugar, la sentencia termina con un punto y coma. Pequeño, pero importante.<br>
<br>
¡Muy bien! ¿Puedes adivinar cuál es la función que vamos a poner en la parte inferior de index.php?<br>
<br>
<pre><code>&lt;?php get_footer(); ?&gt;<br>
</code></pre>

Sí. Ahora tenemos el archivo principal que WordPress busca, index.php.<br>
<br>
Cuenta con la estructura de contenido creada, pero carga la parte de cabecera y pie de otros ficheros independientes.<br>
<br>
Actualiza la página en el navegador y mira el código fuente (Ver> Código fuente de la página, en Firefox). ¡Es el código! . Estás avanzando en la creación del primer tema de WordPress.