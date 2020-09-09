<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Package extends Model
{
    //
    use Notifiable;
    use Sluggable;
    use SluggableScopeHelpers;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'email', 'email_verified_at', 'password', 'slug', 'remember_token', 'created_at', 'updated_at', 'company', 'currency', 'timezone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }


    /**
     * Get user's posts
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    /**
     * Get user's photo
     */
    public function photo()
    {
        return $this->morphOne('App\Photo', 'imageable');
    }

    /**
     * Get user's clients
     */
    public function clients()
    {
        return $this->hasMany('App\Client');
    }

    /**
     * Get user's leads
     */
    public function leads()
    {
        return $this->hasMany('App\Lead');
    }

    /**
     * Get user's tasks (Jobs)
     */
    public function tasks()
    {
        return $this->hasMany('App\Task');
    }
}
