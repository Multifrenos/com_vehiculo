
<?php

// No permitir el acceso directo al archivo
defined('_JEXEC') or die;
 

/**
 * General Controller of Vehiculo component
 */
class VehiculoController extends JControllerLegacy
{
        protected $default_view = 'marcas';
        /**
         * Mostrar la tarea
         *
         * @return void
         */
        public function display($cachable = false , $urlparams = false) 
        {      
				require_once JPATH_COMPONENT . '/helpers/vehiculo.php';

				$view   = $this->input->get('view', 'marcas');
				$layout = $this->input->get('layout', 'marcas');
				$id     = $this->input->getInt('id');

				if ($view == 'marca' && $layout == 'edit' && !$this->checkEditId('com_vehiculo.edit.marca', $id))
				{
					// Somehow the person just went to the form - we don't allow that.
					$this->setError(JText::sprintf('JLIB_APPLICATION_ERROR_UNHELD_ID', $id));
					$this->setMessage($this->getError(), 'error');
					$this->setRedirect(JRoute::_('index.php?option=com_vehiculo&view=marcas', false));

					return false;
				}
				
           
                // configurar vista por defecto si no está configurada
                $input = JFactory::getApplication()->input;
              
                               
                $input->set('view', $input->getCmd('view', 'marcas'));
					
				               	
                // llamar comportamiento padre
                return parent::display();
                
                
        }
        
}
