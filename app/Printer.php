<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Printer extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function manufacture()
    {
        return $this->belongsTo(Manufacture::class);
    }

    public function cartridges()
    {
        return $this->belongsToMany(Cartridge::class);
    }
}
