<?php get_header(); ?>

<?php
	$curr_cat = get_category( $cat );
	$cat_name = ( $curr_cat ) ? $curr_cat->slug : '';
	$loop_featured = new WP_Query(
		array(
			'category_name' => $cat_name,
			'posts_per_page' => 4,
		));
	$ids = array();
?>

<div class="content">
	
	<?php get_template_part('inc/page-title'); ?>
	
	<div class="flow-featured">
		<?php
			while ( $loop_featured->have_posts() ) : $loop_featured->the_post();
				$ids[] = get_the_ID();
				get_template_part('content');
			endwhile;
			wp_reset_postdata();
		?>
	</div>
	
	<?php
		if ( get_query_var('paged') ) {
			$paged = get_query_var('paged');
		} elseif ( get_query_var('page') ) { // 'page' is used instead of 'paged' on Static Front Page
			$paged = get_query_var('page');
		} else {
			$paged = 1;
		}

		$custom_query_args = array(
			'post_type' => 'post', 
			'posts_per_page' => get_option('posts_per_page'),
			'paged' => $paged,
			'post_status' => 'publish',
			'ignore_sticky_posts' => true,
			'post__not_in' => $ids,
			'category_name' => $cat_name,
			'order' => 'DESC',
			'orderby' => 'date'
		);
		$custom_query = new WP_Query( $custom_query_args );

		if ( $custom_query->have_posts() ) :
	?>
	
	<div class="flow-normal">
	<?php while( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
		<?php get_template_part('content'); ?>
	<?php endwhile; ?>
	</div>
	
	<?php if ($custom_query->max_num_pages > 1) : // custom pagination  ?>
	<?php
		$orig_query = $wp_query; // fix for pagination to work
		$wp_query = $custom_query;
	?>
	<?php get_template_part('inc/pagination'); ?>

	<?php $wp_query = $orig_query; // fix for pagination to work ?>
	<?php endif; ?>

	<?php wp_reset_postdata(); endif; ?>
	
</div><!--/.content-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>