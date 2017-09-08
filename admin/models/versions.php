<?php
// No permitir el acceso directo al archivo
defined('_JEXEC') or die('Restricted access');
// Importar biblioteca modellist de Joomla
jimport('joomla.application.component.modellist');
/**
 * Clase Versiones Vehiculo
 */
class VehiculoModelVersions extends JModelList
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
                $query->select('id,idMarca, idModelo, nombre, idTipo, idCombustible, fecha_inicial, fecha_final, kw,cv, cm3,ncilindros');
                $query->from('#__vehiculo_versiones');
                return $query;
        }
}
