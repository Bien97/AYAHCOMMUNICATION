<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteContact extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'email',
        'phone',
        'localisation',
        'map_location',
        'logo_header',
        'logo_footer',
        'image_background'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Accesseur pour formater la localisation
    public function getFormattedLocalisationAttribute()
    {
        return $this->localisation ? nl2br(e($this->localisation)) : 'Non définie';
    }

    // Mutateur pour nettoyer la localisation avant sauvegarde
    public function setLocalisationAttribute($value)
    {
        $this->attributes['localisation'] = $value ? trim($value) : null;
    }
}