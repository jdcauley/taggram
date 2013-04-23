<?php
  require_once 'instagram.class.php';
  $instagram = new Instagram('099ddb4d09e648a6b11448961a99256b');
  $tag="coffee";
  $media = $instagram->getTagMedia($tag);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Taggram</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Jordan Cauley">
  <!--
   taggram by Jordan Cauley @ https://github.com/jdcauley/taggram

    Using Instagram PHP API class @ Github
    https://github.com/cosenary/Instagram-PHP-API
    app.js by Ratmir Istanovich https://github.com/isratmir
  -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css" media="screen">
  <link rel="stylesheet" href="assets/css/bootstrap-responsive.min.css" type="text/css" media="screen">
  <link rel="stylesheet" href="assets/css/app.css" type="text/css" media="screen">
  <!--[if gte IE 9]><style type="text/css">.gradient {filter: none;}</style><![endif]-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="assets/js/app.js"></script>

</head>

<?php include 'templates/header.php' ?>
<?php include 'templates/pictures.php' ?>
<?php include 'templates/footer.php' ?>

	</body>
</html>