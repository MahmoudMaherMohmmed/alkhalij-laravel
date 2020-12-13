<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function cartridges()
    {
        return $this->hasMany(Cartridge::class);
    }
}
