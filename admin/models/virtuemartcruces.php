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
		 * Constructor.
		 *
		 * @param   array  An optional associative array of configuration settings.
		 * @see     JController
		 * @since   1.6
		 */
		public function __construct($config = array())
		{
			if (empty($config['filter_fields']))
			{
				$config['filter_fields'] = array(
					'id', 'cr.id',
									'nombre', 'cr.nombre',
					'modelo', 'mo.nombre',
									'modelo', 'mo.nombre',
									
				);
			}
        	parent::__construct($config);
		}
        
        
        /**
         * M�todo para crear una consulta SQL para cargar los datos de la lista.
         *
         * @return      string  Una consulta SQL
         */
        //~ protected function getListQuery()
        //~ {
                //~ // Cree un objeto de consulta nueva.           
                //~ $db = JFactory::getDBO();
                //~ $query = $db->getQuery(true);
                //~ // Seleccione algunos campos pero TODOS EN UN STRING.
                //~ $query->select('id,version_vehiculo_id,virtuemart_product_id,fecha_actualizacion'); 
                //~ $query->from('#__vehiculo_cruces_virtuemart');
                //~ return $query;
                //~ 
        //~ }
        //~ 
         protected function getListQuery()
        {
                // Build the query
                $db = JFactory::getDBO();
                $query = $db->getQuery(true)
                        ->select('cr.*')
                        ->select ('virt.product_name,mo.nombre as modelo, ma.nombre as marca,v.nombre as version, co.nombre as combustible')
                        ->from('#__vehiculo_cruces_virtuemart as cr')
						->join('left', '#__virtuemart_products_es_es as virt ON (virt.virtuemart_product_id = cr.virtuemart_product_id)')
						->join('left', '#__vehiculo_versiones as v ON (v.id = cr.version_vehiculo_id)')
                        ->join('left', '#__vehiculo_modelos as mo ON (v.idModelo = mo.id)')
                        ->join('left', '#__vehiculo_marcas as ma ON (mo.idMarca = ma.id)')
                        ->join('left', '#__vehiculo_combustibles as co ON (v.idCombustible = co.id)');
                

		// Filter by search in title
		$search = $this->getState('filter.search');
		if (!empty($search))
		{
			if (stripos($search, 'id:') === 0)
			{
                                // Search id:1234
				$query->where('cr.id = ' . (int) substr($search, 3));
			}
			else
			{
                                // Search %abcd%
				$search = $db->quote('%' . str_replace(' ', '%', $db->escape(trim($search), true) . '%'));
				$query->where('(virt.product_name LIKE ' . $search . ')');
			}
		}                    
				// Producto filter                
                $idProductos = $this->getState('filter.idProductos');
                if (is_numeric($idProductos)) {
                       $query->where('cr.virtuemart_product_id = ' . (int) $idProductos); 
                }
                
                // Marca filter                
                $idMarca = $this->getState('filter.idMarca');
                if (is_numeric($idMarca)) {
                       $query->where('ma.id = ' . (int) $idMarca); 
                }                
                
                // Modelo filter                
                $idModelo = $this->getState('filter.idModelo');
                if (is_numeric($idModelo)) {
                       $query->where('mo.id = ' . (int) $idModelo); 
                }        
                 // Modelo filter                
                $idVersion = $this->getState('filter.idVersion');
                if (is_numeric($idVersion)) {
                       $query->where('v.id = ' . (int) $idVersion); 
                }                          
                
                // Add the list ordering clause.                
                $listOrder = $this->getState('list.ordering', 'cr.id');                
				$listDirn = $db->escape($this->getState('list.direction', 'DESC'));                                                
                $query->order($db->escape($listOrder) . ' ' . $listDirn);                
                
                return $query;
        }                       
        
}
        

