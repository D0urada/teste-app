<!-- Modal -->
<div class="modal fade" id="register-modal" tabindex="-1" aria-labelledby="register-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="register-modal">Cadastrar Sala</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        {{ Form::open(array('route' => 'register.store')) }}
        <div class="modal-body">
            <div class="form-group row">
                {!! Form::label('name', 'Nome Da Sala:', ['class' => 'col-sm-3 col-form-label']) !!}
                <div class="col-sm-9">
                    {!! Form::text('name', null, ['placeholder' => 'Preencha este campo', 'class' => 'form-control', 'required']) !!}
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
        {{ Form::close() }}
      </div>
    </div>
</div>
