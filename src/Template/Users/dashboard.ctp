    <br>
    <div class="col-lg-12">

        <?php

        foreach ($items as $item) {
            ?>
            <div class="col-lg-3 col-md-3 col-sm-3 mb">
                <div class="content-panel pn">

                    <a href="#">
                        <?php
                        $url = "http://localhost".$this->request->base.$item->image_url;
                        $background_variable = "background-image: url($url);";
                        ?>
                        <div id="blog-bg" style="<?php echo $background_variable; ?>">

                        </div>
                    </a>

                    <div class="blog-text">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                <p><a href="#"><i class="fa fa-star-o fa-2x"></i></a></p>  <!--fa fa-star-->

                            </div>
                            <div class="col-md-6">
                                <p><i type="button" class="fa fa-info-circle fa-2x" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus. Vivamus sagittis lacus vel augue laoreet rutrum faucibus.rutrum Vivamus sagittis lacus vel augue laoreet rutrum faucibus. Vivamus sagittis lacus vel augue laoreet rutrum faucibus. Vivamus sagittis lacus vel augue laoreet rutrum faucibus. Vivamus sagittis lacus vel augue laoreet rutrum faucibus." data-original-title="" title="Mindmeister"></i></p>

                                <!--<button type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="right" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." data-original-title="" title="">Popover on right</button>-->

                            </div>
                        </div>
                    </div>
                </div><!-- /col-md-4-->
            </div> <! -- END 3RD ROW OF PANELS -->
        <?php
        }
        ?>
    </div>