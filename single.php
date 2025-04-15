<?php get_header(); ?>

<div class="content">

	<?php while ( have_posts() ): the_post(); ?>
	
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<?php if ( has_post_format( array( 'audio', 'gallery', 'video', 'image' ) ) ): ?>
				
				<div class="entry-media">
					<?php if( get_post_format() ) { get_template_part('inc/post-formats'); } ?>
				</div>

			<?php endif; ?>
			
			<?php do_action( 'alx_ext_sharrre' ); ?>
			
			<div class="flow flow-single">
			
				<?php if ( has_post_format( array( 'audio', 'gallery', 'video', 'image' ) ) ): ?>
				
				<?php else: ?>
				
					<i class="fas fa-pencil-alt flow-icon"></i>

					<?php if ( has_post_thumbnail() ): ?>
						<div class="flow-thumbnail">
							<?php the_post_thumbnail('curveflow-small'); ?>
							<?php if ( has_post_format('video') && !is_sticky() ) echo'<span class="thumb-icon small"><i class="fas fa-play"></i></span>'; ?>
							<?php if ( has_post_format('audio') && !is_sticky() ) echo'<span class="thumb-icon small"><i class="fas fa-volume-up"></i></span>'; ?>
							<?php if ( is_sticky() ) echo'<span class="thumb-icon small"><i class="fas fa-star"></i></span>'; ?>
						</div>
					<?php endif; ?>
				
				<?php endif; ?>
				
				<div class="flow-inner <?php if ( has_post_thumbnail() ): ?>has-thumbnail<?php endif; ?>">
					<div class="flow-content">
						
						<div class="flow-category"><?php the_category(' / '); ?></div>
						
						<h1 class="flow-title">
							<?php the_title(); ?>
						</h1>
						
						<ul class="flow-meta group">
							<?php if ( get_theme_mod( 'author-avatar', 'on' ) == 'on' ): ?>
								<li class="flow-author"><a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php echo get_avatar(get_the_author_meta('user_email'),'64'); ?></a></li>
							<?php endif; ?>
							<li class="flow-date"><i class="far fa-calendar"></i><?php the_time( get_option('date_format') ); ?></li>
							<?php if ( comments_open() && ( get_theme_mod( 'comment-count', 'on' ) =='on' ) ): ?>
								<?php $number = get_comments_number( $post->ID ); if ( $number > 0 ) { ?>
									<li class="flow-comments"><a href="<?php comments_link(); ?>"><i class="far fa-comment"></i><span><?php comments_number( '0', '1', '%' ); ?></span></a></li>
								<?php } ?>
							<?php endif; ?>
						</ul>
						
					</div>
				</div>
			
			</div>
				
		</article><!--/.post-->

			<div class="entry-content">
				<div class="entry themeform">	
					<?php the_content(); ?>
					<?php wp_link_pages(array('before'=>'<div class="post-pages">'.esc_html__('Pages:','curveflow'),'after'=>'</div>')); ?>
					<div class="clear"></div>				
				</div><!--/.entry-->
			</div>
			
			<div class="entry-footer group">
	
				<?php the_tags('<p class="post-tags"><span>'.esc_html__('Tags:','curveflow').'</span> ','','</p>'); ?>
				
				<div class="clear"></div>
				
				<?php if ( ( get_theme_mod( 'author-bio', 'on' ) == 'on' ) && get_the_author_meta( 'description' ) ): ?>
					<div class="author-bio">
						<div class="bio-avatar"><?php echo get_avatar(get_the_author_meta('user_email'),'128'); ?></div>
						<p class="bio-name"><?php the_author_meta('display_name'); ?></p>
						<p class="bio-desc"><?php the_author_meta('description'); ?></p>
						<div class="clear"></div>
					</div>
				<?php endif; ?>
				
				<?php do_action( 'alx_ext_sharrre_footer' ); ?>
				
				<?php if ( get_theme_mod( 'post-nav', 'sidebar' ) == 'content' ) { get_template_part('inc/post-nav'); } ?>
				
				<?php if ( get_theme_mod( 'related-posts', 'categories' ) != 'disable' ) { get_template_part('inc/related-posts'); } ?>

				<?php if ( comments_open() || get_comments_number() ) :	comments_template( '/comments.php', true ); endif; ?>
				
			</div>

	<?php endwhile; ?>

</div><!--/.content-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>