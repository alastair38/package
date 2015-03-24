
                            <div class="slider" id="frontPagecontent">
                                <div>
                                <?php echo wp_kses (get_field('slide_one'), array(
                                'br' => array(),
                                'p' => array(),
                                'h1' => array(),
                                'h2' => array(),
                                'h3' => array(),
                                'h4' => array(),
                                'h5' => array(),
                                'h6' => array()
                                )); ?>
                                </div>
                                <div>
                                <?php echo wp_kses (get_field('slide_two'), array(
                                'br' => array(),
                                'p' => array(),
                                'h1' => array(),
                                'h2' => array(),
                                'h3' => array(),
                                'h4' => array(),
                                'h5' => array(),
                                'h6' => array()
                                )); ?>
                                </div>
                            </div>

                            <div class="controls">
                                <button aria-hidden="true" class="next"></button>
                                <button aria-hidden="true" class="prev"></button>
                            </div>
