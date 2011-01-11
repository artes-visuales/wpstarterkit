<?php get_header(); ?>
        
<div id="twocols"> 
	 <div id="maincol">
        
<?php the_post(); ?>

    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	    <h1 class="entry-title"><?php the_title(); ?></h1>
	    
	    <div class="entry-meta">
	            <span class="meta-prep meta-prep-author"><?php _e('Por ', 'your-theme'); ?></span>
	            <span class="author vcard"><a class="url fn n" href="<?php echo get_author_link( false, $authordata->ID, $authordata->user_nicename ); ?>" title="<?php printf( __( 'Ver todos los post de %s', 'your-theme' ), $authordata->display_name ); ?>"><?php the_author(); ?></a></span>
	            <span class="meta-sep"> | </span>
	            <span class="meta-prep meta-prep-entry-date"><?php _e('Publicado ', 'your-theme'); ?></span>
	            <span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
	            <?php edit_post_link( __( 'Edit', 'your-theme' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t" ) ?>                                               
	    </div><!-- .entry-meta -->
	    
	    <div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'your-theme' ) . '&after=</div>') ?>
	    </div><!-- .entry-content -->
	    
	    <div class="entry-utility">
	    <?php printf( __( 'Esta entrada pertenece a %1$s%2$s. Bookmark en <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>. Comentarios <a href="%5$s" title="RSS en %4$s" rel="alternate" type="application/rss+xml">RSS </a>.', 'your-theme' ),
	            get_the_category_list(', '),
	            get_the_tag_list( __( ' tag', 'your-theme' ), ', ', '' ),
	            get_permalink(),
	            the_title_attribute('echo=0'),
	            comments_rss() ) ?>
	
		<?php if ( ('open' == $post->comment_status) && ('open' == $post->ping_status) ) : // Comments y trackbacks ?>
            <?php printf( __( '<a class="comment-link" href="#respond" title="Post a comment">Comentarios</a> or leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your post" rel="trackback">Trackback URL</a>.', 'your-theme' ), get_trackback_url() ) ?>
			<?php elseif ( !('open' == $post->comment_status) && ('open' == $post->ping_status) ) : // Sólo trackbacks ?>
            <?php printf( __( 'Comments are closed, but you can leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your post" rel="trackback">Trackback URL</a>.', 'your-theme' ), get_trackback_url() ) ?>
			<?php elseif ( ('open' == $post->comment_status) && !('open' == $post->ping_status) ) : // Sólo comments  ?>
            <?php _e( 'Trackbacks are closed, but you can <a class="comment-link" href="#respond" title="Post a comment">Comentarios</a>.', 'your-theme' ) ?>
			<?php elseif ( !('open' == $post->comment_status) && !('open' == $post->ping_status) ) : // Comments y trackbacks cerrados ?>
            <?php _e( 'Both comments and trackbacks are currently closed.', 'your-theme' ) ?>
		<?php endif; ?>
		<?php edit_post_link( __( 'Edit', 'your-theme' ), "\n\t\t\t\t\t<span class=\"edit-link\">", "</span>" ) ?>
	    </div><!-- .entry-utility -->                                                                                                   
    
    </div><!-- #post-<?php the_ID(); ?> -->                 
    
    <div id="nav-below" class="navigation">
            <div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">&laquo;</span> %title' ) ?></div>
            <div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">&raquo;</span>' ) ?></div>
    </div><!-- #nav-below -->                                       

	<?php comments_template('', true); ?>                   
        
	</div><!-- #maincol -->         
	
	<?php get_sidebar(); ?> 
	
</div><!-- #twocols -->
                
<?php get_footer(); ?>