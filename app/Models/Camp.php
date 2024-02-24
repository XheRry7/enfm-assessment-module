<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camp extends Model
{
    use HasFactory;
    protected $fillable = ['company', 'campName', 'address',
        'city',
        'country',
        'telephoneNumber',
        'campBoss',
        'emailId',
        'totalfloors',
    ];

}
