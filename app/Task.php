<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /*
     * The attributes that are mass assignable
     * https://laravel.com/docs/5.2/eloquent#mass-assignment
     *
     * @var array
     */

    protected $fillable = ['name'];

    function user()
    {
        return $this->belongsTo(User::class);
    }
}
