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
class JFormFieldModelo extends JFormFieldList {	
	
        /**
         * Get the list of options filtered by Marca
         * @return type
         */
	protected function getOptions()  {     
                
		$db             = JFactory::getDBO();                                
                $idMarca        = $this->form->getField ('idMarca')->value; // Get marca from edit form
                $options        = array ();                
                
                // Get Marca from filter form
                if (empty($idMarca)) {                        
                        $idMarca = $this->form->getField ('idMarca', 'filter')->value;
                }                
                
                // Get the Marca associated to the selected model  
                if (! empty ($idMarca)) {
                                                      
                        $query = $db->getQuery(true)
                                ->select('id as value, nombre as text')
                                ->from('#__vehiculo_modelos')
                                ->where ('idMarca = ' . (int) $idMarca);

                        $db->setQuery($query);                

                        try {
                                $options = $db->loadObjectList();                             
                        } catch (RuntimeException $e) {
                                JError::raiseWarning(500, $e->getMessage);
                        }              
                }
                		
		return array_merge(parent::getOptions(), $options);
	}
}
