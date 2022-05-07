<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded=[];

    //Method to return default image or set Image on the users profile.
    public function profileImage(){
      $imagePath  =  ($this->image)  ?  $this->image:  'profile/instagram_logo.jpg';
        return  '/storage/'. $imagePath;
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function followers(){
        return $this->belongsToMany(User::class);
    }
}
