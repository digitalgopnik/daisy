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

                <a href="<?php echo $host_server; ?>/App/<?php echo $item->url; ?>">
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
                            <?php
                            if (isset($favorites_array[$item->id])) {
                                ?>
                                <p><a id="delete<?php echo $item->id; ?>"><i id="delete_i<?php echo $item->id; ?>" style="color: orange;" class="fa fa-star-o fa-2x"></i></a></p>  <!--fa fa-star-->
                            <?php
                            } else {
                                ?>
                                <p><a id="add<?php echo $item->id; ?>"><i id="add_i<?php echo $item->id; ?>" class="fa fa-star-o fa-2x"></i></a></p>  <!--fa fa-star-->
                            <?php
                            }
                            ?>

                            <script>

                                var host_server = <?php echo json_encode($host_server); ?>;

                                jQuery('#add<?php echo json_decode($item->id); ?>').click(function() {

                                    jQuery('#add_i<?php echo json_decode($item->id);?>').css('color', 'orange');

                                    $.ajax({
                                        url: host_server + '/Favorites/add/<?php echo json_decode($item->id); ?>',
                                        type: 'POST',
                                        data: 'test',
                                        dataType: 'json',
                                        async: true,
                                        cache: false
                                    })
                                        .always(function(data) {
                                            alert('Erfolgreich markiert!');
                                        });

                                });

                                jQuery('#delete<?php echo json_decode($item->id); ?>').click(function() {

                                    jQuery('#delete_i<?php echo json_decode($item->id);?>').css('color', '#428bca');

                                    var host_server = <?php echo json_encode($host_server); ?>;

                                    $.ajax({
                                        url: host_server + '/Favorites/delete/<?php echo json_encode($item->id); ?>',
                                        type: 'POST',
                                        data: 'test',
                                        dataType: 'json',
                                        async: true,
                                        cache: false
                                    })
                                        .always(function(data) {
                                            alert('Erfolgreich de-markiert!');
                                        });

                                });

                            </script>
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