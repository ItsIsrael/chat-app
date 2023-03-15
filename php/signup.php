<?php
session_start();
include_once "config.php";
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
  //? Check user email is valid or not
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //? check that email already exist in the database or not
    $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
    if (mysqli_num_rows($sql) > 0) {
      //? if email already exist, then update the password
      echo "$email - This email already exist!!";
    } else {
      //? check user upload file or not
      if (isset($_FILES['image'])) {   //? if file is uploaded
        $img_name = $_FILES['image']['name'];  //? getting user uploaded img name
        $tmp_name = $_FILES['image']['tmp_name'];  //? temporary name is used to save file
        $img_explode = explode('.', $img_name);
        $img_ext = end($img_explode);  //? extension
        $extensions = ['png', 'jpeg', 'jpg']; //? valid extensions
        if (in_array($img_ext, $extensions) === true) {
          $time = time(); //?  rename con the current time
          $new_img_name = $time . $img_name;
          if (move_uploaded_file($tmp_name, "images/" . $new_img_name)) { //? if user updload img move to our folder successfully
            $status = "Active now"; //? signed status change to active
            $random_id = rand(time(), 10000000); //? random id for user
            //? insert all data in the table 
            $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, image, status)
                                  VALUES ({$random_id}, '{$fname}','{$lname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");
            if ($sql2) {
              //? if insert successfully, then redirect to the login page
              $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
              if (mysqli_num_rows($sql3) > 0) {
                $row = mysqli_fetch_assoc($sql3);
                $_SESSION['unique_id'] = $row['unique_id']; //? using this session we used user unique_id in other php file
                echo "success";
              }
            } else {
              echo "Something went wrong!";
            }
          }
        } else {
          echo "Please select an Img file - jpeg, jpg, png!";
        }
      } else {
        echo "Please select an image file!";
      }
    }
  } else {
    echo "$email - This is not a valid email.";
  }
} else {
  echo "All inputs field are reaquired!";
}
