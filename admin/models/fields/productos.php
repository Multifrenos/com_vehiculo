<?php

/**
 * @version		$Id: helloworld.php 46 2010-11-21 17:27:33Z chdemko $
 * @package		Joomla16.Tutorials
 * @subpackage	Components
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @author		Christophe Demko
 * @link		http://joomlacode.org/gf/project/helloworld_1_6/
 * @license		License GNU General Public License version 2 or later
 */

// No direct access to this file
defined('_JEXEC') or die;

// import the list field type
//~ jimport('joomla.form.helper');

JFormHelper::loadFieldClass('list');

/**
 * Modelo Form Field class for the Vehiculo component
 */
class JFormFieldProductos extends JFormFieldList {	
	
        /**
         * Get the list of options filtered by Marca
         * @return type
         */
	protected function getOptions()       
                
		{                
		$db = JFactory::getDBO();
		$query = $db->getQuery(true)
                        ->select('virtuemart_product_id as value,CONCAT(virtuemart_product_id," ",product_name) as text')
                        ->from('#__virtuemart_products_es_es')
                        ->order ('TRIM(product_name) ASC');
		$db->setQuery($query);                
                
		try
		{
			$options = $db->loadObjectList();                             
		}
		catch (RuntimeException $e)
		{
			JError::raiseWarning(500, $e->getMessage);
		}                
                		
		return array_merge(parent::getOptions(), $options);
	}
	
}
