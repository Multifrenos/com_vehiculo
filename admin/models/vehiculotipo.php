<?php
// No permitir acceso directo al archivo
defined('_JEXEC') or die;
 

 
/**
 *Modelo Vehiculo Marca
 */
class VehiculoModelVehiculotipo extends JModelAdmin
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
        public function getTable($type = 'Vehiculotipo', $prefix = 'VehiculoTable', $config = array()) 
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
                $form = $this->loadForm('com_vehiculo.vehiculotipo', 'vehiculotipo',
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
                $data = JFactory::getApplication()->getUserState('com_vehiculo.edit.vehiculotipo.data', array());
                if (empty($data)) 
                {
                        $data = $this->getItem();
                }
                return $data;
        }
}
