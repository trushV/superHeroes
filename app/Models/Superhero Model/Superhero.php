<?php

use Illuminate\Database\Eloquent\Model;

class Superhero extends Model
{
    protected $table = 'superhero';

    protected $guarded = ['id'];
}
