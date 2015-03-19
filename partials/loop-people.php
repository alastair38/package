                        <?php

                        $persons = get_posts(array(
                            'post_type' => 'people',
                            'posts_per_page' => 10,
                            'orderby'    => 'date',
	                        'order'      => 'ASC'
                        ));
                        ?>

                        <?php if( $persons ){ ?>

                         <div id="main" class="large-8 columns first" role="main">

                         <?php get_template_part( 'partials/loop', 'page' ); ?>

                          </div> <!-- end #main -->

                          <div id="aside" class="large-4 columns first" role="aside">


                        <h1 class="people-title">Staff</h1>
                        <?php foreach( $persons as $person ): ?>


                            <div class="people-details" itemscope itemtype="http://schema.org/Person">
                            <?php $permalink = get_permalink($person->ID);?>

                            <?php echo get_the_post_thumbnail( $person->ID, array(100,100), array('itemprop' => 'image', 'class' => 'alignleft') ); ?>
                            <h4><a href="<?php echo $permalink;?>" itemprop="name"><?php echo $person->post_title; ?></a></h4>
                            </div>
                            </div>

                        <?php endforeach;
                        } else {
                        ?>

                        <div id="main" class="large-12 columns first" role="main">

                         <?php get_template_part( 'partials/loop', 'page' ); ?>

                          </div> <!-- end #main -->

                        <?php
                        }
                        ?>


                        <?php wp_reset_postdata();?>
