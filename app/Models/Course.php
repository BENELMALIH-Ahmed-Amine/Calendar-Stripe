<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'storeStart',
        'storeEnd',
        'title',
        'user_id'
    ];
    
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
