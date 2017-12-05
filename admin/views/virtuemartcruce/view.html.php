<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * View vehiculo tipo
 */
class VehiculoViewVirtuemartcruce extends JViewLegacy
{
	/**
	 * display method of Vehiculo
	 * @return void
	 */
	public function display($tpl = null) 
	{
		
		// get the Data
		$form = $this->get('Form');
		$item = $this->get('Item');
		//~ $marcarYmodelo = $this->get('MarcaModelo');
		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		$itemNuevo = $this->getMasDatos($item);
		//~ echo '<pre>';
		//~ print_r($itemNuevo);
		//~ echo '</pre>';
		// Assign the Data
		$this->form = $form;
		$this->item = $itemNuevo;

		// Set the toolbar
		$this->addToolBar();

		// Display the template
		parent::display($tpl);
	}

	/**
	 * Setting the toolbar
	 */
	protected function addToolBar() 
	{
		JRequest::setVar('hidemainmenu', true);
		$isNew = ($this->item->id == 0);
		JToolBarHelper::title($isNew ? JText::_('Nuevo Cruce con Virtuemart') : JText::_('Editar Cruce con Virtuemart'));
		JToolBarHelper::save('virtuemartcruce.save');
		JToolBarHelper::cancel('virtuemartcruce.cancel', $isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE');
	}
	
	public function getMasDatos($item){
			// Buscamos de vehiculo.
			 $db = JFactory::getDBO();
			 $id_version = $item->version_vehiculo_id;
                $query = $db->getQuery(true);
                //~ // Seleccione algunos campos
                $query = $db->getQuery(true)
                        ->select('v.id,ma.nombre as marca,mo.nombre as modelo,v.nombre,v.cm3,v.kw,v.ncilindros,v.cv,v.fecha_inicial,v.fecha_final')
                        ->from('#__vehiculo_versiones as v')
                        ->join('left', '#__vehiculo_modelos as mo ON (v.idModelo = mo.id)')
                        ->join('left', '#__vehiculo_marcas as ma ON (v.idMarca = ma.id)')
						->where('v.id = ' . $id_version);
						
				$db->setQuery($query);
				$result = $db->loadObjectList();
			// Añado datos de vehiculo a item.
			$item->def('vehiculo',$result[0]);
			// Buscamos datos de producto.
			$db = JFactory::getDBO();
			 $id_producto = $item->virtuemart_product_id;
                $query = $db->getQuery(true);
                //~ // Seleccione algunos campos
                $query = $db->getQuery(true)
                        ->select('c.virtuemart_product_id as idVirtuemart,CAST( c.product_sku as CHAR(18))as product_sku,cr.product_name as articulo_name,d.product_price, c.created_on as fecha_creado, c.modified_on')
                        ->from('#__virtuemart_products as c')
                        ->join('LEFT','#__virtuemart_products_es_es as cr ON (c.virtuemart_product_id = cr.virtuemart_product_id)')
                        ->join('left', '#__virtuemart_product_prices as d on (c.virtuemart_product_id = d.virtuemart_product_id) ')
						->where('c.virtuemart_product_id = ' . $id_producto);
						
				$db->setQuery($query);
				$result = $db->loadObjectList();		
				// Añado datos de vehiculo a item.
				$item->def('producto',$result[0]);
			
			return $item;
		
		}
}
