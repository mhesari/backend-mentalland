<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class newsletterM extends Model
{
    use HasFactory;
    protected $table="newsletter";
    protected $fillable = [
      'Email'
    ];
}
