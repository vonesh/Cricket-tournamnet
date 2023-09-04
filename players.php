<?php 
include('header.php');
if(isset($_POST['save'])){ $_POST['pname'];
//$q = mysqli_query($c,"INSERT INTO `player` (`pname`) VALUES ('".$_GET['pname']."')");
 $tmp = $_FILES['pic']['tmp_name'];
        	 $uploadFolder = './uploads/';
        	 $fname= $_FILES['pic']['name'];
$done = move_uploaded_file($tmp, $uploadFolder.$fname);
echo $team = $_POST['team'];
$q = mysqli_query($c, 'INSERT INTO `player`(`pname`,`pic`,`teamid`) VALUES ("'.$_POST['pname'].'", "'.$fname.'", "'.$team.'")');
//header('Location: ./player.php');
}
if(isset($_POST['change'])){ if (isset($_POST["epname"])) {
	$updateq = mysqli_query($c, 'UPDATE `player` SET `pname` ="'.$_POST["epname"].'" WHERE `id` = "'.$_POST["eid"].'"');
}
if (!empty($_FILES['eppic']['tmp_name'])) {
	$tmp = $_FILES['eppic']['tmp_name'];
        	 $uploadFolder = './uploads/';
        	 $fname= $_FILES['eppic']['name'];
$done = move_uploaded_file($tmp, $uploadFolder.$fname);
	$updateq = mysqli_query($c, 'UPDATE `player` SET `pic` ="'.$fname.'" WHERE `id` = "'.$_POST["eid"].'"');
}

//header('Location: ./players.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Player</title>
</head>
<body>
	<?php
include('hr.php');
?><div class="left">
    <table>
		<tr><th ><a href="team.php"><h3 class="btn btn-warning">Team</h3></a></th></tr><tr>
	<th><a href="player.php" style="color:darkgoldenrod;"><h3 class="btn btn-info">Players</h3></a></th></tr><tr><th><a href="settings.php" style="color:salmon;"><h3 class="btn btn-danger">Settings</h3></a></th></tr><tr>
	<th><a href="policy.php" style="color:red;"><h3 class="btn btn-success">Policy</h3></a></th></tr>
	</table>
</div>
<div class="main">
    
<div style="padding-left: 100px;padding-right: 300px; overflow: auto;" ><br><br><br><br><br>
		<legend style="text-align:center;"><h1>Cricket Trournament : Player</h1> </legend><br><br>
		<a href="./" class="btn btn-primary" ><< Home</a><br><br><br><br>&nbsp;&nbsp;&nbsp;<a href="?add=1"><h1 class="btn btn-warning"><i class="fa fa-plus" aria-hidden="true"></i> Add Player</h1></a><br><br>

<table class="table table-bordered"><thead><?php if (isset($_POST['editplayer'])): $epq=mysqli_query($c, 'SELECT * FROM player WHERE id="'.$_POST['id'].'"');
	$ep = mysqli_fetch_assoc($epq);
?>
<form method="post" enctype="multipart/form-data"><input type="hidden" name="eid" value="<?php echo $_POST['id'];?>"><legend style="padding-left: 300px;"><h2>Edit Player</h2></legend>
<tr><th>Player:<input type="text" name="epname" value="<?php echo $ep['pname'];?> "></th><th>Photo </th><th><img src="./uploads/<?php echo $ep['pic'];?>" style="width:100px;height:100px;"></th><th><input type="file" name="eppic"></th><th><input type="submit" name="change"  value="save" style="background-color:orange;"></th></tr></form><tr><?php endif ?><?php if(isset($_GET['add'])){?><form  method ="post" enctype="multipart/form-data"><th><label>Select a Team : </label><select name="team"><?php $tq = mysqli_query($c, 'SELECT * FROM team ');while($t = mysqli_fetch_array($tq)){?><option value="<?php echo $t['id'];?>"><?php echo $t['tname'];?></option><?php } ?></select>&nbsp;</th><th>Player Name :</th><th><input type="text" name="pname"></th><th>Photo :</th><th><input type="file" name="pic"></th><th><input type="submit" name="save" class="btn btn-warning" value="save" style="color:red;"></th><form><?php }else{?></tr><tr style="text-align:center;" ><th class="bg-gradient bg-danger" ><br><br>S. No.</th><th class="bg-gradient bg-danger"><br><br>Player </th><th class="bg-gradient bg-danger"><br><br>Photo </th><th class="bg-gradient bg-danger"><br><br>Alloted Team</th><th class="bg-gradient bg-danger"><br><br>&nbsp;Action</th></tr></thead><tbody>

	<?php $i=0;  $tq = mysqli_query($c, 'SELECT * FROM player WHERE teamid="'.$_GET['id'].'"');while($t = mysqli_fetch_array($tq)){?><tr style="text-align:center;"><td><br><br><?php echo ++$i;?></td><td><br><br><?php echo $t['pname'];?></td><td><br><img src="./uploads/<?php echo $t['pic'];?>" style="width:100px;height:100px;"></td><td style="text-align: center;"><br><br><?php $teamq = mysqli_query($c, 'SELECT * FROM team WHERE id ="'.$t['teamid'].'"');$teamname = mysqli_fetch_array($teamq); echo $teamname['tname'];?></td><td><br><br><form method="post" ><input type="hidden" name="id" value="<?php echo $t['id'];?>"><input type="submit" name="editplayer"  class="bg-gradient btn btn-warning"value="Edit"></form></td></tr><?php } ?></tr><?php } //echo ;?></tbody></table></div></div></div>
</div>
	</div>
</body>
</html>
<?php

?>

<?php
include('footer.php');
?>