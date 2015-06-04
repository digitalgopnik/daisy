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

$cakeDescription = 'CakePHP: the rapid development php framework';
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
    <?= $this->Html->css('style-responsive.css') ?>

    <?= $this->Html->script('jquery.js') ?>
    <?= $this->Html->script('bootstrap.min') ?>
    <?= $this->Html->script('jquery.dcjqaccordion.2.7') ?>
    <?= $this->Html->script('jquery.scrollTo.min') ?>
    <?= $this->Html->script('jquery.nicescroll') ?>
    <?= $this->Html->script('jquery.sparkline') ?>
    <?= $this->Html->script('common-scripts') ?>
    <?= $this->Html->script('sparkline-chart') ?>
    <?= $this->Html->script('chart-master/Chart') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<section id="container">
    <header class="header black-bg">
        <!-- TU Braunschweig logo start-->
        <a href="https://www.tu-braunschweig.de/" class="logo"><img alt="TU Braunschweig" src="img\siegel_rot.jpg"></a>
        <!--logo end-->
        <div class="nav notify-row" id="top_menu">

        </div>
        <div class="top-menu">
            <br>
            <ul class="nav pull-right top-menu">
                <?php $user_id = $this->request->session()->read('user_id'); ?>
                <?php if (isset($user_id) && $user_id!='') {
                    echo $this->Html->link('Ausloggen', ['controller' => 'Users', 'action' => 'logout'], ['class' => 'btn btn-danger']);
                } else {
                    echo $this->Html->link('Einloggen', ['controller' => 'Users', 'action' => 'login'], ['class' => 'btn btn-danger']);
                } ?>
            </ul>
        </div>
    </header>

    <aside>
        <div id="sidebar"  class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">


                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-desktop"></i>
                        <span>Apps</span>
                    </a>
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
                        <li><a href="#filter_modal" data-toggle="modal"><i class="fa fa-filter"></i>Kategorisieren</a></li>

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
                <!-- Kategorisieren der Tools (Apps) example: Sort 1, 2 & 3 -->
                <!--<li class="sub-menu">
                    <a href="javascript:;" >
                        <i class="fa fa-sort"></i>
                        <span>Kategorisieren</span>
                    </a>
                    <ul class="sub">
                        <li>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox"> Sort 1
                              </label>
                            </div>
                          </li>
                           <li><a  href="Sort2.html">Sort2</a></li>
                        <li><a  href="Sort3.html">Sort3</a></li>
                    </ul>
                </li>-->

                <li>
                    <a href="#" href="javascript:;">
                        <i class="fa fa-search"></i>
                        <span>Apps suchen</span>
                    </a>
                </li>

                <li>
                    <a href="hilfe.html" href="javascript:;">
                        <i class="fa fa-info-circle"></i>
                        <span>Hilfe</span>
                    </a>
                </li>

                <?php
                if (isset($user_id) && $user_id!=null) {
                    ?>
                    <li>
                        <?php
                        $i_class_todos = $this->Html->tag('i', '', ['class' => 'fa fa-star', 'escape' => false]);
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
                        $i_class_notes = $this->Html->tag('i', '', ['class' => 'fa fa-server', 'escape' => false]);
                        $span_class_notes = $this->Html->tag('span', 'Notizen', ['escape' => false]);
                        echo $this->Html->link($i_class_notes . $span_class_notes, ['controller' => 'Notes', 'action' => 'index'], ['escape' => false]);
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

            </ul>
            <!-- sidebar menu end-->
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

<div id="login_modal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form class="form-login" action="index.html">
                <h2 class="form-login-heading">sign in now</h2>
                <div class="login-wrap">
                    <input type="text" class="form-control" placeholder="User ID" autofocus>
                    <br>
                    <input type="password" class="form-control" placeholder="Password">
                    <label class="checkbox">
                    <span class="pull-right">
                        <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>

                    </span>
                    </label>
                    <button class="btn btn-theme btn-danger" href="index.html" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
                    <hr>


                </div>
        </div>
    </div>
</div>

<div id="filter_modal" class="modal fade bs-kategorie-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="checkbox">
                <div class="custom-check goleft mt">
                    <table id="todo" class="table table-striped">
                        <tbody>
                        <?php echo $this->Form->create('Filter', ['controller' => 'Users', 'action' => 'apps']) ?>
                        <?php $counter = 1; ?>
                        <tr>
                        <?php foreach ($words as $word) {
                            if ($counter % 3 == 0) {
                                echo '</tr>';
                                echo '<tr>';
                            }
                            echo '<td><div class="checkbox"><label>';
                            echo $this->Form->checkbox('filter.', ['multiple' => true, 'label' => false]);
                            echo $word->name;
                            echo '</div></td>';
                            $counter += 1;
                        }
                        ?>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Schließen</button>
                <button type="button" class="btn btn-primary">Filtern</button>
            </div>

        </div>

    </div>
</div>

</body>
</html>