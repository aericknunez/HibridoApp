<style>
    body { 
        background-color: black; /* La página de fondo será negra */
        color: 000; 
    	}
</style>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if($_REQUEST["modal"]=="registrar") include_once 'system/modal/modal/registrar.php';

if($_REQUEST["modal"]=="newpass") include_once 'system/modal/modal/user_cambiar_pass.php';

if($_REQUEST["modal"]=="userupdate") include_once 'system/modal/modal/user_update.php';

if($_REQUEST["modal"]=="avatar") include_once 'system/modal/modal/avatar.php';

if($_REQUEST["modal"]=="redes") include_once 'system/modal/modal/redes_sociales.php';
