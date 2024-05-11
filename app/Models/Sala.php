<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    use HasFactory;
    protected $table = 'salas';
    public $timestamps = true;

    protected function casts(): array
    {
        return [
            'cliente_id' => 'string'
        ];
    }
}
