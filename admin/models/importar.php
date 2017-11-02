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
				$resultado['NombreBaseDatos'] = $config->get('db');

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
		public function insertar($ids){
			//$id es un array con los id de las tablas seleccionadas
			$db = JFactory::getDBO();

			$ObtenerTablas = $this->getTablas();
			$Nom_BD = $resultado['NombreBaseDatos'];
			$prefijo = $ObtenerTablas['Prefijo'];
			$tablas = $ObtenerTablas['tablas'];
			foreach($tablas as $i =>$tabla){ 
				foreach ($ids as $id){
					

					if ( $i === $id){
						// Primero eliminamos por si tiene datos.
						// lo ideal sería poder tener un parametro ( opciones  de esta vista ) donde se le indique si se hace o no
						// ahora de momento lo hago siempre.
						// Aunque realmente lo antes debería cambiar el sistema , ya que nadie tendra acceso a la BD Vehiculos.
						$sql = 'DELETE FROM .'.$prefijo.'vehiculo_'.$tabla['nombre_tabla'];
						$db->setQuery($sql);
						$db->execute();
						$sql = '';
						switch ($tabla['nombre_tabla']) {
							case 'marcas':
								$sql = 'INSERT INTO '.$Nom_BD.' '.$prefijo.'vehiculo_'.$tabla['nombre_tabla'].' (`id`, `nombre`, `logo`) SELECT `id`, `nombre`, `imagen` FROM vehiculos.`vehiculo_marcas`';
								break;
							case 'modelos':
								$sql= 'INSERT INTO '.$Nom_BD.' '.$prefijo.'vehiculo_'.$tabla['nombre_tabla'].' (`id`, `idMarca`, `nombre`) SELECT `id`, `idMarca`, `nombre` FROM vehiculos.`vehiculo_modelos`';
								break;
							
							case 'versiones':
								$sql= 'INSERT INTO '.$Nom_BD.' '.$prefijo.'vehiculo_'.$tabla['nombre_tabla'].' (`id`, `idMarca`, `idModelo`, `nombre`, `idTipo`, `idCombustible`, `fecha_inicial`, `fecha_final`, `kw`, `cv`, `cm3`, `ncilindros`) SELECT `id`, `idMarca`, `idModelo`, `nombre`, `idTipo`, `idCombustible`, `fecha_inicial`, `fecha_final`, `kw`, `cv`, `cm3`, `ncilindros` FROM vehiculos.`vehiculo_versiones`';
								break;
							
							case 'cruces_virtuemart':
								$sql = 'INSERT INTO '.$Nom_BD.' '.$prefijo.'vehiculo_'.$tabla['nombre_tabla'].' ( `recambio_id`, `version_vehiculo_id`, `virtuemart_product_id`, `fecha_actualizacion`) SELECT  `RecambioID`, `VersionVehiculoID`, `idVirtuemart`, `FechaActualiza` FROM recambios.`cruces_vehiculos` WHERE idVirtuemart > 0';
								break;
							// De momento no pongo ni combustibles , ni tipo vehiculos ya que no tiene sentido 
							// y ademas ya los inserto en la instalación.
							default :
								return true;
						}
						
						$db->setQuery($sql);
						$db->execute();
						error_log ('tabla:'.$sql);
					}
				}
			}
			//~ print_r($this);
			
			return true;
			
		}

        
        
}
