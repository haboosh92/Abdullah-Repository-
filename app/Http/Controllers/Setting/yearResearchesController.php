<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\setting\YearResearch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class yearResearchesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
           $YearResearchs = YearResearch::all();
        return view('setting.YearResearch.index', compact('YearResearchs'));
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

            YearResearch::create([
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
            $YearResearch = YearResearch::find($request->id);
            if ($YearResearch) {
                $YearResearch->users_id =Auth::user()->id;
                $YearResearch->name = $request->name;
                $YearResearch->save();
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
            $YearResearch = YearResearch::find($request->id);
            if ($YearResearch) {
                $YearResearch->delete();
                return response()->json(['status' => 'success', 'message' => 'Year of research deleted successfully']);
            }
        } catch (\Throwable $th) {

            return response()->json(['status' => 'error', 'message' => 'An error occurred while delete']);
        }
        return response()->json(['status' => 'error', 'message' => 'An unexpected error occurred during the delete process']);

    }
}