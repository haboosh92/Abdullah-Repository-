<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Research\ResearcherInformation;
use App\Http\Controllers\config\appController;

class AuthorizationUsers
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        $user = Auth::user();
        if ($user->status==1) {                             
            return redirect()->route('error')->with(['status' => 'error', 'message' => 'Your account has been suspended. Contact the administrator for more details.'] );
        }


        foreach ($roles as $role) {
            if (trim($user->role) === trim($role)) {
                if(trim($user->role) =='Professor') {                    
                    $RInfo  = ResearcherInformation::find(Auth::user()->researcher_information_id);
                    if($RInfo != null && $RInfo->name_ar == null)                   
                    return redirect()->route('additional_info');
                }
                return $next($request);
            }
        }
        // return redirect()->route('dashboard')->with('error', 'ليس لديك الصلاحية ');
        return redirect()->back()->with(['status' => 'error', 'message' => 'You do not have the authority'] );
    }
}

// if (!Auth::check())
//     return redirect('/');
// $user = Auth::user();
// foreach ($roles as $role) {
//     if ($user->typeUser === $role) {
//         return $next($request);
//     }
// }

// return redirect()->back()->with('error', 'ليس لديك الصلاحية ');
// return redirect()->route('home');