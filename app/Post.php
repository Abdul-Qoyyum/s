<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Post extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;
    /**
     * Properties that are mass assignable
     */
    protected $fillable = ['title', 'body', 'user_id'];


     /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * Eloquent One to one polymorphic relationship
     * with the photo resource
     */
    public function photo(){
        return $this->morphOne('App\Photo', 'imageable');
    }
    
}
