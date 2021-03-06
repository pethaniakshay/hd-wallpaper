<?php include("includes/header.php");

require("includes/function.php");
require("language/language.php");

if(isset($_POST['data_search']))
{

  $gif_qry="SELECT * FROM tbl_ringtone
  WHERE tbl_ringtone.ringtone_tag like '%".addslashes($_POST['search_value'])."%' ORDER BY tbl_ringtone.id";

  $result=mysqli_query($mysqli,$gif_qry); 

}
else
{
	   //Get all gif 
	
  $tableName="tbl_ringtone";   
  $targetpage = "manage_ringtone.php"; 
  $limit = 12; 

  $query = "SELECT COUNT(*) as num FROM $tableName";
  $total_pages = mysqli_fetch_array(mysqli_query($mysqli,$query));
  $total_pages = $total_pages['num'];

  $stages = 3;
  $page=0;
  if(isset($_GET['page'])){
    $page = mysqli_real_escape_string($mysqli,$_GET['page']);
  }
  if($page){
    $start = ($page - 1) * $limit; 
  }else{
    $start = 0; 
  } 

  $gif_qry="SELECT * FROM tbl_ringtone                 
  ORDER BY tbl_ringtone.id DESC LIMIT $start, $limit";

  $result=mysqli_query($mysqli,$gif_qry);
}

if(isset($_GET['wallpaper_id']))
{ 

  $img_res=mysqli_query($mysqli,'SELECT * FROM tbl_ringtone WHERE id=\''.$_GET['wallpaper_id'].'\'');
  $img_res_row=mysqli_fetch_assoc($img_res);

  if($img_res_row['image']!="")
  {
    unlink('images/animation/'.$img_res_row['cat_id'].'/'.$img_res_row['image']);
  }

  Delete('tbl_ringtone','id='.$_GET['wallpaper_id'].'');

  $_SESSION['msg']="12";
  header( "Location:manage_ringtone.php");
  exit;

}  

?>

<div class="row">
  <div class="col-xs-12">
    <div class="card mrg_bottom">
      <div class="page_title_block">
        <div class="col-md-5 col-xs-12">
          <div class="page_title">Manage Ringtone</div>
        </div>
        <div class="col-md-7 col-xs-12">
          <div class="search_list">
            <div class="search_block">
              <form  method="post" action="">
                <input class="form-control input-sm" placeholder="Search..." aria-controls="DataTables_Table_0" type="search" name="search_value" required>
                <button type="submit" name="data_search" class="btn-search"><i class="fa fa-search"></i></button>
              </form>  
            </div> 
            <div class="add_btn_primary"> <a href="add_ringtone.php">Add Ringtone</a> </div>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="row mrg-top">
        <div class="col-md-12">

          <div class="col-md-12 col-sm-12">
            <?php if(isset($_SESSION['msg'])){?> 
             <div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
              <?php echo $client_lang[$_SESSION['msg']] ; ?></a> </div>
              <?php unset($_SESSION['msg']);}?> 
            </div>
          </div>
        </div>

        <div class="col-md-12 mrg-top">
          <div class="row">
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr>  
                  <th style="width:110px">ID</th>
                  <th style="width:110px">Ringtone</th>            
                  <th style="width:240px">Ringtone Tag</th>
                  <th style="width:30px">Total Rate</th>          
                  <th style="width:100px">Total Views</th>
                  <th style="width:100px">Total Download</th>  
                  <th style="width:170px" class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $i=1;
                while($row=mysqli_fetch_array($result))
                {         
                  ?>  
              <!-- <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="block_wallpaper">           
                  <div class="wall_image_title">
                    <ul>
                      <li><a href="javascript:void(0)" data-toggle="tooltip" data-tooltip="<?php echo $row['total_views'];?> Views"><i class="fa fa-eye"></i></a></li>                      
                      <li><a href="javascript:void(0)" data-toggle="tooltip" data-tooltip="<?php echo $row['total_download'];?> Download"><i class="fa fa-download"></i></a></li>
                      <li><a href="javascript:void(0)" data-toggle="tooltip" data-tooltip="<?php echo $row['rate_avg'];?> Rating"><i class="fa fa-star"></i></a></li>

                      <li><a href="edit_wallpaper_animation.php?wallpaper_id=<?php echo $row['id'];?>" data-toggle="tooltip" data-tooltip="Edit"><i class="fa fa-edit"></i></a></li>
                      <li><a href="?wallpaper_id=<?php echo $row['id'];?>" data-toggle="tooltip" data-tooltip="Delete" onclick="return confirm('Are you sure you want to delete this Ringtone?');"><i class="fa fa-trash"></i></a></li>
                    </ul>
                  </div>
                  <div><img src="images/animation/<?php echo $row['image'];?>" /></div>
                </div>
              </div> -->
              <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $row['ringtone'];?></td>
                <td><?php echo $row['ringtone_tag'];?></td>   
                <td><?php echo $row['total_rate'];?></td>
                <td><?php echo $row['total_views'];?></td>
                <td><?php echo $row['total_download'];?></td>
                <td nowrap="">
                  <a href="edit_ringtone.php?wallpaper_id=<?php echo $row['id'];?>" class="btn btn-primary" data-toggle="tooltip" data-tooltip="Edit"><i class="fa fa-edit"></i></a>
                  <a href="?wallpaper_id=<?php echo $users_row['id'];?>" onclick="return confirm('Are you sure you want to delete this user?');" class="btn btn-danger" data-toggle="tooltip" data-tooltip="Delete"><i class="fa fa-trash"></i></a></td>
                </tr>
                <?php

                $i++;
              }
              ?>   
            </tbody>
          </table>   

        </div>

      <!-- <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>  
            <th style="width:110px">ID</th>
            <th style="width:110px">Ringtone</th>            
            <th style="width:240px">Ringtone Tag</th>
            <th style="width:30px">Total Rate</th>          
            <th style="width:100px">Total Views</th>
            <th style="width:100px">Total Download</th>  
            <th style="width:170px" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while($row=mysqli_fetch_array($result))
          {
            ?>
            <tr>
              <td><?php echo $row['id'];?></td>
              <td><?php echo $row['ringtone'];?></td>
              <td><?php echo $row['ringtone_tag'];?></td>   
              <td><?php echo $row['total_rate'];?></td>
              <td><?php echo $row['total_views'];?></td>
              <td><?php echo $row['total_download'];?></td>
            <td nowrap="">
              <a href="edit_wallpaper_animation.php?wallpaper_id=<?php echo $row['id'];?>" data-toggle="tooltip" data-tooltip="Edit"><i class="fa fa-edit"></i></a>
              <a href="?wallpaper_id=<?php echo $row['id'];?>" data-toggle="tooltip" data-tooltip="Delete" onclick="return confirm('Are you sure you want to delete this Ringtone?');"><i class="fa fa-trash"></i></a>
            </td>
            </tr>
            <?php
          }
          ?>
        </tbody>
      </table> -->

    </div>
    <div class="col-md-12 col-xs-12">
      <div class="pagination_item_block">
        <nav>
          <?php if(!isset($_POST["data_search"])){ include("pagination.php");}?>
        </nav>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
</div>

<?php include("includes/footer.php");?>       
