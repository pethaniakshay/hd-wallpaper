<?php include("includes/connection.php");
 	  include("includes/function.php"); 	
	
	$file_path = 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/';


	function get_total_wallpaper($cat_id)
	{	
 		global $mysqli;

		$qry_wallpaper="SELECT COUNT(*) as num FROM tbl_wallpaper WHERE cat_id='".$cat_id."'";
		 
		$total_wallpaper = mysqli_fetch_array(mysqli_query($mysqli,$qry_wallpaper));
		$total_wallpaper = $total_wallpaper['num'];
		 
		return $total_wallpaper;

	}
 	 
	if(isset($_GET['home']))
 	{
 		 
	  $home_latest_limit    = HOME_LATEST_LIMIT;
	  $home_most_viewed_limit    = HOME_MOST_VIEWED_LIMIT;
	  $home_most_rated_limit    = HOME_MOST_RATED_LIMIT;


		$jsonObj2= array();	
	
	    $query2="SELECT * FROM tbl_wallpaper
			LEFT JOIN tbl_category ON tbl_wallpaper.cat_id= tbl_category.cid 
			ORDER BY tbl_wallpaper.id DESC LIMIT $home_latest_limit";


		$sql2 = mysqli_query($mysqli,$query2)or die(mysqli_error());

		while($data2 = mysqli_fetch_assoc($sql2))
		{
			$row2['id'] = $data2['id'];
			$row2['cat_id'] = $data2['cat_id'];
 			$row2['wallpaper_image'] = $file_path.'categories/'.$data2['cat_id'].'/'.$data2['image'];
 			$row2['wallpaper_image_thumb'] = $file_path.'categories/'.$data2['cat_id'].'/thumbs/'.$data2['image']; 
 			$row2['total_views'] = $data2['total_views'];
 			$row2['total_rate'] = $data2['total_rate'];
	        $row2['rate_avg'] = $data2['rate_avg'];

	        $row2['wall_tags'] = $data2['wall_tags'];

			$row2['cid'] = $data2['cid'];
			$row2['category_name'] = $data2['category_name'];
			$row2['category_image'] = $file_path.'images/'.$data2['category_image'];
			$row2['category_image_thumb'] = $file_path.'images/thumbs/'.$data2['category_image'];
			 

			array_push($jsonObj2,$row2);
		
		}

		$row['latest_wallpaper']=$jsonObj2;


		$jsonObj3= array();	
	
	    $query3="SELECT * FROM tbl_wallpaper
			LEFT JOIN tbl_category ON tbl_wallpaper.cat_id= tbl_category.cid 
			ORDER BY tbl_wallpaper.total_views DESC LIMIT $home_most_viewed_limit";


		$sql3 = mysqli_query($mysqli,$query3)or die(mysqli_error());

		while($data3 = mysqli_fetch_assoc($sql3))
		{
			$row3['id'] = $data3['id'];
			$row3['cat_id'] = $data3['cat_id'];
 			$row3['wallpaper_image'] = $file_path.'categories/'.$data3['cat_id'].'/'.$data3['image'];
 			$row3['wallpaper_image_thumb'] = $file_path.'categories/'.$data3['cat_id'].'/thumbs/'.$data3['image']; 
 			$row3['total_views'] = $data3['total_views'];
 			$row3['total_rate'] = $data3['total_rate'];
	        $row3['rate_avg'] = $data3['rate_avg'];

	        $row3['wall_tags'] = $data3['wall_tags'];

			$row3['cid'] = $data3['cid'];
			$row3['category_name'] = $data3['category_name'];
			$row3['category_image'] = $file_path.'images/'.$data3['category_image'];
			$row3['category_image_thumb'] = $file_path.'images/thumbs/'.$data3['category_image'];
			 

			array_push($jsonObj3,$row3);
		
		}

		$row['most_viewed_wallpaper']=$jsonObj3;


		$jsonObj4= array();	
	
	    $query4="SELECT * FROM tbl_wallpaper
			LEFT JOIN tbl_category ON tbl_wallpaper.cat_id= tbl_category.cid 
			ORDER BY tbl_wallpaper.total_rate DESC LIMIT $home_most_rated_limit";


		$sql4 = mysqli_query($mysqli,$query4)or die(mysqli_error());

		while($data4 = mysqli_fetch_assoc($sql4))
		{
			$row4['id'] = $data4['id'];
			$row4['cat_id'] = $data4['cat_id'];
 			$row4['wallpaper_image'] = $file_path.'categories/'.$data4['cat_id'].'/'.$data4['image'];
 			$row4['wallpaper_image_thumb'] = $file_path.'categories/'.$data4['cat_id'].'/thumbs/'.$data4['image']; 
 			$row4['total_views'] = $data4['total_views'];
 			$row4['total_rate'] = $data4['total_rate'];
	        $row4['rate_avg'] = $data4['rate_avg'];
	        $row4['wall_tags'] = $data4['wall_tags'];

			$row4['cid'] = $data4['cid'];
			$row4['category_name'] = $data4['category_name'];
			$row4['category_image'] = $file_path.'images/'.$data4['category_image'];
			$row4['category_image_thumb'] = $file_path.'images/thumbs/'.$data4['category_image'];
			 

			array_push($jsonObj4,$row4);
		
		}

		$row['most_rated_wallpaper']=$jsonObj4;

		$set['HD_WALLPAPER'] = $row;
		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
 	}
	else if(isset($_GET['cat_list']))
 	{
 		$jsonObj= array();
		
		$cid=API_CAT_ORDER_BY;


		$query="SELECT cid,category_name,category_image FROM tbl_category WHERE status=1 ORDER BY tbl_category.".$cid."";
		$sql = mysqli_query($mysqli,$query)or die(mysql_error());

		while($data = mysqli_fetch_assoc($sql))
		{
			
			$row['cid'] = $data['cid'];
			$row['category_name'] = $data['category_name'];
			$row['category_image'] = $file_path.'images/'.$data['category_image'];
			$row['category_image_thumb'] = $file_path.'images/thumbs/'.$data['category_image'];
			$row['category_total_wall'] = get_total_wallpaper($data['cid']);

			array_push($jsonObj,$row);
		
		}

		$set['HD_WALLPAPER'] = $jsonObj;
		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
 	}
	else if(isset($_GET['cat_id']))
	{
		$post_order_by=API_CAT_POST_ORDER_BY;

		$cat_id=$_GET['cat_id'];	
		$limit=($_GET['page']-1) * 10;

		$query_rec = "SELECT COUNT(*) as num FROM tbl_wallpaper
		LEFT JOIN tbl_category ON tbl_wallpaper.cat_id= tbl_category.cid 
		where tbl_wallpaper.cat_id='".$cat_id."' ORDER BY tbl_wallpaper.id";

		$total_pages = mysqli_fetch_array(mysqli_query($mysqli,$query_rec));


		$jsonObj= array();	
	
	    $query="SELECT * FROM tbl_wallpaper
		LEFT JOIN tbl_category ON tbl_wallpaper.cat_id= tbl_category.cid 
		where tbl_wallpaper.cat_id='".$cat_id."' ORDER BY tbl_wallpaper.id ".$post_order_by." LIMIT $limit, 10";

		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());

		while($data = mysqli_fetch_assoc($sql))
		{
			$row['num'] = $total_pages['num'];
			$row['id'] = $data['id'];
			$row['cat_id'] = $data['cat_id'];
 			$row['wallpaper_image'] = $file_path.'categories/'.$data['cat_id'].'/'.$data['image'];
 			$row['wallpaper_image_thumb'] = $file_path.'categories/'.$data['cat_id'].'/thumbs/'.$data['image']; 
 			$row['total_views'] = $data['total_views'];
 			$row['total_rate'] = $data['total_rate'];
	        $row['rate_avg'] = $data['rate_avg'];
	        $row['wall_tags'] = $data['wall_tags'];

			$row['cid'] = $data['cid'];
			$row['category_name'] = $data['category_name'];
			$row['category_image'] = $file_path.'images/'.$data['category_image'];
			$row['category_image_thumb'] = $file_path.'images/thumbs/'.$data['category_image'];
			 

			array_push($jsonObj,$row);
		
		}

		$set['HD_WALLPAPER'] = $jsonObj;
		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();

		
	}	 
	else if(isset($_GET['latest']))
	{
		//$limit=$_GET['latest'];	 

		$page_limit=API_LATEST_LIMIT;

			$limit=($_GET['page']-1) * $page_limit;

			$query_rec = "SELECT COUNT(*) as num FROM tbl_wallpaper
			LEFT JOIN tbl_category ON tbl_wallpaper.cat_id= tbl_category.cid 
			ORDER BY tbl_wallpaper.id";

			$total_pages = mysqli_fetch_array(mysqli_query($mysqli,$query_rec));

			$jsonObj= array();	
	 
			$query="SELECT * FROM tbl_wallpaper
			LEFT JOIN tbl_category ON tbl_wallpaper.cat_id= tbl_category.cid 
			ORDER BY tbl_wallpaper.id DESC LIMIT $limit,$page_limit";

			$sql = mysqli_query($mysqli,$query)or die(mysqli_error());

			while($data = mysqli_fetch_assoc($sql))
			{	
				$row['num'] = $total_pages['num'];
				$row['id'] = $data['id'];
				$row['cat_id'] = $data['cat_id'];
	 			$row['wallpaper_image'] = $file_path.'categories/'.$data['cat_id'].'/'.$data['image'];
	 			$row['wallpaper_image_thumb'] = $file_path.'categories/'.$data['cat_id'].'/thumbs/'.$data['image'];
	 			$row['total_views'] = $data['total_views']; 
	 			$row['total_rate'] = $data['total_rate'];
	            $row['rate_avg'] = $data['rate_avg'];
	            $row['wall_tags'] = $data['wall_tags'];

				$row['cid'] = $data['cid'];
				$row['category_name'] = $data['category_name'];
				$row['category_image'] = $file_path.'images/'.$data['category_image'];
				$row['category_image_thumb'] = $file_path.'images/thumbs/'.$data['category_image'];
				 

				array_push($jsonObj,$row);
			
			}

		$set['HD_WALLPAPER'] = $jsonObj;
		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();

	}	
	else if(isset($_GET['wallpaper_id']))
	{
		   
		$jsonObj= array();	

		$query="SELECT * FROM tbl_wallpaper WHERE id='".$_GET['wallpaper_id']."'";
		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());

		while($data = mysqli_fetch_assoc($sql))
		{
			 
			$row['id'] = $data['id'];
			$row['cat_id'] = $data['cat_id'];
 			$row['wallpaper_image'] = $file_path.'categories/'.$data['cat_id'].'/'.$data['image'];
 			$row['wallpaper_image_thumb'] = $file_path.'categories/'.$data['cat_id'].'/thumbs/'.$data['image']; 
 			$row['total_views'] = $data['total_views'];
 			$row['total_rate'] = $data['total_rate'];
	        $row['rate_avg'] = $data['rate_avg'];
	        $row['total_download'] = $data['total_download'];
 			$row['wall_tags'] = $data['wall_tags'];

			array_push($jsonObj,$row);
		
		}

		$view_qry=mysqli_query($mysqli,"UPDATE tbl_wallpaper SET total_views = total_views + 1 WHERE id = '".$_GET['wallpaper_id']."'");
  
  
		$set['HD_WALLPAPER'] = $jsonObj;
		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();	
 

	}
	else if(isset($_GET['get_wallpaper_most_viewed']))
	{
		//$limit=$_GET['latest'];	 

		$limit=($_GET['page']-1) * 10;

			$query_rec = "SELECT COUNT(*) as num FROM tbl_wallpaper
			LEFT JOIN tbl_category ON tbl_wallpaper.cat_id= tbl_category.cid 
			ORDER BY tbl_wallpaper.total_views";

			$total_pages = mysqli_fetch_array(mysqli_query($mysqli,$query_rec));


			$jsonObj= array();	
	 
			$query="SELECT * FROM tbl_wallpaper
			LEFT JOIN tbl_category ON tbl_wallpaper.cat_id= tbl_category.cid 
			ORDER BY tbl_wallpaper.total_views DESC LIMIT $limit,10";

			$sql = mysqli_query($mysqli,$query)or die(mysqli_error());

			while($data = mysqli_fetch_assoc($sql))
			{
				$row['num'] = $total_pages['num'];
				$row['id'] = $data['id'];
				$row['cat_id'] = $data['cat_id'];
	 			$row['wallpaper_image'] = $file_path.'categories/'.$data['cat_id'].'/'.$data['image'];
	 			$row['wallpaper_image_thumb'] = $file_path.'categories/'.$data['cat_id'].'/thumbs/'.$data['image'];
	 			$row['total_views'] = $data['total_views']; 
	 			$row['total_rate'] = $data['total_rate'];
	        	$row['rate_avg'] = $data['rate_avg'];
	        	$row['wall_tags'] = $data['wall_tags'];

				$row['cid'] = $data['cid'];
				$row['category_name'] = $data['category_name'];
				$row['category_image'] = $file_path.'images/'.$data['category_image'];
				$row['category_image_thumb'] = $file_path.'images/thumbs/'.$data['category_image'];
				 

				array_push($jsonObj,$row);
			
			}


		$set['HD_WALLPAPER'] = $jsonObj;
		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();

	}
	else if(isset($_GET['get_wallpaper_most_rated']))
	{
		//$limit=$_GET['latest'];	 

		$limit=($_GET['page']-1) * 10;

			$query_rec = "SELECT COUNT(*) as num FROM tbl_wallpaper
			LEFT JOIN tbl_category ON tbl_wallpaper.cat_id= tbl_category.cid 
			ORDER BY tbl_wallpaper.total_rate";

			$total_pages = mysqli_fetch_array(mysqli_query($mysqli,$query_rec));

			$jsonObj= array();	
	 
			$query="SELECT * FROM tbl_wallpaper
			LEFT JOIN tbl_category ON tbl_wallpaper.cat_id= tbl_category.cid 
			ORDER BY tbl_wallpaper.total_rate DESC LIMIT $limit,10";

			$sql = mysqli_query($mysqli,$query)or die(mysqli_error());

			while($data = mysqli_fetch_assoc($sql))
			{
				$row['num'] = $total_pages['num'];
				$row['id'] = $data['id'];
				$row['cat_id'] = $data['cat_id'];
	 			$row['wallpaper_image'] = $file_path.'categories/'.$data['cat_id'].'/'.$data['image'];
	 			$row['wallpaper_image_thumb'] = $file_path.'categories/'.$data['cat_id'].'/thumbs/'.$data['image'];
	 			$row['total_views'] = $data['total_views']; 
	 			$row['total_rate'] = $data['total_rate'];
	            $row['rate_avg'] = $data['rate_avg'];
	            $row['wall_tags'] = $data['wall_tags'];

				$row['cid'] = $data['cid'];
				$row['category_name'] = $data['category_name'];
				$row['category_image'] = $file_path.'images/'.$data['category_image'];
				$row['category_image_thumb'] = $file_path.'images/thumbs/'.$data['category_image'];
				 

				array_push($jsonObj,$row);
			
			}


		$set['HD_WALLPAPER'] = $jsonObj;
		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();

	}
	else if(isset($_GET['latest_gif']))
 	{

 		   $page_limit=API_LATEST_LIMIT;

			$limit=($_GET['page']-1) * $page_limit;

			$query_rec = "SELECT COUNT(*) as num FROM tbl_wallpaper_gif
 			ORDER BY tbl_wallpaper_gif.id";

			$total_pages = mysqli_fetch_array(mysqli_query($mysqli,$query_rec));

			$jsonObj= array();	
	 
			$query="SELECT * FROM tbl_wallpaper_gif
 			ORDER BY tbl_wallpaper_gif.id DESC LIMIT $limit,$page_limit";

			$sql = mysqli_query($mysqli,$query)or die(mysqli_error());

			while($data = mysqli_fetch_assoc($sql))
			{	
				$row['num'] = $total_pages['num'];
				$row['id'] = $data['id'];			 
			    $row['gif_image'] = $file_path.'images/animation/'.$data['image'];
			    $row['gif_tags'] = $data['gif_tags'];
	 			$row['total_views'] = $data['total_views']; 
	 			$row['total_rate'] = $data['total_rate'];
	        	$row['rate_avg'] = $data['rate_avg'];
				 

				array_push($jsonObj,$row);
			
			}

			$set['HD_WALLPAPER'] = $jsonObj;
		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();

 	}
	else if(isset($_GET['gif_list']))
 	{
 		$jsonObj= array();
		 
		$gif_order=API_GIF_POST_ORDER_BY;


		$query="SELECT * FROM tbl_wallpaper_gif ORDER BY id $gif_order";
		$sql = mysqli_query($mysqli,$query)or die(mysql_error());

		while($data = mysqli_fetch_assoc($sql))
		{
			 

			$row['id'] = $data['id'];			 
			$row['gif_image'] = $file_path.'images/animation/'.$data['image'];
			$row['gif_tags'] = $data['gif_tags'];
			$row['total_views'] = $data['total_views'];
			$row['total_rate'] = $data['total_rate'];
        	$row['rate_avg'] = $data['rate_avg'];
 
			array_push($jsonObj,$row);
		
		}

		$set['HD_WALLPAPER'] = $jsonObj;
		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
 	}
 	else if(isset($_GET['gif_id']))
	{
		  
				 
		$jsonObj= array();	

		$query="SELECT * FROM tbl_wallpaper_gif WHERE id='".$_GET['gif_id']."'";
		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());

		while($data = mysqli_fetch_assoc($sql))
		{
			 
			$row['id'] = $data['id'];			 
			$row['gif_image'] = $file_path.'images/animation/'.$data['image'];
			$row['gif_tags'] = $data['gif_tags'];
 			$row['total_views'] = $data['total_views'];
	 		$row['total_rate'] = $data['total_rate'];
        	$row['rate_avg'] = $data['rate_avg'];
        	$row['total_download'] = $data['total_download'];

			array_push($jsonObj,$row);
		
		}

		$view_qry=mysqli_query($mysqli,"UPDATE tbl_wallpaper_gif SET total_views = total_views + 1 WHERE id = '".$_GET['gif_id']."'");
 

		$set['HD_WALLPAPER'] = $jsonObj;
		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();	
 

	}
	else if(isset($_GET['get_gif_wallpaper_most_viewed']))
 	{

 		   $limit=($_GET['page']-1) * 10;

			$query_rec = "SELECT COUNT(*) as num FROM tbl_wallpaper_gif
 			ORDER BY tbl_wallpaper_gif.total_views";

			$total_pages = mysqli_fetch_array(mysqli_query($mysqli,$query_rec));


			$jsonObj= array();	
	 
			$query="SELECT * FROM tbl_wallpaper_gif
 			ORDER BY tbl_wallpaper_gif.total_views DESC LIMIT $limit,10";

			$sql = mysqli_query($mysqli,$query)or die(mysqli_error());

			while($data = mysqli_fetch_assoc($sql))
			{
				$row['num'] = $total_pages['num'];
				$row['id'] = $data['id'];			 
			    $row['gif_image'] = $file_path.'images/animation/'.$data['image'];
			    $row['gif_tags'] = $data['gif_tags'];
	 			$row['total_views'] = $data['total_views']; 
	 			$row['total_rate'] = $data['total_rate'];
	        	$row['rate_avg'] = $data['rate_avg'];

				array_push($jsonObj,$row);
			
			}
 
			$set['HD_WALLPAPER'] = $jsonObj;
		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();

 	}
 	else if(isset($_GET['get_gif_wallpaper_most_rated']))
 	{

 		   $limit=($_GET['page']-1) * 10;

			$query_rec = "SELECT COUNT(*) as num FROM tbl_wallpaper_gif
 			ORDER BY tbl_wallpaper_gif.total_rate";

			$total_pages = mysqli_fetch_array(mysqli_query($mysqli,$query_rec));

			$jsonObj= array();	
	 
			$query="SELECT * FROM tbl_wallpaper_gif
 			ORDER BY tbl_wallpaper_gif.total_rate DESC LIMIT $limit,10";

			$sql = mysqli_query($mysqli,$query)or die(mysqli_error());

			while($data = mysqli_fetch_assoc($sql))
			{
				$row['num'] = $total_pages['num'];
				$row['id'] = $data['id'];			 
			    $row['gif_image'] = $file_path.'images/animation/'.$data['image'];
			    $row['gif_tags'] = $data['gif_tags'];
	 			$row['total_views'] = $data['total_views']; 
	 			$row['total_rate'] = $data['total_rate'];
	        	$row['rate_avg'] = $data['rate_avg'];
 
				array_push($jsonObj,$row);
			
			}
 
			$set['HD_WALLPAPER'] = $jsonObj;
		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();

 	}
 	else if(isset($_GET['search_text']))
	{
		   
		$jsonObj= array();	
	 
			$query="SELECT * FROM tbl_wallpaper
			LEFT JOIN tbl_category ON tbl_wallpaper.cat_id= tbl_category.cid 
			WHERE wall_tags LIKE '%".$_GET['search_text']."%' ORDER BY tbl_wallpaper.wall_tags";

			$sql = mysqli_query($mysqli,$query)or die(mysqli_error());

			while($data = mysqli_fetch_assoc($sql))
			{
				$row['id'] = $data['id'];
				$row['cat_id'] = $data['cat_id'];
	 			$row['wallpaper_image'] = $file_path.'categories/'.$data['cat_id'].'/'.$data['image'];
	 			$row['wallpaper_image_thumb'] = $file_path.'categories/'.$data['cat_id'].'/thumbs/'.$data['image'];
	 			$row['total_views'] = $data['total_views']; 
	 			$row['total_rate'] = $data['total_rate'];
	            $row['rate_avg'] = $data['rate_avg'];
	            $row['wall_tags'] = $data['wall_tags'];
	            
				$row['cid'] = $data['cid'];
				$row['category_name'] = $data['category_name'];
				$row['category_image'] = $file_path.'images/'.$data['category_image'];
				$row['category_image_thumb'] = $file_path.'images/thumbs/'.$data['category_image'];
				 

				array_push($jsonObj,$row);
			
			}
  
  
		$set['HD_WALLPAPER'] = $jsonObj;
		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();	
 

	}
	else if(isset($_GET['gif_search_text']))
	{
		   
		$jsonObj= array();	
	 
			$query="SELECT * FROM tbl_wallpaper_gif
 			WHERE gif_tags LIKE '%".$_GET['gif_search_text']."%' ORDER BY tbl_wallpaper_gif.gif_tags";

			$sql = mysqli_query($mysqli,$query)or die(mysqli_error());

			while($data = mysqli_fetch_assoc($sql))
			{
				$row['id'] = $data['id'];			 
				$row['gif_image'] = $file_path.'images/animation/'.$data['image'];
				$row['gif_tags'] = $data['gif_tags'];
				$row['total_views'] = $data['total_views'];
				$row['total_rate'] = $data['total_rate'];
	        	$row['rate_avg'] = $data['rate_avg'];
				 

				array_push($jsonObj,$row);
			
			}
  
  
		$set['HD_WALLPAPER'] = $jsonObj;
		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();	
 

	}
	else if(isset($_GET['wallpaper_rate']))
	{
			$jsonObj= array();	

				  $ip = $_GET['device_id'];
			      $post_id = $_GET['post_id'];
			      $user_id = $_GET['device_id'];
			      $therate = $_GET['rate'];

	  		//echo "select * from tbl_rating where post_id  = '$post_id' && user_id = '$user_id'";
		      $query1 = mysqli_query($mysqli,"select * from tbl_rating where post_id  = '$post_id' && user_id = '$user_id'"); 
		      //exit;
		      while($data1 = mysqli_fetch_assoc($query1)){
		        $rate_db1[] = $data1;
		      }

		      if(@count($rate_db1) == 0 ){
		      
		           
		        $res_rat=mysqli_query($mysqli, "INSERT INTO tbl_rating(`post_id`,`user_id`,`rate`,`ip`) VALUES ('$post_id','$user_id','$therate','$ip')"); 

		  		//$qry = Insert('tbl_rating',$data_r); 
		      
		          //Total rate result
		           
		        $query = mysqli_query($mysqli,"select * from tbl_rating where post_id  = '$post_id' ");
		               
		         while($data = mysqli_fetch_assoc($query)){
		                    $rate_db[] = $data;
		                    $sum_rates[] = $data['rate'];
		               
		                }
		        
		                if(@count($rate_db)){
		                    $rate_times = count($rate_db);
		                    $sum_rates = array_sum($sum_rates);
		                    $rate_value = $sum_rates/$rate_times;
		                    $rate_bg = (($rate_value)/5)*100;
		                }else{
		                    $rate_times = 0;
		                    $rate_value = 0;
		                    $rate_bg = 0;
		                }
		         
		        $rate_avg=round($rate_value); 
		        
		      $sql="update tbl_wallpaper set total_rate=total_rate + 1,rate_avg='$rate_avg' where id='".$post_id."'";
		      mysqli_query($mysqli,$sql);
		        
		      $total_rat_sql="SELECT * FROM tbl_wallpaper WHERE id='".$post_id."'";
		      $total_rat_res=mysqli_query($mysqli,$total_rat_sql);
		      $total_rat_row=mysqli_fetch_assoc($total_rat_res);
		    
		         
		        $jsonObj = array( 'total_rate' => $total_rat_row['total_rate'],'rate_avg' =>$total_rat_row['rate_avg'],'MSG'=>"You have succesfully rated");
	        
		      }else{
		        
		      		$jsonObj = array( 'MSG' => 'You have already rated');

		      }

			$set['HD_WALLPAPER'][] = $jsonObj;
		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
	}
	else if(isset($_GET['get_wallpaper_rate']))
	{

			$jsonObj= array();	

 			      $post_id = $_GET['post_id'];
			      $user_id = $_GET['device_id'];
 
	  		//echo "select * from tbl_rating where post_id  = '$post_id' && user_id = '$user_id'";
		      $query1 = mysqli_query($mysqli,"select * from tbl_rating where post_id  = '$post_id' && user_id = '$user_id'"); 
		      $data1 = mysqli_fetch_assoc($query1);

		      if(@count($data1)== 0)
		      {

		      	   $jsonObj = array( 'total_rate' => 0);


		      	}else{
		        
		      		$jsonObj = array( 'total_rate' => $data1['rate']);

		      }

		$set['HD_WALLPAPER'][] = $jsonObj;
		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
	}
	else if(isset($_GET['gif_rate']))
	{
		$jsonObj= array();	

			  $ip = $_GET['device_id'];
		      $post_id = $_GET['post_id'];
		      $user_id = $_GET['device_id'];
		      $therate = $_GET['rate'];

  		//echo "select * from tbl_rating_gif where post_id  = '$post_id' && user_id = '$user_id'";
	      $query1 = mysqli_query($mysqli,"select * from tbl_rating_gif where post_id  = '$post_id' && user_id = '$user_id'"); 
	      //exit;
	      while($data1 = mysqli_fetch_assoc($query1)){
	        $rate_db1[] = $data1;
	      }

	      if(@count($rate_db1) == 0 ){
	      
	           
	        $res_rat=mysqli_query($mysqli, "INSERT INTO tbl_rating_gif(`post_id`,`user_id`,`rate`,`ip`) VALUES ('$post_id','$user_id','$therate','$ip')"); 

	  		//$qry = Insert('tbl_rating',$data_r); 
	      
	          //Total rate result
	           
	        $query = mysqli_query($mysqli,"select * from tbl_rating_gif where post_id  = '$post_id' ");
	               
	         while($data = mysqli_fetch_assoc($query)){
	                    $rate_db[] = $data;
	                    $sum_rates[] = $data['rate'];
	               
	                }
	        
	                if(@count($rate_db)){
	                    $rate_times = count($rate_db);
	                    $sum_rates = array_sum($sum_rates);
	                    $rate_value = $sum_rates/$rate_times;
	                    $rate_bg = (($rate_value)/5)*100;
	                }else{
	                    $rate_times = 0;
	                    $rate_value = 0;
	                    $rate_bg = 0;
	                }
	         
	        $rate_avg=round($rate_value); 
	        
	      $sql="update tbl_wallpaper_gif set total_rate=total_rate + 1,rate_avg='$rate_avg' where id='".$post_id."'";
	      mysqli_query($mysqli,$sql);
	        
	      $total_rat_sql="SELECT * FROM tbl_wallpaper_gif WHERE id='".$post_id."'";
	      $total_rat_res=mysqli_query($mysqli,$total_rat_sql);
	      $total_rat_row=mysqli_fetch_assoc($total_rat_res);
	    
	         
	        $jsonObj = array( 'total_rate' => $total_rat_row['total_rate'],'rate_avg' =>$total_rat_row['rate_avg'],'MSG'=>"You have succesfully rated");
        
      }else{
        
      		$jsonObj = array( 'MSG' => 'You have already rated');

      }

			$set['HD_WALLPAPER'][] = $jsonObj;

			header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();

	}
	else if(isset($_GET['get_gif_rate']))
	{

			$jsonObj= array();	

 			      $post_id = $_GET['post_id'];
			      $user_id = $_GET['device_id'];
 
	  		//echo "select * from tbl_rating where post_id  = '$post_id' && user_id = '$user_id'";
		      $query1 = mysqli_query($mysqli,"select * from tbl_rating_gif where post_id  = '$post_id' && user_id = '$user_id'"); 
		      $data1 = mysqli_fetch_assoc($query1);

		      if(@count($data1)== 0)
		      {

		      	   $jsonObj = array( 'total_rate' => 0);


		      	}else{
		        
		      		$jsonObj = array( 'total_rate' => $data1['rate']);

		      }

		$set['HD_WALLPAPER'][] = $jsonObj;
		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
	}
	else if(isset($_GET['wallpaper_download_id']))
	{
		$jsonObj= array();		
		 
		$view_qry=mysqli_query($mysqli,"UPDATE tbl_wallpaper SET total_download = total_download + 1 WHERE id = '".$_GET['wallpaper_download_id']."'");
 	 

    	$total_dw_sql="SELECT * FROM tbl_wallpaper WHERE id='".$_GET['wallpaper_download_id']."'";
	    $total_dw_res=mysqli_query($mysqli,$total_dw_sql);
	    $total_dw_row=mysqli_fetch_assoc($total_dw_res);
	    
	         
        $jsonObj = array( 'total_download' => $total_dw_row['total_download']);

        $set['HD_WALLPAPER'][] = $jsonObj;
        header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
	}
	else if(isset($_GET['gif_download_id']))
	{
		$jsonObj= array();		
		 
		$view_qry=mysqli_query($mysqli,"UPDATE tbl_wallpaper_gif SET total_download = total_download + 1 WHERE id = '".$_GET['gif_download_id']."'");
 	 

    	$total_dw_sql="SELECT * FROM tbl_wallpaper_gif WHERE id='".$_GET['gif_download_id']."'";
	    $total_dw_res=mysqli_query($mysqli,$total_dw_sql);
	    $total_dw_row=mysqli_fetch_assoc($total_dw_res);
	    
	         
	    $jsonObj = array( 'total_download' => $total_dw_row['total_download']);

 
        $set['HD_WALLPAPER'][] = $jsonObj;
        header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
	}
	else 
	{
		$jsonObj= array();	

		$query="SELECT * FROM tbl_settings WHERE id='1'";
		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());

		while($data = mysqli_fetch_assoc($sql))
		{
			 
			$row['app_name'] = $data['app_name'];
			$row['app_logo'] = $data['app_logo'];
			$row['app_version'] = $data['app_version'];
			$row['app_author'] = $data['app_author'];
			$row['app_contact'] = $data['app_contact'];
			$row['app_email'] = $data['app_email'];
			$row['app_website'] = $data['app_website'];
			$row['app_description'] = $data['app_description'];
			$row['app_developed_by'] = $data['app_developed_by'];

			$row['app_privacy_policy'] = stripslashes($data['app_privacy_policy']);
 
			$row['publisher_id'] = $data['publisher_id'];
			$row['interstital_ad'] = $data['interstital_ad'];
			$row['interstital_ad_id'] = $data['interstital_ad_id'];
			$row['interstital_ad_click'] = $data['interstital_ad_click'];
 			$row['banner_ad'] = $data['banner_ad'];
 			$row['banner_ad_id'] = $data['banner_ad_id'];

 			$row['publisher_id_ios'] = $data['publisher_id_ios'];
 			$row['app_id_ios'] = $data['app_id_ios'];
			$row['interstital_ad_ios'] = $data['interstital_ad_ios'];
			$row['interstital_ad_id_ios'] = $data['interstital_ad_id_ios'];
			$row['interstital_ad_click_ios'] = $data['interstital_ad_click_ios'];
 			$row['banner_ad_ios'] = $data['banner_ad_ios'];
 			$row['banner_ad_id_ios'] = $data['banner_ad_id_ios'];

			array_push($jsonObj,$row);
		
		}

		$set['HD_WALLPAPER'] = $jsonObj;
		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();	
	}		
	 
	 
?>