<html>
<head>
<?php include("config.php"); ?>
<style>
div.gallery {
  margin: 5px;
}

div.gallery:hover {
}

div.gallery img {
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}
</style>
</head>
<body style="text-align:center; align-items:center; margin:0 auto; background-color:grey;">
<?php 
$imgsrc = "nds/".$_GET['imgsrc'].".jpg";
?>
<div class="gallery" style="text-align:center; margin:0 auto;">
  <a download="<?php echo $imgsrc?>" href="<?php echo $imgsrc?>">
    <img src="<?php echo $imgsrc?>" alt="signatured" width="600" height="400">
  </a>
  <div  class="desc"><a href="#"><?php echo $default_desc; ?></a></div>
</div>

</body>
</html>