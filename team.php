<?php 
include('header.php');
if(isset($_GET['save'])){ //echo $_GET['tname'];
//$q = mysqli_query($c,"INSERT INTO `team` (`tname`) VALUES ('".$_GET['tname']."')");
$q = mysqli_query($c, 'INSERT INTO `team`(`tname`) VALUES ("'.$_GET['tname'].'")');
header('Location: ./team.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Team</title>
</head>
<body>
	<?php
include('hr.php');
?>


<div class="left">
    <table>
		<tr><th ><a href="team.php"><h3 class="btn btn-warning">Team</h3></a></th></tr><tr>
	<th><a href="player.php" style="color:darkgoldenrod;"><h3 class="btn btn-info">Players</h3></a></th></tr><tr><th><a href="settings.php" style="color:salmon;"><h3 class="btn btn-danger">Settings</h3></a></th></tr><tr>
	<th><a href="policy.php" style="color:red;"><h3 class="btn btn-success">Policy</h3></a></th></tr>
	</table>
</div>
<div class="main">
<div style="padding-left: 100px; padding-right: 400px;"><br><br><br><br><br>
		<legend style="text-align:center;"><h1>Cricket Trournament : Team</h1> </legend><br><br>
					<a href="./" class="btn btn-primary" ><< Home</a><br><br><br><br>
&nbsp;&nbsp;&nbsp;<a href="?add=1"><h1 class="btn btn-warning"><i class="fa fa-plus" aria-hidden="true"></i>
Team</h1></a><br><br>
<table class="table table-bordered"><thead ><tr ><?php if(isset($_GET['add'])){?><form><th>Team Name</th><th><input type="text" name="tname" class="bg-muted"></th><th><input type="submit" class="bg-gradient btn btn-warning" name="save"  value="save" style="color:red;"></th><form>	<?php }?></tr><tr style="text-align:center;"><th class="bg-secondary bg-gradient"><br><br>S. No.</th><th class="bg-secondary bg-gradient"><br><br>Team </th><th class="bg-secondary bg-gradient"><br><br>&nbsp;Total Players</th></tr></thead><tbody><?php $i=0;  $tq = mysqli_query($c, 'SELECT * FROM team');while($t = mysqli_fetch_array($tq)){?><tr style="text-align:center;"><td><br><?php echo ++$i;?></td><td ><br><?php echo $t['tname'];?></td><td ><br> (<?php 
$pq=mysqli_query($c, 'SELECT * FROM player WHERE teamid="'.$t['id'].'"'); $p=mysqli_num_rows($pq); echo $p;?>)&nbsp;&nbsp;&nbsp;<a class="btn btn-success" href="players.php?id=<?php echo $t['id'];?>">Show</a></td></tr><?php } //echo ;?></tbody></table></div></div>
</div>
	</div>
</div>
</body>
</html>
<?php

?>

<?php
include('footer.php');
?>