<?php
// No permitir el acceso directo al archivo
defined('_JEXEC') or die('Restricted Access');
?>
<?php foreach ($this->items as $i => $item): ?>
        <tr class="row<?php echo $i % 2; ?>">
                <td>
                        <?php echo JHtml::_('grid.id', $i, $item->id); ?>
                </td>
                <td>
                        <?php
                        $idProducto = $item->virtuemart_product_id;
                        echo ' ';
                        echo $item->product_name;
                        ?>
                        <a title="id_producto" 
                           href="index.php?option=com_virtuemart&view=product&task=edit&virtuemart_product_id=<?php echo $idProducto;?>">
                            <?php echo $idProducto;?>
                        </a>
                </td>
                <td>
                        <?php
                        $idVersiones = $item->version_vehiculo_id;
                        echo ' ';
                        echo $item->marca . ' ' . $item->modelo . ' ' . $item->version;
                        ?>
                        <a title="ID de version" 
                           href="index.php?option=com_vehiculo&view=version&layout=edit&id=<?php echo $idVersiones;?>">
                            <?php echo $idVersiones;?>
                        </a>
                </td>
                <td>
                        <?php echo $item->combustible; ?>
                </td>
                <td>
                        <?php 
                        $date = JFactory::getDate ($item->fecha_actualizacion);
                        echo $date->format ('d/m/Y'); ?>
                </td>
        </tr>
<?php endforeach; ?>
