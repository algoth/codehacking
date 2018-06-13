<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;



class Post extends Model
{
    //
    use Sluggable;
    use SluggableScopeHelpers;


    protected $fillable = ['user_id', 'title', 'body', 'photo_id', 'category_id'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [

          'slug' => ['source' => 'title', 'onUpdate'=>true],

        ];
    }

    public function user(){
      return $this->belongsTo('App\User');
    }

    public function photo(){
      return $this->belongsTo('App\Photo');
    }

    public function photoPlaceholder(){

      return "http://placehold.it/700x200";
    }

    public function category(){
      return $this->belongsTo('App\Category');
    }

    public function comments(){

      return $this->hasMany('App\Comment');
    }

}
