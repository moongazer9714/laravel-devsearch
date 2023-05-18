<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Models\Profiles\Profile;
use App\Models\Projects\Project;
use App\Models\Projects\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::all();
        $tags = Tag::all();
        return view('project.create', compact('projects', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('featured-image');
        }

        $project = Project::create([
            'profile_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'featured_image' => $path ?? null,
            'demo_link' => $request->demo_link,
            'source_link' => $request->source_link,
            'vote_total' => $request->vote_total,
            'vote_ratio' => $request->vote_ratio
        ]);

        if (isset($request->tags)) {
            foreach ($request->tags as $tag) {
                $project->tags()->attach($tag);
            }
        }
        if (isset($request->tags->id)) {
            $project->tags()->sync($request->tags->id);
            return redirect()->route('project.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $projects = Project::all();
        $tags = Tag::all();
        return view('project.edit', compact('project', 'projects', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        if ($request->hasFile('featured_image')) {
            if (isset($project->featured_image)) {
                Storage::delete($project->featured_image);
            }
            $path = $request->file('featured_image')->store('featured-image');
        }
        $project->update([
            'profile_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'featured_image' => $path ?? $project->featured_image,
            'demo_link' => $request->demo_link,
            'source_link' => $request->source_link,
            'vote_total' => $request->vote_total,
            'vote_ratio' => $request->vote_ratio
        ]);
        if (isset($request->tags)) {
            foreach ($request->tags as $tag) {
                $project->tags()->attach($tag);
            }
        }
        if (isset($request->tags->id)) {
            $project->tags()->sync($request->tags->id);
        }
        return redirect()->route('project.show', compact('project'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteProject(Project $project)
    {
        return view('project.delete', compact('project'));
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('project.index');
    }
}
