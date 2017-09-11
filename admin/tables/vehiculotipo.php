<?php
// No permitir el acceso directo al archivo
defined('_JEXEC') or die;

// Importar la librería table de Joomla
//~ jimport('joomla.database.table');

/**
 * Clase Vehiculo Table Marca
 */
class VehiculoTableVehiculotipo extends JTable
{
        /**
         * Constructor
         *
         * @param object Database connector object
         */
        function __construct(&$db) 
        {
                parent::__construct('#__vehiculo_tipos', 'id', $db);
        }
}
