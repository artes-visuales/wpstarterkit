<?php get_header(); ?>
	<div id="content" class="container">
		<div class="column_main">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				  
          <h1><?php the_title(); ?></h1>
			<div class="hr_top"></div>
            <div id="entry">
				<?php the_content(); ?>   
			</div>
					
			<br />
			<p class="nav-below" align="center">
				<?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentyten' ) . '</span> %title' ); ?> - 
				<?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '</span>' ); ?>
			</p><!-- #nav-below -->
			<br /><br />             
			
			<table width="550px" border="0" align="center" cellspacing="0" bordercolor="#CCCCCC">
				<tr>
				<td width="426">
				<blockquote class="Paypal_pago">
					Matr&iacute;cula de 808 euros y 2 pagos 779 euros.<br/>
					<strong> iPad </strong> y libros. <br/>
					El pago se realiza mediante Paypal con tarjeta.<br/>
				</blockquote>
				</td>
				<td width="165">
				<blockquote class="Paypal_codigo">
					<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_xclick-subscriptions&
					business=elizagarate@artesvisuales.com
					&item_name=CURSO DESIGN GRAFICO&
					a1=808&p1=1&t1=M&a3=779&p3=1&t3=M
					&srt=2&sra=1&currency_code=EUR" target="_blank">
					<img src="http://www.paypal.com/es_ES/i/btn/x-click-but20.gif" name="Paypal" align="middle">
					</a>
				</blockquote>
				</td>
				</tr>
				<tr>
				<td width="426">
				<blockquote class="Paypal_pago">
					Matr&iacute;cula de 346 euros y 24 pagos 86 euros.<br/>
					Creative Suite Design Standard CS 5.5 y libros. <br/>
					El pago se realiza mediante Paypal con tarjeta.<br/>
				</blockquote>
				</td>
				<td width="165">
				<blockquote class="Paypal_codigo">
					<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_xclick-subscriptions&
					business=elizagarate@artesvisuales.com
					&item_name=CURSO DESIGN GRAFICO&
					a1=346&p1=1&t1=M&a3=86&p3=1&t3=M
					&srt=24&sra=1&currency_code=EUR" target="_blank">
					<img src="http://www.paypal.com/es_ES/i/btn/x-click-but20.gif" name="Paypal" align="middle">
					</a>
				</blockquote>
				</td>
				</tr>
			</table>   
			<br/><br/>
				
			<div class="commentsContainer">  
				<div id="fb-root"></div>
				<script src="http://connect.facebook.net/en_US/all.js#appId=171488766248160&amp;xfbml=1"></script>
				<fb:like href="<?php the_permalink(); ?>" send="true" width="550" show_faces="true" font="verdana"></fb:like>
			</div>    
			<br />
			<br />
			
			<div id="fb-root"></div>
			<script src="http://connect.facebook.net/es_ES/all.js#xfbml=1"></script>
			<fb:comments href="<?php the_permalink(); ?>" num_posts="5" width="550"></fb:comments>      
            
			<?php endwhile; else: ?>
			<h1>Lo siento no hay entradas de acuerdo con sus criterios de búsqueda.</h1>
			<?php endif; ?>
		</div>
				
		<div class="hr_bottom"></div>
	</div>

<?php get_footer(); ?>