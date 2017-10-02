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
                // Cree un objeto de consulta nueva.           
				$resultado = array();
				$db = JFactory::getDBO();
				$query = "SHOW TABLES FROM JCcoches";
				$db->setQuery($query);
				$db->query();
				//~ $num_rows = $db->getNumRows();
				//~ print_r($num_rows);
				$result = $db->loadRowList();
				$i= 0;
				$buscar = 'vehiculo_';
				foreach ($result as $nombretabla){
					if (strpos($nombretabla[0], $buscar)){
						$resultado['tablas'][]= $nombretabla[0];
						$i ++;
					}
				}
				
				
				
				
				//~ $result = $db->loadAssocList();
				//~ echo '<pre>';
				//~ print_r($db);
				//~ echo '</pre>';
				$resultado['Num_tablas'] = $i;
				$resultado['Prefijo'] = $prefix;
				return $resultado;
        }
        
        
        
}
