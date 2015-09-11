<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div id="single">
        <?php if ( function_exists('yoast_breadcrumb') ) 
            {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
		<h1><?php the_title(); ?></h1>   


			<?php
			if ( has_post_thumbnail() ) { ?>
                    	<?php 
                    	$imgsrcparam = array(
						'alt'	=> trim(strip_tags( $post->post_excerpt )),
						'title'	=> trim(strip_tags( $post->post_title )),
						);
                    	$thumbID = get_the_post_thumbnail( $post->ID, 'big', $imgsrcparam ); ?>
						<div class="sepia">
                        <div class="preview"><a href="<?php the_permalink() ?>"><?php echo "$thumbID"; ?></a></div>
						</div><!-- .sepia -->                    
                    <?php } ?>

        <?php the_content(); ?>
		
			<?php if($post->post_parent) {
				$parent_link = get_permalink($post->post_parent); ?>
			<a href="<?php echo $parent_link; ?>">Link to parent page</a><br/>
			<?php } ?>

        <?php edit_post_link(__('Edit this page')); ?>
    </div>
	<?php endwhile; ?>
	<?php else : ?>
	<?php endif; ?>  

	<?php include (TEMPLATEPATH . "/sidebar.php"); ?>  
    
              
<?php get_footer(); ?>
