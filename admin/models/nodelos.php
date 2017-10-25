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
				'id', 'mo.id',
                   	'marca', 'ma.nombre',
                   'modelo', 'mo.nombre',
                                
			);
		}

		parent::__construct($config);
	}       
        
        
        
        /**
         * Método para crear una consulta SQL para cargar los datos de la lista.
         *
         * @return      string  Una consulta SQL
         */
        protected function getListQuery()
        {
                  // Build the query
                $db = JFactory::getDBO();
                $query = $db->getQuery(true)
                        ->select('mo.*')
                        ->select ('ma.nombre as marca')
                        ->from('#__vehiculo_modelos as mo')
                        ->join('left', '#__vehiculo_marcas as ma ON (mo.idMarca = ma.id)')
                

		// Filter by search in title
		$search = $this->getState('filter.search');
		if (!empty($search))
		{
			if (stripos($search, 'id:') === 0)
			{
                                // Search id:1234
				$query->where('mo.id = ' . (int) substr($search, 3));
			}
			else
			{
                                // Search %abcd%
				$search = $db->quote('%' . str_replace(' ', '%', $db->escape(trim($search), true) . '%'));
				$query->where('(mo.nombre LIKE ' . $search . ')');
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
                $listOrder = $this->getState('list.ordering', 'mo.id');                
				$listDirn = $db->escape($this->getState('list.direction', 'DESC'));                                                
                $query->order($db->escape($listOrder) . ' ' . $listDirn);                
                
                return $query;
               
              
                //~ // Cree un objeto de consulta nueva.           
                //~ $db = JFactory::getDBO();
                //~ $query = $db->getQuery(true);
                //~ // Seleccione algunos campos
                //~ $query->select('id,idMarca,nombre');
                //~ $query->from('#__vehiculo_modelos');
                //~ return $query;
        }
}
