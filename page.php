<?php get_header();

if( get_field('logo_image') )
{
    echo '<div id="content" style="background: url(' . get_field('logo_image') . '); background-position: center; background-size: contain;">';
}
else
{
    echo '<div id="content" style="background: url(' . get_template_directory_uri() . '/library/images/background.jpg); background-position: center; background-size: cover;">';
}
?>
				<div id="inner-content" class="row">

				    <div id="main" class="large-12 columns" role="main">

                     <?php get_template_part( 'partials/loop', 'slider' ); ?>

    				</div> <!-- end #main -->

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

    				<?php

// The Query
$page = get_page_by_path( 'about' );
$permalink = get_permalink($page->ID);

echo '<div id="about" class="large-4 columns" role="complementary"><a href="' . $permalink . '">' . $page->post_title . '<i class="fi-torsos-all"></i></a></div>';

$page = get_page_by_path( 'contact' );
$permalink = get_permalink($page->ID);

echo '<div id="contact" class="large-4 columns" role="complementary"><a href="' . $permalink . '">' . $page->post_title . '<i class="fi-mail"></i></a></div>';

$page = get_page_by_path( 'blog' );
$permalink = get_permalink($page->ID);

echo '<div id="news" class="large-4 columns" role="complementary"><a href="' . $permalink . '">' . $page->post_title . '<i class="fi-rss"></i></a></div>';

?>

<?php echo get_the_post_thumbnail( $person->ID, array(100,100), array('itemprop' => 'image', 'class' => 'alignleft') ); ?>

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
    $trimmed_content = wp_trim_words( $content, 10, '<a href="'. get_permalink() .'"> ...Read More</a>' );
		echo '<p>' . get_the_time("j.m.y") . '</p>' . get_the_post_thumbnail( $post_ID, array(50,50), array('itemprop' => 'image') ) . '<h5><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h5>' . $trimmed_content;
	}
	echo '</div>';
} else {
	// no posts found
}
/* Restore original Post Data */
wp_reset_postdata();

get_footer(); ?>
