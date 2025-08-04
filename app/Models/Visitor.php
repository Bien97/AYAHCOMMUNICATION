<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Visitor extends Model
{
    //
    use HasFactory;
    protected $fillable = ['ip_address', 'user_agent', 'visited_at'];

    public function setIpAddressAttribute($value)
    {
        $this->attributes['ip_address'] = Crypt::encryptString($value);
    }

    public function getIpAddressAttribute($value)
    {
        return Crypt::decryptString($value);
    }
}