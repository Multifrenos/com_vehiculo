<?php
// No permitir el acceso directo al archivo
defined('_JEXEC') or die;

// Importar la biblioteca view de Joomla
//~ jimport('joomla.application.component.view');

/**
 * Vista Vehiculos Marcas  */
class VehiculoViewImportar extends JViewLegacy
{
        //~ protected $nombre_tablas;
//~ 
		//~ protected $pagination;
//~ 
		//~ protected $state;

        
        /**
         *Métodoo para mostrar la vista 
         * @return void
         */
        public function display($tpl = null) 
        {
                // Obtenemos los nombres de las tabla que vamos importa
                $ObtenerTablas		= $this->get('Tablas');
				if (count($ObtenerTablas['Num_tablas'])>0){
				// Esto siempre debería se superior.Ya siempre debería haber tablas de vehiculos.
				$this->tablas	= $ObtenerTablas['tablas'];
				} 
				//~ echo '<pre>';
				//~ print_r($ObtenerTablas);
				//~ echo '</pre>';
				//~ $this->state		= $this->get('State');

				/* Cargamos Submenu y con el parametro 'marcas' indicamos que está seleccionada*/
				
				// Si no existe task entonce podemos carga el submenu
                if (!isset ($_REQUEST['task'])):
				VehiculoHelper::addSubmenu('importar');
				endif;
               
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
                JToolBarHelper::custom('importar.insertar', 'insertar.png', 'insertar_f2.png', 'Insertar tabla', true);
                //~ JToolbarHelper::editList('virtuemartcruces.edit');
                //~ JToolbarHelper::addNew('virtuemartcruces.add');
                
                
        }
}
