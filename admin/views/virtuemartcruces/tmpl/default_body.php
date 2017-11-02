<?php
// No permitir el acceso directo al archivo
defined('_JEXEC') or die('Restricted Access');
?>
<?php foreach($this->items as $i => $item): ?>
        <tr class="row<?php echo $i % 2; ?>">
			<td>
				<?php echo JHtml::_('grid.id', $i, $item->id); ?>
			</td>
			<td>
				<?php echo '<a>'.$item->virtuemart_product_id.'</a> ';
				      echo $item->product_name;
				?>
				<?php 
				//~ echo '<pre>';
				//~ echo print_r($item);
				//~ echo '</pre>';
				?>
			</td>
			<td>
					<?php 
					echo '<a>'.$item->version_vehiculo_id.'</a> ';
					echo $item->marca.' '.$item->modelo.' '.$item->version;
					echo $item->version_vehiculo_id; ?>
			</td>
			<td>
					<?php echo $item->combustible; ?>
			</td>
			<td>
					<?php echo $item->fecha_actualizacion; ?>
			</td>
        </tr>
<?php endforeach; ?>
