


<?php
 $plaatje= $_GET["img"];
$image= $plaatje;
$im = imagecreatefromjpeg($image);
$info=getimagesize($image);
$width=$info[0];
$height=$info[1];
for ($i=0; $i<$height; $i++){
	$html .= "";
	for ($j=0; $j<$width; $j++){
		$color_index = imagecolorat($im, $j, $i);
		$color_tran = imagecolorsforindex($im, $color_index);
		$html .= "<div class= \"art\" style=\" width: 13px; height: 1px; background-color: rgb($color_tran[red],$color_tran[green],$color_tran[blue]);\" ></div>\n";
	}
	$html .= "\n";
}
?>

<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>PixelRemapping - Bento</title>
<link rel="stylesheet" href="/bootstrap/css/bootstrap.vincent.css">
<link rel="stylesheet" href="/bootstrap/css/custom.css">
</head>
<body> 

<div class="container">
<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6"><h2>PixelRemapping | A <strong>Bento</strong> Project</h2>
</div>
  <div class="col-md-3"></div>
</div>
<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
<?=$html ?>
</div>
  <div class="col-md-3"></div>
</div>
<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6"> <?php
// outputs e.g.  somefile.txt was last modified: December 29 2002 22:16:23.
$plaatje= $_GET["img"];
$filename = $plaatje;
if (file_exists($filename)) {
    echo " " . date ("F d Y", filemtime($filename));
}
?>
</div>
  <div class="col-md-3"></div>
</div>

<div class="container">
<div class="row social text-center">
<div class="col-xs-3"></div>
<div class="col-xs-6">
    <div class="row">
<?php
$link =  "//$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
echo '<div class="col-md-4"><a href="https://twitter.com/intent/tweet?url=http:'.$link.'"><span class="twitter">&#xe286;</span</a></div>';
echo '<div class="col-md-4"><a href="mailto:email@email.com?body=http:'.$link.'"><span class="linkedin">&#xe224;</span</a></div>';
echo '<div class="col-md-4"><a href="https://www.facebook.com/sharer/sharer.php?u=http:'.$link.'"><span class="facebook">&#xe227;</span</a></div>';
?>
<script type="text/javascript" async src="//platform.twitter.com/widgets.js"></script>
<script>
    function fbShare(url, title, descr, image, winWidth, winHeight) {
        var winTop = (screen.height / 2) - (winHeight / 2);
        var winLeft = (screen.width / 2) - (winWidth / 2);
        window.open('http://www.facebook.com/sharer.php?s=100&p[title]=' + title + '&p[summary]=' + descr + '&p[url]=' + url + '&p[images][0]=' + image, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
    }
</script>
    </div>
</div>
<div class="col-xs-3">

</div>
</div>
</div>
<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6"> 
      <div class="row">
          <div class="col-md-6"><p class="text-left"><a href="index.php">Create your own</a>, or <a href="imagedir.php">check</a> the gallery.</p></div>
          <div class="col-md-6"><p class='text-right'> &copy <a href="bento.php">Bento</a>  <?php echo date('Y');?></p></div>

      </div></div>
  <div class="col-md-3">		
</div>
</div>
</div>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


  
</body>
</html>



