<?php
	session_start();
	
	include("connection.php");
	include("functions.php");
	
	if ($_SERVER['REQUEST_METHOD'] == "POST"){
		//something was posted
		
		            //$cluster_id_var = $_POST['cluster_id']; ??
                    $cluster_name_var = $_POST['cluster_name'];
                    $cluster_description_var = $_POST['cluster_description'];
                    $cluster_geolocation1_var = (float)$_POST['cluster_geolocation1'];
                    $cluster_geolocation2_var = (float)$_POST['cluster_geolocation2'];
                    $cluster_critical_level_var = (double)$_POST['cluster_critical_level'];
                    $cluster_email_notation_var = $_POST['cluster_email_notation'];
                    $cluster_phone_notation_var = $_POST['cluster_phone_notation'];
                    $cluster_additional_description_var = $_POST['cluster_additional_description_1'];
                    $user_name_global = $_SESSION['user_name'];
                    $cluster_id_var = random_num(20); 
		            

//                    echo $user_name_global;
//                    echo $cluster_id_var;
//                    echo $cluster_name_var;
//                    echo $cluster_description_var ;
//                    echo $cluster_geolocation1_var;
//                    echo $cluster_geolocation2_var ;
//                    echo $cluster_critical_temperature_var ;
//                    echo $cluster_email_notation_var ;
//                    echo $cluster_phone_notation_var ;
//                    echo $cluster_additional_description_var ;
 
//                    echo "cluster_name_var";
//	                echo "<br>";
//	                echo "kum db";
//	                echo "<br>";
//	                echo $cluster_name_var;
//                    echo "<br>";
                    //echo "ot forma";
                    //echo "<br>";
                    //echo $_POST['cluster_name1'];
                    //echo "<br>";
                    
                    //echo "<br>";
                    //echo "<br>";
                    
                    //echo "cluster_description_var";
                    //echo "<br>";
	                //echo "kum db";
                    //echo $cluster_description_var;
                    //echo "<br>";
                    //echo "ot forma";
                    //echo "<br>";
                    //echo $_POST['cluster_description1'];
                    //echo "<br>";
                    
                    //echo "<br>";
                    //echo "<br>";
                    
//                    echo "cluster_geolocation1_var";
  //                  echo "<br>";
	//                echo "kum db";
	  //              echo "<br>";
        //            echo $cluster_geolocation1_var;
          //          echo "<br>";
            //        echo "ot forma";
              //      echo "<br>";
                //    echo $_POST['cluster_geolocation11'];
                  //  echo "<br>";
                    
                    //echo "<br>";
                    //echo "<br>";
                    
                    //echo "cluster_geolocation2_var";
                    //echo "<br>";
	                //echo "kum db";
	                //echo "<br>";
                    //echo $cluster_geolocation2_var;
                    //echo "<br>";
                    //echo "ot forma";
                    //echo "<br>";
                    //echo $_POST['cluster_geolocation21'];
                    //echo "<br>";
                    
//                    echo "<br>";
  //                  echo "<br>";
                    
    //                echo "cluster_critical_level_var";
      //              echo "<br>";
	    //            echo "kum db";
	      //          echo "<br>";
            //        echo $cluster_critical_level_var;
              //      echo "<br>";
                //    echo "ot forma";
                  //  echo "<br>";
                    //echo $_POST['cluster_critical_level1'];
                    //echo "<br>";
                    
                    //echo "<br>";
                    //echo "<br>";
                    
//                    echo "cluster_email_notation_var";
  //                  echo "<br>";
	//                echo "kum db";
	  //              echo "<br>";
        //            echo $cluster_email_notation_var;
          //          echo "<br>";
            //        echo "ot forma";
              //      echo "<br>";
                //    echo $_POST['cluster_email_notation1'];
                  //  echo "<br>";
                    
                    //echo "<br>";
                    //echo "<br>";
                    
//                    echo "cluster_phone_notation_var";
  //                  echo "<br>";
	//                echo "kum db";
	  //              echo "<br>";
        //            echo $cluster_phone_notation_var;
          //          echo "<br>";
            //        echo "ot forma";
              //      echo "<br>";
                //    echo $_POST['cluster_phone_notation1'];
                  //  echo "<br>";
                    
                    //echo "<br>";
                    //echo "<br>";
                    
//                    echo "cluster_additional_description_var";
  //                  echo "<br>";
	//                echo "kum db";
	  //              echo "<br>";
        //            echo $cluster_additional_description_var;
          //          echo "<br>";
            //        echo "ot forma";
              //      echo "<br>";
                //    echo $_POST['cluster_additional_description_1'];
                  //  echo "<br>";
                    
                    //echo "<br>";
                    //echo "<br>";
                    
//                    echo $user_name_global;
  //                  echo "<br>";
    //                echo $_SESSION['user_name'];
      //              echo "<br>";
 	        
			$query = "insert into clusters (cluster_id, user_id, cluster_name, cluster_description, cluster_geolocation1, cluster_geolocation2, cluster_critical_level, cluster_email_notation, cluster_phone_notation, cluster_additional_description) 
			values ('$cluster_id_var', '$user_name_global', '$cluster_name_var', '$cluster_description_var', '$cluster_geolocation1_var', '$cluster_geolocation2_var', '$cluster_critical_level_var', '$cluster_email_notation_var', '$cluster_phone_notation_var', '$cluster_additional_description_var')";
			
		//	echo $query;
			
			mysqli_query($con, $query);
 
			header("Location: show-cluster.php");
			die;

	}
?>

