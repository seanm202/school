<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use DB;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

          $request->validate([
              'name' => ['required', 'string', 'max:255'],
              'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
              'password' => ['required', 'confirmed', Rules\Password::defaults()],
          ]);



              $user = User::create([
                  'name' => $request->name,
                  'email' => $request->email,
                  'password' => Hash::make($request->password)
              ]);

              event(new Registered($user));

              Auth::login($user);

              return redirect(RouteServiceProvider::HOME);

      //
      // $user = User::create([
      //     'name' => $request->name,
      //     'email' => $request->email,
      //     'password' => Hash::make($request->password),
      // ]);
      //
      // event(new Registered($user));
      //
      // Auth::login($user);
    //   $role =  DB::table('users')
    //   ->select('role')
    //   ->where('email','=',$request->email)
    //   ->first();
    // if($role->role==4)
    // {
    //   return redirect(RouteServiceProvider::STUDENT);
    // }
    // else if($role->role==3)
    // {
    //   return redirect(RouteServiceProvider::ADMIN);
    // }
    // else if($role->role==2)
    // {
    //   return redirect(RouteServiceProvider::TEACHER);
    // }
    // else {
    //   return redirect(RouteServiceProvider::HOME);
    // }
}
}
