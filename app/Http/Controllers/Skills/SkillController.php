<?php

namespace App\Http\Controllers\Skills;

use App\Models\Skills\Skill;
use App\Http\Controllers\Controller;
use App\Http\Requests\Skill\StoreRequest;
use App\Http\Requests\Skill\UpdateRequest;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('skill.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $skill = Skill::create([
           'profile_id' => auth()->id(),
           'name' => $request->name,
           'description' => $request->description
        ]);
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill)
    {
        return view('skill.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Skill $skill)
    {
        $skill->update([
            'name' => $request->name,
            'description' => $request->description
        ]);
        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function deleteSkill(Skill $skill)
    {
        return view('skill.delete', compact('skill'));
    }
    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('project.index');
    }
}
