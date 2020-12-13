<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    public function cartridges()
    {
        return $this->hasMany(Cartridge::class);
    }
}
