<?php
// Start the session
session_start();
?>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
.center {
    width:400px;
    height:300px;
    background-color:#eaeaea;
    position:fixed;
    margin-left:auto; 
    margin-top:-125px;  
    top:45%;
    left:35%;
}
input[type=text],[type=password]{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
input[type=submit]:hover {
  background-color: #45a049;
}
 th, td {
  border: 0px solid black;
}
</style>
</head>
<body align="right">
<div style="background-color: lightblue;">
<h1 align="center">NKC Photo Gallery</h1>
</div>
<form action="login.php" method="post">
<table class="center" border="4px">
<tr><td><pre>     </pre></td><td></td><td><h1>Login Form</h1></td><td><pre>     </pre></td></tr>
<tr><td><pre>     </pre></td><th align="left">ID : </th><td><input type="text" name="ID"></td><td><pre>     </pre></td></tr>
<tr><td><pre>     </pre></td><th align="left">Password : </th><td><input type="password" name="password"></td><td><pre>     </pre></td></tr>
<tr><td><pre>     </pre></td><td>      </td><td><input type="submit" value="Submit"></td><td><pre>     </pre></td></tr>
<tr><td><pre>     </pre></td><td></td><td></td><td></td></tr>
</table>
</form>
<?php
	if ($_GET) {
		if($_GET['ses']){
		  //echo "<script>alert('Wrong Id/Password!');</script>";
		  echo "<h1 align='center'><font color='red'>Wrong Id/Password!</font></h1>";
		}
	}
?>
</body>
</html>