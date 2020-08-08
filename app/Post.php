<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * Properties that are mass assignable
     */
    protected $fillable = ['title', 'body', 'user_id'];

    /**
     * Eloquent One to one polymorphic relationship
     * with the photo resource
     */
    public function photo(){
        return $this->morphOne('App\Photo', 'imageable');
    }
    
}
