<?php
// No permitir acceso directo al archivo
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.formvalidator');
JHtml::_('behavior.keepalive');
JFactory::getDocument()->addScriptDeclaration("
		Joomla.submitbutton = function(task)
		{
			if (task == 'noledo.cancel' || document.formvalidator.isValid(document.getElementById('nodelo-form')))
			{
				Joomla.submitform(task, document.getElementById('nodelo-form'));
			}
		};
");

?>
<form action="<?php echo JRoute::_('index.php?option=com_vehiculo&layout=edit&id='.(int) $this->item->id); ?>"
      method="post" name="adminForm" id="nodelo-form" class="form-validate">
        <fieldset class="adminform">
                <legend><?php echo JText::_( 'Detalles del modelo' ); ?></legend>
                <ul class="adminformlist">
<?php foreach($this->form->getFieldset() as $field): ?>
                        <li><?php echo $field->label;echo $field->input;?></li>
<?php endforeach; ?>

                </ul>
        </fieldset>
        <div>
            
            
                <input type="hidden" name="task" value="nodelo.edit" />
                <?php echo JHtml::_('form.token'); ?>
        </div>
</form>
