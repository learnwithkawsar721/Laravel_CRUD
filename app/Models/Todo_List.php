<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo_List extends Model
{
    use HasFactory;
    protected $guarded=[];
     /**
     * Get the phone associated with the user.
     */
    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
