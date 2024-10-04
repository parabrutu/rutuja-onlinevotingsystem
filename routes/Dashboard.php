<?php
     session_start();
     if(!isset($_SESSION['userdata'])){
          header("location:../");
     }
     $userdata = $_SESSION['userdata'];
     $groupsdata = $_SESSION['groups'];
     if($userdata['status']==0){
          $status= '<b style="color: red">Not Voted</b>';
     }
     else{
          $status= '<b style="color: green;">Voted</b>';
     }
?>

<!DOCTYPE html>
<html lang="en">
     <head>
          <title>Online Voting System</title>
          <link rel="stylesheet" href="../css/style.css"
     </head>
<body>  
<style>
          
               #backbtn{
                    padding: 5px;
                    font-size: 15px;
                    background-color: royalblue;
                    color: white;
                    border-radius: 5px;
                    float: left;
               }

               #logoutbtn{
                    padding: 5px;
                    font-size: 15px;
                    background-color: royalblue;
                    color: white;
                    border-radius: 5px;
                    float: right;
               }

               #Profile{
                    background-color: white;
                    width: 30%;
                    padding: 20px;
                    float: left;
                    border:2px solid black;          
               }

               #Group{
                    background-color: white;
                    width: 60%;
                    padding: 20px;   
                    float: right;  
                    border:2px solid black;          
               }

               #data{
                    float: left;
               }

               #votebtn{
                    padding: 5px;
                    font-size: 15px;
                    background-color: royalblue;
                    color: white;
                    border-radius: 5px;
               }

               #mainpanel{
                    padding: 10px;        
               }

               #voted{
                    padding: 5px;
                    font-size: 15px;
                    background-color: green;
                    color: white;
                    border-radius: 5px;
               }
               #name{
                    font-size: 30px;
               }

          </style>
     <div id="mainSection"> 
          <center>
          <div id="headerSection">
               <button id="backbtn"> <a href="../login.html">Back</a></button>
               <button id="logoutbtn"> <a href="../login.html">Logout</a></button><br>          
     <center>  
     <div class="login-title" id="name">
     <h1>e<span>Voting</span> System</h1>
     </div><hr>
     </center>
     
     <div id="mainpanel">
               <div id="Profile">
                    <center><img src="../uploads/<?php echo $userdata['photo'] ?>" height="200" width="200"></center><br>
                    <b>Name:</b> <?php echo $userdata['name'] ?> <br><br>
                    <b>Mobile:</b> <?php echo $userdata['mobile'] ?> <br><br>
                    <b>Address:</b> <?php echo $userdata['address'] ?> <br><br>
                    <b>Status:</b> <?php echo $status ?> <br><br>
               </div>

               <div id="Group">
                    <?php
                         if($_SESSION['groups']){
                              for ($i=0; $i<count($groupsdata); $i++){
                                   ?>
                                   <div>
                                        <img style="float: right" src="../uploads/<?php echo $groupsdata[$i]['photo'] ?>" height="100" width="100"><br>
                                        <b>Group Name: </b><?php echo $groupsdata[$i]['name'] ?><br>
                                        <form action="../api/vote.php" method="POST"><br>

                                             <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes'] ?>">
                                             <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id'] ?>"><br>

                                             <?php
                                                  if($_SESSION['userdata']['status']==0){
                                                       ?>
                                                       <input type="submit" name="votebtn" value="Vote" id="votebtn">
                                                       <?php     
                                                  }
                                                  else{
                                                       ?>
                                                       <button disabled type="button" name="votebtn" id="voted">Voted</button>
                                                       <?php
                                                  }
                                        ?>
                                   </form>
                              </div>
                              <hr>

                                   <?php
                              }
                         }
                         else{

                         }
                    ?>
               </div>
     </div>

</body>
</html>

