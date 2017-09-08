<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * Nodelo View
 */
class VehiculoViewNodelo extends JViewLegacy
{
	/**
	 * display method of Nodelo view
	 * @return void
	 */
	public function display($tpl = null) 
	{
		// get the Data
		$form = $this->get('Form');
		$item = $this->get('Item');
		//~ $script = $this->get('Script');

		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		// Assign the Data
		$this->form = $form;
		$this->item = $item;
		//~ $this->script = $script;
		// Set the toolbar
		$this->addToolBar();
		// Set the document
		//~ $this->setDocument();
		// Display the template
		parent::display($tpl);
		
	}

	/**
	 * Setting the toolbar
	 */
	protected function addToolBar() 
	{
		JRequest::setVar('hidemainmenu', true);
		$isNew = ($this->item->id == 0);
		JToolBarHelper::title($isNew ? JText::_('Nuevo modelo') : JText::_('Editar modelo'));
		JToolBarHelper::save('nodelo.save');
		JToolBarHelper::cancel('nodelo.cancel', $isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE');
	}
	
		protected function setDocument() 
	{
		$isNew = ($this->item->id < 1);
		$document = JFactory::getDocument();
		$document->setTitle($isNew ? JText::_('Creando nuevo modelo de Vehiculo')
		                           : JText::_('Editando modelo de Vehiculo'));
		$document->addScript(JURI::root() . $this->script);
		$document->addScript(JURI::root() . "/administrator/components/com_vehiculo"
		                                  . "/views/nodelo/submitbutton.js");
		JText::script('No es aceptable el modelo');
	}

}
