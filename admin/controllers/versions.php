<?php
// No permitir acceso directo al archivo
defined('_JEXEC') or die('Restricted access');
 
// importar biblioteca de controladores de Joomla!
jimport('joomla.application.component.controlleradmin');
 
/**
 * Controlador Versions
 */
class VehiculoControllerVersions extends JControllerAdmin
{
        /**
         * Proxy para getModel.
         * @desde       2.5
         */
        public function getModel($name = 'Version', $prefix = 'VehiculoModel', $config = array()) 
        {
            $model = parent::getModel($name, $prefix, array('ignore_request' => true));
            return $model;
        }
        
        /**
         * Get the list of "Nodelos" filtered by marca
         */
        public function options () {
                
                $app            = JFactory::getApplication ();
                $db             = JFactory::getDbo ();
                $options        = array();
                $idModelo        = $app->input->get('parent_id');
                
                $query = $db->getQuery (true)
                        ->select ('id as value, nombre as text')
                        ->from ('#__vehiculo_versiones')
                        ->where ('idModelo = ' . (int) $idModelo)
                        ->order ('nombre ASC');
                
		$db->setQuery($query);                
                
		try
		{
			$options = $db->loadObjectList();                             
		}
		catch (RuntimeException $e)
		{
			JError::raiseWarning(500, $e->getMessage);
		}                 
                
                // Send JSon encoded data
                echo json_encode($options);                               
                $app->close ();
        }        
        
}
