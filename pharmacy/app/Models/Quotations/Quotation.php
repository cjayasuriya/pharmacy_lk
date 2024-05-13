<?php

namespace App\Models\Quotations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

use Auth;

class Quotation extends Model
{
    use Notifiable;

    protected $table = 'quotations';

    protected $fillable = [
        'orderID', 'customerID', 'quotedDate', 'validTill','products',
        'currency', 'subTotal', 'discount', 'delivery', 'grandTotal',
        'statusID', 'status', 'cuid', 'uuid'
    ];

    protected $with = ['customer','order'];

    public function customer() {
        return $this->belongsTo('App\Models\User', 'customerID', 'id')->withDefault();
    }

    public function order() {
        return $this->belongsTo('App\Models\Orders\Order', 'orderID', 'id')->withDefault();
    }
}
