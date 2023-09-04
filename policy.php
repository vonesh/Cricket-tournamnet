<?php
include('header.php');
	$stq = mysqli_query($c, 'SELECT * FROM settings');$st = mysqli_fetch_array($stq);
	if (isset($_GET['id'])) {
	$id=trim($_GET['id']);
	}
	if (isset($id)) {
	$tq = mysqli_query($c, 'SELECT * FROM team WHERE id="'.$id.'"');$t = mysqli_fetch_array($tq);
	$pq = mysqli_query($c, 'SELECT * FROM player WHERE teamid="'.$id.'"');$p = mysqli_num_rows($pq);

	}


?>
<!DOCTYPE html>
<html>
<head>


<style type="text/css" media="print">
@page {
    size: auto;   /* auto is the initial value */
    margin: 0;  /* this affects the margin in the printer settings */
}
.print, .home{
	visibility:hidden;
}
</style>
<style type="text/css">.print{background-color:red;}</style>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Policy</title>
</head>
<body>
<div style="padding-left: 50px; padding-right: 50px;"><br><br><button onClick = "window.print()" class="print btn btn-warning">Print	</button>
		<legend style="text-align: center;"><h1><?php echo ucwords($st['club']);?> Cricket Club</h1></legend>
		&nbsp;&nbsp;&nbsp;<a href="index.php" > <button class="home btn btn-primary" ><< Home</button></a>&nbsp;&nbsp;&nbsp;

		<table><thead></thead><tbody>
<tr><td>Chanceller:</td><td><?php echo $st['chanceller'];?></td></tr>
<tr><td>Security:</td><td><?php echo $st['security'];?></td></tr>
<tr><td>Email:</td><td><?php echo $st['email'];?></td></tr>
<tr><td>Contact No:</td><td><?php echo $st['contactno'];?></td></tr>
<tr><td>Address:</td><td><?php echo $st['address'];?></td></tr>
		</tbody></table>

		<h1 style="text-align: center;">Club Policy</h1><br><br>

<table><thead><tr><th></th></tr></thead>

<tbody><tr><th><legend>(1) Organizers</legend><p>1.01 The Tournament is Asian Premier League (APL) in collaboration with One India Association (OIA) and Aligarh Muslim University Alumni Association Qatar (AMUAAQ).

1.02 The Organizing Committee with contact details will be provided along with Matches Schedule.</p></th><th></th></tr>
<tr><th><legend>(2) Participations</legend><p>2.01 As this is Indian Inter-State Tournament participating Teams are required to be from different states of India and Every Team should have all Players from their own State only.

2.02 Each State will be given One-participation initially and in case of vacant spots the Teams registered first will be given first chance to register the 2nd Team from their State.

2.03 Teams should be registered under any Associated Organizations affiliated to ICC/ICBF/IBPC/ISC

 2.04 Any Violation from any Team of including Players from Other State/region/nationality apart from their State will amount to dis-qualifying that Team from the Tournament without any Entry-fee reimbursement.

 2.05 Teams are required to provide a list of maximum 20 Players with passport copy,Qatar ID Copy and Photograph.
</p></th><th></th></tr>
<tr><th><legend>(3) Benefits, prizes & Awards</legend><p>Each Team will Pay Qr. 800/- as Participating Fee.</p>			</th><th></th></tr>
<tr><th><legend>(4) Participating Fee, Prizes & Awards</legend>	<p>1. Each Team will receive from Organizers 15 Nos.T-shirts with their State, Team and Organization name.
2. Winning Team – Cash Prize. Qr. 2500 + Designer Trophy.
3. Runner’s Team – Cash Prize. Qr. 1500 + Designer Trophy.
4. Semi-finalist – Cash Prize. Qr. 500 + Designer Trophy.
5. Individual Prizes
    a. Man of the Match for League’s, Semi-finals and finals – Trophy
    b. Man of the Series – Trophy
    c. Best Batsman & Best Bowler of the Tournament – Trophy
    d. Man of the Match for Finals – Trophy</p>		</th><th></th></tr>
</tbody><tfoot><tr><td>Team : <?php if (isset($id)) { echo $t['tname'];}else{echo '';}?></td></tr>
<tr><td>Total Players : <?php if (isset($id)) {echo $p;}else{echo '';}?></td></tr>
</tfoot>
</table></div>
</body>
</html>
<?php

?>

<?php
include('footer.php');
?>