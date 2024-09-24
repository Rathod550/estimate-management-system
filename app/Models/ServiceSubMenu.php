<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Service;

class ServiceSubMenu extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'service_id',
        'name'
    ];

    // public function service()
    // {
    //     return $this->hasOne(Service::class,'id','service_id');
    // }

}
