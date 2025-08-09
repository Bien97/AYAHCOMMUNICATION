<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    //
    use HasFactory;

    protected $table = 'partenaires'; // lien avec la table partenaires
    protected $fillable = ['image', 'name', 'link'];
}