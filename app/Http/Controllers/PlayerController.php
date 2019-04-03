<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DbAionConnect;
use App\Player;

class PlayerController extends DbAionConnect
{
    public function app(){
      $bdd = $this->DbConnect();
      $req = $bdd->query('SELECT * FROM players ORDER BY id');
      $players = [];
      while ($playerRow = $req->fetch()) {

            $player = new Player();

            $player->name = $playerRow['name'];

            $player->account_name = $playerRow['account_name'];

            $player->exp = $playerRow['exp'];

            $player->world_id = $playerRow['world_id'];

            $player->gender = $playerRow['gender'];

            $player->race = $playerRow['race'];

            $player->player_class = $playerRow['player_class'];

            $player->creation_date = $playerRow['creation_date'];

            array_push($players, $player);
        }
        return $players;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('welcome');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
