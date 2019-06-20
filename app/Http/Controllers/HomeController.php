<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
  $user = Auth::user();
  // dd($user->hasAnyRole(Role::all()));

  if($user->hasAnyRole(Role::all()) == false){


    $role = Role::findbyID(3);
    $user->givePermissionTo([
           'product-list',
           'product-create',
           'product-edit',
           ]);
     }


        return view('home');
    }
}
