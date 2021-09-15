<?php
include('dbcon.php');
if (isset($_POST['delete_game'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysqli_query($conn,"DELETE FROM games where game_id='$id[$i]'");
}
header("location: games.php");
}
?>