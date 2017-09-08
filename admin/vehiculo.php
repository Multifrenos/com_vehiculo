<?php
// No permitir acceso directo al archivo
defined('_JEXEC') or die;
JHtml::_('behavior.tabstate');

// requerir archivo de ayuda
if (!JFactory::getUser()->authorise('core.manage', 'com_vehiculo'))
{
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}


// Obtener una instancia del controlador prefijado por vehiculo
$task       = JFactory::getApplication()->input->get('task');

$controller = JControllerLegacy::getInstance('vehiculo');

$controller->execute(JFactory::getApplication()->input->getCmd('task'));

$controller->redirect();



