<?php
// No permitir acceso directo al archivo
defined('_JEXEC') or die;
 

 
/**
 *Modelo Vehiculo Marca
 */
class VehiculoModelVirtuemartcruce extends JModelAdmin
{
        /**
         * Devuelve una referencia al objeto Table,.
         *
         * @param       type    Tipo de tabla a instanciar
         * @param       string  Prefijo para el nombre de clase de tabla. Opcional.
         * @param       array  Array de configuración para el modelo. Opcional.
         * @return      JTable  Objeto de base de datos
         * @since       2.5
         */
        public function getTable($type = 'Virtuemartcruce', $prefix = 'VehiculoTable', $config = array()) 
        {
                return JTable::getInstance($type, $prefix, $config);
        }
        /**
         * Método para conseguir el formulario.
         *
         * @param      array   $data           Datos para el formulario.
         * @param      boolean $loadData   Verdadero si el formulario va a cargar sus propios datos (por defecto), falso si no.
         * @return      mixed                      Un objeto JForm object si funciona, false si falla
         * @since       2.5
         */
        public function getForm($data = array(), $loadData = true) 
        {
                // Get the form.
                $form = $this->loadForm('com_vehiculo.virtuemartcruce', 'virtuemartcruce',
                                        array('control' => 'jform', 'load_data' => $loadData));
                if (empty($form)) 
                {
                        return false;
                }
                return $form;
        }
        /**
         * Método para obtener datos que deber�an ser inyectados al formulario.
         *
         * @return      mixed   Datos para el formulario.
         * @since       2.5
         */
        protected function loadFormData() 
        {
                // Comprueba la sesi�n para comprobar datos introducidos previamente.
                $data = JFactory::getApplication()->getUserState('com_vehiculo.edit.virtuemartcruce.data', array());
                if (empty($data)) 
                {
                        $data = $this->getItem();
                }
                return $data;
        }
        
        
	/**
	 * Method to get a single record.
	 *
	 * @param   integer  $pk  The id of the primary key.
	 *
	 * @return  \JObject|boolean  Object on success, false on failure.
	 *
	 * @since   1.6
	 */
	public function getItem($pk = null)
	{
                $item = parent::getItem ($pk);
                
                // Get the idMarca and idModelo from foreig table
                if (empty ($item->idMarca) || empty ($item->idModelo)) {
                        $db = JFactory::getDbo ();
                        $query = $db->getQuery (true);
                        $query->select ('idMarca, idModelo')
                                ->from ('#__vehiculo_versiones')
                                ->where ('id = ' . (int) $item->version_vehiculo_id);
                        $db->setQuery ($query);
                        $foreignData = $db->loadObject ();

                        $item->idMarca = $foreignData->idMarca;
                        $item->idModelo = $foreignData->idModelo;
                }
                
                return $item;
        }        
        
        
	/**
	 * Method to save the form data.
	 *
	 * @param   array  $data  The form data.
	 *
	 * @return  boolean  True on success, False on error.
	 *
	 * @since   1.6
	 */
	public function save($data)
	{                
                $date = JFactory::getDate ();
                $data['fecha_actualizacion'] = $date->toSql ();
                return parent::save ($data);
        }         
        
        
}
