<?php
  include "QB.php";
  include_once('config.php');
  // Using database connection file here
  if(isset($_POST['delete_button']))
    $id = $_POST["id"];
    $type = $_GET["id"];
  try
  {
    $stmt=$conn->prepare("delete from question_bank where question_bank_id = ?");
    $stmt->bind_param("i",$id);
    $stmt->execute();
    echo '<script type="text/javascript"> alert("QUESTION BANK deleted Successfully") </script>';
    echo '<meta http-equiv="refresh" content="0; url=../QB.php">';
  } 
  catch(Exception $e)
  {
   echo "Error: " . $stmt . "<br>" . $conn->error;
  }
  finally
  {
   $stmt->close();
   $conn->close();
  }
?>
