<?php

include( 'function.php');
// settings
$max_file_size = 1024*80000; // 200kb
$valid_exts = array('jpeg', 'jpg', 'png', 'gif');
// thumbnail sizes
$sizes = array(130 => 130);

if ($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_FILES['image'])) {
	if( $_FILES['image']['size'] < $max_file_size ){
		// get file extension
		$ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
		if (in_array($ext, $valid_exts)) {
			/* resize image */
			foreach ($sizes as $w => $h) {
				$files[] = resize($w, $h);
			}

		} else {
			$msg = 'Unsupported file';
		}
	} else{
		$msg = 'Please upload image smaller than 5 MB';
	}
}
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8" />
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
      
      <?php if(isset($msg)): ?>
			<p class='alert'><?php echo $msg ?></p>
		<?php endif ?>
		
		<!-- file uploading form -->
		<form action="" method="post" enctype="multipart/form-data">
			<label>
				<span>Choose image</span>
				<input class="btn btn-default btn-xs" type="file" name="image" accept="image/*" />
			</label>
			<input class="btn btn-default btn-xs" type="submit" value="Upload" />
		</form>
</div>
  <div class="col-md-3"></div>
</div>
		
<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">		<?php
		// show image thumbnails
		if(isset($files)){
			foreach ($files as $image) {
                                echo "<br><img style='width: 500px; height: 500px'class='img' src='{$image}' /><br /> <a href=i.php?img={$image}>Generate PixelRemapping</a><br />";
			}
		}
		?>

</div>
  <div class="col-md-3"></div>
</div>
            <br>
            <div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
      <div class="row">
          <div class="col-md-6"><p class="text-left">Or <a href="index.php">make a photo</a> with your webcam.</p></div>
          <div class="col-md-6"><p class='text-right'> &copy <a href="bento.php">Bento</a>  <?php echo date('Y');?></p></div>

      </div>
  </div>
  <div class="col-md-3">		
</div>
</div>

	</div>
</body>
</html>
