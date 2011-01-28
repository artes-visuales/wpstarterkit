<?php get_header(); ?>
        
<div id="twocols"> 
	 <div id="maincol">
	 
        <h1>No se encuentra, Error 404</h1>
		<p>Lo lamento pero no encontramos lo que busca. <br/>
		Puede ver la estructura del sitio para navegar por ella:</p>
		
		<p><?php get_search_form(); ?></p>
		
		<b>PAGINAS:</b>
			<ul>
				<?php wp_list_pages('title_li='); ?>
			</ul>
					
		<b>CATEGORIAS:</b>
			<ul>
				<?php wp_list_cats('sort_column=name'); ?>
			</ul>       
        
	</div><!-- #maincol -->       
	
	<?php get_sidebar(); ?> 
	  
</div><!-- #twocols -->
                
<?php get_footer(); ?>