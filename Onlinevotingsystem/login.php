<?php 
@include 'connect.php';

session_start();

// Function to handle errors
function setError($message) {
    $_SESSION['error_message'] = $message; // Store error message in session
}

function clearError() {
    unset($_SESSION['error_message']); // Clear the error message from session
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
if(isset($_POST['submit'])){
     $mobile=$_POST['mobile'];
     $password = $_POST['password'];
    $role= $_POST['role'];

     $sql ="SELECT id,mobile,password,role FROM register WHERE mobile='$mobile' AND password='$password' AND role='$role'";
      $result=mysqli_query($conn,$sql);
     $row=mysqli_fetch_assoc($result);

    if($row){
    
        session_start();
        $_SESSION['id']=$row['id'];
        $_SESSION['role'] = $row['role'];
        header("location:user.php");
    
    }
    else{
       setError("Mobile number or Password Or ROle mismatch!!");
       header("Location: " . $_SERVER['PHP_SELF']);
       exit();
      
    }
    

    // while($row>0){
    //     if($mobile==$row['mobile'] && $role==$row['role']){
    //         echo "
    //         <script>
    //             alert('User Already Exists!!');
    //             window.location.href = 'login.php';
    //         </script>
    //         ";
    //     }
    //     else{
           
    //     }
    // }
}
}
if (isset($_SESSION['error_message'])) {
    echo "<script>alert('" . $_SESSION['error_message'] . "');</script>";
    clearError(); // Clear the error message after displaying it
}
?>

<!DOCTYPE html>   
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="./Css/style.css">
</head>
<body class="lbody">
    <header>Online Voting System</header>
    <hr>

    <form action="login.php" method="post">
               <legend>Login</legend>
                <input type="text" placeholder="Enter Mobile" name="mobile" required>
                <input type="password" placeholder="Enter Password" name="password" required>
                <select name="role" >
                    <option value="Select Any" required>Choose One</option>
                    <option value="voter">Voter</option>
                    <option value="group">Group</option>
                </select>

               <button type="submit" name="submit">Submit</button>
                <span>New User ?</span><a href="registration.php">Register Here</a>
    </form>
</body>
</html>