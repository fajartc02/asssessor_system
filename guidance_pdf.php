<?php

$ffile = $_GET["ffile"];
$link_back = $_GET["link_back"];

?>

<style>
.button {
background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 5px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
 }
</style>

<center>
<a href="<?php echo $link_back; ?>" class="button">Back to dasbooard</a><br><br>
</center>
<iframe src="assets/pdfjs/web/viewer.php?file=../../doc/<?php echo $ffile; ?>" style="padding:0px;margin:0px;border: 0; width: 100%; height: 90%">Your browser doesn't support iFrames.</iframe>
