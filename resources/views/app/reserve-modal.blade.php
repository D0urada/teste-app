<!-- Modal -->
<div class="modal fade" id="reserve-modal" tabindex="-1" aria-labelledby="reserve-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="reserve-modal">Registrar Sala</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          {{ Form::open(array('route' => 'reserve.store')) }}
          {!! Form::hidden('room_id', null) !!}

          <div class="modal-body">
              <div class="form-group row">
                  {!! Form::label('reserve_time', 'Dia e Hora:', ['class' => 'col-sm-3 col-form-label']) !!}
                  <div class="col-sm-9">
                      {!! Form::datetimelocal('reserve_time', null, ['placeholder' => 'Data', 'class' => 'form-control', 'required']) !!}
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
