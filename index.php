<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>PixelRemapping - Bento</title>
<script type="text/javascript" src="webcam.js"></script>
<script language="JavaScript">
function take_snapshot() {
    Webcam.snap(function(data_uri) {
    
    document.getElementById('results').innerHTML = '<img id="base64image" width="320" height="240" src="'+data_uri+'"/><div></div><br><button class="btn btn-default btn-xs" onclick="SaveSnap();">Save Snap</button>';
});
}
function ShowCam(){
Webcam.set({
width: 320,
height: 240,
dest_width: 150,
dest_height: 113,
image_format: 'jpeg',
jpeg_quality: 90
});
Webcam.attach('#my_camera');
}
function SaveSnap(){
    document.getElementById("link").innerHTML="<div></div><br>Saving, please wait...";
    var file =  document.getElementById("base64image").src;
    var formdata = new FormData();
    formdata.append("base64image", file);
    var ajax = new XMLHttpRequest();
    ajax.addEventListener("load", function(event) { uploadcomplete(event);}, false);
    ajax.open("POST", "upload.php");
    ajax.send(formdata);
}
function uploadcomplete(event){
    document.getElementById("loading").innerHTML="";
    var image_return=event.target.responseText;
    var showup=document.getElementById("uploaded").src=image_return;
    var showup=document.getElementById("link").innerHTML= '<div></div><br><a href="i.php?img='+image_return+'">Generate PixelRemapping</a>';
}
window.onload= ShowCam;
</script>
<link rel="stylesheet" href="/bootstrap/css/bootstrap.vincent.css">
<link rel="stylesheet" href="/bootstrap/css/custom.css">
</head>
<body>
    <div class="container">
        <div ><h2>PixelRemapping | A <strong>Bento</strong> Project</h2></div>
    <div class="row">
<div class=col-md-4 id="Cam"><b>Webcam</b>
    <div id="my_camera"></div><br><form><input type="button" class="btn btn-default btn-xs" value="Snap It" onClick="take_snapshot()"></form>
</div>
<div class="col-md-4" id="Prev">
    <b>Preview</b><div id="results"></div>
</div>
<div class="col-md-4" id="Saved">
   <div> <b>Saved</b><span id="loading"></span><img id="uploaded" width="320" height="240" src="" border="0"><span id="link"></span>
   </div></div></div>
            <div class="row">
                <div class="col-md-4">
                    <br>    Or <a href="file.php">upload</a> a photo, Also <a href="imagedir.php">check</a> the gallery.</div>
                <div class="col-md-4"></div>
                <div class="col-md-4"><br><p class='text-right'>Copyright &copy <a href="bento.php">Bento</a>  <?php echo date('Y');?></p></div>   
    </div>
    </div>



</body>
</html>
