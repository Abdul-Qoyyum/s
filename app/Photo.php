<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    /**
     * properties that are mass assignable
     */
    protected $fillable = ['url', 'post_id'];
    
    /**
     * polymorphic relationship
     */
    public function imageable(){
        return $this->morphTo();
    }
}
