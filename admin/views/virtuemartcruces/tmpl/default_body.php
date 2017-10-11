<?php
// No permitir el acceso directo al archivo
defined('_JEXEC') or die('Restricted Access');
?>
<?php foreach($this->items as $i => $item): ?>
        <tr class="row<?php echo $i % 2; ?>">
<?php echo '<td><pre>';
echo print_r($item);
echo '</pre></td>';
?>
<!--
			<td>
					<?php echo $item->virtuemart_product_id; ?>
			</td>
			<td>
					<?php echo $item->version_vehiculo_id; ?>
			</td>
			<td>
					<?php echo $item->fecha_actualizacion; ?>
			</td>

			<td>
				<?php echo JHtml::_('grid.id', $i, $item->id); ?>
			</td>
-->
        </tr>
<?php endforeach; ?>
