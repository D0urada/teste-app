<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Reserve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReserveController extends Controller
{
    protected $room;

    protected $reserve;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Room $room, Reserve $reserve)
    {
        $this->room = $room;
        $this->reserve = $reserve;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $exist_reserve_time = $this->reserve->where('reserve_time', date('Y/m/d H:i:s', strtotime($request->reserve_time . '+1 hour')))->first();
        $exist_user = $this->reserve->where('user_id', auth()->id())->first();
        $room_is_reserved = $this->room->find($request->room_id);

        if($exist_reserve_time == null && $exist_user == null && $room_is_reserved->reserved == false){
            $request->request->add(['user_id' => auth()->id()]);

            $request->validate([
                'reserve_time' => 'required|unique:reserves,reserve_time',
                'user_id' => 'required|unique:reserves,user_id',
                'room_id' => 'required|unique:reserves,room_id'
            ], [
                'reserve_time.required' => 'obrigatório',
                'reserve_time.unique' => 'ja existe',
                'user_id.required' => 'obrigatório',
                'user_id.unique' => 'ja existe',
                'room_id.required' => 'obrigatório',
                'room_id.unique' => 'ja existe'
            ]);

            $this->reserve->create($request->all());
            $room_is_reserved->update(['reserved' => true]);

            return redirect()->route('home')
                            ->with('success','Reserva feita com sucesso.');
        } else {
            return redirect()->route('home')
                        ->with('fail','erro.');
        }

    }
}
