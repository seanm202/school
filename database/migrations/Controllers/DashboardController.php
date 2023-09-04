<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class DashboardController extends Controller
{

  public function logout(Request $request) {
    Auth::logout();
    return redirect('/login');
  }

  public function chooseDashboard()
  {
    $role =  DB::table('users')
    ->select('role')
    ->where('userId','=',1)
    ->first();
    if($role->role==4)
    {
      return redirect()->route('Studentdashboard');
    }
    else if($role->role==3)
    {
      return redirect()->route('Admindashboard');
    }
    else if($role->role==2)
    {
      return redirect()->route('Teacherdashboard');
    }
    else {
    return redirect()->route('logout');
  }
  }
}
