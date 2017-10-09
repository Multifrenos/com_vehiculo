<?php
// No permitir el acceso directo al archivo
defined('_JEXEC') or die('Restricted access');

// Importar la biblioteca view de Joomla
jimport('joomla.application.component.view');

/**
 * Vista Versions  */
class VehiculoViewVersions extends JViewLegacy
{
        /**
         *M�todoo para mostrar la vista Versions 
         * @return void
         */
        function display($tpl = null) 
        {
                $basedatos = JFactory::getDBO();
                $consulta = $basedatos->getQuery(true);
                $consulta->select('id,nombre,logo');
                $consulta->from('#__vehiculo_marcas');

                $basedatos->setQuery((string)$consulta);
                $resultadoMarcas = $basedatos->loadObjectList();
                
                $basedatos = JFactory::getDBO();
                $consulta = $basedatos->getQuery(true);
                $consulta->select('id,idMarca,nombre');
                $consulta->from('#__vehiculo_modelos');

                $basedatos->setQuery((string)$consulta);
                $resultadoModelos = $basedatos->loadObjectList();
                
                $basedatos = JFactory::getDBO();
                $consulta = $basedatos->getQuery(true);
                $consulta->select('id, nombre');
                $consulta->from('#__vehiculo_tipos');

                $basedatos->setQuery((string)$consulta);
                $resultadoTipos = $basedatos->loadObjectList();
                
                $basedatos = JFactory::getDBO();
                $consulta = $basedatos->getQuery(true);
                $consulta->select('id, nombre');
                $consulta->from('#__vehiculo_combustibles');

                $basedatos->setQuery((string)$consulta);
                $resultadoCombustibles = $basedatos->loadObjectList();
            
                // Obtener los datos desde el modelo
                $items = $this->get('Items');
                $pagination = $this->get('Pagination');

                // Verificar existencia de errores.
                if (count($errors = $this->get('Errors'))) 
                {
                        JError::raiseError(500, implode('<br />', $errors));
                        return false;
                }
                // Asignar los datos a la vista
                $this->items = $items;
                $this->todasMarcas =$resultadoMarcas;
                $this->todosModelos =$resultadoModelos;
                $this->todosTipos =$resultadoTipos;
                $this->todosCombustibles =$resultadoCombustibles;
                $this->pagination = $pagination;

				/* Cargamos Submenu y con el parametro 'versiones' indicamos que está seleccionada*/
				VehiculoHelper::addSubmenu('versiones');

                // Establecer la barra de herramientas
                $this->addToolBar();
                
                // Mostrar la plantilla
                parent::display($tpl);
                
                
        }
        
        /**
         * Configurar la barra de herramientas
         */
        protected function addToolBar() 
        {
                // Ponemos el nombre del titulo de la vista y el icono que seleccionemos.
                JToolBarHelper::title(JText::_('Versiones de Modelos de Vehiculos'),'joomla');
                JToolBarHelper::deleteList('', 'versions.delete');
                JToolBarHelper::editList('version.edit');
                JToolBarHelper::addNew('version.add');
        }
}
