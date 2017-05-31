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
       {!! Form::open() !!}       
        <div class="form-group">
            {!! Form::label('Nombre de area', null, ['class' => 'control-label']) !!}
            {!! Form::email('area', null, ['class' => 'form-control','id' => 'area'])!!}
            
        </div>
        <div class="form-group">
            {!! Form::label('Sector del area', null, ['class' => 'control-label']) !!}
            {!! Form::email('sector', null, ['class' => 'form-control','id' => 'sector'])!!}
        </div>
        {!!Form::submit('Registrar',['class'=>"btn btn-success"]);!!}
        
    {!! Form::close() !!}
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>

</div>
</div>