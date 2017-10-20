<?php
// No permitir el acceso directo al archivo
defined('_JEXEC') or die('Restricted Access');

// Cargar el comportamiento tooltip
JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('formbehavior.chosen', 'select');

$listOrder      = $this->escape($this->state->get('list.ordering', 'v.id'));
$listDirn       = $this->escape($this->state->get('list.direction', 'DESC'));
?>
<form action="<?php echo JRoute::_('index.php?option=com_vehiculo'); ?>" method="post"name="adminForm" id="adminForm">
                        
        <?php
        // Search tools bar
        echo JLayoutHelper::render('joomla.searchtools.default', array('view' => $this));
        ?>
                    
        <?php if (empty($this->items)) : ?>
                
                <div class="alert alert-no-items">
                        <?php echo JText::_('JGLOBAL_NO_MATCHING_RESULTS'); ?>
                </div>
                    
        <?php else : ?>      
        
                <table class="table table-striped">
                        <thead>

                                <tr>
                                        <th width="1%">                
                                                <?php echo JHtml::_('grid.checkall'); ?>
                                        </th>
                                        <th width="20">
                                                <?php echo JHtml::_('searchtools.sort', 'COM_VEHICULO_VERSIONS_HEADING_ID', 'id', $listDirn, $listOrder); ?>                                                
                                        </th>
                                        <th width="100">
                                                <?php echo JHtml::_('searchtools.sort', 'COM_VEHICULO_VERSIONS_HEADING_MARCA', 'marca', $listDirn, $listOrder); ?>
                                        </th>
                                        <th width="100">
                                                <?php echo JHtml::_('searchtools.sort', 'COM_VEHICULO_VERSIONS_HEADING_MODELO', 'modelo', $listDirn, $listOrder); ?>
                                        </th>
                                        <th width="150">
                                                <?php echo JHtml::_('searchtools.sort', 'COM_VEHICULO_VERSIONS_HEADING_NOMBREVERSION', 'nombre', $listDirn, $listOrder); ?>
                                        </th>
                                        <th width="100">
                                                <?php echo JText::_('COM_VEHICULO_VERSIONS_HEADING_TIPO'); ?>
                                        </th>
                                        <th width="80">
                                                <?php echo JText::_('COM_VEHICULO_VERSIONS_HEADING_COMBUSTIBLE'); ?>
                                        </th>
                                        <th width="80">
                                                <?php echo JText::_('COM_VEHICULO_VERSIONS_HEADING_FECHAINICIAL'); ?>
                                        </th>
                                        <th width="80">
                                                <?php echo JText::_('COM_VEHICULO_VERSIONS_HEADING_FECHAFINAL'); ?>
                                        </th>
                                        <th width="20">
                                                <?php echo JText::_('COM_VEHICULO_VERSIONS_HEADING_KW'); ?>
                                        </th>
                                        <th width="20">
                                                <?php echo JText::_('COM_VEHICULO_VERSIONS_HEADING_CV'); ?>
                                        </th>
                                        <th width="20">
                                                <?php echo JText::_('COM_VEHICULO_VERSIONS_HEADING_CM3'); ?>
                                        </th>
                                        <th width="20">
                                                <?php echo JText::_('COM_VEHICULO_VERSIONS_HEADING_NCILINDROS'); ?>
                                        </th>
                                </tr>                                                            
                        </thead>
                        <tfoot>
                                <tr>
                                        <td colspan="13"><?php echo $this->pagination->getListFooter(); ?></td>
                                </tr>                                
                        </tfoot>
                        <tbody>
                                <?php foreach($this->items as $i => $item): 
                                        $edit_link = JRoute::_('index.php?option=com_vehiculo&task=version.edit&id=' . $item->id);
                                        
                                        ?>
                                        <tr class="row<?php echo $i % 2; ?>">
                                                <td>
                                                        <?php echo JHtml::_('grid.id', $i, $item->id); ?>
                                                </td>
                                                <td>
                                                        <?php echo $item->id; ?>
                                                </td>
                                                <td>
                                                        <?php echo $item->marca; ?>
                                                </td>
                                                <td>
                                                        <?php echo $item->modelo; ?>
                                                </td>
                                                <td>
                                                        <a href="<?php echo $edit_link ?>">
                                                                <?php echo $item->nombre; ?>
                                                        </a>                                                                                                            
                                                </td>
                                                <td>
                                                        <?php echo $item->tipo; ?>
                                                </td>
                                                <td>
                                                        <?php echo $item->combustible; ?>
                                                </td>
                                                <td>                                                    
                                                        <?php if ($item->fecha_inicial != JFactory::getDbo()->getNullDate()) : ?>
                                                                <?php echo JFactory::getDate($item->fecha_inicial)->format(JText::_('DATE_FORMAT_LC4')); ?>
                                                        <?php endif; ?>
                                                </td>
                                                <td>
                                                        <?php if ($item->fecha_final != JFactory::getDbo()->getNullDate()) : ?>
                                                                <?php echo JFactory::getDate($item->fecha_final)->format(JText::_('DATE_FORMAT_LC4')); ?>
                                                        <?php endif; ?>                                                    
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
                        </tbody>
                </table>
                    
        <?php endif; ?>
    
        <input type = "hidden" name = "view" value = "versions"  /> 
        <input type="hidden" name="task" value="" />
        <input type="hidden" name="boxchecked" value="0" />
        <?php echo JHtml::_('form.token'); ?>		
</form>
<?php
