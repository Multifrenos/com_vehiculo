<?php
// No permitir el acceso directo al archivo
defined('_JEXEC') or die('Restricted Access');

// Cargar el comportamiento tooltip
JHtml::_('behavior.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('formbehavior.chosen', 'select');
$listOrder      = $this->escape($this->state->get('list.ordering', 'mo.id'));
$listDirn       = $this->escape($this->state->get('list.direction', 'DESC'));
?>
<form action="<?php echo JRoute::_('index.php?option=com_vehiculo'); ?>" method="post" name="adminForm" id="adminForm">
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
						<thead><?php echo $this->loadTemplate('head');?></thead>
						<tfoot><?php echo $this->loadTemplate('foot');?></tfoot>
						<tbody><?php echo $this->loadTemplate('body');?></tbody>
				</table>
        
         <?php endif; ?>
				<input type = "hidden" name = "view" value = "nodelos"  /> 
                <input type="hidden" name="task" value="" />
                <input type="hidden" name="boxchecked" value="0" />
                <?php echo JHtml::_('form.token'); ?>
</form>
