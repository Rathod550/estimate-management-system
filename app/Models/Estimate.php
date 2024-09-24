<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Client;
use App\Models\Category;

class Estimate extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'client_id',
        'category_id',
        'service_id',
        'service_content',
        'gst_type',
        'gst',
        'sgst',
        'price',
        'total_price',
        'admin_id',
        'admin_approvel'
    ];

    public function client()
    {
        return $this->hasOne(Client::class,'id','client_id');
    }

    public function service()
    {
        return $this->hasOne(Service::class,'id','service_id');
    }

    public function category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }
}
