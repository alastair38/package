
                       	<div class="slider-wrapper">


                            <div class="slider" id="frontPagecontent">
                                <div>
                                  <?php echo wp_kses (get_field('slide_one'), array('br' => array(),'p' => array())); ?>
                                </div>
                                <div>
                                   <?php echo wp_kses (get_field('slide_two'), array('br' => array(),'p' => array())); ?>
                                </div>
                            </div>
                                <div class="controls">
                                <button aria-hidden="true" class="next"></button>
                                <button aria-hidden="true" class="prev"></button>

                            </div>
                        </div>
