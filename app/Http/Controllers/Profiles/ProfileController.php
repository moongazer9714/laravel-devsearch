<?php

namespace App\Http\Controllers\Profiles;


use Illuminate\Http\Request;
use App\Models\Comments\Comment;
use App\Models\Profiles\Profile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Profile\StoreRequest;
use App\Models\Projects\Project;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $search = $request['search'] ?? '';
        if ($search != '') {
            $profiles = Profile::where('username', 'LIKE', "%$search%")->get();
        } else {
            $profiles = Profile::all();
        }

        $profiles = Profile::paginate(1);
        return view('index', compact('profiles', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
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
        $user = auth()->user();
        $profile = $user->profile;

        if ($profile) {
            return view('profile.show', compact('profile'));
        } else {
            return response("You don't have access this account");
        }


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
    public function update(StoreRequest $request, Profile $profile)
    {
        if ($request->hasFile('profile_image')) {
            if (isset($profile->profile_image)) {
                Storage::delete($profile->profile_image);
            }
            $path = $request->file('profile_image')->store('profile-image');
        }

        $profile->update([
            'user_id' => auth()->id(),
            'username' => $request->username,
            'location' => $request->location,
            'short_intro' => $request->short_intro,
            'bio' => $request->bio,
            'profile_image' => $path ?? $profile->profile_image,
            'social_github' => $request->social_github,
            'social_linkedin' => $request->social_linkedin,
            'social_twitter' => $request->social_twitter,
            'social_youtube' => $request->social_youtube
        ]);
        return redirect()->route('index', compact('profile'));
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
