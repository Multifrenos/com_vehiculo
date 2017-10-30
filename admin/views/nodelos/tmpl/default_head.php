<?php
// No permitir el acceso directo al archivo
defined('_JEXEC') or die('Restricted Access');
?>

<tr>
        <th width="1%">                
			<?php echo JHtml::_('grid.checkall'); ?>
        </th>
        <th width="5">
			<?php echo JHtml::_('searchtools.sort', 'COM_VEHICULO_NODELOS_HEADING_ID', 'mo.id', $listDirn, $listOrder); ?>
        </th>
        <th width="10">
			<?php echo JHtml::_('searchtools.sort', 'COM_VEHICULO_NODELOS_HEADING_MARCA', 'ma.nombre', $listDirn, $listOrder); ?>
    
        </th>
        <th width="10">
			<?php echo JHtml::_('searchtools.sort', 'COM_VEHICULO_NODELOS_HEADING_NOMBREMODELO', 'mo.nombre', $listDirn, $listOrder); ?>

                <?php //echo JText::_('COM_VEHICULO_NODELOS_HEADING_NOMBREMODELO'); ?>
        </th>
        
</tr>
