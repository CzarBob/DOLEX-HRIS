<?php 
//session_start();
include "dbConnection.php";
$columns = array('process', 'rating','fullname', 'email', 'comment',  'date_submitted');


/*if($_POST["length"] != -1){
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}*/

$query = '';

if (isset($_POST['action'])){
  if ($_POST['action'] == 'update_employee'){
    
    $query = 'UPDATE tbl_employee 
    SET EMPLOYEEID = "N", 
    FIRSTNAME = "'.$_POST["firstname"].'", 
    MIDDLENAME = "'.$_POST["middlename"].'", 
    LASTNAME = "'.$_POST["lastname"].'"
    WHERE ID = "'.$_POST["employeeiddb"].'"';


      //var_dump($query);

      $number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

      $result = mysqli_query($connect, $query);

      $data = array();
      
      while($row = mysqli_fetch_array($result)){
        /*if($_SESSION['received_by'] == "Receiving"){
          $rel = $row["date_sent"];
        }
        else{
          $rel = $row["date_released"];
        }
        $timestamp = $row["date_received"];
        $delta_time = strtotime($rel) - strtotime($timestamp);
        $days = floor($delta_time / 86400);
        $delta_time %= 86400;
        $hours = floor($delta_time / 3600);
        $delta_time %= 3600;
        $minutes = floor($delta_time / 60);
        $delta_time %= 60;
        $seconds = floor($delta_time / 1);
        $time_cycle = "";
        if($days==0){$dd = "";}else{if($days>1){$dd = "{$days} days";}else{$dd = "{$days} day";}}
        if($hours==0){$hh = "";}else{if($hours>1){$hh = "{$hours} hours";}else{$hh = "{$hours} hour";}}
        if($minutes==0){$mm = "";}else{if($minutes>1){$mm = "{$minutes} minutes";}else{$mm = "{$minutes} minute";}}
        if($days!=0){$time_cycle = $dd." ".$hh;}else{$time_cycle = $hh." ".$mm." {$seconds} seconds";}
        if(strlen($row["description"]) >= 25){
          $description = "<a style = 'color:#0893b8;' class ='fas fa-info-circle' data-toggle='tooltip' title='".$row["description"]."'></a> ". $row["description"];
        }
        else{
          $description = $row["description"];
        }
        if(strlen($row["type"]) >= 25){
          $type = "<a style = 'color:#0893b8;' class ='fas fa-info-circle' data-toggle='tooltip' title='".$row["type"]."'></a> ". $row["type"];
        }
        else{
          $type = $row["type"];
        }
      */
        $sub_array = array();


          $sub_array['employeeid'] = $row['EMPLOYEEID'];
          $sub_array['firstname'] = $row['FIRSTNAME'];
          $sub_array['middlename'] = $row['MIDDLENAME'];
          $sub_array['lastname'] = $row['LASTNAME'];

        //$sub_array[] = $row["EMPLOYEEID"];
        /*$sub_array[] = 
        "<form action='adminviewapplicant.php' method='POST'>
                            <input type='hidden' name='tin' value='" . $row["FIRSTNAME"] . "'>
                            <input type='hidden' name='id' value='" . $row["ID"] . "'>
                  <input type='submit' class ='btn btn-sm btn-info btn-block' name ='view' id = 'submit' value ='VIEW (?)'>
                </form> ";*/
      // $sub_array[] = "<a href='employee_detail.php'  id='ID' data-toggle='modal' data-id='".$row['ID']."'>View</a> /           
      /*
        $sub_array[] = $type;
        $sub_array[] = $description;
        $sub_array[] = (new DateTime($row["date_received"]))->format('M d, Y H:i:s');
        $sub_array[] = $row["received_by"];
        $sub_array[] = (new DateTime($rel))->format('M d, Y H:i:s');
        $sub_array[] = $time_cycle;
        $sub_array[] = $row["remarks"];*/
        $data[] = $sub_array;
      }

      /*function get_all_data($connect){
      $query = "SELECT * FROM updates where receiver = '".$_SESSION['received_by']."'";
      $result = mysqli_query($connect, $query);
      return mysqli_num_rows($result);
      }*/

      $output = array(
      //"draw"    => intval($_POST["draw"]),
      //"recordsTotal"  =>  get_all_data($connect),
      //"recordsFiltered" => $number_filter_row,
      "data"    => $sub_array
      );

      //echo json_encode($output);
      echo json_encode($sub_array);
  }
}

?>
