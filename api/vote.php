<?php 
session_start();
include('connect.php');

$votes = (int)$_POST['gvotes'];
$total_votes = $votes+1;
$gid = $_POST['gid'];
$uid = $_SESSION['userdata']['id'];

$update_votes = mysqli_query($connect,"UPDATE groups SET votes='$total_votes' WHERE id='$gid' ");
$update_user_status = mysqli_query($connect,"UPDATE user SET Status=1 WHERE id='$uid'");

if($update_votes and $update_user_status){
	$groups = mysqli_query($connect,"SELECT * FROM user where role=2");
	$groupsdata = mysqli_fetch_all($groups,MYSQLI_ASSOC);
	$_SESSION['userdata']['status'] = 1;
	$_SESSION['groups'] = $groupsdata;
	echo'
	<script>
	    alert("Voting Successfull!");
	    window.location = "../index.html";
	</script>
';
}
else{
	echo'
	<script>
	    alert("Some error occured!");
        window.location = "../index.html";
    </script>
';
}


?>