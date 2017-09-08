<?php
// No permitir acceso directo al archivo
defined('_JEXEC') or die('Restricted access');
 
// importar librería de controladores de Joomla!
jimport('joomla.application.component.controlleradmin');
 
/**
 *Controlador Versions
 */
class VehiculoControllerVersions extends JControllerAdmin
{
        /**
         * Proxy para getModel.
         * @desde       2.5
         */
        public function getModel($name = 'Version', $prefix = 'VehiculoModel') 
        {
            $model = parent::getModel($name, $prefix, array('ignore_request' => true));
            return $model;
        }
        
        
}
