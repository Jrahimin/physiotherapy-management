<?php

namespace App\Http\Controllers;

use App\Type;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function search()
    {
        $types=Type::all();
        return view('user.search',compact('types'));
    }


    public function searchResult(Request $request)
    {
        $users=User::where('type_id',$request->type_id)->get();
        return view('user.searchResult',compact('users'));
    }

    public function edit($id)
    {
        $user=User::find($id);

        return view('user.edit',compact('user'));

    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'password'=>'string|min:6|confirmed',
            'email'=>'email',
        ]);
        
        $user=User::find($request->id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->save();
        return "Edited";
    }

    public function delete($id)
    {
        $user=User::find($id);
        $user->delete();

        return redirect('user/search');
    }

    public function change($id)
    {
        $user=User::find($id);
        if($user->type_id==1)
        {
            $user->type_id=2;
        }
        else
            $user->type_id=1;
        $user->save();

        return view('changed');
    }

}
