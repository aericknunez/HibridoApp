
<li><a href="?me" class="waves-effect arrow-r"><i class="fas fa-tv"></i> Perfil </a></li>







<li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-calculator"></i> Empresas <i class="fa fa-angle-down rotate-icon"></i></a>
<div class="collapsible-body">
<ul class="list-unstyled">



<li><a href="?empresa" class="waves-effect"><i class="fas fa-plus"></i> Nueva</a></li>
<li><a href="?empresas" class="waves-effect"><i class="fas fa-columns"></i> Todas </a></li>
<li><a href="?ebuscar" class="waves-effect"><i class="fas fa-search"></i> Buscar </a></li>

</ul>
</div>
</li>











<li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-money-bill-alt"></i> Productos<i class="fa fa-angle-down rotate-icon"></i></a>
<div class="collapsible-body">
<ul class="list-unstyled">

<li><a href="?producto" class="waves-effect"><i class="fas fa-money-bill-alt"></i> Nuevos  </a></li>
<li><a href="?productos" class="waves-effect"><i class="fas fa-money-bill-alt"></i> Todos</a></li>
</ul>
</div>
</li>





<li><a class="collapsible-header waves-effect arrow-r"><i class="far fa-user"></i> Clientes<i class="fa fa-angle-down rotate-icon"></i></a>
<div class="collapsible-body">
<ul class="list-unstyled">

<li><a href="?clienteadd" class="waves-effect"><i class="fas fa-user"></i> Agrega Cliente</a></li>
<li><a href="?clientever" class="waves-effect"><i class="fas fa-address-book"></i> Ver Cliente</a></li>

</ul>
</div>
</li>





<li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-user-alt"></i> Proveedores<i class="fa fa-angle-down rotate-icon"></i></a>
<div class="collapsible-body">
<ul class="list-unstyled">

<li><a href="?proveedoradd" class="waves-effect"><i class="fas fa-user"></i> Agrega Proveedor</a></li>
<li><a href="?proveedorver" class="waves-effect"><i class="fas fa-barcode"></i> Ver Proveedores</a></li>

</ul>
</div>
</li>



<li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-cog"></i> Facturas<i class="fa fa-angle-down rotate-icon"></i></a>
<div class="collapsible-body">
<ul class="list-unstyled">

<li><a  class="waves-effect"><i class="fas fa-cog"></i> Opciones</a></li>
<li><a  class="waves-effect"><i class="fas fa-cogs"></i> Imprimir Facturas</a></li>

</ul>
</div>
</li>








<li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-cog"></i> Configuraciones<i class="fa fa-angle-down rotate-icon"></i></a>
<div class="collapsible-body">
<ul class="list-unstyled">

<?php if($_SESSION["tipo_cuenta"] == 1 or $_SESSION["tipo_cuenta"] == 2 or $_SESSION["tipo_cuenta"] == 5) { ?>

<li><a href="?configuraciones" class="waves-effect"><i class="fas fa-cog"></i> Configuraciones</a></li>
<li><a href="?tablas" class="waves-effect"><i class="fas fa-cogs"></i> Tablas a respaldar</a></li>
<?php } ?>

<li><a href="?user" class="waves-effect arrow-r"><i class="fas fa-user"></i> Usuarios </a></li>

<?php if($_SESSION["tipo_cuenta"] == 1) { ?>
<li><a href="?root" class="waves-effect"><i class="fas fa-cogs"></i> Configuraciones Root</a></li>
<?php } ?>
</ul>
</div>
</li>





<li><a href="application/includes/logout.php" class="waves-effect arrow-r"><i class="fas fa-power-off"></i> Salir </a></li>

</ul>
</li>