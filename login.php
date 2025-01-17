<?php
session_start();
include_once "header.php";


if(isset($_SESSION['logged_in'])&& $_SESSION['logged_in']==true){
    header('location:accueil.php');
    exit();
    
}
if($_SERVER['REQUEST_METHOD'] === 'POST'){
if(isset($_POST['email'],$_POST['password'])&& !empty(trim('email'))&& !empty(trim('password'))){
    include_once "conn.php";
    $email=filter_var(trim($_POST['email']),FILTER_VALIDATE_EMAIL);
    $password=filter_var(trim($_POST['password']));
   
    if($email===false){
        $_SESSION['error']="address email invalide";
        header('location:accueil.php');
        exit();
    }
    try {
        // var_dump($_POST);
        $sql=$db->prepare('select id, nom, prenom, email, password from user where email=?');
        $sql->execute([$email]); 
        $user=$sql->fetch(PDO::FETCH_ASSOC);
        if($user){
            //var_dump($password);
            //var_dump( $user['password']);
            //var_dump( $user['email']);
            if($user){
               // password_verify($password,$user['password'])
               // var_dump($user['nom']);
                $_SESSION['user_name']=$user['nom'];
                $_SESSION['user_id']=$user['id'];
                $_SESSION['prenom']=$prenom['prenom'];
                $_SESSION['logged_in']=true;
                header('location:accueil.php');
            
        }else{
            $_SESSION['error']='mot de passe incorect';
        }
        

            }else{
                $_SESSION['error']='email incorect';
            }
    
            
        
            
}catch (PDOException $e) {
    die("erreur".$e->getMessage());
 }
}
}
?>
<!-- <div class="row">
    <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded bg-colorsss" style="width:50%;  "> -->
    <?php
    if(isset($_SESSION['error'])){
        echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
    //   unset($_SESSION['error']);//permet de supprimer le message deja afficher//
}
    
    ?>
        <!-- <h4 class="card-tittle text-center text-success ">Connexion</h4>
        <div class="card-body ">
        <form method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>
  
  <button type="submit" class="btn btn-success diva" >Connexion</button>
</form>
        </div>
    </div>
</div> -->

/* From Uiverse.io by Praashoo7 */ 
<form class="form" method="POST">
    <p id="heading">Login</p>
    <div class="field">
    <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
    <path d="M13.106 7.222c0-2.967-2.249-5.032-5.482-5.032-3.35 0-5.646 2.318-5.646 5.702 0 3.493 2.235 5.708 5.762 5.708.862 0 1.689-.123 2.304-.335v-.862c-.43.199-1.354.328-2.29.328-2.926 0-4.813-1.88-4.813-4.798 0-2.844 1.921-4.881 4.594-4.881 2.735 0 4.608 1.688 4.608 4.156 0 1.682-.554 2.769-1.416 2.769-.492 0-.772-.28-.772-.76V5.206H8.923v.834h-.11c-.266-.595-.881-.964-1.6-.964-1.4 0-2.378 1.162-2.378 2.823 0 1.737.957 2.906 2.379 2.906.8 0 1.415-.39 1.709-1.087h.11c.081.67.703 1.148 1.503 1.148 1.572 0 2.57-1.415 2.57-3.643zm-7.177.704c0-1.197.54-1.907 1.456-1.907.93 0 1.524.738 1.524 1.907S8.308 9.84 7.371 9.84c-.895 0-1.442-.725-1.442-1.914z"></path>
    </svg>
      <input autocomplete="off" placeholder="Username" class="input-field" type="text" name="email">
    </div>
    <div class="field">
    <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"></path>
    </svg>
      <input placeholder="Password" class="input-field" type="password" name="password">
    </div>
    <div class="btn">
    <button class="button1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Login&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
    <button class="button2">Sign Up</button>
    </div>
    <button class="button3">Forgot Password</button>
</form>