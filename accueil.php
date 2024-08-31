<?php
session_start();
include_once "header.php";
if(!isset($_SESSION['logged_in'])|| $_SESSION['logged_in']!==true){
    header('location:login.php');
    exit();

}

$pers_connecter= $_SESSION['prenom'].'  '.$_SESSION['user_name'];
var_dump($pers_connecter);
?>
<nav class="navbar navbar-expand-lg bg-color ">

  <div class="container-fluid">
    <a class="navbar-brand" href="#">LOGO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">ACCEUIL</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            LISTE PERSONNE
          </a>
          
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-disabled="true">CONTACT</a>
        </li>
      </ul>
      <a href="" class="btn  text-light"><?php
       
       echo htmlspecialchars($pers_connecter);
       ?></a>
      <a href="deconnexion.php" class="btn btn-danger">Deconnexion</a>
    </div>
  </div>
</nav>
<div class="row">
    <div class="col-6">
       <marquee behavior="" direction="" class="h4">BIENVENUE</marquee>
    </div>

    <table class="table table-warning table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
</div>

