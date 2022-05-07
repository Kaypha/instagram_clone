<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    //
    public function index(\App\User $user)
    {
       
        $follows=(auth()->user()) ? auth()->user()->following->contains($user->id) : false;   //does the authenticated user has the user who wants to follow
        //dd($follows);
        return view('profiles.index',compact('user','follows',User::paginate(3)));
        //$user=User::FindorFail($user);//saving it to a variable
        //return view('profiles.index', [
            //'user'=>$user,                  //passing it to the view
        //]
            //);

    }
    public function edit(\App\User $user)
    {
        $this->authorize('update', $user->profile);
       return view('profiles.edit',compact('user'));
    }
    public function update( User $user){
        $this->authorize('update', $user->profile);
        $data=request()->validate([
           'title'=>'required ' ,
            'description'=>' required' ,
            'url'=>'url ' ,
            'image'=>' ' ,
        ]);

        if(request('image')){
           $imagePath=request('image')->store('profile','public');
           $image=Image::make(public_path("storage/{$imagePath}"))->fit(500,500);
           $image->save();
          $imageArray=        ['image' => $imagePath ];
       }
        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? [] //if image array is not set just set default to empty array

        ));
        return redirect("/profile/{$user->id}");
    }
}
