<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
    </div>
    <div class="modal-body">
    {!! Form::open(['id'=>'form']) !!}
        <div class="form-group">
            <input type="hidden" id="id">
            {!! Form::label('Nombre de area', null, ['class' => 'control-label']) !!}
            {!! Form::email('nombre', null, ['class' => 'form-control','id' => 'nombre'])!!}

        </div>
        <div class="form-group">
            {!! Form::label('Sector del area', null, ['class' => 'control-label']) !!}
            {!! Form::email('sector', null, ['class' => 'form-control','id' => 'sector'])!!}
        </div>
        <button type="button" class="btn btn-success" id="agregar">Registrar</button>
    {!! Form::close() !!}
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>

</div>
</div>