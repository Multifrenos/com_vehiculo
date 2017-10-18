<?php
// No permitir el acceso directo al archivo
defined('_JEXEC') or die;
// Importar biblioteca modellist de Joomla
//~ jimport('joomla.application.component.modellist');
/**
 * Modelo Vehiculo de Virtuemartcruces
 */
class VehiculoModelVirtuemartcruces extends JModelList
{
        
       
        /**
         * M�todo para crear una consulta SQL para cargar los datos de la lista.
         *
         * @return      string  Una consulta SQL
         */
        protected function getListQuery()
        {
                // Cree un objeto de consulta nueva.           
                $db = JFactory::getDBO();
                $query = $db->getQuery(true);
                // Seleccione algunos campos pero TODOS EN UN STRING.
                $query->select('id,version_vehiculo_id,virtuemart_product_id,fecha_actualizacion'); 
                $query->from('#__vehiculo_cruces_virtuemart');
                return $query;
                
        }
        
        
        
}
