<?php

namespace App\Models\Addresses;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Auth;
use Illuminate\Notifications\Notifiable;

class Address extends Model
{
    use Notifiable;

    protected $table = 'addresses';

    protected $fillable = [
        'uid', 'address1', 'address2','city', 'state', 'zip', 'statusID', 'status', 'cuid', 'uuid'
    ];


}
