<?php

namespace Boye\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Boye\Http\Controllers\Controller;
use Boye\Http\Requests\UserRequest;
use Boye\User;
use Auth;


class UserController extends Controller
{
    public function index()
    {
        return  response()->json(['model' => User::filterPaginateOrder()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //\Log::info($request->all());
        $avatar = 'avatars/default.png';

        $data = array_merge($request->all(), [
            'avatar' => $avatar,
            'password' => bcrypt($request->get('password')),
            'confirm_code' => str_random(64)
            ]);
        $user = User::create($data);
        return response()->json(['success' => true]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrfail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Auth::user()->is_admin == 1){
        $user= User::findOrfail($id);
        $user->update($request->all());
        return response()->json(['updated' => true]);
       }else{
        return response()->json(['updated' => false]);
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->is_admin == 1){
        User::find($id)->delete();
        return response()->json(['deleted' => true]);
        }else{
            return response()->json(['deleted' => false]);
        }
    }
}
