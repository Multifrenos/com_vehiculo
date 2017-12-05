<?php
// No permitir acceso directo al archivo
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.formvalidator');
JHtml::_('behavior.keepalive');
JFactory::getDocument()->addScriptDeclaration("
		Joomla.submitbutton = function(task)
		{
			if (task == 'virtuemartcruce.cancel' || document.formvalidator.isValid(document.getElementById('virtuemartcruce-form')))
			{
				Joomla.submitform(task, document.getElementById('virtuemartcruce-form'));
			}
		};
");
//~ echo '<pre>';
//~ print_r($this->item);
//~ echo '</pre>';
$item = $this->item;
?>
<div class="row-fluid">
<div class="span6">
	<form action="<?php echo JRoute::_('index.php?option=com_vehiculo&layout=edit&id='.(int) $this->item->id); ?>"
		  method="post" name="adminForm" id="virtuemartcruce-form" class="form-validate">
			<fieldset class="adminform">
					<legend><?php echo JText::_( 'Cruce de vehiculo con producto de virtuemart' ); ?></legend>
					<ul class="adminformlist">
			<?php foreach($this->form->getFieldset() as $field): ?>
							<li><?php echo $field->label;echo $field->input;?></li>
			<?php endforeach; ?>
					</ul>
			</fieldset>
			<div>
					<input type="hidden" name="task" value="virtuemartcruce.edit" />
					<?php echo JHtml::_('form.token'); ?>
			</div>
	</form>
</div>
<div class="span6">
	<h2><?php echo $item->get('id').' ID CRUCE -- '.$item->get('recambio_id').' ID Recambio(Tpv) -- '.$item->get('fecha_actualizacion').' Actualizado';?> </h2>
	<h3> Coche seleccionado - ID Version :<?php echo $item->get('version_vehiculo_id');?>	</h3>
	<?php
	$vehiculo = $item->vehiculo;
	$html = '<table class="table"><theader><th></th><th>Cilindrada</th><th>Cv/KW</th><th>NºCilindros</th><th>Inicio Fabricación</th><th>Fin Fabricación</th></theader>'
			.'<tbody><tr>'
			.'<td>'
			.'<span title="'.'" class=" glyphicon glyphicon-info-sign"></span> '
			.$item->get('virtuemart_product_id').' '.$vehiculo->marca.' '.$vehiculo->modelo.' '.$vehiculo->nombre
			
			.'</td>'
			.'<td>'.$vehiculo->cm3.'</td>'
			.'<td>'.$vehiculo->cv.'cv / '.$vehiculo->kw.'Kw</td>'
			.'<td>'.$vehiculo->ncilindros.'</td>'

			.'<td>'.$vehiculo->fecha_inicial.'</td>'
			.'<td>'.$vehiculo->fecha_final.'</td>'
			.'</tr></tbody>'
			.'</table>';
		echo '<div class="alert alert-info alert-dismissable">';
			echo $html;
		echo '</div>';
	?>
		
	<h3> Producto seleccionado - ID de virtuemart: <?php echo $item->get('virtuemart_product_id');?>	</h3>
	<?php
	$producto = $item->producto;
	$html = '<table class="table"><theader><th>idVirtuemart</th><th>SKU</th><th>Descripcion Producto</th><th>Precio</th><th>Fecha Ultima Modificacion</th></theader>'
			.'<tbody><tr>'
			.'<td>'
			.$item->get('virtuemart_product_id')
			.'</td>'
			.'<td>'.$producto->product_sku.'</td>'
			.'<td>'.$producto->articulo_name.'</td>'
			.'<td>'.$producto->product_price.'</td>'
			.'<td>'.$producto->modified_on.'</td>'
			.'</tr></tbody>'
			.'</table>';
		echo '<div class="alert alert-info alert-dismissable">';
			echo $html;
		echo '</div>';
	?>
</div>
</div>
