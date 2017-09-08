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
                        endforeach;?>
                </td>
                <td>
                        <?php 
                        foreach($this->todosModelos as $fila):
                            if($fila->id==$item->idModelo)
                            {
                                echo $fila->nombre;
                                break;
                            }
                        endforeach;?>
                </td>
                <td>
                        <?php echo $item->nombre; ?>
                </td>
                <td>
                        <?php
                        foreach($this->todosTipos as $fila):
                            if($fila->id==$item->idTipo)
                            {
                                echo $fila->nombre;
                                break;
                            }
                        endforeach;
                        ?>
                    
                </td>
                <td>
                <?php
                        foreach($this->todosCombustibles as $fila):
                            if($fila->id==$item->idCombustible)
                            {
                                echo $fila->nombre;
                                break;
                            }
                        endforeach;
                        ?>
                </td>
                <td>
                        <?php echo $item->fecha_inicial; ?>
                </td>
                 <td>
                        <?php echo $item->fecha_final; ?>
                </td>
                 <td>
                        <?php echo $item->kw; ?>
                </td>
                 <td>
                        <?php echo $item->cv; ?>
                </td>
                 <td>
                        <?php echo $item->cm3; ?>
                </td>
                <td>
                        <?php echo $item->ncilindros; ?>
                </td>
                
                
        </tr>
<?php endforeach; ?>
