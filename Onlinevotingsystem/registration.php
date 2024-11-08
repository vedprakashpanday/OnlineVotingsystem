
<?php 
@include 'connect.php';
$count=0;
session_start(); // Start the session

// Function to handle errors
function addError($message) {
    if (!isset($_SESSION['error_messages'])) {
        $_SESSION['error_messages'] = []; // Initialize the array if it doesn't exist
    }
    $_SESSION['error_messages'][] = $message; // Add the error message to the session array
}

function clearErrors() {
    unset($_SESSION['error_messages']); // Clear the error messages from session
}


if(isset($_POST['submit'])){


    $name=$_POST['name'];
    $mobile=$_POST['mobile'];
    $password = $_POST['password'];
    $age = $_POST['age'];
    $address= $_POST['address'];
    $role = $_POST['role'];
    $img = $_FILES['image']['name'];
    $temp_name = $_FILES['image']['tmp_name'];

if(strlen((string)$name)<3)
{
    //$errorMessages[] = "Name can't be less than 3 characters!";
    addError("Name can't be less than 3 characters!");
    $count++;
}

 if(preg_match("/[@!#\$%\^&\*]/",$name))
 {
    //$errorMessages[]= "Name contains Special characters!";
    addError("Name contains Special characters!");
    $count++;
   
}

 if(strlen((string)$mobile)!=10 )
 {
    //$errorMessages[] = "Mobile Number Doesn't Exists!!";
    addError("Mobile Number Doesn't Exists!!");
    $count++;
}

 if(strlen((string)$password)<3 || !(preg_match("/[@!#\$%\^&\*]/",$password)) || !(preg_match('/[A-Z]/', $password)) || !(preg_match('/[0-9]/', $password)))
 {
        //$errorMessages[] = "Password Must Contain more than 3 character,1special character and atleast a Capital letter!!";
        addError("Password Must Contain more than 3 character,1special character and atleast a Capital letter!!");
        $count++;
    }

    if($age<18){
        //$errorMessages[] = "You Are UnderAGE!!";
        addError("You Are UnderAGE!!");
        $count++;
    }

if($count==0){
        $sql="SELECT * FROM register Where mobile='$mobile'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);

    if($row['role']==$role && $row['mobile']==$mobile){
       // $errorMessages[] = "User Already Exists!";
        addError("User Already Exists!");
    }



else{
   
        move_uploaded_file($temp_name,"./uploads/$img");

        $insert = "INSERT INTO register(name,mobile,password,age,address,file,role,status,votes) VALUES('$name','$mobile','$password','$age','$address','$img','$role',0,0)";
       $result = mysqli_query($conn,$insert);
     
            if($result>0){ 
               
                header("Location: http://" . $_SERVER['HTTP_HOST'] . "/Onlinevotingsystem/login.php");
                exit();
               
            }
           
        }
            
    }
   
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
   
}

$errorMessages = isset($_SESSION['error_messages']) ? $_SESSION['error_messages'] : [];

?>



<!DOCTYPE html>   
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="./Css/style.css">
</head>
<body class="lbody">

    <header>Online Voting System</header>

    <?php if(!empty($errorMessages)): ?>
        <div style=" width:fit-content; color: red; background:transparent; border-radius:10px; border:1px solid black; margin:3px;" id="error">
            
        <?php
            // Display all error messages
            foreach ($errorMessages as $error) {
                echo "<p>$error</p>";
            }
            // Clear the error messages after displaying them
            clearErrors();
            ?>
        </div>
    
  <?php endif;?>
   

    <hr>
      <form action="registration.php" method="post" enctype="multipart/form-data">
      <legend>Register</legend>
        <div class="first">
            <input type="text" placeholder="Name" name="name" required>
            <input type="text" placeholder="Mobile" name="mobile" required>
        </div>

        <div class="first">
            <input type="password" placeholder="Password" name="password" required>
            <input type="text" placeholder="Enter Age" name="age" required>
        </div>


        <div class="second">
            <textarea  rows="5" cols="50" placeholder="Enter Address" name="address" required></textarea>
        </div>

        <div class="third">
            <div class="upload">
               <span>Upload image : </span> <input type="file" name="image" required>

            </div>

            <div class="role">
                <span>Select Your Role : </span>
                <select name="role" required>
                    <option value=" ">Choose Your Role</option>
                    <option value="Voter">Voter</option>
                    <option value="Group">Group</option>
                </select>
            </div>
        </div>

<div class="fourth">
    <button type="submit" name="submit">Register</button>
    <span>Already user</span><a href="login.php">Login Here</a>
</div>
      </form>
    </body>

</html>

