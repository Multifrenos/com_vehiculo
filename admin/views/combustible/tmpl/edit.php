<?php
// No permitir acceso directo al archivo
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.formvalidator');
JHtml::_('behavior.keepalive');
JFactory::getDocument()->addScriptDeclaration("
		Joomla.submitbutton = function(task)
		{
			if (task == 'combustible.cancel' || document.formvalidator.isValid(document.getElementById('combustible-form')))
			{
				Joomla.submitform(task, document.getElementById('combustible-form'));
			}
		};
");

?>
<form action="<?php echo JRoute::_('index.php?option=com_vehiculo&layout=edit&id='.(int) $this->item->id); ?>"
      method="post" name="adminForm" id="combustible-form" class="form-validate">
		<div class="form-horizontal">
			<legend><?php echo JText::_( 'Detalles de tipos combustibles de vehiculo' ); ?></legend>
			<?php foreach($this->form->getFieldset() as $field): ?>
			<div class="control-group">
				<div class="control-label">
					<?php echo $field->label;?>
				</div>
				<div class="controls">
					<?php echo $field->input;?>
				</div>
			</div>
			<?php endforeach; ?>
         </div>
        <div>
                <input type="hidden" name="task" value="combustible.edit" />
                <?php echo JHtml::_('form.token'); ?>
        </div>
</form>
