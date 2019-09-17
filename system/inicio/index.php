<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'application/common/Alerts.php';
include_once 'system/inicio/dashboard.php';
$dash = new Dashboard();

$index = TRUE;


include_once 'system/inicio/cards.php';

?>
<!-- <section class="team-section text-center my-5">


  <h2 class="h1-responsive font-weight-bold my-5">Nuestro Equipo Increible</h2>
  <p class="grey-text w-responsive mx-auto mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
    Fugit, error amet numquam iure provident voluptate esse quasi, veritatis totam voluptas nostrum quisquam
    eum porro a pariatur veniam.</p>

  <div class="row text-center">

    <div class="col-md-4 mb-md-0 mb-5">
      <div class="avatar mx-auto">
        <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(10).jpg" class="rounded z-depth-1-half" alt="Sample avatar">
      </div>
      <h4 class="font-weight-bold dark-grey-text my-4">Maria Kate</h4>
      <h6 class="text-uppercase grey-text mb-3"><strong>Photographer</strong></h6>
      <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-fb">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-dribbble">
        <i class="fab fa-dribbble"></i>
      </a>
      <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-tw">
        <i class="fab fa-twitter"></i>
      </a>
    </div>

    <div class="col-md-4 mb-md-0 mb-5">
      <div class="avatar mx-auto">
        <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(27).jpg" class="rounded z-depth-1-half" alt="Sample avatar">
      </div>
      <h4 class="font-weight-bold dark-grey-text my-4">John Doe</h4>
      <h6 class="text-uppercase grey-text mb-3"><strong>Front-end Developer</strong></h6>
      <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-email">
        <i class="fas fa-envelope"></i>
      </a>
      <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-fb">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-git">
        <i class="fab fa-github"></i>
      </a>
    </div>

    <div class="col-md-4">
      <div class="avatar mx-auto">
        <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(31).jpg" class="rounded z-depth-1-half" alt="Sample avatar">
      </div>
      <h4 class="font-weight-bold dark-grey-text my-4">Sarah Melyah</h4>
      <h6 class="text-uppercase grey-text mb-3"><strong>Web Developer</strong></h6>
      <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-li">
        <i class="fab fa-linkedin-in "></i>
      </a>
      <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-tw">
        <i class="fab fa-twitter "></i>
      </a>
      <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-pin">
        <i class="fab fa-pinterest "></i>
      </a>
    </div>

  </div>

</section>
 -->