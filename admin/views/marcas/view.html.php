<?php
// No permitir el acceso directo al archivo
defined('_JEXEC') or die;

// Importar la biblioteca view de Joomla
jimport('joomla.application.component.view');

/**
 * Vista Vehiculos Marcas  */
class VehiculoViewMarcas extends JViewLegacy
{
        /**
         *Métodoo para mostrar la vista 
         * @return void
         */
        public function display($tpl = null) 
        {
                $this->state            = $this->get('State');
				$this->filterForm       = $this->get('FilterForm');
				$this->activeFilters    = $this->get('ActiveFilters');
				$items                  = $this->get('Items');
				$pagination             = $this->get('Pagination');               
                
				// Check for errors.
				if (count($errors = $this->get('Errors'))) 
				{
					JError::raiseError(500, implode('<br />', $errors));
					return false;
				}
                // Assign data to the view
				$this->items = $items;                
				$this->pagination = $pagination;    
                /* Cargamos Submenu y con el parametro 'marcas' indicamos que está seleccionada*/
				
				// Si no existe task entonce podemos carga el submenu
                //~ if (!isset ($_REQUEST['task'])):
				VehiculoHelper::addSubmenu('marcas');
				//~ endif;
               
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
				// Funcion que añade, titulo pagina y bottones superiores de añadir, edit y borrar.
                // Ponemos el nombre del titulo de la vista y el icono que seleccionemos.
                // El icono es uno que tenemos en la carpeta /media/com_vehiculo 
			    JToolbarHelper::title(JText::_('Marcas de Vehiculos'),'vehiculos');
                JToolbarHelper::deleteList('', 'marca.delete');
                JToolbarHelper::editList('marca.edit');
                JToolbarHelper::addNew('marca.add');
                
                
        }
}
