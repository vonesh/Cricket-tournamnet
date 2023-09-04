<?php
include('header.php');
if (isset($_POST['save'])) {//echo $_POST['club'];
//$q = mysqli_query($c, 'INSERT INTO `settings` (`club`, `rgdno`,`chanceller`, `treasurer`, `security`, `grievence`, `contactno`, `email`, `address`) VALUES ("'.$_POST["club"].'", "'.$_POST['rgdno'].'","'.$_POST['chanceller'].'","'.$_POST['treasurer'].'","'.$_POST['security'].'","'.$_POST['grievence'].'","'.$_POST['contactno'].'","'.$_POST['email'].'","'.$_POST['address'].'")');
if (!empty($_POST['club'])) {
$q=mysqli_query($c, 'UPDATE settings SET club ="'.$_POST["club"].'"');}
if (!empty($_POST['rgdno'])) {
$q=mysqli_query($c, 'UPDATE settings SET rgdno ="'.$_POST["rgdno"].'"');}
if (!empty($_POST['chanceller'])) {
$q=mysqli_query($c, 'UPDATE settings SET chanceller ="'.$_POST["chanceller"].'"');}
if (!empty($_POST['treasurer'])) {
$q=mysqli_query($c, 'UPDATE settings SET treasurer ="'.$_POST["treasurer"].'"');}
if (!empty($_POST['security'])) {
$q=mysqli_query($c, 'UPDATE settings SET security ="'.$_POST["security"].'"');}
if (!empty($_POST['grievence'])) {
$q=mysqli_query($c, 'UPDATE settings SET grievence ="'.$_POST["grievence"].'"');}
if (!empty($_POST['contactno'])) {
$q=mysqli_query($c, 'UPDATE settings SET contactno ="'.$_POST["contactno"].'"');}
if (!empty($_POST['email'])) {
$q=mysqli_query($c, 'UPDATE settings SET email ="'.$_POST["email"].'"');}
if (!empty($_POST['address'])) {
$q=mysqli_query($c, 'UPDATE settings SET address ="'.$_POST["address"].'"');}
header('Location: settings.php');
//$q = mysqli_query($c, 'INSERT INTO `settings` (`club`) VALUES ("aaaaaaaaaaaa")');

}else{
	$tq = mysqli_query($c, 'SELECT * FROM settings');$t = mysqli_fetch_array($tq);
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Settings</title>
</head>
<body>
<form method="post" >	<?php
//include('hr.php');
?>
	<div style="padding-left: 50px;"><br><br><br><br><br>
		<legend style="padding-left:600px;" class="text-success"><h1><?php echo ucwords($t['club']);?> Cricket Club</h1></legend>
			<a href="./" class="btn btn-primary" ><< Home</a>
			<br><br><br>&nbsp;&nbsp;&nbsp;<h1 class="text-danger">Change Settings :</h1><br><br>
<table><thead><tr><th class="text-secondary">Club</th><th class="text-secondary">Rgd No.</th><th class="text-secondary">Chanceller</th><th class="text-secondary">Treasurer</th><th class="text-secondary">Security</th><th class="text-secondary">Grievence</th><th class="text-secondary">Contact No.</th><th class="text-secondary">Email</th><th class="text-secondary">Address</th></tr></thead><tbody><tr><td>
	<input type="text" name="club" class="bg-light" pattern = "[a-z A-z]{2-20}" value="<?php echo $t['club'];?>"><?php //echo ;?></td><td><input type="text" name="rgdno" class="bg-light" pattern = "[0-9]{6-12}" minlength="6" maxlength="12" value="<?php echo $t['rgdno'];?>"><?php //echo ;?></td><td><input type="text" name="chanceller" class="bg-light" pattern = "[a-z A-z]{2-20}"  value="<?php echo $t['chanceller'];?>"><?php //echo ;?></td><td><input type="text" name="treasurer" class="bg-light" pattern = "[a-z A-Z]{2-20}"  value="<?php echo $t['treasurer'];?>"><?php //echo ;?></td><td><input type="text" name="security" class="bg-light" value="<?php echo $t['security'];?>"><?php //echo ;?></td><td><input type="text" pattern = "[a-z A-z]{2-20}"  name="grievence" class="bg-light" value="<?php echo $t['grievence'];?>"><?php //echo ;?></td><td><input type="text" class="bg-light" pattern = "[0-9]{10}" minlength="10" maxlength="10" name="contactno" value="<?php echo $t['contactno'];?>"><?php //echo ;?></td><td><input type="text" class="bg-light" pattern = "[a-z A-z]{2-20}"  name="email" value="<?php echo $t['email'];?>"><?php //echo ;?></td><td><input type="text" pattern = "[a-z A-z]{2-20}"  name="address" class="bg-light" value="<?php echo $t['address'];?>"><?php //echo ;?></td></tr></tbody><tfoot><td></td><td></td><td></td><td></td><br><br><td><br><br><input type="submit" name="save" value="save Settings"  class="btn btn-success text"style="background-color:burlywood;"><?php //echo ;?></td></tfoot></table></div>
</form></body>
</html>
<?php

?>

<?php
include('footer.php');
?>