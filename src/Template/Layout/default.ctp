<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Dashboard | ';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('style-responsive') ?>
    <?= $this->Html->css('bootstrap-select.min') ?>
    <?= $this->Html->css('bootstrap-select') ?>
    <?= $this->Html->css('custom.css') ?>

    <?= $this->Html->script('jquery.js') ?>
    <?= $this->Html->script('bootstrap.min') ?>
    <?= $this->Html->script('jquery.dcjqaccordion.2.7') ?>
    <?= $this->Html->script('jquery.scrollTo.min') ?>
    <?= $this->Html->script('jquery.nicescroll') ?>
    <?= $this->Html->script('jquery.sparkline') ?>
    <?= $this->Html->script('common-scripts') ?>
    <?= $this->Html->script('sparkline-chart') ?>
    <?= $this->Html->script('chart-master/Chart') ?>
    <?= $this->Html->script('bootstrap-select.min') ?>
    <?= $this->Html->script('bootstrap-select') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<section id="container">
    <header class="header black-bg">
        <!-- TU Braunschweig logo start-->
        <a href="https://www.tu-braunschweig.de/" class="logo"><img style="margin-left: -15px" alt="TU Braunschweig" src="http://localhost/teamproject/img/siegel_rot.jpg"></a>
        <!--logo end-->
        <div class="nav notify-row" id="top_menu">

        </div>
        <div class="top-menu">

            <br>
            <ul class="nav pull-right top-menu">
                <?php $user_id = $this->request->session()->read('user_id'); ?>
                <?php $user_role = $this->request->session()->read('user_role'); ?>
                <?php if (isset($user_id) && $user_id!='') {
                    echo $this->Html->link('Ausloggen', ['controller' => 'Users', 'action' => 'logout'], ['class' => 'btn btn-danger']);
                } else {
                    echo $this->Html->link('Einloggen', ['controller' => 'Users', 'action' => 'login'], ['class' => 'btn btn-danger']);
                } ?>
            </ul>
        </div>

        <div class="top-menu">
            <div class="input-group" style="width: 300px; margin-left: 225px">
                <input placeholder="Google Suche..." id="google_text" type="text" class="form-control">
		        <span class="input-group-btn">
                    <a class="btn btn-danger" id="google_search">
                        <i class="fa fa-search"></i>
                    </a>
		        </span>
            </div>
        </div>
    </header>

    <aside>
        <div id="sidebar"  class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">


                <li class="sub-menu">
                    <a id="show_app_sub" href="javascript:;">
                        <i class="fa fa-desktop"></i>
                        <span>Apps</span>
                        <i id="show" style="margin-left:90px" class="fa fa-toggle-down"></i>
                    </a>
                    <a id="hide_app_sub" style="display: none" href="javascript:;">
                        <i class="fa fa-desktop"></i>
                        <span>Apps</span>
                        <i id="hide" style="margin-left:90px; display: none;" class="fa fa-toggle-up"></i>
                    </a>
                    <script>
                        jQuery('#show_app_sub').click(function() {
                           jQuery('#show').css('display', 'none');
                           jQuery('#show_app_sub').css('display', 'none');
                           jQuery('#hide_app_sub').css('display', 'block');
                           jQuery('#hide').css('display', 'inline');
                        });
                        jQuery('#hide_app_sub').click(function() {
                           jQuery('#hide').css('display', 'none');
                           jQuery('#hide_app_sub').css('display', 'none');
                           jQuery('#show_app_sub').css('display', 'block');
                           jQuery('#show').css('display', 'inline');

                        });
                    </script>
                    <ul class="sub">
                        <li>
                            <?php
                            $i_class_favorites = $this->Html->tag('i', '', ['class' => 'fa fa-desktop', 'escape' => false]);
                            $span_class_favorites = $this->Html->tag('span', 'Alle Apps', ['escape' => false]);
                            echo $this->Html->link($i_class_favorites . $span_class_favorites, ['controller' => 'Users', 'action' => 'dashboard'], ['escape' => false]);
                            ?>
                        </li>
                        <?php
                        if (isset($user_id) && $user_id!=null) {
                            ?>
                            <li>
                                <?php
                                $i_class_favorites = $this->Html->tag('i', '', ['class' => 'fa fa-star', 'escape' => false]);
                                $span_class_favorites = $this->Html->tag('span', 'Favoriten', ['escape' => false]);
                                echo $this->Html->link($i_class_favorites . $span_class_favorites, ['controller' => 'Favorites', 'action' => 'dashboard'], ['escape' => false]);
                                ?>
                            </li>
                        <?php
                        }
                        ?>
                        <li>
                            <?php
                            $i_class_filter = $this->Html->tag('i', '', ['class' => 'fa fa-filter', 'escape' => false]);
                            $span_class_filter = $this->Html->tag('span', 'Filter', ['escape' => false]);
                            echo $this->Html->link($i_class_filter . $span_class_filter, ['controller' => 'Users', 'action' => 'filter'], ['escape' => false]);
                            ?>
                        </li>

                    </ul>
                </li>

                <?php
                if (isset($user_id) && $user_id!=null) {
                    ?>
                    <li>
                        <?php
                        $i_class_files = $this->Html->tag('i', '', ['class' => 'fa fa-folder', 'escape' => false]);
                        $span_class_files = $this->Html->tag('span', 'Dateien', ['escape' => false]);
                        echo $this->Html->link($i_class_files . $span_class_files, ['controller' => 'FileUploads', 'action' => 'index'], ['escape' => false]);
                        ?>
                    </li>
                <?php
                }
                ?>

                <li>
                    <?php
                    $i_class_help = $this->Html->tag('i', '', ['class' => 'fa fa-info-circle', 'escape' => false]);
                    $span_class_help = $this->Html->tag('span', 'Hilfe', ['escape' => false]);
                    echo $this->Html->link($i_class_help . $span_class_help, ['controller' => 'Users', 'action' => 'help'], ['escape' => false]);
                    ?>
                </li>

                <?php
                if (isset($user_id) && $user_id!=null) {
                    ?>
                    <li>
                        <?php
                        $i_class_todos = $this->Html->tag('i', '', ['class' => 'fa fa-list-ol', 'escape' => false]);
                        $span_class_todos = $this->Html->tag('span', 'Todo-Liste', ['escape' => false]);
                        echo $this->Html->link($i_class_todos . $span_class_todos, ['controller' => 'Todos', 'action' => 'index'], ['escape' => false]);
                        ?>
                    </li>
                <?php
                }
                ?>

                <?php
                if (isset($user_id) && $user_id!=null) {
                    ?>
                    <li>
                        <?php
                        $i_class_notes = $this->Html->tag('i', '', ['class' => 'fa fa-clipboard', 'escape' => false]);
                        $span_class_notes = $this->Html->tag('span', 'Notizen', ['escape' => false]);
                        echo $this->Html->link($i_class_notes . $span_class_notes, ['controller' => 'Notes', 'action' => 'index'], ['escape' => false]);
                        ?>
                    </li>
                <?php
                }
                ?>

                <?php
                if (isset($user_id) && $user_id!=null && $user_role=='admin') {
                    ?>
                    <li>
                        <?php
                        $i_class_words = $this->Html->tag('i', '', ['class' => 'fa fa-server', 'escape' => false]);
                        $span_class_words = $this->Html->tag('span', 'Schlagworte', ['escape' => false]);
                        echo $this->Html->link($i_class_words . $span_class_words, ['controller' => 'Words', 'action' => 'index'], ['escape' => false]);
                        ?>
                    </li>
                <?php
                }
                ?>

                <?php
                if (isset($user_id) && $user_id!=null) {
                    ?>
                    <li>
                        <?php
                        $i_class_groups = $this->Html->tag('i', '', ['class' => 'fa fa-user', 'escape' => false]);
                        $span_class_groups = $this->Html->tag('span', 'Gruppen', ['escape' => false]);
                        echo $this->Html->link($i_class_groups . $span_class_groups, ['controller' => 'groups', 'action' => 'index'], ['escape' => false]);
                        ?>
                    </li>
                <?php
                }
                ?>

                <?php
                if (isset($user_id) && $user_id!=null && $user_role=='admin') {
                    ?>
                    <li>
                        <?php
                        $i_class_items = $this->Html->tag('i', '', ['class' => 'fa fa-at', 'escape' => false]);
                        $span_class_items = $this->Html->tag('span', 'Apps', ['escape' => false]);
                        echo $this->Html->link($i_class_items . $span_class_items, ['controller' => 'Items', 'action' => 'index'], ['escape' => false]);
                        ?>
                    </li>
                <?php
                }
                ?>

            </ul>
            <!-- sidebar menu end-->
            <!--
            <div class="appsuche">
                <form class="navbar-form navbar-left" role="search">
                    <div>
                        <form class="bs-example bs-example-form" role="form">
                            <div class="input-group">
                                <input placeholder="App suchen..." type="text" class="form-control" />
								        		<span class="input-group-btn">
								                  <button class="btn btn-danger" type="button">
                                                      <i class="fa fa-search"></i>
                                                  </button>
								        		</span>
                                </div>
                        </form>
                    </div>
                </form>
            </div>-->
        </div>
    </aside>
    <!--sidebar end-->

    <section id="main-content">
        <section class="wrapper site-min-height">
            <?= $this->Flash->render() ?>

            <div class="row">
                <?= $this->fetch('content') ?>
            </div>
        </section>

    </section><!-- /MAIN CONTENT -->

    <!--main content end-->
    <!--footer start-->
    <!-- <footer class="site-footer">
        <div class="text-center">
            WI2
            <a href="index.html#" class="go-top">
                <i class="fa fa-angle-up fa-3x"></i>
            </a>
        </div>
    </footer> -->
    <!--footer end-->
</section>

    <script>
        // Falls per Klick bestätigt wurde
        jQuery('#google_search').click(function() {
            var q = jQuery('#google_text').val();
            if (q=='') {
                jQuery('.wrapper.site-min-height').append('<div style=\"top: 75px\" class=\"message error\">Suchfeld ist leer.</div>');
                jQuery('div.message.error').delay('1000').fadeOut('5000');
            } else {
                var url = "http://google.com/search?q=" + q;
                window.open(url, '_blank');
            }
        });

        // Falls mit Enter bestätigt wurde
        jQuery(document).keypress(function(e) {
            var is_focus = $('#google_text').is(":focus");
            if (e.which == 13 && is_focus == true) {
                var q = jQuery('#google_text').val();
                if (q == '') {
                    jQuery('.wrapper.site-min-height').append('<div style=\"top: 75px\" class=\"message error\">Suchfeld ist leer.</div>');
                    jQuery('div.message.error').delay('1000').fadeOut('5000');
                } else {
                    var url = "http://google.com/search?q="+q;
                    window.open(url, '_blank');
                }
            }
        });

        jQuery('#app_search').click(function() {
            var search = jQuery('#app_text').val();
            console.log(search);
            $.ajax({
                url: 'http://localhost/teamproject/Users/app_filter/'+search,
                type: 'POST',
                data: search,
                dataType: 'json',
                async: true,
                cache: false
            })
                .always(function(data) {
                });
        });
    </script>

    <script>
        jQuery('div.message.success').delay('3000').fadeOut('5000');
        jQuery('div.message.error').delay('3000').fadeOut('5000');
    </script>
</body>
</html>