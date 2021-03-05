<?php
include ('config.php');
if(isset($_POST['save_changes_button']))
{
  $id = $_POST['id'];
  $subject_name=$_POST['subject_namee'];
  $no_of_question=$_POST['no_of_questione'];
  $image=$_FILES['file']['name'];
  $token = 'qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM0123456789';
  $token = str_shuffle($token);
  $token = substr($token, 0, 12);
  $path="../";
  move_uploaded_file($_FILES['file']['tmp_name'],$path.$image);
  $files=$_FILES['file'];
  $filename=$files['name'];
  $fileerror=$files['error'];
  $filetmp=$files['tmp_name'];
  $query="UPDATE `question_bank` SET `subject name` = '$subject_name', `number of questions` = '$no_of_question', `file name` = '$filename' WHERE question_bank_id='$id' ";
  
  $query_run=mysqli_query($conn,$query);
  echo '<script type="text/javascript"> alert("Data Edited Successfully!")</script>';
  header("Location: ../QB.php");
  

        // if($query_run)
        // {
        //     echo '<script type="text/javascript"> alert("Daaru pee li!")</script>';
        //     header("Location: ../QB.php");
        // }
        // else
        // {
        //     echo '<script type="text/javascript"> alert("Daaru nahi pi!")</script>';
        //     //("Location: ../QB.php");
        // }

}

// $sql = "UPDATE `product_list` SET 
// `product_name` = '$product_name', 
// `product_category` = '$product_category', 
// `product_price` = '$product_price', 
// `product_description` = '$product_description', 
// `product_size_category` = '$size_category' 
// where clause..... (if required) ";

?>


