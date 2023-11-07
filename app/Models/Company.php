<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'industry_sector',
        'location',
        'address',
        'website',
        'contact_name',
        'contact_email',
        'contact_phone',
        'logo',
    ];
}
