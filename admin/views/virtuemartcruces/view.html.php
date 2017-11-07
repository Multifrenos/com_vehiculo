<?php
// No permitir el acceso directo al archivo
defined('_JEXEC') or die;

// Importar la biblioteca view de Joomla
jimport('joomla.application.component.view');

/**
 * Vista Vehiculos Marcas  */
class VehiculoViewVirtuemartcruces extends JViewLegacy
{
        //~ protected $items;

		//~ protected $pagination;

		//~ protected $state;

        
        /**
         *Métodoo para mostrar la vista 
         * @return void
         */
        function display($tpl = null) 
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
				
				// Mostramos el submenu
				VehiculoHelper::addSubmenu('virtuemartcruces');

               
                // Obtener los datos desde el modelo
                //~ $items = $this->get('Items');
                
                
                
                //~ $pagination = $this->get('Pagination');

                
                
                // Verificar existencia de errores.
                if (count($errors = $this->get('Errors'))) 
                {
                        JError::raiseError(500, implode('<br />', $errors));
                        return false;
                }
                // Asignar los datos a la vista
                //~ $this->items = $items;
                //~ $this->pagination = $pagination;

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
			    JToolbarHelper::title(JText::_('Cruces de productos de virtuemart con Vehiculos'),'joomla');
                JToolbarHelper::deleteList('', 'virtuemartcruce.delete');
                JToolbarHelper::editList('virtuemartcruce.edit');
                JToolbarHelper::addNew('virtuemartcruce.add');
                
                
        }
}
