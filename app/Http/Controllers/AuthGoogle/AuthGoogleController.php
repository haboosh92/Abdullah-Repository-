<?php

namespace App\Http\Controllers\AuthGoogle;

use App\Http\Controllers\Controller;
use App\Models\Research\ResearcherInformation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthGoogleController extends Controller
{  
    //  public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function redirectToGoogle()
    { 
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {
        // try {
        $user = Socialite::driver('google')->user();
        // Check if user exists in database, if not create new user
        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            Auth::login($existingUser);
        } else {

            // Create new user
            $newUser = new User();
            $RInfo = ResearcherInformation::where('email', $user->email)
                ->first();
            if (!$RInfo) {
                $RInfo = ResearcherInformation::create([
                    'email'=>$user->email,
                    'name'=>$user->name,
                ]);
            }

            $newUser->researcher_information_id = $RInfo->id;

            $newUser->name = $user->name;
            $newUser->email = $user->email;
            $newUser->password = Hash::make($user->email);
            $newUser->role = "Professor";
            $newUser->save();

            Auth::login($newUser);
        }
        return redirect()->route('myresearch');

        return redirect()->intended('/');
        // } catch (\Throwable $th) {
        //     dd($th->getMessage());
        // }
        // $user = Socialite::driver('google')->user();

        // Your authentication logic here, e.g., check if the user exists in your database

        // Log the user in
        // Auth::loginUsingId($user->id);

        // Redirect to home page after login
        // return redirect()->route('home');
    }
}