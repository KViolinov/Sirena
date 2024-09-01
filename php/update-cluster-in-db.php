<?php
	session_start();
	
	include("connection.php");
	include("functions.php");
	
	if ($_SERVER['REQUEST_METHOD'] == "POST"){
		//something was posted
		
		            //$cluster_id_var = $_POST['cluster_id'];
                    $id = $_POST['id'];
                    $cluster_name_var = $_POST['cluster_name'];
                    $cluster_description_var = $_POST['cluster_description'];
                    $cluster_geolocation1_var = (float)$_POST['cluster_geolocation1'];
                    $cluster_geolocation2_var = (float)$_POST['cluster_geolocation2'];
                    $cluster_critical_level_var = intval($_POST['cluster_critical_level']);
                    $cluster_email_notation_var = $_POST['cluster_email_notation'];
                    $cluster_phone_notation_var = $_POST['cluster_phone_notation'];
                    $cluster_additional_description_var = $_POST['cluster_additional_description'];
                    	$user_name_global = $_SESSION['user_name'];


		            
                    //echo $id;
                    //echo $user_name_global;
                    //echo $cluster_id_var;echo "<br>";
                    //echo $cluster_name_var;echo "<br>";
                    //echo $cluster_description_var ;echo "<br>";
                    //echo $cluster_geolocation1_var;echo "<br>";
                    //echo $cluster_geolocation2_var ;echo "<br>";
                    //echo $cluster_critical_temperature_var ;echo "<br>";
                    //echo $cluster_email_notation_var ;echo "<br>";
                    //echo $cluster_phone_notation_var ;echo "<br>";
                    //echo $cluster_additional_description_var ;echo "<br>";
 
 	         
			$query = "UPDATE clusters SET cluster_name = '$cluster_name_var', cluster_description = '$cluster_description_var', cluster_geolocation1 = '$cluster_geolocation1_var', cluster_geolocation2 = '$cluster_geolocation2_var', cluster_critical_level = '$cluster_critical_level_var', cluster_email_notation = '$cluster_email_notation_var', cluster_phone_notation = '$cluster_phone_notation_var', cluster_additional_description = '$cluster_additional_description_var' WHERE id='$id'";
//echo $query;
			
        	mysqli_query($con, $query);
 
			header("Location: show-cluster.php");
			die;

	}
?>

