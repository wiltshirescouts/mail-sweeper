<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller {

    private function driver() {
        return Socialite::driver('microsoft');
    }

    public function login() {
        return $this->driver()->redirect();
    }

    public function callback(Request $request) {
        // try {

        $microsoftUser = $this->driver()->user();

        $user = User::updateOrCreate([
            'microsoft_user_id' => $microsoftUser->id,
        ], [
            'name' => $microsoftUser->name,
            'email' => $microsoftUser->email,
        ]);

        Auth::login($user);

        return redirect('/');
        // } catch (\Exception $exc) {
        //     return redirect('/auth/login');
        // }
    }
}
