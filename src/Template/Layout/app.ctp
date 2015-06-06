<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>The Dashboard</title>

    <?= $this->Html->css('custom.css') ?>
    <?= $this->Html->css('concise.min.css') ?>
    <?= $this->Html->css('concise.css') ?>
    <?= $this->Html->css('files/bootstrap.css') ?>
    <?= $this->Html->css('files/style.css'); ?>
    <?= $this->Html->css('files/style-responsive.css'); ?>
    <?= $this->Html->css('//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css') ?>


    <?= $this->Html->script('files/Chart.js') ?>
    <?= $this->Html->script('concise.min.js') ?>
    <?= $this->Html->script('concise.js') ?>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <?php echo $this->fetch('content'); ?>
<script>
    jQuery('a#show_touch_companion').click(function() {
        jQuery('div#layer_div').fadeIn(500);
        jQuery('div#div_src').css('display', 'block');
        jQuery('a#show_touch_companion').css('display', 'none');
        jQuery('a#hide_touch_companion').css('display', 'block');
    });
    jQuery('a#hide_touch_companion').click(function() {
        jQuery('div#layer_div').fadeOut(200);
        jQuery('div#div_src').css('display', 'none');
        jQuery('a#hide_touch_companion').css('display', 'none');
        jQuery('a#show_touch_companion').css('display', 'block');
    })

</script>

<!-- js placed at the end of the document so the pages load faster -->
<?= $this->Html->script('files/jquery') ?>
<?= $this->Html->script('files/bootstrap.min') ?>
<?= $this->Html->script('files/jquery.scrollTo.min') ?>
<?= $this->Html->script('files/jquery.sparkline') ?>
<?= $this->Html->script('files/jquery.nicescroll') ?>
<?= $this->Html->script('files/jquery.dcjqaccordion.2.7') ?>
<?= $this->Html->script('files/common-scripts') ?>
<?= $this->Html->script('files/sparkline-chart') ?>


</body>
</html>