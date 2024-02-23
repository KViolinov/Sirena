<?php
	session_start();
	
	include("connection.php");
	include("functions.php");
	
	if ($_SERVER['REQUEST_METHOD'] == "POST"){
		//something was posted
		
		           
		            $cluster_id_var = $_POST['cluster_id'];
                    $cluster_name_var = $_POST['cluster_name'];
                    $cluster_description_var = $_POST['cluster_description'];
                    $cluster_geolocation1_var = $_POST['cluster_geolocation1'];
                    $cluster_geolocation2_var = $_POST['cluster_geolocation2'];
                    $cluster_critical_level_var = $_POST['cluster_critical_level'];
                    $cluster_email_notation_var = $_POST['cluster_email_notation'];
                    $cluster_phone_notation_var = $_POST['cluster_phone_notation'];
                    $cluster_additional_description_var = $_POST['cluster_additional_description'];
                    	$user_name_global = $_SESSION['user_name'];
 $id = $_POST['id'];

		            

 //                   echo $user_name_global;
 //                   echo $id;
//                    echo $cluster_id_var;
//                    echo $cluster_name_var;
//                    echo $cluster_description_var ;
//                    echo $cluster_geolocation1_var;
//                    echo $cluster_geolocation2_var ;
//                    echo $cluster_critical_temperature_var ;
//                    echo $cluster_email_notation_var ;
//                    echo $cluster_phone_notation_var ;
//                    echo $cluster_additional_description_var ;
 
 	        
 	        
 	        
 	        
			$query = "DELETE FROM clusters WHERE id=$id";

//echo $query;			
			mysqli_query($con, $query);
 
			header("Location: show-cluster.php");
			die;

	}
?>

