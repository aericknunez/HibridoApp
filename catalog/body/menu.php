<?php 
 if($_SESSION["config_edo"] != NULL){
?>

<?php if($_SESSION["tipo_cuenta"] == 1) {  /// planilla?>

<li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-user-alt"></i> Administración Api<i class="fa fa-angle-down rotate-icon"></i></a>
<div class="collapsible-body">
<ul class="list-unstyled">

<li><a href="?addbd" class="waves-effect"><i class="fas fa-download"></i> Agregar Base de Datos </a></li>
<li><a href="?addtimages" class="waves-effect"><i class="fas fa-download"></i> Todas Las Imagemes</a></li>
<li><a href="?addcimages" class="waves-effect"><i class="fas fa-download"></i> Imagemes sin Categoria</a></li>


</ul>
</div>
</li>

<?php } ?>


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

<?php if($_SESSION["tipo_cuenta"] == 1){
echo '<li><a href="?todaslascitas" class="waves-effect"><i class="fas fa-plus"></i> Todas las citas   </a></li>';	
} ?>

<hr>
<li><a href="?codigodemo" class="waves-effect"><i class="fas fa-download"></i> Codigos demo </a></li>

<li><a href="?download" class="waves-effect"><i class="fas fa-download"></i> Descargas </a></li>

<li><a href="?user" class="waves-effect arrow-r"><i class="fas fa-user"></i> Usuarios </a></li>

<?php 

} // config edo

 ?>

<li><a href="application/includes/logout.php" class="waves-effect arrow-r"><i class="fas fa-power-off"></i> Salir </a></li>

</ul>
</li>