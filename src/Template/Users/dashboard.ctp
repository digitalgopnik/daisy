    <br>
    <div class="col-lg-12">

        <?php
        $favorites_array = [];
        foreach ($favorites as $favorite) {
            $favorites_array[$favorite->item_id] = $favorite->id;
        }
        foreach ($items as $item) {
            ?>
            <div class="col-lg-3 col-md-3 col-sm-3 mb">
                <div class="content-panel pn">
                    <!-- <a href="<?php echo $host_server; ?>/App/<?php echo $item->url; ?>"> -->
                    <a href="<?php echo $item->url; ?>" target="_blank">
                        <?php

                        $url = $this->request->base.$item->image_url;
                        $background_variable = "background-image: url($url); background-size: 71%;";
                        ?>
                        <div id="blog-bg" style="<?php echo $background_variable; ?>">

                        </div>
                    </a>


                    <div class="blog-text">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="row" style="margin-left: 20px; font-size: 14px"><p><?php echo $item->name; ?></p></div>

                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                <?php $user_id = $this->request->session()->read('user_id'); ?>
                                <?php if (isset($user_id) && $user_id!=null) { ?>
                                <?php
                                if (isset($favorites_array[$item->id])) {
                                    ?>
                                    <p><a id="delete<?php echo $item->id; ?>"><i id="delete_i<?php echo $item->id; ?>"
                                                                                 style="color: orange;"
                                                                                 class="fa fa-star-o fa-2x"></i></a>
                                    </p>  <!--fa fa-star-->
                                <?php
                                } else {
                                    ?>
                                    <p><a id="add<?php echo $item->id; ?>"><i id="add_i<?php echo $item->id; ?>"
                                                                              class="fa fa-star-o fa-2x"></i></a>
                                    </p>  <!--fa fa-star-->
                                <?php
                                }
                                ?>

                                <script>
                                    var host_server = <?php echo json_encode($host_server); ?>;

                                    jQuery('#add<?php echo json_decode($item->id); ?>').click(function () {

                                        jQuery('#add_i<?php echo json_decode($item->id);?>').css('color', 'orange');

                                        $.ajax({
                                            url: host_server + '/Favorites/add/<?php echo json_decode($item->id); ?>',
                                            type: 'POST',
                                            data: 'test',
                                            dataType: 'json',
                                            async: true,
                                            cache: false
                                        })
                                            .always(function (data) {
                                                //alert('Erfolgreich markiert!');
                                            });

                                    });

                                    jQuery('#delete<?php echo json_decode($item->id); ?>').click(function () {

                                        jQuery('#delete_i<?php echo json_decode($item->id);?>').css('color', '#428bca');

                                        $.ajax({
                                            url: host_server + '/Favorites/delete/<?php echo json_encode($item->id); ?>',
                                            type: 'POST',
                                            data: 'test',
                                            dataType: 'json',
                                            async: true,
                                            cache: false
                                        })
                                            .always(function (data) {
                                                //alert('Erfolgreich de-markiert!');
                                            });

                                    });

                                </script>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                <p><a data-toggle="modal " href="#info_modal<?php echo $item->id; ?>"><i class="fa fa-info-circle fa-2x"></i></a></p>
                                <script>
                                </script>
                                <div id="info_modal<?php echo $item->id; ?>" class="modal fade bs-kategorie-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content" style="background-color: #fff">
                                            <p><?php echo $item->help_text; ?></p>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div><!-- /col-md-4-->
            </div> <! -- END 3RD ROW OF PANELS -->
        <?php
        }
        ?>
    </div>
