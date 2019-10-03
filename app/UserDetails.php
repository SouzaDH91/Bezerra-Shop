<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    protected $table = 'user_details';

    protected $guarded = [''];
    protected $fillable = ['user_id', 's_name'];

    // public function user_details()
    // {
    //     return $this->belongsTo(User::class,'user_name');
    // }

    public function shipping()
    {
        return $this->belongsToMany(User::class);
    }



}
