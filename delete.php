<?php
session_start();
require_once 'class.user.php';
$user_home = new USER();

if(!$user_home->is_logged_in())
{
	$user_home->redirect('login.php');
}

$stmt = $user_home->runQuery("SELECT * FROM users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<?php



$a=$row['userEmail'];
$b_id=$row['userID'];

echo "Please Wait We are Working on All Module to Work Greate";

if(isset($_GET['del']))

{
 
 $post_id = $_GET['del'];
 $conn = mysqli_connect("localhost","admin","5e67a505e1cbbfcfa37eca11b5f270b6a022bd32376c0165");
		mysqli_select_db($conn,"pears");
		
$query = "delete from torrent where userID='$b_id' && torrent_hash='$post_id'";
$run_posts = mysqli_query($conn,$query);

echo "<script> window.location.replace('login.php') </script>";

if (!$run_posts) { // add this check.
    die('Invalid query: ' . mysql_error());
}
}
?>