<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class master extends Model
{
    use Notifiable;
    protected $table = 'master';

    protected $fillable = [
        '_id','x_axis','y_axis','name','type','location','link'
    ];
}
