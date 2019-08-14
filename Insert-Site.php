
<?php 
	$username="root";  
	$password="";  
	$hostname = "localhost";  
	//connection string with database  

	$dbhandle = mysqli_connect($hostname, $username, $password)  
	or die("Unable to connect to MySQL");  
	echo "";  

	// connect with database  
	$selected = mysqli_select_db($dbhandle, "search")  
	or die("Could not select examples");  
	// mysqli_connect("localhost", "root", "");
	// mysql_select_db("search");
	
	
	if(isset($_POST['submit'])){
	
		 $site_title = $_POST['site_title'];
		 $site_link = $_POST['site_link'];
		 $site_keywords = $_POST['site_keywords'];
		 $site_desc = $_POST['site_desc'];
		 $site_image = $_FILES['site_image']['name'];
		 $site_image_tmp = $_FILES['site_image']['tmp_name'];
	
		
		if($site_title=='' OR $site_link=='' OR $site_keywords=='' OR $site_desc==''){
		
		echo "<script>alert('please fill all the fields!')</script>";
		exit();
		}
		else 
		{
		
			$insert_query = "INSERT INTO sites (site_title,site_link,site_keword,site_desc,site_image) VALUES ('$site_title','$site_link','$site_keywords','$site_desc','$site_image')";
			
			//move_uploaded_file($site_image_tmp,"images/{$site_image}");
		
			if(mysqli_query($dbhandle, $insert_query)){
				echo "Records inserted successfully.";
			} 
			else{
				echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbhandle);
				
			}
			
		}
	
	}
 
?>




