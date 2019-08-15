<?php

namespace App\Models\SuperheroModel;

use App\Models\ImagesModel\Images;
use Illuminate\Database\Eloquent\Model;

class Superhero extends Model
{
    protected $table = 'superhero';

    protected $guarded = ['id'];

    public function images()
    {
        return $this->hasMany(Images::class);
    }
}
