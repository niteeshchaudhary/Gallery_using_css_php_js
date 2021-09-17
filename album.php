<?php
session_start();
 if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    }
    else if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false){
        header("Location: index.php");}
?>
<html>
<head>
</head>
<body bgcolor="black">

<link rel="stylesheet" href="sldsh.css">
<div class="slideshow-container">
<?php
$filenameArray = [];
$handle = opendir(dirname(realpath(__FILE__)).'/images/');
        while($file = readdir($handle)){
 		if($file !== '.' && $file !== '..'){
                array_push($filenameArray, "$file");
            }
        }
for ($x = 0; $x <sizeof($filenameArray) ; $x++) {
echo '<div class="mySlides fade">
  <div class="numbertext">'.($x+1).' /'.sizeof($filenameArray).'</div>
  <img src="./images/'.$filenameArray[$x].'" style="width:100%" height="600px">
  <div class="text">Image: '.$filenameArray[$x].'</div>
</div>';
}
?>
<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>
<a class="first" onclick="firstSlide()">&#10094;&#10094;</a>
<a class="last" onclick="lastSlide()">&#10095;&#10095;</a>
<div style="text-align:center">
<?php
for ($x = 1; $x <=sizeof($filenameArray) ; $x++) {
 echo '<span class="dot" onclick="currentSlide('.$x.')"></span>';
}
?> 
</div>
</div><br>
<a href="newupload.php"><button>Upload Image</button></a>
<br>
<form action="logout.php">
<br>
<input type="submit" value="Log Out">
</form>
<script src="sldshw.js"></script>
</body>
</html>