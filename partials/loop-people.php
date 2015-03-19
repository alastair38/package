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


                        <h3 class="people-title">Team Members</h3>
                        <?php foreach( $persons as $person ): ?>


                            <div class="people-details">
                            <?php $permalink = get_permalink($person->ID);?>
                             <h3><a href="<?php echo $permalink;?>"><?php echo get_the_title( $person->ID ); ?></a></h3>
                            <?php echo get_the_post_thumbnail( $person->ID ); ?>
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
