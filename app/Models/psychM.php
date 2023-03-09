<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class psychM extends Model
{
    protected $table="psychologists";
    use HasFactory;
    protected $guarded=[];
}
