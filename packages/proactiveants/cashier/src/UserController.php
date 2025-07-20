<?php

namespace ProactiveAnts\Cashier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::paginate(100);
        $keyword = '';
        if($request->has('keyword')){
            $users = User::where('name','like','%'.$request->keyword.'%')
            ->orWhere('telephone','like','%'.$request->keyword.'%')
            ->orWhere('email','like','%'.$request->keyword.'%')
            ->paginate(100);
            $keyword = $request->keyword;
        }
        return view('cashier::users.index', compact('users','keyword'));
    }

    public function activate($id)
    {
        $user = User::findOrFail($id);
        $currentValue = $user->active;
        $user->active = 1 - intval($currentValue);
        $user->save();
        return redirect()->back();
    }

    public function view($id)
    {
        $user = User::findOrFail($id);
        return view('cashier::users.view', compact('user'));
    }

}