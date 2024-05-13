<?php

namespace App\Models\Orders;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

use Auth;

class Order extends Model
{
    use Notifiable;

    protected $table = 'orders';

    protected $fillable = [
        'customerID', 'address', 'deliveryDate','timeSlot', 'statusID', 'status', 'cuid', 'uuid'
    ];

    protected $with = ['customer'];

    public function customer() {
        return $this->belongsTo('App\Models\User', 'customerID', 'id')->withDefault();
    }

}
