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
				'id', 'v.id',
                                'nombre', 'v.nombre',
				'marca', 'ma.nombre',
                                'modelo', 'mo.nombre',
                                
			);
		}

		parent::__construct($config);
	}        
        
        /**
         * Create the query for list items
         *
         * @return      string  SQL Query
         */
        protected function getListQuery()
        {
                // Build the query
                $db = JFactory::getDBO();
                $query = $db->getQuery(true)
                        ->select('v.*')
                        ->select ('mo.nombre as modelo, ma.nombre as marca, ti.nombre as tipo, co.nombre as combustible')
                        ->from('#__vehiculo_versiones as v')
                        ->join('left', '#__vehiculo_modelos as mo ON (v.idModelo = mo.id)')
                        ->join('left', '#__vehiculo_marcas as ma ON (mo.idMarca = ma.id)')
                        ->join('left', '#__vehiculo_tipos as ti ON (v.idTipo = ti.id)')
                        ->join('left', '#__vehiculo_combustibles as co ON (v.idCombustible = co.id)');
                

		// Filter by search in title
		$search = $this->getState('filter.search');
		if (!empty($search))
		{
			if (stripos($search, 'id:') === 0)
			{
                                // Search id:1234
				$query->where('v.id = ' . (int) substr($search, 3));
			}
			else
			{
                                // Search %abcd%
				$search = $db->quote('%' . str_replace(' ', '%', $db->escape(trim($search), true) . '%'));
				$query->where('(v.nombre LIKE ' . $search . ')');
			}
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
                
                // Add the list ordering clause.                
                $listOrder = $this->getState('list.ordering', 'v.id');                
		$listDirn = $db->escape($this->getState('list.direction', 'DESC'));                                                
                $query->order($db->escape($listOrder) . ' ' . $listDirn);                
                
                return $query;
        }                       
        
}
