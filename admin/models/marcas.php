<?php
// No permitir el acceso directo al archivo
defined('_JEXEC') or die;
// Importar biblioteca modellist de Joomla
//~ jimport('joomla.application.component.modellist');
/**
 * VehiculoList Model
 */
class VehiculoModelMarcas extends JModelList
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
						'modelo', 'mo.nombre',
						'marca', 'ma.nombre',
					   
									
				);
			}

			parent::__construct($config);
		}       
			
			
       
        /**
         * M�todo para crear una consulta SQL para cargar los datos de la lista.
         *
         * @return      string  Una consulta SQL
         */
        protected function getListQuery()
        {
                // Cree un objeto de consulta nueva.           
                $db = JFactory::getDBO();
                $query = $db->getQuery(true)
						->select('ma.*')
						->from('#__vehiculo_marcas as ma');
				// Filter by search in title
			$search = $this->getState('filter.search');
			if (!empty($search))
			{
				if (stripos($search, 'id:') === 0)
				{
									// Search id:1234
					$query->where('ma.id = ' . (int) substr($search, 3));
				}
				else
				{
									// Search %abcd%
					$search = $db->quote('%' . str_replace(' ', '%', $db->escape(trim($search), true) . '%'));
					$query->where('(ma.nombre LIKE ' . $search . ')');
				}
			}                    

			 // Add the list ordering clause.                
                $listOrder = $this->getState('list.ordering', 'ma.id');                
				$listDirn = $db->escape($this->getState('list.direction', 'DESC'));                                                
                $query->order($db->escape($listOrder) . ' ' . $listDirn);  			
				// Imprimir consulta		
				//~ print_r($query->__toString());	
				return $query;
        }
        
        
        
}
