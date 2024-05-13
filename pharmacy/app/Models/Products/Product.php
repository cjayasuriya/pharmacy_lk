<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

use Auth;

class Product extends Model
{
    use Notifiable;

    protected $table = 'products';

    protected $fillable = [
        'sku', 'name', 'brand','uom', 'prices', 'meta', 'statusID', 'status', 'cuid', 'uuid'
    ];
}
