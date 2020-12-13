<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function cartridges()
    {
        return $this->hasMany(Cartridge::class);
    }

    public function printers()
    {
        return $this->hasMany(Printer::class);
    }
}
