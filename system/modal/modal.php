<style>
    body { 
        background-color: black; /* La página de fondo será negra */
        color: 000; 
    	}
</style>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if($_REQUEST["modal"]=="redes") include_once 'system/modal/modal/redes_sociales.php';
