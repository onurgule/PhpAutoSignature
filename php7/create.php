<?php
header('Content-type: image/jpeg');
$imgsrc = $_GET["imgsrc"];
// Load And Create Image From Source
function getImage($path) {
switch(mime_content_type($path)) {
  case 'image/png':
    $img = imagecreatefrompng($path);
    break;
  case 'image/gif':
    $img = imagecreatefromgif($path);
    break;
  case 'image/jpeg':
    $img = imagecreatefromjpeg($path);
    break;
  case 'image/bmp':
    $img = imagecreatefrombmp($path);
    break;
  default:
    $img = null; 
  }
  return $img;
}
$our_image = getImage($imgsrc);
include('config.php');
if($our_image != null){
// Allocate A Color For The Text Enter RGB Value
$white_color = imagecolorallocatealpha($our_image, $color_R, $color_G, $color_B,$color_T);
$img_w = imagesx($our_image);
$img_h = imagesy($our_image);

// Set Path to Font File
$font_path = $selected_font;

// Set Text to Be Printed On Image
$text = $config_text;

if($conf_size != 0){
	$size = $conf_size;
}
else $size=$img_w / strlen($text);
//$size = $img_w / strlen($text) * 1.8;
$angle=0;
$left=$img_w-$img_w*0.8;
$top=0;
$maxtop=$img_h-$img_h*0.4;
// Print Text On Image
for($i = 0; $i<80;$i++){
imagettftext($our_image, $size,$angle,$left,$top+$i*($img_w-$img_w*0.8), $white_color, $font_path, $text);
}
$imageid = md5(uniqid(rand(), true));
// Send Image to Browser
imagejpeg($our_image,"nds/".$imageid.".jpg");
if($store_both != true){
	unlink($imgsrc);
}
header('Location: okay.php?imgsrc='.$imageid);
// Clear Memory
imagedestroy($our_image);
}
else echo "Image type is not acceptable.";
?>