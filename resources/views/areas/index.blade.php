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
        $("#form_1").validate({
            rules: {
                nombre: {
                    required: true
                },
                sector: {
                    required: true
                }
            },
            messages: {
                nombre: {
                    required: "Por favor ingrese un nombre"
                },
                sector: {
                    required: "Por favor ingrese un nombre"
                }
            },
            errorElement: "em",
            errorPlacement: function(error, element) {
                // Add the `help-block` class to the error element
                error.addClass("help-block");
                // Add `has-feedback` class to the parent div.form-group
                // in order to add icons to inputs
                element.parents(".form-group").addClass("has-feedback");

                    if (element.prop("type") === "checkbox") {
                        error.insertAfter(element.parent("label"));
                    } else {
                        error.insertAfter(element);
                    }
                    // Add the span element, if doesn't exists, and apply the icon classes to it.
                    if (!element.next("span")[0]) {
                        $("<span class='glyphicon glyphicon-remove form-control-feedback'></span>").insertAfter(element);
                    }
            },
            success: function(label, element) {
                // Add the span element, if doesn't exists, and apply the icon classes to it.
                if (!$(element).next("span")[0]) {
                    $("<span class='glyphicon glyphicon-ok form-control-feedback'></span>").insertAfter($(element));

                }
            },
            highlight: function(element, errorClass, validClass) {
                $(element).parents(".form-group").addClass("has-error").removeClass("has-success");
                $(element).next("span").addClass("glyphicon-remove").removeClass("glyphicon-ok");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).parents(".form-group").addClass("has-success").removeClass("has-error");
                $(element).next("span").addClass("glyphicon-ok").removeClass("glyphicon-remove");
            },
            submitHandler: function(form) {
                var nombre = $('#nombre').val();
                var sector =$('#sector').val();
                var datas='nombre='+nombre+'&sector='+sector;
                ///alert(data);
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
            }

       });
        lista();
        /*$('#agregar').click(function(){
            var nombre = $('#nombre').val();
            var sector =$('#sector').val();
            var datas='nombre='+nombre+'&sector='+sector;
            ///alert(data);
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

        });*/
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
            $('.form-group').removeClass('has-success has-feedback');
            $('span').removeClass('glyphicon-ok glyphicon-remove');
            $('.form-group').removeClass('has-error has-feedback');
            $('em').remove();

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