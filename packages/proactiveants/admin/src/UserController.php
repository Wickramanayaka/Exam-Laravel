<?php

namespace ProactiveAnts\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::orderBy('id', 'desc')->paginate(100);
        $keyword = '';
        if($request->has('keyword')){
            $users = User::where('name','like','%'.$request->keyword.'%')
            ->orWhere('reg_number','like','%'.$request->keyword.'%')
            ->orWhere('telephone','like','%'.$request->keyword.'%')
            ->orWhere('username','like','%'.$request->keyword.'%')
            ->orderBy('id', 'desc')
            ->paginate(100);
            $keyword = $request->keyword;
        }
        return view('admin::users.index', compact('users','keyword'));
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
        return view('admin::users.view', compact('user'));
    }

    public function delete(Request $request)
    {
        $this->validate($request,[
            'id' => 'required'
        ]);
        $user = User::findOrFail($request->id);
        $user->delete();
        return redirect()->back();
    }

    public function export()
    {
        $users = User::all();
        $filename = "users.csv";
        $headers = array(
            "Content-type"          => "text/csv",
            "Content-Disposition"   => "attachment; filename=$filename",
            "Pragma"                => "no-cache",
            "Cache-Control"         => "must-revalidate, post-check=0, pre-check=0",
            "Expires"               => "0"
        );
        $columns = array("Id","Name", "School","Telephone","email");
        $callback = function() use($users, $columns){
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);
            foreach ($users as $user) {
                fputcsv($file, array($user->id, $user->name, $user->school, $user->telephone, $user->email));
            }
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }

}