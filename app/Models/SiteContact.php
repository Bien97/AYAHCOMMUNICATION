<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteContact extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'site_name',
        'email',
        'phone',
        'map_location',
        'logo_header',
        'logo_footer',
        'image_background'
    ];
}