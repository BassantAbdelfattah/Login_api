
<?php
session_start();
?>
<form method="post" action="signup.php">

Name:<input type="text" name="name" value="<?php echo $_SESSION['name']; ?>">
</br>
Passaword:<input type="password" name="password" value="">
</br>
Email:<input type="email" name="email" value="<?php echo $_SESSION['email']; ?>">
</br>
<input type="submit" name="SignUp" value="SignUp">
</form>

<?php
if (isset($_POST['SignUp'])){
	@$db=mysqli_connect('localhost','iti','iti','google');
if(mysqli_connect_error()){
echo "can't connect";
exit;
}
$sql="insert into user (external_id,name,image,email,password,type) values ('".$_SESSION['id']."','".$_POST['name']."','".$_SESSION['image']."','".$_POST['email']."','".$_POST['password']."',1);";
$result=mysqli_query($db,$sql);
if(! $result){  
	echo mysqli_error();
	echo "</br>can't insert";
	exit;
}
else{
		header("Location:home.php");

}
}
?>