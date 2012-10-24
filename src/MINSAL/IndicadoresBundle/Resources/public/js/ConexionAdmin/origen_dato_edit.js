$(document).ready(function(){   
    //Borrar el botón para agregar y crear otro
    $('input[name$="btn_create_and_create"]').remove();
     
    //Si existe la capa configurar, cargar los datos    
    if ($('#configurar').length){
        $('#configurar').append('<table border=1 align=center id="datos" ></table>')
        $.getJSON(Routing.generate('origen_dato_leer',{
            id: $('#configurar').attr('data')
        }), 
        function(resp){          
            //Construir los options de tipo_dato
            var tipos_datos = '';
            $.each(resp.tipos_datos, function(indice, fila){
                tipos_datos = tipos_datos +"<OPTION VALUE='"+fila.id+"'>"+fila.descripcion+"</OPTION>";
            });
            
            // Construir las opciones de significado de datos
            var significado_datos = '';
            $.each(resp.significados, function(indice, fila){
                significado_datos = significado_datos +"<OPTION VALUE='"+fila.id+"'>"+fila.descripcion+"</OPTION>";
            });
            if (resp.datos.length > 0){
                // Los encabezados de la fila
                $('#datos').append("<TR id='fila_enc'></TR>");
                $.each(resp.nombre_campos, function(nombre, valor){                    
                    if (resp.tipo_origen=='archivo')
                        nombre_columna = valor;
                    else
                        nombre_columna = nombre;
                    tipos = "<SELECT id='"+nombre_columna+"_tipo' title='Elija el tipo de dato' >"+tipos_datos+"</SELECT>";
                    significados = "<SELECT id='"+nombre_columna+"_significado' title='Elija el significado del dato' >"+significado_datos+"</SELECT>";
                    $('#fila_enc').append("<TH>"+nombre_columna+'<BR>'+tipos+significados+"</TH>");
                })
            
                //Los datos
                $.each(resp.datos, function(indice,fila){
                    $('#datos').append("<TR id='fila"+indice+"'></TR>");
                    $.each(fila, function(i, campo){
                        $('#fila'+indice).append("<TD>"+campo+"</TD>");
                    })
                })
            }
            
            
        });        
    }
     
});

