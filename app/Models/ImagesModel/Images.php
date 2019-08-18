<?php

namespace App\Models\ImagesModel;

use App\Models\SuperheroModel\Superhero;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table ='images';

    protected $guarded = ['id'];

    public function heroes()
    {
        return $this->belongsTo(Superhero::class);
    }
}
