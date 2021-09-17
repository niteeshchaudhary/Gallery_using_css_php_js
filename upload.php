<?php
session_start();
?>
<html>
<head>
    <title>
        upload/delete files to/from the server
    </title>
</head>
 
<body>
<?php
if(isset($_POST['submit'])) {
 
    $upload_dir = 'images'.DIRECTORY_SEPARATOR;
    
    // allowed file types
    $allowed_types = array("jpg","jpeg");
     
    // Define maxsize for files i.e 200kB
    $maxsize = 1024 * 200;
 
    // Checks if user sent an empty form
    if(!empty(array_filter($_FILES['files']['name']))) {
 
        // Loop through each file in files[] array
        foreach ($_FILES['files']['tmp_name'] as $key => $value) {
             
            $file_tmpname = $_FILES['files']['tmp_name'][$key];
            $file_name = $_FILES['files']['name'][$key];
            $file_size = $_FILES['files']['size'][$key];
            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
 
            // Set upload file path
            $filepath = $upload_dir.$file_name;
 
            // Check file type is allowed or not
            if(in_array(strtolower($file_ext), $allowed_types)) {
 
                // Verify file size - 200kB max
                if ($file_size > $maxsize){        
                    echo "<b><font color='red'>**Error: ".$file_name ." ,File size is larger than the allowed 200KB.</font></b><br>";
		}
 
                // If file with name already exist then append time in
                // front of name of the file to avoid overwriting of file
                else if(file_exists($filepath)) {
                    $filepath = $upload_dir.time().$file_name;
                     
                    if( move_uploaded_file($file_tmpname, $filepath)) {
                        echo "{$file_name} successfully uploaded <br />";
                    }
                    else {                    
                        echo "Error uploading {$file_name} <br />";
                    }
                }
                else {
                 
                    if( move_uploaded_file($file_tmpname, $filepath)) {
                        echo "{$file_name} successfully uploaded <br />";
                    }
                    else {                    
                        echo "Error uploading {$file_name} <br />";
                    }
                }
            }
            else {
                 
                // If file extension not valid
                echo "<b><font color='red'>Error uploading {$file_name} ";
                echo "({$file_ext} file type is not allowed)</font></b><br / >";
            }
        }
    }
    else {
         
        // If no files selected
        echo "No files selected.";
    }
}
   if($_GET){
	if (unlink($_GET['file'])) {
		echo "<h1 align='center'>file:".$_GET['file']." successfully deleted,<br><font color='red'>Select Back to Uploads ......</font><h1>";
	} else {
		echo "<h1 align='center'>Error In Deleting File,<br><font color='red'>Go Back to Uploads and try again</font><h1>";
	}
    }

?>
<br>
<hr>
<br>
<div align="center">
<a href="newupload.php"><button>Back To Uploads</button></a>
<div>
</div>
<br>
</body>
 
</html>