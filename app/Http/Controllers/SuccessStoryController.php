<?php

namespace App\Http\Controllers;

use App\Models\SuccessStory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SuccessStoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $successStories = SuccessStory::all();
        return view('backend.pages.success_stories.index', compact('successStories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.success_stories.create');
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
            'faculty' => 'required|string|max:255',
            'college' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required|string',
        ]);

        $successStory = new SuccessStory();
        $successStory->name = $request->name;
        $successStory->faculty = $request->faculty;
        $successStory->college = $request->college;
        $successStory->description = $request->description;

        // Handle image upload
        if ($request->file('image')) {
            $img_file = $request->file('image');
            $img_name = 'image_' . Str::lower(Str::random(9)) . '.' . $img_file->getClientOriginalExtension();
            $img_path = 'content/upload/success_stories/';
            $img_file->move($img_path, $img_name);
            $successStory->image = $img_path . $img_name;
        }

        $successStory->save();

        return redirect()->route('admin.success_stories.index')->with('success', 'Success Story created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $successStory = SuccessStory::findOrFail($id);
        return view('backend.pages.success_stories.edit', compact('successStory'));
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
            'faculty' => 'required|string|max:255',
            'college' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required|string',
        ]);

        $successStory = SuccessStory::findOrFail($id);
        $successStory->name = $request->name;
        $successStory->faculty = $request->faculty;
        $successStory->college = $request->college;
        $successStory->description = $request->description;

        // Handle image upload
        if ($request->file('image')) {
            $img_file = $request->file('image');
            $img_name = 'image_' . Str::lower(Str::random(9)) . '.' . $img_file->getClientOriginalExtension();
            $img_path = 'content/upload/success_stories/';
            $img_file->move($img_path, $img_name);
            $successStory->image = $img_path . $img_name;
        }

        $successStory->save();

        return redirect()->route('admin.success_stories.index')->with('success', 'Success Story updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $successStory = SuccessStory::findOrFail($id);

        // Delete the image file if it exists
        if ($successStory->image && file_exists(public_path($successStory->image))) {
            unlink(public_path($successStory->image));
        }

        $successStory->delete();

        return redirect()->route('admin.success_stories.index')->with('success', 'Success Story deleted successfully!');
    }
}
