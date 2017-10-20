<?php
// No permitir acceso directo al archivo
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.framework'); 
JHtml::_('behavior.formvalidator');
JHtml::_('behavior.keepalive');
?>
<script type="text/javascript">
        
	Joomla.submitbutton = function(task)
	{
		if (task == 'version.cancel' || document.formvalidator.isValid(document.id('version-form'))) {
			Joomla.submitform(task, document.getElementById('version-form'));
		}
	}
</script>
<form action="<?php echo JRoute::_('index.php?option=com_vehiculo&layout=edit&id=' . (int) $this->item->id); ?>" method="post" name="adminForm" id="version-form" class="form-validate">
        <div class="form-horizontal">
                <div class="row-fluid">
                        <div class="span12">
                                <?php foreach ($this->form->getFieldset() as $field): ?>
                                        <?php echo $field->getControlGroup(); ?>
                                <?php endforeach; ?>                
                        </div>                                                
                </div>
        </div>

        <input type="hidden" name="task" value="version.edit" />
        <?php echo JHtml::_('form.token'); ?>
</form>
