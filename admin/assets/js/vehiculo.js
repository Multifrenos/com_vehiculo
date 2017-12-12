// Only define the Gesbuque namespace if not defined.
Vehiculo = window.Vehiculo || {};

(function( Vehiculo, document ) {
    "use strict";
    
    var jq = null;
    
    /**
     * Fill a select getting options from ajax request
     * @param sourceSelect The id of the select to get the id of the foreign key in destinationSelect
     * @param destinationSelect The id of the select to fill
     * @param viewName The name of the view/controller for make the request
     * @returns {undefined}
     */
    Vehiculo.updateSelect = function (sourceSelect, destinationSelect, viewName) {

        Vehiculo.jq = jQuery.noConflict();
        
        var data = null;
        var parentId = Vehiculo.jq(sourceSelect).val();
        var url = 'index.php?option=com_vehiculo&task=' + viewName + '.options&parent_id=' + parentId;
        
        // Ajax request
        Vehiculo.jq.ajax({
            dataType: "json",
            url: url,
            data: data,
            success: function (rows) {    
                // Clear all options with value != 0
                Vehiculo.jq("#" + destinationSelect + " option[value!='']").remove(); 
                                                                
                // Add received options to the original select
                Vehiculo.jq(rows).each (function (idx) {
                    var row = rows[idx];
                    var opt = document.createElement('option');
                    opt.value = row.value;
                    opt.innerHTML = row.text;
                    document.getElementById (destinationSelect).appendChild(opt);
                });
                
                // Refresh the chosen object
                Vehiculo.jq('#' + destinationSelect).trigger("liszt:updated"); 
                
                // Notify user
                var notifyContainerId = destinationSelect + '_notify';
                if (! document.getElementById(notifyContainerId)) {
                    // Creating notify container if not exists
                    var nContainer = document.createElement('div');
                    nContainer.id = notifyContainerId;                    
                    nContainer.style.display = 'inline'; 
                    nContainer.style.margin = '0px 0px 0px 15px'; 
                    Vehiculo.jq("#" + destinationSelect + '_chzn').after (nContainer);
                }
                
                // Updating notify text
                var notifyText = (rows.length) ? 'Añadidos ' + rows.length + ' elementos' : 'Sin elementos';
                document.getElementById(notifyContainerId).innerHTML = notifyText;    
                
                // Display notify only for small interval
                Vehiculo.jq('#' + notifyContainerId).show().delay(2000).fadeOut();
            }
        });                 
        
        return true;
        
    };              

}( Vehiculo, document ));

