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
if(isset($_POST['addtoteam'])){ $_POST["id"];
	$updateq = mysqli_query($c, 'UPDATE `player` SET `teamid` ="'.$_POST["team"].'" WHERE `id` = "'.$_POST["id"].'"');
header('Location: ./player.php');
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
?>
<div class="left">
    <table>
		<tr><th ><a href="team.php"><h3 class="btn btn-warning">Team</h3></a></th></tr><tr>
	<th><a href="player.php" style="color:darkgoldenrod;"><h3 class="btn btn-info">Players</h3></a></th></tr><tr><th><a href="settings.php" style="color:salmon;"><h3 class="btn btn-danger">Settings</h3></a></th></tr><tr>
	<th><a href="policy.php" style="color:red;"><h3 class="btn btn-success">Policy</h3></a></th></tr>
	</table>
</div>
<div class="main">

<div style="padding-left: 100px; padding-right: 400px; overflow: auto;" ><br><br><br><br><br>
		<legend style="text-align:center;"><h1>Cricket Trournament : Player</h1> </legend><br><br>
		<a href="./" class="btn btn-primary" ><< Home</a><br><br><br><br>&nbsp;&nbsp;&nbsp;<a href="?add=1"><h1 class=" btn btn-warning"><i class="fa fa-plus" aria-hidden="true"></i>
 Player</h1></a><br><br>

<table class="table table-bordered"><thead><tr><?php if(isset($_GET['add'])){?><form  method ="post" enctype="multipart/form-data"><th><label>Select a Team : </label><select name="team"><?php $tq = mysqli_query($c, 'SELECT * FROM team');while($t = mysqli_fetch_array($tq)){?><option value="<?php echo $t['id'];?>"><?php echo $t['tname'];?></option><?php } ?></select>&nbsp;</th><th>Player Name :</th><th><input type="text" name="pname"></th><th>Photo :</th><th><input type="file" name="pic"></th><th><input type="submit"  class="btn btn-warning" name="save" value="save" style="color:red;"></th><form><?php }else{?></tr><tr ><th style="text-align:center;" class="bg-gradient bg-danger"><br><br>S. No.</th><th style="text-align:center;" class="bg-gradient bg-danger"><br><br>Player </th><th style="text-align:center;" class="bg-gradient bg-danger"><br><br>Photo </th><th style="text-align:center;" class="bg-gradient bg-danger"><br><br>Alloted Team</th><th style="text-align:center;" class="bg-gradient bg-danger"> <br><br>If wish to change Team</th></tr></thead><tbody><?php $i=0;  $tq = mysqli_query($c, 'SELECT * FROM player');while($t = mysqli_fetch_array($tq)){?><tr> <td style="text-align:center;"><br><br><?php echo ++$i;?></td><td style="text-align:center;"><br><br><?php echo $t['pname'];?></td><td style="text-align:center;"><img src="./uploads/<?php echo $t['pic'];?>" style="width:100px;height:100px;"></td><td style="text-align: center;"> <br><br><?php $teamq = mysqli_query($c, 'SELECT * FROM team WHERE id ="'.$t['teamid'].'"');$teamname = mysqli_fetch_array($teamq); echo $teamname['tname'];?></td><td style="text-align:center;"><br><form method="post" ><input type="hidden" name="id" value="<?php echo $t['id'];?>"><label>Select a Team : </label><select name="team"><?php $q = mysqli_query($c, 'SELECT * FROM team');while($p = mysqli_fetch_array($q)){?><option value="<?php echo $p['id'];?>"><?php echo $p['tname'];?></option><?php } ?></select> <input type="submit" class="btn btn-success bg-gradient" name="addtoteam" value="Add to team"></form></td></tr><?php } ?><?php } //echo ;?></tbody></table></div>

</div>
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