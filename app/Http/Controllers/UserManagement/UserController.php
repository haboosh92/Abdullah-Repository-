<?php

namespace App\Http\Controllers\UserManagement;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
 

class UserController extends Controller
{

    public function __construct()
    {
        $this->roles = [
            "Administrator" => "حساب معاون العميد للشؤزن العلمية",
            "Editor" => "حساب الشؤون العلمية",
            "Professor" => "حساب تدريسي",

        ];
        $this->middleware('auth');
    }


    public function customLogout(Request $request)
    {
        // Perform custom logout actions if needed
        Auth::logout(); 
        // Redirect to the desired location after logout
        return redirect()->route('login');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = [];
        $roles = $this->roles;
        if (Auth::user()->is_primary == 1) {
            $users = User::where('is_primary', null)->whereIN('role', ['Administrator', 'Editor'])->get();
        }

        if (Auth::user()->role == 'Administrator') {
            $users = User::where('is_primary', null)->whereIN('role', ['Editor'])->get();
        }

        if (Auth::user()->role == 'Editor') {
            $users = User::where('is_primary', null)->whereNotIN('role', ['Administrator'
                , 'Professor'])->get();
        }

        return view('user-management.users', compact('users', 'roles'));

    }

    public function filter_users(Request $request)
    {

        $users = [];
        $roles = $this->roles;
        if (Auth::user()->is_primary == 1 || Auth::user()->role == 'Administrator') {
            $users = User::where('is_primary', null)->where('role', $request->role)->get();
        }

        if (Auth::user()->role == 'Editor') {
            $users = User::where('is_primary', null)->whereNotIN('role', ['Administrator'
                , 'Editor'])->where('role', $request->role)->get();
        }

        return view('user-management.users', compact('users', 'roles'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        try {
            $data = $request->all();
            $this->validator($request->all())->validate();
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role' => $data['role'],
            ]);
            return redirect()->route('users')->with('success', 'Added successfully');
        } catch (\Throwable $th) {
            return redirect()->route('users')->with('error', 'An error occurred while adding');
        }
        return redirect()->route('users')->with('error', 'An unexpected error occurred during the adding process');

    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', 'max:255'],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $user = User::find($request->id);
       
        try {
            $user = User::find($request->id);
            if ($user) {
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = $request->password;
                $user->role = $request->role;
                $user->save();
            }
            return redirect()->route('users')->with('success', 'Updated successfully');
        } catch (\Throwable $th) {
            return redirect()->route('users')->with('error', 'An error occurred while update');
        }
        return redirect()->route('users')->with('error', 'An unexpected error occurred during the update process');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, User $user)
    {
        try {
            $user = User::find($request->id);
            if ($user) {
                $user->delete();
                return response()->json(['status' => 'success', 'message' => 'User deleted successfully']);
            }
        } catch (\Throwable $th) {

            return response()->json(['status' => 'error', 'message' => 'An error occurred while delete']);
        }
        return response()->json(['status' => 'error', 'message' => 'An unexpected error occurred during the delete process']);

    }

    /**
     * Enable Status user account
     */
    public function ESuser(Request $request)
    {
        try {
            $user = User::find($request->id);
            if ($user) {
                $user->status = 0;
                $user->save();

                return response()->json(['status' => 'success', 'message' => 'Account has been activated']);
            }

        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => "An error occurred during activation"]);
        }
        return response()->json(['status' => 'error', 'message' => 'An unexpected error occurred during the activation process']);

    }

    /**
     * Disable status user account
     */

    public function DSuser(Request $request)
    {
        try {
            $user = User::find($request->id);
            if ($user) {
                $user->status = 1;
                $user->save();

                return response()->json(['status' => 'success', 'message' => 'Account has been deactivated']);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => "An error occurred during deactivated"]);
        }
        return response()->json(['status' => 'error', 'message' => 'An unexpected error occurred during the deactivated process']);

    }

    public function settings_user()
    {
        $user = User::find(Auth::user()->id);
        $typeAccount = $this->typeAccount[Auth::user()->typeAccount];
        return view('Users.setting', compact('user', 'typeAccount'));
    }

    public function edit_settings_user(Request $request)
    {
        $imageName = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Auth::user()->id . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('users/images', $imageName, 'public'); // 'public' is the disk name; adjust as needed
        }

        $user = User::find(Auth::user()->id);
        if ($user) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->image = $imageName;
            $user->tel = $request->tel == null ? 0 : $request->tel;
            // $user->password = $request->password;
            $user->save();
            return redirect()->back()->with('success', 'تم التحديث بنجاح .');
        }
        return redirect()->back()->with('error', 'حدث خطأ في عملية التحديث');
    }
}