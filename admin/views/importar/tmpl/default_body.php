<?php
// No permitir el acceso directo al archivo
defined('_JEXEC') or die('Restricted Access');
?>
<?php 
foreach($this->tablas as $i =>$tabla){ ?>
        <tr class="row<?php echo $i % 2; ?>">
			 <td>
				<?php echo JHtml::_('grid.id', $i, $i); ?>
			</td>
			
			<td>
				<?php echo $tabla['nombre_tabla']; ?>
			</td>
			<td></td>
			<td>
					<?php echo $i;?>
			</td>
        </tr>
<?php 
} ?>
