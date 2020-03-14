<?php 
 if($_SESSION["config_edo"] != NULL){
?>
<li><a href="?me" class="waves-effect arrow-r"><i class="fas fa-tv"></i> Mi Perfil </a></li>

<?php if($_SESSION["tipo_cuenta"] == 1){
echo '<li><a href="?listadeusuarios" class="waves-effect"><i class="fas fa-plus"></i> Lista de Usuarios  </a></li>';	
} ?>

<li><a href="?empresa" class="waves-effect"><i class="fas fa-plus"></i> Nueva Empresa</a></li>
<li><a href="?myempresa" class="waves-effect"><i class="fas fa-building"></i> Mis Empresas </a></li>

<li><a href="?empresas" class="waves-effect"><i class="fas fa-chart-bar"></i> Todas Las Empresas</a></li>


<hr>
<?php if($_SESSION["tipo_cuenta"] == 1){
echo '<li><a href="?producto" class="waves-effect"><i class="fas fa-plus"></i> Nuevo Producto   </a></li>';	
} ?>


<li><a href="?productos" class="waves-effect"><i class="fas fa-box"></i> Todos Los Productos </a></li>
<li><a href="?proasig" class="waves-effect"><i class="fas fa-project-diagram"></i> Productos Asignados </a></li>
<?php if($_SESSION["tipo_cuenta"] == 1 or $_SESSION["tipo_cuenta"] == 4){
echo '<li><a href="?provendidos" class="waves-effect"><i class="fas fa-plus"></i> Productos Vendidos   </a></li>';	
} ?>
<hr>
<li><a href="?historial" class="waves-effect"><i class="fas fa-calendar-alt"></i> Citas Programadas </a></li>

<hr>
<li><a href="?download" class="waves-effect"><i class="fas fa-download"></i> Descargas </a></li>

<li><a href="?user" class="waves-effect arrow-r"><i class="fas fa-user"></i> Usuarios </a></li>

<?php 

} // config edo

 ?>

<li><a href="application/includes/logout.php" class="waves-effect arrow-r"><i class="fas fa-power-off"></i> Salir </a></li>

</ul>
</li>