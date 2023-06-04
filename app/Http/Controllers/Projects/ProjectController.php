<?php

namespace App\Http\Controllers\Projects;

use App\Models\Projects\Tag;
use Illuminate\Http\Request;
use App\Models\Comments\Comment;
use App\Models\Projects\Project;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Project\StoreRequest;
use App\Http\Requests\Project\UpdateRequest;


class ProjectController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $search = $request['search'] ?? '';
        if ($search != '') {
            $projects = Project::where('title', 'LIKE', "%$search%")->get();
        } else {
            $projects = Project::all();
        }

        $projects = Project::paginate(1);
        // $projects->appends(['search' => $search]);
        return view('project.index', compact('projects', 'search'));
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
    public function store(StoreRequest $request)
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
        ]);

        if (isset($request->tags)) {
            foreach ($request->tags as $tag) {
                $project->tags()->attach($tag);
            }
        }
        return redirect()->route('project.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {

        // Count up votes
        $upVotesCount = Comment::where('value', Comment::VOTE_TYPE['up'])
            ->where('project_id', $project->id)
            ->count();

        // Calculate the total votes for the project
        $totalVotesCount = Comment::where('project_id', $project->id)->count();

        // Calculate the percentage
        $percentage = round(($totalVotesCount > 0) ? ($upVotesCount / $totalVotesCount) * 100 : 0, 2);

        return view('project.show', compact('project', 'percentage'));
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
    public function update(UpdateRequest $request, Project $project)
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
        ]);

        if (isset($request->tags)) {
            $project->tags()->sync($request->tags);
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
