<?php
/**
 * @package storefront
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="" style="display:none">

	<?php
	/**
	 * @hooked storefront_post_header - 10
	 * @hooked storefront_post_meta - 20
	 * @hooked storefront_post_content - 30
	 */
	//atelierbourgeons_post_content();
	?>
        <div class="entry-content">
        <?php
            echo '<a href="' . get_post_permalink( get_the_ID() ) . '">';
            echo storefront_post_thumbnail( 'large' );
            echo '</a>';

            /*echo '<h2>';
            single_post_title('Article en cours : ');
            echo '</h2>';*/
            
            //echo get_metadata( get_the_ID(), 'date', true );
            echo '<div class="post_summary">';
            echo '<ul class="post_meta_list"><li>';            
            echo '<i class="fa fa-lg  fa-user"></i>';            
            echo the_author_meta( 'display_name', $post->post_author );
            echo '</li><li>';
            echo '<i class="fa fa-lg fa-clock-o"></i>';
            echo get_the_date( 'F j, Y', get_the_ID() );            
            echo '</li><li>';
            echo '<i class="fa fa-lg fa-folder"></i>';
            $categories = get_the_category( get_the_ID() );
            if ( ! empty( $categories ) ) {
                echo esc_html( $categories[0]->name );
            }
            echo '</li></ul>';
            the_title('<a href="' . get_post_permalink( get_the_ID() ) . '"><h4>', '</h4></a>');
            the_content(
                    sprintf(
                        __( 'Read', 'atelierbourgeons' ),
                            '<span class="screen-reader-text">' . get_the_title() . '</span>'
                    )
            );

            wp_link_pages( array(
                    'before' => '<div class="page-links">' . __( 'Pages:', 'storefront' ),
                    'after'  => '</div>',
            ) );
            echo '</div>';
		?>
        </div><!-- .entry-content -->

</article><!-- #post-## -->
