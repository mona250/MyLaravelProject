<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    protected $fillable = ['id','county_name'];
    protected $guarded = array();}
