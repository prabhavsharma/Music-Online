
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Cover Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <?php echo $this->Html->css('bootstrap'); ?>
    <?php echo $this->Html->css('cover'); ?>
    <!-- Custom styles for this template -->

    <?php echo $this->Html->script('ie-warning.js'); ?>



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<?php echo '<div class="bg-primary"><h4 style="color: #FFF">'.$this->Session->flash().'</h4></div>'; ?>

    <?php echo $this->fetch('content'); ?>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<?php echo $this->Html->script('bootstrap.min.js'); ?>
<?php echo $this->Html->script('docs.min.js'); ?>
<?php echo $this->Html->script('ie.js'); ?>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

</body>
</html>
