<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TeamMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teamMembers = TeamMember::all();
        return view('backend.pages.team.index', compact('teamMembers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $teamMember = new TeamMember();
        $teamMember->name = $request->name;
        $teamMember->role = $request->role;

        // Handle photo upload
        if ($request->file('photo')) {
            $photo_file = $request->file('photo');
            $photo_name = 'photo_' . Str::lower(Str::random(9)) . '.' . $photo_file->getClientOriginalExtension();
            $photo_path = 'content/upload/team_members/';
            $photo_file->move($photo_path, $photo_name);
            $teamMember->photo_path = $photo_path . $photo_name;
        }

        $teamMember->save();

        return redirect()->route('admin.team.index')->with('success', 'Team member added successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teamMember = TeamMember::findOrFail($id);
        return view('backend.pages.team.edit', compact('teamMember'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $teamMember = TeamMember::findOrFail($id);
        $teamMember->name = $request->name;
        $teamMember->role = $request->role;
        // Handle photo upload
        if ($request->file('photo')) {
            $photo_file = $request->file('photo');
            $photo_name = 'photo_' . Str::lower(Str::random(9)) . '.' . $photo_file->getClientOriginalExtension();
            $photo_path = 'content/upload/team_members/';
            $photo_file->move($photo_path, $photo_name);
            $teamMember->photo_path = $photo_path . $photo_name;
        }
        // dump($teamMember);
        // dd($request->all());
        $teamMember->save();

        return redirect()->route('admin.team.index')->with('success', 'Team member updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teamMember = TeamMember::findOrFail($id);

        // Delete the photo file if it exists
        if ($teamMember->photo_path && file_exists(public_path($teamMember->photo_path))) {
            unlink(public_path($teamMember->photo_path));
        }

        $teamMember->delete();

        return redirect()->route('admin.team.index')->with('success', 'Team member deleted successfully!');
    }
}
