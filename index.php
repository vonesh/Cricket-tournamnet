<?php
include('header.php');
?>


<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
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
    

	<div style="padding-left: 100px;padding-right: 400px; overflow: auto;"><br><br>
		<legend style="text-align:center;"><h1>Dashboard</h1> </legend><br><br>
<div class="container">
	<div class="row">
		<div class="col-1">
		<br><br>
</div><div class="col">	<br><br>
<table class="table table-bordered"><thead><tr style="text-align:center;" ><th style="padding-top:30px;" class="bg-gradient bg-danger">Team</th><th style="padding-top:30px;" class="bg-gradient bg-danger">Total Player</th><th style="padding-top:30px;" class="bg-gradient bg-danger">Paid</th><th style="padding-top:30px;" class="bg-gradient bg-danger">Print</th></tr></thead><tbody><?php $tq = mysqli_query($c, 'SELECT * FROM team'); while($t = mysqli_fetch_assoc($tq)){?><tr style="text-align:center;"><th><?php echo $t['tname'];?></th><th><?php
$pq=mysqli_query($c, 'SELECT * FROM player WHERE teamid="'.$t['id'].'"'); $p=mysqli_num_rows($pq); echo $p;?></th><th><?php if ($p>0) { echo 'Yes';
	// code...
}else{echo '<p style="color:red;"> No</p>';}?></th><th><a href="policy.php?id=<?php echo $t['id']?>"><button class="btn btn-info bg-gradient">Preview	</button></a></th></tr><?php } ?></tbody></table></div></div>
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