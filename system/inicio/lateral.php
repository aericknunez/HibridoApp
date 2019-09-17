<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


if(!isset($_GET["modal"])){
  if($index == TRUE){
    echo '<div id="perfil"></div>';
  } else { // aqui ira la parte que no sea index
    echo '<div class="text-center"><img src="assets/img/logo/default.jpg" class="img-fluid responsive" alt="Responsive image"></div>';
  }
} 


?>


