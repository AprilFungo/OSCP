<?php
session_start(); 
date_default_timezone_set('Asia/Manila');
require_once('../../database/connection.php');

if(isset($_POST['newAnnouncement']))
{  
  echo '
  <div  class="modal-content" style="width: 100%;" >
    <div class="modal-header">  
      <h4 class="modal-title">New Announcement</h4>  
      <a href=""><button type="button" class="btn-close" data-dismiss="modal">&times;</button></a>
    </div>  
    <div class="modal-body">
      <h4>TITLE</h4>
      <input required type="text" name="title" class="form-control">
      <br>
      <h4>BODY</h4>
      <textarea required name="body" class="form-control" style="min-height: 300px;"></textarea>
      <br>

      
    </div>      
    <div class="modal-footer">
      <button class="btn btn-success" type="submit" name="publishBtn"><i class="fa fa-check-circle" style="margin-right: 5px;"></i>  PUBLISH</button>
      <a href="" style="text-decoration: none;"><button class="btn btn-danger" type="button" name="decline"><i class="fa fa-times-circle" style="margin-right: 5px;"></i>  CANCEL</button></a>       
    </div>  
  </div>';
} 

if(isset($_POST['editBtn']))
{  
  $annID = $_POST['editBtn'];
  $q = @mysqli_query($dbc, "SELECT * FROM tbl_announcements WHERE clm_id = '$annID' ");
  $row = mysqli_fetch_array($q);
  echo '
  <div  class="modal-content" style="width: 100%;" >
    <div class="modal-header">  
      <h4 class="modal-title">Edit Announcement</h4>  
      <a href=""><button type="button" class="btn-close" data-dismiss="modal">&times;</button></a>
    </div>  
    <div class="modal-body">
      <h4>TITLE</h4>
      <input required type="text" name="title" class="form-control" value="'.$row['clm_title'].'">
      <br>
      <h4>BODY</h4>
      <textarea required name="body" class="form-control" style="min-height: 300px;">'.$row['clm_body'].'</textarea>
      <br>

      
    </div>      
    <div class="modal-footer">
      <button class="btn btn-success" type="submit" name="updateBtn"><i class="fa fa-check-circle" style="margin-right: 5px;"></i>  UPDATE</button>
      <a href="" style="text-decoration: none;"><button class="btn btn-danger" type="button" name="decline"><i class="fa fa-times-circle" style="margin-right: 5px;"></i>  CANCEL</button></a>       
      <input type="hidden" name="annID" value="'.$annID.'">
    </div>  
  </div>';
} 
?>