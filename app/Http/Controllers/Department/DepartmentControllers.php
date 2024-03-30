<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Models\Department\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentControllers extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Departments = Department::all();

        return view('department.department', compact('Departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string',
            ]);

            Department::create([
                'users_id' => Auth::user()->id,
                'name' => $request->name,
            ]);
            return redirect()->back()->with('success', 'Added successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'An error occurred while adding');
        }
        return redirect()->back()->with('error', 'An unexpected error occurred during the adding process');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        try {
            $Department = Department::find($request->id);
            if ($Department) {
                $Department->users_id =Auth::user()->id;
                $Department->name = $request->name;
                $Department->save();
            }
            return redirect()->back()->with('success', 'Updated successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'An error occurred while update');
        }
        return redirect()->back()->with('error', 'An unexpected error occurred during the update process');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, )
    {
        try {
            $Department = Department::find($request->id);
            if ($Department) {
                $Department->delete();
                return response()->json(['status' => 'success', 'message' => 'Department deleted successfully']);
            }
        } catch (\Throwable $th) {

            return response()->json(['status' => 'error', 'message' => 'An error occurred while delete']);
        }
        return response()->json(['status' => 'error', 'message' => 'An unexpected error occurred during the delete process']);

    }
}
