<?php
  require_once 'instagram.class.php';
  $instagram = new Instagram('099ddb4d09e648a6b11448961a99256b');
  $tag="cats";
  $media = $instagram->getTagMedia($tag);
?>
<?php include 'templates/header.php' ?>
<?php include 'templates/pictures.php' ?>
<?php include 'templates/footer.php' ?>