<?php
    include ('config.php');
    if(isset($_POST['upload_pdf'])){
        $subject_name=$_POST['subject_name'];
        $no_of_question=$_POST['no_of_question'];
        $image=$_FILES['file']['name'];
        $token = 'qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM0123456789';
        $token = str_shuffle($token);
        $token = substr($token, 0, 12);
        $path="../pdfs/";
        move_uploaded_file($_FILES['file']['tmp_name'],$path.$image);
        $files=$_FILES['file'];
        $filename=$files['name'];
        $fileerror=$files['error'];
        $filetmp=$files['tmp_name'];
        $query="INSERT INTO `question_bank`(`subject name`, `number of questions`, `file name`) VALUES ('$subject_name','$no_of_question','$filename')";
        $query_run=mysqli_query($conn,$query);
        if($query_run)
        {
            echo '<script type="text/javascript"> alert("Question Bank Added Successfully")</script>';
            header("Location: ../QB.php");
        }
        else
        {
            echo '<script type="text/javascript"> alert("Question Bank Not Added Successfully")</script>';
            header("Location: ../QB.php");
        }
    }
?>