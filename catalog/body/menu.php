
<li><a href="?me" class="waves-effect arrow-r"><i class="fas fa-tv"></i> Mi Perfil </a></li>



<li><a href="?empresa" class="waves-effect"><i class="fas fa-plus"></i> Nueva Empresa</a></li>
<li><a href="?myempresa" class="waves-effect"><i class="fas fa-search"></i> Mis Empresas </a></li>

<li><a href="?empresas" class="waves-effect"><i class="fas fa-columns"></i> Todas Las Empresas</a></li>


<hr>
<?php if($_SESSION["tipo_cuenta"] == 1){
echo '<li><a href="?producto" class="waves-effect"><i class="fas fa-money-bill-alt"></i> Nuevo Producto   </a></li>';	
} ?>


<li><a href="?productos" class="waves-effect"><i class="fas fa-money-bill-alt"></i> Todos Los Productos </a></li>




<li><a href="?user" class="waves-effect arrow-r"><i class="fas fa-user"></i> Usuarios </a></li>


<hr>

<li><a href="application/includes/logout.php" class="waves-effect arrow-r"><i class="fas fa-power-off"></i> Salir </a></li>

</ul>
</li>