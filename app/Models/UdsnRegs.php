<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Client;

class UdsnRegs extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'client_id',
        'udsn_number'
    ];

    public function client()
    {
        return $this->hasOne(Client::class,'id','client_id');
    }
}
