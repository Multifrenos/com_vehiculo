<?php
// No permitir el acceso directo al archivo
defined('_JEXEC') or die;

// Cargar el comportamiento tooltip

JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('formbehavior.chosen', 'select');


?>
<h2>Importación de tablas a componente vehiculos</h2>
<p>Al pulsar INSERTAR desde BDVehiculos lo que realiza es:</p>
<ul>
<li> Eliminar los datos que existan en esas tablas [CONFIGURACION]</li>
<li> Insertar los datos de la tablas de BDVehiculos(*)</li>
</ul>
<p>(*) Deberia ser una subida de un fichero (SQL) cosa que ahora no hacemos..</p>
<p>Este proceso no funciona, lo hice fue importar SQl desde phpmyadmin creando <b>copia tabla en BDVehiculos</b> con el prefijo de instalacion.</p>
<p>Selecciona el fichero que vas subir para importar.</p>

<form action="<?php echo JRoute::_('index.php?option=com_vehiculo'); ?>" method="post" name="adminForm"  id="adminForm">
        
        <table class="table table-striped">
                <thead><?php echo $this->loadTemplate('head');?></thead>
                <tfoot><?php echo $this->loadTemplate('foot');?></tfoot>
                <tbody><?php echo $this->loadTemplate('body');?></tbody>
        </table>
        <div>
                <input type="hidden" name="task" value="" />
                <input type="hidden" name="boxchecked" value="0" />
                <?php echo JHtml::_('form.token'); ?>
        </div>
        <input type = "hidden" name = "view" value = "importar"  /> 

</form>
