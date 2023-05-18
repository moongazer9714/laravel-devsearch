<?php

namespace App\Http\Controllers\Profiles;

use App\Http\Controllers\Controller;
use App\Models\Profiles\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = Profile::all();
        return view('index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profile.profile_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $path = $request->file('profile_image')->store('profile-image');

        $profile = Profile::create([
            'user_id' => auth()->id(),
            'username' => $request->username,
            'location' => $request->location,
            'short_intro' => $request->short_intro,
            'bio' => $request->bio,
            'profile_image' => $path,
            'social_github' => $request->social_github,
            'social_linkedin' => $request->social_linkedin,
            'social_twitter' => $request->social_twitter,
            'social_youtube' => $request->social_youtube
        ]);
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        return view('profile.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        return view('profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showAccount($id)
    {
        $profiles = Profile::all();
        $profile = $profiles->find($id);
        return view('profile', compact('profile'));
    }
}
