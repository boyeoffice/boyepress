<?php

namespace Boye\Http\Controllers;

use Illuminate\Http\Request;
use Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function updateAvatar(Request $request, $id)
    {
        // \Log::info($request->all());
         $exploded = explode(',', $request->get('image'));
        $decoded = base64_decode($exploded[1]);
        if(str_contains($exploded[0], 'jpg'))
            $extention = 'jpg';
        else
            $extention = 'png';
        $filename = str_random().'.'.$extention;
        Image::make($request->get('image'))->resize(600, 600)->save(public_path('avatars/').$filename);
        $user = User::findOrFail($id);
        $user->avatar = 'avatars/' . $filename;
        $user->update(); 
    }
}
