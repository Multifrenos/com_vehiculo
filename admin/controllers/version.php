<?php
// No permitir acceso directo al archivo
defined('_JEXEC') or die('Restricted access');
 
 
/**
 *Controlador Version
 */
class VehiculoControllerVersion extends JControllerForm
{
	public function addNew()
		{
		// Get the input
		$input = JFactory::getApplication()->input;
		$pks = $input->post->get('cid', array(), 'array');
 
		// Sanitize the input
		JArrayHelper::toInteger($pks);
 
		// Get the model
		$model = $this->getModel();
 
		$return = $model->nodelo($pks);
 
		// Redirect to the list screen.
		$this->setRedirect(JRoute::_('index.php?option=com_vehiculo&view=versions', false));
 
		}
	
	
}
