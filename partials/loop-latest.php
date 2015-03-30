<?php

$args = array(
	'post_type' => 'post',
    'posts_per_page' => 3
);
// The Query
$the_query = new WP_Query( $args );


// The Loop
if ( $the_query->have_posts() ) {
	echo '<div class="latest-posts large-12 columns" role="complementary"><h3>Latest News</h3>';
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
         $content = get_the_content();
    $trimmed_content = wp_trim_words( $content, 10 );
		echo '<p>' . get_the_time("j.m.y") . '</p>' . get_the_post_thumbnail( $post_ID, array(50,50), array('itemprop' => 'image') ) . '<h5><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h5>' . $trimmed_content;
	}
	echo '</div>';
} else {
	// no posts found
}
/* Restore original Post Data */
wp_reset_postdata(); ?>
