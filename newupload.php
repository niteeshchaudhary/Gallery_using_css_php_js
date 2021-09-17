<?php
session_start();
 if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    }
    else if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false){
        header("Location: index.php");}
?>
<html>
<head>
    <title>
        upload/delete files to/from the server
    </title>
    <style>
	.container{
    margin: 0 auto;
}


.container .gallery a img {
  float: left;
  height:250px;
  width: 24%;
  border: 2px solid #fff;
  -webkit-transition: -webkit-transform .15s ease;
  -moz-transition: -moz-transform .15s ease;
  -o-transition: -o-transform .15s ease;
  -ms-transition: -ms-transform .15s ease;
  transition: transform .15s ease;
  position: relative;
}

.container .gallery a:hover img {
  -webkit-transform: scale(1.05);
  -moz-transform: scale(1.05);
  -o-transform: scale(1.05);
  -ms-transform: scale(1.05);
  transform: scale(1.05);
  z-index: 5;
}

.clear {
  clear: both;
  float: none;
  width: 100%;
}
    </style>
</head>
 
<body>
    <form action="upload.php" method="POST" enctype="multipart/form-data" onsubmit="return chk()">
        <h2>Upload Files</h2>
	<p>
            Select files to upload:
            <input type="file" name="files[]" accept="image/jpeg" id="flu"  multiple>
            <br><br>
            <input type="submit" onclick="return chk()" name="submit" value="Upload" >
        </p>
 
    </form>
<script>
  function chk(){
      if(document.getElementById('flu').files.length>10){
        document.getElementById('disp').innerHTML="Can't select More than 10 images";
        return false;
      }
     return true;
  }
</script>
<a href="album.php"><button>Back To Gallery</button></a>
<p id="disp"></p>
<hr><hr><hr>
<div align="center">
</div>
<br>
<hr>
<hr>
<hr>
<h2 align="center">Click On The Image You Want To Delete</h2>
<br>
<div class='container'>
            <div class="gallery">
             
            <?php 
            // Image extensions
            $image_extensions = array("jpg","jpeg");

            // Target directory
            $dir = 'images/';
            if (is_dir($dir)){
                
                if ($dh = opendir($dir)){
                    $count = 1;

                    // Read files
                    while (($file = readdir($dh)) !== false){

                        if($file != '' && $file != '.' && $file != '..'){
                            
                            // Thumbnail image path
                            $thumbnail_path = "images/".$file;

                            // Image path
                            $image_path = "images/".$file;
                            
                            $thumbnail_ext = pathinfo($thumbnail_path, PATHINFO_EXTENSION);
                            $image_ext = pathinfo($image_path, PATHINFO_EXTENSION);

                            // Check its not folder and it is image file
                            if(!is_dir($image_path) && 
                                in_array($thumbnail_ext,$image_extensions) && 
                                in_array($image_ext,$image_extensions)){
                                ?>
				 <!-- Image -->
				<a href="upload.php?file=<?php echo $thumbnail_path; ?>">
                                    <img src="<?php echo $thumbnail_path; ?>"  height="100px" alt="" title=""/>
                                </a>
                                <!-- --- -->
                                <?php

                                // Break
                                if( $count%4 == 0){
                                ?>
                                    <div class="clear"></div>
                                <?php    
                                }
                                $count++;
                            }
                        }
                            
                    }
                    closedir($dh);
                }
            }
            ?>
            </div>
        </div>
	
</body>
 
</html>