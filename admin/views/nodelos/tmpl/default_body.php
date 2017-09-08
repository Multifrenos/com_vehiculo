<?php
// No permitir el acceso directo al archivo
defined('_JEXEC') or die('Restricted Access');
?>
<?php foreach($this->items as $i => $item): ?>
        <tr class="row<?php echo $i % 2; ?>">
                <td>
                        <?php echo $item->id; ?>
                </td>
                <td>
                        <?php
                        foreach($this->todasMarcas as $fila):
                            if($fila->id==$item->idMarca)
                            {
                                echo $fila->nombre;
                                break;
                            }
                        endforeach;
?>
                </td>
                <td>
                        <?php echo $item->nombre; ?>
                </td>
                <td>
			<?php echo JHtml::_('grid.id', $i, $item->id); ?>
		</td>
        </tr>
<?php endforeach; ?>