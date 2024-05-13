<?php

namespace App\Models\Images;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Auth;
use Illuminate\Notifications\Notifiable;

class Image extends Model
{
    use Notifiable;

    protected $table = 'images';

    protected $fillable = [
        'customerID', 'orderID', 'name','fileP', 'statusID', 'status', 'cuid', 'uuid'
    ];
}
