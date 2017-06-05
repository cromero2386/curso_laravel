@extends('layouts')
@section('content')
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Agregar area</button>
@include('areas.modal')
<table class="table table-bordered" id="example" class="display" width="100%" cellspacing="0">
</table>
@endsection
@section('script')
  <script>
    $(function() {
        $('#modificar').hide();
        $('#agregar').click(function(){
            var area = $('#area').val();
            var sector =$('#sector').val();
            var datas='area='+area+'&sector='+sector;
            var token = $('input:hidden[name=_token]').val();

        });
        lista();
    });
    var lista=function(){
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
                {"data": "sector", "title":"Sector"}
            ]
        });
    }

  </script>
@endsection