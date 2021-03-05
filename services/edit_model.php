<?php 
include ('config.php');

if(isset($_POST['edit_button']))
{
  $subject_name = $_POST['subject_name'];
  $no_of_questions = $_POST['no_of_questions'];
  $file_name = $_POST['file_name'];
  $id1 = $_POST['id'];
  $_POST['edit_button'] = NULL;
}
?>
<style>
  .hidden{
    display: none;
  }
  input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
h5{
  font-size: 40px;
  margin-top: 0px;
}
a{
  text-decoration: none;
  color: black;
}
</style>
<div  id="exampleModale" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <h5>Edit Form</h5>

      <form method="post" enctype="multipart/form-data" action="save_edit_model.php">
          <label for="subject" class="col-form-label">Pid</label>
          <input class="hidden" name = "id" type="text" value="<?php echo $id1; ?>">      
        
          <label for="subject" class="col-form-label">Subject Name</label>
          <input type="text" class="form-control" name="subject_namee" id="subject" value="<?php echo $subject_name; ?>">
        
        
          <label for="noq" class="col-form-label">No. of questions</label>
          <input type="text" class="form-control" name="no_of_questione" id="noq" value="<?php echo $no_of_questions; ?>">
        
        
          <label for="pdf" class="col-form-label">Upload pdf:</label>
          <input type="file" accept="application/pdf" name="file" onchange="loadFile(event)" class="form-control" id="pdf">
        
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="../QB.php">Close</a></button>
          <button type="submit" name="save_changes_button" class="btn btn-primary">Save</button>   
      </form>
   

</div>
