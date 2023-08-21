<?php

namespace App\Http\Controllers;

use App\Models\player;
use Illuminate\Http\Request;
use App\Http\Resources\PlayerResource;

class PlayerController extends Controller
{
    public function show($status)
    {
        $player = player::where('status', $status)->get()->random();
        if($player!=null)
            return new PlayerResource($player);

        return response()->json(['Erorr'=>'not found'],400);       }
}
