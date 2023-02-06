
 function datatableArchivo(id){
        var tabla = $(function datatableArchivo() {    
            $('#'+id).DataTable({
                paging: true,
                ordering:true,
                searching: true,
                entries:true,
                // dom: 'Bfrtip',
                // buttons: [
                //     'print'
                // ],
                "order": [[ 0, "desc" ]],
                "language":{
                    "info":"_TOTAL_ registros",
                    "search": "Buscar",
                    "paginate":{
                        "next":"siguiente",
                        "previous":"Anterior",
                    },
                    "lengthMenu" : 'Mostrar <select>'+
                                '<option value="10">10</option>'+
                                '<option value="30">30</option>'+
                                '<option value="-1">Todos</option>'+
                                '</select> Registros',
                    "loadingRecords":"Cargando...",
                    "processing":"Procesando...",
                    "emptyTable":"No hay datos...",
                    "zeroRecords": "No hay coincidencias",
                    "infoEmpty": "",
                    "infoFiltered": ""
                },
                    "bDestroy": true
            });
        });
    }



    function formatearRut(e) {    //genera formato de rut mascara numerica
            var id=e;
            //console.log(id);
            var rutinicial = $("#"+id).val();
            var actual = rutinicial.replace(/^0+/, "");
            if (actual != '' && actual.length > 1) {
                var sinPuntos = actual.replace(/\./g, "");
                var actualLimpio = sinPuntos.replace(/-/g, "");
                var inicio = actualLimpio.substring(0, actualLimpio.length - 1);
                var rutPuntos = "";
                var i = 0;
                var j = 1;
                for (i = inicio.length - 1; i >= 0; i--) {
                    var letra = inicio.charAt(i);
                    rutPuntos = letra + rutPuntos;
                    if (j % 3 == 0 && j <= inicio.length - 1) {
                        rutPuntos = "." + rutPuntos;
                    }          
                    j++;
                }
                var dv = actualLimpio.substring(actualLimpio.length - 1);
                rutPuntos = rutPuntos + "-" + dv;
                $("#"+id).val(rutPuntos);
            }
        }