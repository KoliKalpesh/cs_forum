<?php

include "partials/_dbconnect.php";

session_start();
echo'
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/cs_forum">CS Forum</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/cs_forum">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="contact.php">Contacts</a>
            </li>';
            // <li><button type="button" class="btn btn-dark" href="/loginmodal.php" data-toggle="modal"
            //         data-target="#loginmodal1">Login</button></li>
            // <li><button type="button" class="btn btn-dark" href="/signupmodal.php" data-toggle="modal"
            //         data-target="#signupmodal1">Signup</button></li>
       echo '</ul>
        <div class="row mx 2">';
     
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  echo '<form class="form-inline my-2 my-lg-0"><p class="text-light my-0 mx-2">Welcome '.$_SESSION['username'].'</p>
  
  </form>
  <a  type="button" class="btn btn-dark" href="/cs_forum/logout2.php">Logout</a>';
  
}

else{
  echo' 
            <button type="button" class="btn btn-dark" href="/loginmodal.php" data-toggle="modal"
                    data-target="#loginmodal1">Login</button>
                    <button type="button" class="btn btn-dark" href="/signupmodal.php" data-toggle="modal"
                    data-target="#signupmodal1">Signup</button>';
                  }
           

echo '        
        </div>
    </div>
</nav>';

include "signupmodal.php";
include "loginmodal.php";
if(isset($GET_['signupsuccess']) && $GET_['signupsuccess'] == "true"){
  
  echo '
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> You can now login.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
?>