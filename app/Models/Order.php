<?php

namespace App\Models;

use App\Http\Requests\OrderStoreRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Order extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'topic',
        'description',
        'file'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
