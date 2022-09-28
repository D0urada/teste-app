<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    protected $room;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Room $room)
    {
        $this->room = $room;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
            'name' => 'required|unique:rooms,name|min:5',
        ], [
            'name.required' => 'obrigatório',
            'name.unique' => 'ja existe',
            'name.min' => 'muito curto',
        ]);

       $this->room->create($request->all());

        return redirect()->route('home')
                        ->with('success','Sala Cadastrada com sucesso.');
    }
}
