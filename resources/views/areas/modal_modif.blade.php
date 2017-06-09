<!-- Modal -->
<div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
    </div>
    <div class="modal-body">
        {!! Form::open(['id'=>'form_modif']) !!}
        <div class="form-group">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" id="id">
            {!! Form::label('Nombre de area', null, ['class' => 'control-label']) !!}
            {!! Form::email('nombre_a', null, ['class' => 'form-control','id' => 'nombre_a'])!!}

        </div>
        <div class="form-group">
            {!! Form::label('Sector del area', null, ['class' => 'control-label']) !!}
            {!! Form::email('sector_a', null, ['class' => 'form-control','id' => 'sector_a'])!!}
        </div>
        <button type="button" class="btn btn-warning" id="editar_re">Editar</button>
        {!!csrf_field() !!}
    {!! Form::close() !!}
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>

</div>
</div>