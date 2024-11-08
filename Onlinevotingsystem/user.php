<?php 
            @include 'connect.php';
            session_start();
            ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link rel="stylesheet" href="./Css/style.css">
</head>
<body class="Ubody">
    <div class="top">
        <button class="back" onclick="history.back()">Back</button>
        <h1>Online Voting System</h1>
        <button class="logout" ><a href="logout.php">Logout</a></button>
    </div>
    <hr>

    <div class="btm">
        <div class="left">

       
        <?php 
                          
$id=$_SESSION['id'];
$role=$_SESSION['role'];  

                $sql="SELECT file,role from register WHERE id='$id' && role='$role'";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
                if($row>0 && $row['role']=="Voter"){
           echo "<div class='img'>";
               

                       
            echo  "<img src='./uploads/".$row['file']."' alt='image'>";
            echo "</div>";
                }
            ?>
            
           
      
        
           
            <div class="content">

            <?php 
$id=$_SESSION['id'];
  $role=$_SESSION['role'];  
$sql = "SELECT * FROM register  WHERE id='$id' && role='$role'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            if($row>0 && $row['role']=="Voter"){
               echo "<div class='name'> <b>Name :</b> <input type='text' value='".$row['name']."' readonly></div>";
               echo "<div class='name'> <b>Mobile :</b> <input type='text' value='".$row['mobile']."' readonly ></div>";
               echo "<div class='name'> <b>Address :</b> <input type='text' value='".$row['address']."' readonly></div>";

               if($row['status']==0){
               echo "<div class='name'> <b>Status :</b> <input type='text' value='Not Voted' readonly></div>";
               }
               else{
                echo "<div class='name'> <b>Status :</b> <input type='text' value='Voted' readonly></div>";
               }
        //    <div class="add"> <b>Address :</b> <input type="text" disabled></div>
        //    <div class="status"><b>Status :</b> <input type="text" disabled></div>

          
            }
           
           ?>
            </div>
           
        </div>

        <div class="right">
            <div class="all">

            <?php 
            // $id=$_SESSION['id'];
            // $role=$_SESSION['role']; 
            $sql = "SELECT * FROM register WHERE role='Group'";
            $result = mysqli_query($conn,$sql);
            
            
            while($row = mysqli_fetch_assoc($result) ){
             
              
                echo "<div class='name'> <b> Group Name :</b> <input type='text' value='".$row['name']."' readonly></div>";

               

               echo "<form action='' method='post'>";
               echo "<input type='hidden' name='group_id' value='".$row['id']."'>";
              echo "<div class='name'> <b>Votes :</b> <input type='text' value='".$row['votes']."' readonly name='votes'></div>";            
              echo "<div class='btn'>  <button type='submit' name='submit'>Vote</button></div>";
          echo "<hr>";
           // <div class="btn">  <button>Votted</button></div>
          echo "</form>";
         
        }
       
        if(isset($_POST['submit'])){
            $gid =$_POST['group_id'];
            $uid= $_SESSION['id'];   

            $sql = "SELECT status FROM register Where id='$uid'";
            $result =mysqli_query($conn,$sql);

            $row = mysqli_fetch_assoc($result);
            if($row['status']==1){
                echo "<script> alert('You can vote only one time!'); 
                 window.location.href = '" . $_SERVER['PHP_SELF'] . "';
                </script>";
              
                exit();
            }
            else{

                $sql = "UPDATE register SET votes=votes+1,status='1' WHERE id='$gid' || id='$uid'";

                $result = mysqli_query($conn,$sql);
                // $row = mysqli_fetch_assoc($result);

                if ($result) {
                    // Redirect to the same page to show updated vote count
                    header("Location: " . $_SERVER['PHP_SELF']);
                    exit();
                } else {
                    echo "<script>alert('Failed to record vote');</script>";
                }
            }

        }
            ?>
          
            </div>
          
            <div class="sign"> <?php 
                  
                //   $id=$_SESSION['id'];
                //   $role=$_SESSION['role'];  
                  
                                  $sql="SELECT file,role from register WHERE  role='Group'";
                                  $result = mysqli_query($conn,$sql);
                                  
                                  while($row = mysqli_fetch_assoc($result) ){
                                         
                              echo "<img src='./uploads/".$row['file']."' alt='image'>";
                           
                                  }
                                  ?>
                                  </div>
           
        </div>
       
    </div>
</body>
</html>