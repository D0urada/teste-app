// my scripts

$('.reserve-room').on('click', function(){
    let rom_id = $(this).data("room-id");
    $("input[name='room_id").val(rom_id);
});
