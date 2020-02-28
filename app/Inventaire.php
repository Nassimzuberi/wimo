<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventaire extends Model
{
    protected $fillable = ['quantity','weight','sale_id'];

}
