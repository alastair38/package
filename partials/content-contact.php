
                                    <?php if( get_field('contact_address') ): ?>
                                    <h5>Address</h5>
                                    <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                                    <?php the_field('contact_address'); ?>
                                    </div>
                                    <?php endif; ?>

                                    <h5>Contact Options</h5>
                                     <?php if( get_field('phone_landline') ): ?>
                                    <span itemprop="telephone">Tel: <?php the_field('phone_landline'); ?></span>
                                    <?php endif; ?>

                                      <ul id="contact-details">
					     <?php if( get_field('email') ): ?>
                                <li class="email"><a href="mailto:<?php the_field('email'); ?>" itemprop="email" target="_blank"><i class="fi-mail"></i></a></li>
                            <?php endif; ?>

					     <?php if( get_field('twitter') ): ?>
                             <li><a href="<?php the_field('twitter'); ?>" target="_blank"><i class="fi-social-twitter"></i></a></li>
                                    <?php endif; ?>

                        <?php if( get_field('linkedin') ): ?>
                               <li><a href="<?php the_field('linkedin'); ?>" target="_blank"><i class="fi-social-linkedin"></i></a></li>
                                    <?php endif; ?>

                                    </ul>
