<?php include("includes/header.php");

$file_path = 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/';
?>
<div class="row">
      <div class="col-sm-12 col-xs-12">
     	 	<div class="card">
		        <div class="card-header">
		          Example API urls
		        </div>
       			    <div class="card-body no-padding">
         		
         			 <pre><code class="html"><b>Home</b><br><?php echo $file_path."api.php?home"?><br><br><b>Latest Wallpaper</b><br><?php echo $file_path."api.php?latest&page=1"?><br><br><b>Category List</b><br><?php echo $file_path."api.php?cat_list"?><br><br><b>Wallpaper list by Cat ID</b><br><?php echo $file_path."api.php?cat_id=2&page=1"?><br><br><b>Single Wallpaper</b><br><?php echo $file_path."api.php?wallpaper_id=3"?><br><br><b>Most Viewed Wallpaper</b><br><?php echo $file_path."api.php?get_wallpaper_most_viewed&page=1"?><br><br><b>Most Rated Wallpaper</b><br><?php echo $file_path."api.php?get_wallpaper_most_rated&page=1"?><br><br><b>Latest GIF</b><br><?php echo $file_path."api.php?latest_gif&page=1"?><br><br><b>GIF Image List</b><br><?php echo $file_path."api.php?gif_list"?><br><br><b>Single GIF Image</b><br><?php echo $file_path."api.php?gif_id=2"?><br><br><b>Most Viewed GIF</b><br><?php echo $file_path."api.php?get_gif_wallpaper_most_viewed&page=1"?><br><br><b>Most Rated GIF</b><br><?php echo $file_path."api.php?get_gif_wallpaper_most_rated&page=1"?><br><br><b>Search Wallpaper</b><br><?php echo $file_path."api.php?search_text=tag"?><br><br><b>Search GIF</b><br><?php echo $file_path."api.php?gif_search_text=funny"?><br><br><b>Wallpaper Rating</b><br><?php echo $file_path."api.php?wallpaper_rate&post_id=1&device_id=123&rate=4"?><br><br><b>Get Wallpaper Rating</b><br><?php echo $file_path."api.php?get_wallpaper_rate&post_id=1&device_id=123"?><br><br><b>GIF Rating</b><br><?php echo $file_path."api.php?gif_rate&post_id=1&device_id=123&rate=4"?><br><br><b>Get GIF Rating</b><br><?php echo $file_path."api.php?get_gif_rate&post_id=1&device_id=123"?><br><br><b>Wallpaper Download</b><br><?php echo $file_path."api.php?wallpaper_download_id=1"?><br><br><b>GIF Download</b><br><?php echo $file_path."api.php?gif_download_id=1"?><br><br><b>App Details</b><br><?php echo $file_path."api.php"?></code></pre>
       		
       				</div>
          	</div>
        </div>
</div>
    <br/>
    <div class="clearfix"></div>
        
<?php include("includes/footer.php");?>       
