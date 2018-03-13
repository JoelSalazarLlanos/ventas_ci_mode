        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.0
            </div>
            <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/template/jquery/jquery.min.js"></script>

<!--highcharts-->
<script src="<?php echo base_url();?>assets/template/highcharts/highcharts.js"></script>
<script src="<?php echo base_url();?>assets/template/highcharts/exporting.js"></script>



<script src="<?php echo base_url();?>assets/template/jquery-print/jquery.print.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/template/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/template/jquery-ui/jquery-ui.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>assets/template/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/template/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- DataTables Export -->
<script src="<?php echo base_url();?>assets/template/datatables-export/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/jszip.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/pdfmake.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/vfs_fonts.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.print.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/template/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/template/dist/js/demo.js"></script>



<script>

//cosas que se cargan al inicia el programda
$(document).ready(function () {

    var base_url= "<?php echo base_url();?>";

    var year = (new Date).getFullYear();
    datagrafico(base_url, year);

    $("#year").on("change",function(){
        yearselect = $(this).val();
        datagrafico(base_url, yearselect);
    });



    $(".btn-remove").on("click", function(e){
        e.preventDefault();
        var ruta = $(this).attr("href");
        //alert(ruta);
        $.ajax({
            url: ruta,
            type:"POST",
            success:function(resp){
                //http://localhost/ventas_ci/mantenimiento/productos
                window.location.href = base_url + resp;
            }
        });
    });


    $(".btn-view-producto").on("click", function(){
        var producto = $(this).val();
        //alert(cliente);
        var infoproducto = producto.split("*");
        html = "<p><strong>Codigo:</strong>"+infoproducto[1]+"</p>"
        html += "<p><strong>Nombre:</strong>"+infoproducto[2]+"</p>"
        html += "<p><strong>Descripcion:</strong>"+infoproducto[3]+"</p>"
        html += "<p><strong>Precio:</strong>"+infoproducto[4]+"</p>"
        html += "<p><strong>Stock:</strong>"+infoproducto[5]+"</p>"
        html += "<p><strong>Categoria:</strong>"+infoproducto[6]+"</p>";
        $("#modal-default .modal-body").html(html);
    });

    $(".btn-view_usuario").on("click", function(){
        var id = $(this).val();
        $.ajax({
            url: base_url +"administrador/usuarios/view/" + id,
            type:"POST",
            success:function(resp){
                $("#modal-default .modal-body").html(resp);
                //alert(resp);
            }

        });

    });


    $(".btn-view").on("click", function(){
        var id = $(this).val();
        $.ajax({
            url: base_url + "mantenimiento/categorias/view/" + id,
            type:"POST",
            success:function(resp){
                $("#modal-default .modal-body").html(resp);
                //alert(resp);
            }

        });

    });



    $(".btn-view-cliente").on("click", function(){
        var cliente = $(this).val();
        //alert(cliente);
        var infocliente = cliente.split("*");
        html = "<p><strong>Nombre:</strong>"+infocliente[1]+"</p>"
        html += "<p><strong>Tipo de Cliente:</strong>"+infocliente[2]+"</p>"
        html += "<p><strong>Tipo de Documento:</strong>"+infocliente[3]+"</p>"
        html += "<p><strong>Numero  de Documento:</strong>"+infocliente[4]+"</p>"
        html += "<p><strong>Telefono:</strong>"+infocliente[5]+"</p>"
        html += "<p><strong>Direccion:</strong>"+infocliente[6]+"</p>"
        $("#modal-default .modal-body").html(html);
    });

    $(".btn-view").on("click", function(){
        var id = $(this).val();
        $.ajax({
            url: base_url + "mantenimiento/categorias/view/" + id,
            type:"POST",
            success:function(resp){
                $("#modal-default .modal-body").html(resp);
                //alert(resp);
            }

        });

    });


    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
          {
            extend: 'excelHtml5',
            title: "Listado de ventas",
            exportOption: {
              columns: [0,1,2,3,4,5],
            }
        },
        {
          extend: 'pdfHtml5',
          title: "Listado de ventas",
          exportOption: {
            columns: [0,1,2,3,4,5],
          }
        }

      ]
} );



	$('#example1').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });

	   $('.sidebar-menu').tree();

    $("#comprobantes").on("change",function(){
        option = $(this).val();

        if (option != "") {
            infocomprobante = option.split("*");

            $("#idcomprobante").val(infocomprobante[0]);
            $("#igv").val(infocomprobante[2]);
            $("#serie").val(infocomprobante[3]);
            $("#numero").val(generarnumero(infocomprobante[1]));
        }
        else{
            $("#idcomprobante").val(null);
            $("#igv").val(null);
            $("#serie").val(null);
            $("#numero").val(null);
        }
        sumar();
    })

    $(document).on("click",".btn-check",function(){
        cliente = $(this).val();
        infocliente = cliente.split("*");
        $("#idcliente").val(infocliente[0]);
        $("#cliente").val(infocliente[1]);
        $("#modal-default").modal("hide");
    });
    $("#producto").autocomplete({
        source:function(request, response){
            $.ajax({
                url: base_url+"movimientos/ventas/getproductos",
                type: "POST",
                dataType:"json",
                data:{ valor: request.term},
                success:function(data){
                    response(data);
                }
            });
        },
        minLength:2,
        select:function(event, ui){
            data = ui.item.id + "*"+ ui.item.codigo+ "*"+ ui.item.label+ "*"+ ui.item.precio+ "*"+ ui.item.stock;
            $("#btn-agregar").val(data);
        },
    });
    $("#btn-agregar").on("click",function(){
      //RECUPERAMOS EL VALOR DEL PRODUCTO QUE SE ESTA AGREGANDO
        data = $(this).val();
      //SI EL DATA ES DIFERENTE A VACIO
        if (data !='') {
          //SEPARAMOS EL STRING CON LA FUNCION SPLIT CUANDO TENGO UN *
            infoproducto = data.split("*");
            //se crean un tr con la informacion del producto, por ejemplo idproducto es infoproducto[0]
            html = "<tr>";
            html += "<td><input type='hidden' name='idproductos[]' value='"+infoproducto[0]+"'>"+infoproducto[1]+"</td>";
            html += "<td>"+infoproducto[2]+"</td>";
            html += "<td><input type='hidden' name='precios[]' value='"+infoproducto[3]+"'>"+infoproducto[3]+"</td>";
            html += "<td>"+infoproducto[4]+"</td>";
            html += "<td><input type='text' name='cantidades[]' value='1' class='cantidades'></td>";
            html += "<td><input type='hidden' name='importes[]' value='"+infoproducto[3]+"'><p>"+infoproducto[3]+"</p></td>";
            html += "<td><button type='button' class='btn btn-danger btn-remove-producto'><span class='fa fa-remove'></span></button></td>";
            html += "</tr>";
            $("#tbventas tbody").append(html);
            //SE LLAMA A LA FUNCION SUMAR PARA SUMAR EL NUEVO PRODUCTO
            sumar();
            //SE VUELVEN LOS VALORES A NULL PARA PODER INGRESAR UN NUEVO PRODUCTO
            $("#btn-agregar").val(null);
            $("#producto").val(null);
        }else{
            alert("seleccione un producto...");
        }
    });

    $(document).on("click",".btn-remove-producto", function(){
      //SE ELIMINA EL TR DEL PRODUCTO SELECCIONADO
        $(this).closest("tr").remove();
      //SE VUELVE A SUMAR TODOS LOS "NUEVOS PRODUCTOS"
        sumar();
    });

    //SE CREA LA FUNCION PARA VER LA CANTITDAS DE PRODUCTOS POR TECLADO
    $(document).on("keyup","#tbventas input.cantidades", function(){
        //SE RECUPERA LA CANTIDAD, PRECIO E IMPORTE
        cantidad = $(this).val();
        precio = $(this).closest("tr").find("td:eq(2)").text();
        //SE MULTIPLICA LA CANTIDAD DE PRODCUTO POR EL PRECIO INDIVIDUAL
        importe = cantidad * precio;
        //SE ACTUALIZA EL INPUT DE IMPORTES
        //se busca el td que tenga indice 5
        $(this).closest("tr").find("td:eq(5)").children("p").text(importe.toFixed(2));
        //input oculto
        $(this).closest("tr").find("td:eq(5)").children("input").val(importe.toFixed(2));
        //SE LLAMA A LA FUNCION SUMAR, QUE ACTUALIZA EL CAMPO DE PRECIO TOTAL
        sumar();
    });

    $(document).on("click",".btn-view-venta",function(){
      valor_id = $(this).val();
      $.ajax({
        url: base_url + "movimientos/ventas/view",
        type:"POST",
        dataType:"html",
        data:{id:valor_id},
        success:function(data){
          $("#modal-default .modal-body").html(data);
        }
      });
    });


    $(document).on("click",".btn-print",function(){
        $("#modal-default .modal-body").print({
            title:"Comprobante de venta"
        });
    });


})//FIN DE FUNCIONES

function generarnumero(numero){
    if (numero>= 99999 && numero< 999999) {
        return Number(numero)+1;
    }
    if (numero>= 9999 && numero< 99999) {
        return "0" + (Number(numero)+1);
    }
    if (numero>= 999 && numero< 9999) {
        return "00" + (Number(numero)+1);
    }
    if (numero>= 99 && numero< 999) {
        return "000" + (Number(numero)+1);
    }
    if (numero>= 9 && numero< 99) {
        return "0000" + (Number(numero)+1);
    }
    if (numero < 9 ){
        return "00000" + (Number(numero)+1);
    }
}

function sumar(){
    subtotal = 0;
    //SUMAMOS LOS VALORES DEL IMPORTE QUE ESTAN EN EL TD 5
    $("#tbventas tbody tr").each(function(){
        subtotal = subtotal + Number($(this).find("td:eq(5)").text());
    });
    //SELECCIONAMOS EL INPUT DE NAME SUBTOTAL E IMPRIMIMOS EL VALOR (FIXED ES PARA QUE SALGA CON 2 DECIMALES)
    $("input[name=subtotal]").val(subtotal.toFixed(2));
    porcentaje = $("#igv").val();
    igv = subtotal * (porcentaje/100);
    //SELECCIONAMOS EL INPUT IGV Y LE ASIGNAMOS EL VALOR
    $("input[name=igv]").val(igv.toFixed(2));
    //RECUPERAMOS EL VALOR DE DESCUANTO
    descuento = $("input[name=descuento]").val();
    //CALCULAMOS EL DESCUENTO CON EL VALOR TOTAL
    total = subtotal + igv - descuento;
    //SELECCIONAMOS EL VALOR DE TOTAL, CON EL TOTAL CALCULADO
    $("input[name=total]").val(total.toFixed(2));

}

function datagrafico(base_url, year){
    namesMonth= ["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"];
    $.ajax({
        url: base_url + "dashboard/getData",
        type: "POST",
        data:{year: year},
        dataType:"json",
        success: function(data){
            var meses = new Array();
            var montos = new Array();

            $.each(data, function(key, value){
                meses.push(namesMonth[value.mes -1]);
                valor = Number(value.monto);
                montos.push(valor);
            });
            graficar(meses, montos, year);
        }
    });
}


function graficar(meses, montos, year){
  Highcharts.chart('grafico', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Promedio mensual'
    },
    subtitle: {
        text: 'Año:' + year
    },
    xAxis: {
        categories: meses,
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Monto acomulado (CLP)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">Monto: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} CPL</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Meses',
        data: montos

  }]
});
}
</script>
</body>
</html>
