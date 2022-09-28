
<div class="grid-container p-2">
    @foreach ($rooms as $room)
        <div class="card text-white {{ $room->reserved == true ? "bg-warning" : "bg-info" }} m-auto mb-4" style="max-width: 150px;">
            <div class="card-header">{{ $room->reserved == true ? "Reservada" : "Livre" }}</div>
            <div class="card-body">
            <h5 class="card-title">{{ $room->name }}</h5>
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
            </div>
        </div>
    @endforeach
</div>
