<?php
// No permitir el acceso directo al archivo
defined('_JEXEC') or die;
// Importar biblioteca modellist de Joomla
//~ jimport('joomla.application.component.modellist');
/**
 * VehiculoList Model
 */
class VehiculoModelImportar extends JModelList
{
        public function getTable($type = 'Version', $prefix = 'VehiculoTable', $config = array()) 
        {
                return JTable::getInstance($type, $prefix, $config);
        }
       
        /**
         * M�todo para crear una consulta SQL para cargar los datos de la lista.
         *
         * @return      string  Una consulta SQL
         */
        //~ protected function getListQuery()
        public function getTablas()

        {
				// @ Objetivo es obtener las tablas que necesitamos en vehiculos,
				// para indicar campos necesita para importar.
				$resultado = array();
				$db = JFactory::getDBO();
				// Obtenemos el nombre del Base Datos...
				$config = JFactory::getConfig();
				// Obtenemos el listado de tablas de la BD
				$listatablas = $db->getTableList();
				$resultado['Prefijo'] = $config->get('dbprefix');
				$i= 0;
				$buscar =$resultado['Prefijo'].'vehiculo_';
				//~ $buscar ='vehiculo_';
				foreach ($listatablas as $nombretabla){
					$posicion= strpos($nombretabla, $buscar);
					$len = strlen($buscar);
					if ( $posicion === 0){
						$resultado['tablas'][]['nombre_tabla']=substr($nombretabla,-($posicion-$len));
						$i ++;
					}
				}
				$resultado['Num_tablas'] = $i;
				//~ $resultado['ListaTablas'] =$listatablas;
				
				return $resultado;
        }
        
        
        
}
