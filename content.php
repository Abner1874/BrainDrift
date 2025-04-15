<?php $format = get_post_format(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('flow'); ?>>

	<?php if ( has_post_thumbnail() ): ?>
		<div class="flow-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('curveflow-small'); ?>
				<?php if ( has_post_format('video') && !is_sticky() ) echo'<span class="thumb-icon small"><i class="fas fa-play"></i></span>'; ?>
				<?php if ( has_post_format('audio') && !is_sticky() ) echo'<span class="thumb-icon small"><i class="fas fa-volume-up"></i></span>'; ?>
				<?php if ( is_sticky() ) echo'<span class="thumb-icon small"><i class="fas fa-star"></i></span>'; ?>
			</a>
		</div>
	<?php else: ?>
		
	<?php endif; ?>
	
	<div class="flow-inner <?php if ( has_post_thumbnail() ): ?>has-thumbnail<?php endif; ?>">
		<div class="flow-content">
			
			<div class="flow-category"><?php the_category(' / '); ?></div>
			
			<h2 class="flow-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h2>
			
			<?php if (get_theme_mod('excerpt-length','18') != '0'): ?>
				<div class="flow-excerpt">
					<?php the_excerpt(); ?>
				</div>
			<?php endif; ?>
			
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

</article>