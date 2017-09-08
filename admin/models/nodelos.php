<?php
// No permitir el acceso directo al archivo
defined('_JEXEC') or die('Restricted access');
// Importar biblioteca modellist de Joomla
jimport('joomla.application.component.modellist');
/**
 * NodeloList Model
 */
class VehiculoModelNodelos extends JModelList
{
        /**
         * Método para crear una consulta SQL para cargar los datos de la lista.
         *
         * @return      string  Una consulta SQL
         */
        protected function getListQuery()
        {
                // Cree un objeto de consulta nueva.           
                $db = JFactory::getDBO();
                $query = $db->getQuery(true);
                // Seleccione algunos campos
                $query->select('id,idMarca,nombre');
                $query->from('#__vehiculo_modelos');
                return $query;
        }
}
