<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
  protected $fillable = [
      'name',
      'account_name',
      'exp',
      'world_id',
      'gender',
      'race',
      'player_class',
      'creation_date',
  ];
}
