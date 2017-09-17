<?php
if(isset($_GET)){
	$id=$_GET['id'];
	$name=$_GET['name'];
	$image=$_GET['image'];
	$email=$_GET['email'];
@$db=mysqli_connect('localhost','iti','iti','google');
if(mysqli_connect_error()){
echo "can't connect";
exit;
}

$sql="select * from user where email='".$email."'";
$result=mysqli_query($db,$sql);
if(! $result){
	echo "can't select";
	exit;
}
//exit();
if(mysqli_num_rows($result)>0){
	header("Location:home.php");

}else{
	 session_start();
    $_SESSION['name']=$name;
    $_SESSION['id']=$id;
    $_SESSION['image']=$image;
    $_SESSION['email']=$email;

	header("Location:signup.php");

}

}
?>