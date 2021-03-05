<?php 
  include ('services/config.php');
  include "adminbasic.html";
  //session_start();
?>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Question Bank</button>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Question Bank</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <form method="post" enctype="multipart/form-data" action="services/add_model.php"> 
            <div class="form-group">
              <label for="subject" class="col-form-label">Subject Name:</label>
              <input type="text" class="form-control" name="subject_name" id="subject">
            </div>
            <div class="form-group">
              <label for="noq" class="col-form-label">No. of questions:</label>
              <input type="text" class="form-control" name="no_of_question" id="noq">
            </div>
            <div class="form-group">
              <label for="pdf" class="col-form-label">Upload pdf:</label>
              <input type="file" accept="application/pdf" name="file" onchange="loadFile(event)" class="form-control" id="pdf">
            </div>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="upload_pdf" class="btn btn-primary">Upload</button>
        </form>
      </div>
    <div class="modal-footer"></div>
  </div>
</div>
</div>

<div class="table-responsive">
  <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
    <thead>
      <tr>
        <th class="text-left">Sr.No.</th>
        <th class="text-left pl-4" width="20%">Subject Name</th>
        <th class="text-left " width="20%">No. of questions</th>
        <th class="text-left " width="20%">File Name</th>
        <th class="text-center" width="20%">Action</th>
      </tr>
    </thead>
  <tbody>
    <?php
      $query="select * from `question_bank` order by question_bank_id";
      $query_run=mysqli_query($conn,$query);
      $count=1;
      while($result=mysqli_fetch_array($query_run)){
    ?>
    <tr>
      <td><?php echo $count++?></td>
      <td><?php echo $result['subject name']?></td>
      <td><?php echo $result['number of questions']?></td>
      <td><?php echo $result['file name']?></td>
      <td class="text-center">
      <a href="../pdfs/<?php echo $result['file name'];?>" class="navitem1">View</a>
      <a href="#" class="navitem4">
      <form method="post" enctype="multipart/form-data" action="services/delete_model.php">
          <input class="hidden" value="<?php echo $result['question_bank_id']?>" name="id">
          <button type="submit" class="navitem2" name="delete_button">Delete</button>
      </form>
      </a>
      <a class="navitem4"> 
      <form method="post" enctype="multipart/form-data" action="services/edit_model.php">
        <input type="text" value="<?php echo $result['subject name']?>" name="subject_name" class="hidden">
        <input type="text" value="<?php echo $result['number of questions']?>" name="no_of_questions" class="hidden">
        <input type="text" value="<?php echo $result['file name']?>" name="file_name" class="hidden">
        <input type="text" value="<?php echo $result['question_bank_id']?>" name="id" class="hidden">
        <button type="Submit" class="navitem3" name="edit_button" data-toggle="modal" data-target="#exampleModale">Edit</button>
      </form>
      </a>
      </td>
    </tr>
    <?php
      }
    ?>
  </tbody>
</table>
</div>
