<?php
// No permitir acceso directo al archivo
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.formvalidator');
JHtml::_('behavior.keepalive');
JHtml::script(JUri::base().'components/com_vehiculo/roe.js'); // Para llamar a la funcion change
JFactory::getDocument()->addScriptDeclaration("
		Joomla.submitbutton = function(task)
		{
			if (task == 'version.cancel' || document.formvalidator.isValid(document.getElementById('version-form')))
			{
				Joomla.submitform(task, document.getElementById('version-form'));
			}
		};
");
?>
<form action="<?php echo JRoute::_('index.php?option=com_vehiculo&layout=edit&id='.(int) $this->item->id); ?>"
      method="post" name="adminForm" id="version-form">
        <fieldset class="adminform">
                <legend><?php echo JText::_( 'Detalles de la version' ); ?></legend>
                <ul class="adminformlist">
<?php 
    $cont=0;
    foreach($this->form->getFieldset() as $field):
        
        
        if($cont==1||$cont==2)
        {
            if($cont==1)
            {
                if(isset( $_REQUEST[idmarca]))
                    $idmarca=$_REQUEST[idmarca];
                else
                {
                    $elementoo=$field->input;
                    $idmarca=substr($elementoo, (strpos($elementoo,"value")+7),strpos(substr($elementoo, (strpos($elementoo,"value")+7)),"\""));
                    if($idmarca=="")
                        $idmarca=1;
                }
                //Seleccionar una marca
                echo "<li><label id='jform_idMarca-lbl' for='jform_idMarca' class='hasTip' title='Selecciona una marca::COM_VEHICULO_VERSION_IDMARCA_DESC'>Selecciona una marca</label>";
                 $basedatos = JFactory::getDBO();
                    $consulta = $basedatos->getQuery(true);
                    $consulta->select('id,nombre,imagen');
                    $consulta->from('#__vehiculo_marcas');

                    $basedatos->setQuery((string)$consulta);
                    $resultado = $basedatos->loadObjectList();

                 echo "<select id='jform_idMarca' name='jform[idMarca]' onchange='actualizaFormVersion(this.form)'>";
                 if ($resultado)
                    {
                            foreach($resultado as $fila) 
                            {
                                echo "<option ";
                                if ($idmarca == $fila->id)
                                    echo 'selected ';
                                echo "value='$fila->id'>$fila->nombre</option>";
                            }
                    }
                 echo"      </select></li>";
        
            }
            if($cont==2)
            {
                $elementoo=$field->input;
                $idmodelo=substr($elementoo, (strpos($elementoo,"value")+7),strpos(substr($elementoo, (strpos($elementoo,"value")+7)),"\""));
                
                // Seleccionar un modelo
                echo "<li><label id='jform_idModelo-lbl' for='jform_idModelo' class='hasTip' title='Selecciona un modelo::COM_VEHICULO_VERSION_IDMODELO_DESC'>Selecciona un modelo</label>";
                 $basedatos = JFactory::getDBO();
                    $consulta = $basedatos->getQuery(true);
                    $consulta->select('id,idMarca,nombre');
                    $consulta->from('#__vehiculo_modelos');
                    $consulta->where("idMarca=$idmarca");

                    $basedatos->setQuery((string)$consulta);
                    $resultado = $basedatos->loadObjectList();

                 echo "<select id='jform_idModelo' name='jform[idModelo]'>";
                 if ($resultado)
                    {
                            foreach($resultado as $fila) 
                            {
                                echo "<option ";
                                if ($idmodelo == $fila->id)
                                    echo 'selected ';
                                echo "value='$fila->id'>$fila->nombre</option>";
                            }
                    }
                 echo"      </select></li>";
            }
        }
        else
        {
            echo "<li>".$field->label;echo $field->input."</li>";
        }
        $cont=$cont+1;
        endforeach; ?>
                </ul>
        </fieldset>
        <div>
                <input type="hidden" name="task" value="version.edit" />
                <?php echo JHtml::_('form.token'); ?>
        </div>
</form>
