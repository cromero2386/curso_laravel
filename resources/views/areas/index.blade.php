@extends('layouts')
@section('content')
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Agregar area</button>
@include('areas.modal')
@include('areas.modal_modif')
<table class="table table-bordered" id="example" class="display" width="100%" cellspacing="0">
</table>
@endsection
@section('script')
  <script>
    $(function() {
        $('#agregar').click(function(){
            var nombre = $('#nombre').val();
            var sector =$('#sector').val();
            var datas='nombre='+nombre+'&sector='+sector;
            var token = $('input:hidden[name=_token]').val();
            $.ajax({
                url:"{{url('area')}}",
                type:'POST',
                headers:{'X-CSRF-TOKEN':token},
                data: datas,
                success: function(){
                    lista();
                    $('#myModal').modal('toggle');
                    $('#myModal').find("input").val('').end();
                },
                error : function(responseText){
                    alert("ERROR :: ");
                }
            });

        });
        lista();
        $("body").on("click","button.editar",function(){
            $('.modal-title').html('Modificar contenido seleccionado');
            var id = $(this).parent("td").prev("td").prev("td").prev("td").text();
            console.log(id);
            var route = "area"+'/'+id+'/edit';
            $.get(route, function(res){
                $("#id").val(res.id);
                $("#nombre_a").val(res.nombre);
                $("#sector_a").val(res.sector);
            });
        });
        $("#myModal").on('hidden.bs.modal', function () {
            $(this).find("input").val('').end();

        });

        $("#editar_re").click(function() {
            var value = $("#id").val();
            //action = "area"+'/'+value;
            var nombre_a = $('#nombre_a').val();
            var sector_a =$('#sector_a').val();
            var datas='nombre_a='+nombre_a+'&sector_a='+sector_a;
            var token = $('input:hidden[name=_token]').val();
            $.ajax({
                url:"{{url('area')}}"+'/'+value,
                type:'PUT',
                headers:{'X-CSRF-TOKEN':token},
                data: datas ,
                success: function(){
                    lista();
                    $('#myModal1').modal('toggle');
                    $('#myModal1').find("input").val('').end();
                },
                error : function(responseText){
                    alert("ERROR :: ");
                }
            });
        });
        $("body").on("click","button.eliminar",function(){
            var id = $(this).parent("td").prev("td").prev("td").prev("td").prev("td").text();
            var token = $('input:hidden[name=_token]').val();
            console.log(id);
            $.ajax({
                url:"{{url('area')}}"+'/'+id,
                type:'DELETE',
                headers:{'X-CSRF-TOKEN':token},
                success: function(){
                    lista();
                },
                error : function(responseText){
                    alert("ERROR :: ");
                }
            });
        });
    });
    function lista(){
        $('#example').empty();
        var table = $("#example").DataTable({
            "destroy":true,
            "order": [[ 0, "asc" ]],
            "lengthChange": true,
            "language":{
                "url":"public/assets/js/Spanish.json"
            },
            "ajax":{
                "method": "GET",
                "url":"{{url('get_areas')}}",
                "dataType":"JSON"
            },
            "columns":[
                {"data": "id", "title":"#"},
                {"data": "nombre", "title":"Area"},
                {"data": "sector", "title":"Sector"},
                {"data":null,"title":"Editar <i class='fa fa-pencil-square-o' aria-hidden='true'></i>",
                "defaultContent":"<button type='button' id='editar' class='editar btn btn-warning' data-toggle='modal' data-target='#myModal1'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Editar</button>"
                },
                {"data":null,"title":"Eliminar",
                "defaultContent":"<button type='button' id='eliminar' class='eliminar btn btn-link'> Eliminar</button>"
            }
            ]
        });
    }


  </script>
@endsection