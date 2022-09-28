
<div class="grid-container p-2">
    @foreach ($rooms as $room)
        <div class="d-flex card text-white {{ $room->reserved == true ? "bg-warning" : "bg-info" }} m-auto mb-4" style="min-width: 20rem; min-height: 20rem">
            <div class="card-header">{{ $room->reserved == true ? "Reservada" : "Livre" }}</div>
            <div class="card-body">
                <h5 class="card-title">{{ $room->name }}</h5>
                <h5 class="card-title">{{ $room->name }}</h5>
                <p class="card-text">
                    @if($room->reserved == true)
                        <p class="card-text">
                            <strong>Data Da Reserva: <br></strong>{{ date_format(date_create($room->reserve->reserve_time),"Y/m/d H:i:s")}}
                        </p>
                        <p class="card-text">
                            <strong>Usuario Que Reservou: <br></strong>{{ $room->reserve->user->name}}
                        </p>
                    @endif
                    <p class="card-text">
                        @if($room->reserved == true)
                            <button class="btn btn-outline-light" type="button" data-bs-toggle="modal" data-bs-target="#reserve-modal" disabled>
                                Reservar Sala
                            </button>
                        @else
                            <button class="btn btn-outline-light reserve-room" type="button" data-bs-toggle="modal" data-bs-target="#reserve-modal" data-room-id="{{ $room->id }}">
                                Reservar Sala
                            </button>
                        @endif
                    </p>
                </p>
            </div>
        </div>
    @endforeach
</div>
