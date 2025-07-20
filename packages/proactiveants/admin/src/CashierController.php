<?php

namespace ProactiveAnts\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use ProactiveAnts\Cashier\Cashier;

class CashierController extends Controller
{
    public function index()
    {
        return view('admin::cashiers.index', ['cashiers' => Cashier::all()]);
    }

    public function view($id)
    {
        $cashier = Cashier::findOrFail($id);
        return view('admin::cashiers.update', compact('cashier'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'id' => 'required|exists:ca_cashiers,id',
            'password' => 'required'
        ]);
        $cashier = Cashier::findOrFail($request->id);
        $cashier->name = $request->name;
        $cashier->password = \Hash::make($request->password);
        $cashier->save();
        return redirect(url('adm/cashier'));
    }

    public function delete(Request $request)
    {
        # code...
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:ca_cashiers,email',
            'password' => 'required'
        ]);
        Cashier::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Hash::make($request->password),
        ]);
        return redirect()->back();

    }
}