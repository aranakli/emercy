<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class familiar extends Model
{
    use HasFactory;
    protected $table = 'familiares';
    public $timestamps = true;
}
