<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'mail_host',
        'mail_port',
        'mail_username',
        'mail_password',
        'recaptcha_site_key',
        'recaptcha_secret_key',
        'ads_enabled'
    ];
}