<div id="rightcol">

<?php get_search_form(); ?>  

		<nav>
			<?php wp_nav_menu(array('menu' => 'Categorias')); ?>
		</nav> 

		<div class="widget-rss"> <!-- Comienzo del RSS--> 

			<h4>FAQ</h4>
			
			<?php if (function_exists('fetch_feed')) { ?>
				
				<?php include_once(ABSPATH . WPINC . '/feed.php'); 
				
				      $feed = fetch_feed('feed://wordpress.org/news/feed/');
				
					  $limit = $feed->get_item_quantity(3);
					
					  $items = $feed->get_items(0, $limit);
					
					if (!$items) {
						
						echo "problem";
						
					} else {
						
						// Mostramos las entradas del RSS
						
						foreach ($items as $item) { ?>
							
							<div class="sidebar-post">
								<p class="date"><?php echo $item->get_date('F j, Y'); ?></p>
								<h5><a href="<?php echo $item->get_permalink(); ?>"><?php echo $item->get_title(); ?></a></h5>
								<p><?php echo $item->get_content(); ?></p>
							</div>
						
					<?php } 
					
				    } ?>

			<?php } ?>

		</div> <!-- Fin del RSS--> 
		 
		 
		<div class="widget">  <!-- widget--> 
		 <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Widgets')) : else : ?>

		    <!-- Contenido que se muestra si no hay contenido en el widget I-->
		
		<?php endif; ?>    <!-- Fin widget--> 
		
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Sidebar Widgets II") ) : else: ?> <!-- Segundo widget--> 
		
		<?php endif; ?> <!-- Fin segundo widget-->

</div><!– #rightcol –> 