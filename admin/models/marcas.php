<?php
// No permitir el acceso directo al archivo
defined('_JEXEC') or die;
// Importar biblioteca modellist de Joomla
//~ jimport('joomla.application.component.modellist');
/**
 * VehiculoList Model
 */
class VehiculoModelMarcas extends JModelList
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
                // Seleccione algunos campos
                $query->select('id,nombre,imagen');
                $query->from('#__vehiculo_marcas');
                return $query;
        }
        
        
        
}
