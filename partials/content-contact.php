
                                    <?php if( get_field('contact_address') ): ?>
                                    <h5>Address</h5>
                                    <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                                    <?php echo wp_kses (get_field('contact_address'), array('br' => array())); ?>
                                    </div>
                                    <?php endif; ?>


                                    <h5>Contact Options</h5>
                                     <?php if( get_field('phone_landline') ): ?>
                                    <span itemprop="telephone">Tel: <?php echo esc_html (get_field('phone_landline')); ?></span>
                                    <?php endif; ?>

                                      <ul id="contact-details">
					     <?php if( get_field('email') ): ?>
                                <li class="email"><a href="mailto:<?php echo esc_url (get_field('email')); ?>" itemprop="email" aria-label="Hit enter to open your email client to contact us" target="_blank"><i class="fi-mail"></i></a></li>
                            <?php endif; ?>

					     <?php if( get_field('twitter') ): ?>
                             <li><a href="<?php echo esc_url (get_field('twitter')); ?>" aria-label="Visit us on Twitter - this link opens in a new Window" target="_blank"><i class="fi-social-twitter"></i></a></li>
                                    <?php endif; ?>

                        <?php if( get_field('linkedin') ): ?>
                               <li><a href="<?php echo esc_url (get_field('linkedin')); ?>" aria-label="Visit us on Linkedin - this link opens in a new Window" target="_blank"><i class="fi-social-linkedin"></i></a></li>
                                    <?php endif; ?>

                                    </ul>
