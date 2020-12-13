<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cartridge extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function manufacture()
    {
        return $this->belongsTo(Manufacture::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function printers()
    {
        return $this->belongsToMany(Printer::class);
    }
}
