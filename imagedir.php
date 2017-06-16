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

<?php
$folder = 'i/';
$filetype = '*.*';
$files = glob($folder.$filetype);
$count = count($files);
 
$sortedArray = array();
for ($i = 0; $i < $count; $i++) {
    $sortedArray[date ('YmdHis', filemtime($files[$i]))] = $files[$i];
}
 
ksort($sortedArray);

$reversed = array_reverse($sortedArray);

foreach ($reversed as &$filename) {
    
    
  echo '<div style= "float:left"><a href="i.php?img='.$filename .'"><img src="'.$filename .'" width=50px" height="37px" alt="Random image" /></a>'."</div>";
    
}

?>
</div>
  <div class="col-md-3"></div>
</div>
    <div><br></div>
    <div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6"> 
      <div class="row">
          <div class="col-md-6"><p class="text-left"><a href="index.php">Create your own</a> PixelRemap.</p></div>
          <div class="col-md-6"><p class='text-right'> &copy <a href="bento.php">Bento</a>  <?php echo date('Y');?></p></div>

      </div></div>
  <div class="col-md-3">		
</div>
</div>
  </div>


</body>
</html>
