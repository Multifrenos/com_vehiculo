<?php
// No permitir acceso directo al archivo
defined('_JEXEC') or die;

/**
 * Ayuda del componente Vehiculo.
 */
class VehiculoHelper extends JHelperContent
{
        /**
         * Configurar la barra de enlaces.
         */
        public static function addSubmenu($submenu) 
        {
			$document = JFactory::getDocument();
			JSubMenuHelper::addEntry('<h2 class="nav-header">Tablas de Vehiculos</h2>');
            JSubMenuHelper::addEntry(JText::_('COM_VEHICULO_SUBMENU_MARCAS'),
                                     'index.php?option=com_vehiculo&view=marcas&extension=com_vehiculo', $submenu == 'marcas');
            JSubMenuHelper::addEntry(JText::_('COM_VEHICULO_SUBMENU_NODELO'), 'index.php?option=com_vehiculo&view=nodelos&extension=com_vehiculo', $submenu == 'nodelos');
            
            if ($submenu == 'nodelos') 
            {
                    $document->setTitle(JText::_('COM_VEHICULO_ADMINISTRATION_NODELO'));
            }

            JSubMenuHelper::addEntry(JText::_('COM_VEHICULO_SUBMENU_VERSION'), 'index.php?option=com_vehiculo&view=versions&extension=com_vehiculo', $submenu == 'versions');
            
            if ($submenu == 'versions') 
            {
                $document->setTitle(JText::_('COM_VEHICULO_ADMINISTRATION_VERSIONS'));
            }
            
            /* Mas opciones de gestion -> como añadir tipos de vehiculos, tipos combustible */
            JSubMenuHelper::addEntry('<h2 class="nav-header">Tablas de Maestras</h2>');
            JSubMenuHelper::addEntry('Tipos de vehiculos');

            JSubMenuHelper::addEntry('Tipos de combustible');
           
            /* Mas opciones para importar tablas */

			JSubMenuHelper::addEntry('<h2 class="nav-header">Herramientas</h2>');
            JSubMenuHelper::addEntry('Importar tablas');

        }
}
