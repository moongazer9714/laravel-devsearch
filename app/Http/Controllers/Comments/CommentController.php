<?php

namespace App\Http\Controllers\Comments;

use Illuminate\Http\Request;


use App\Models\Comments\Comment;
use App\Models\Projects\Project;
use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\StoreComment;
use Illuminate\Support\Facades\View;


class CommentController extends Controller
{
    public function store(StoreComment $request)
    {
        $comment = Comment::create([
            'profile_id' => auth()->id(),
            'project_id' => $request->project_id,
            'body' => $request->body,
            'value' => $request->value,
        ]);
        return redirect()->back();
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);

        // Count up votes
        $upVotesCount = Comment::where('value', Comment::VOTE_TYPE['up'])
            ->where('project_id', $project->id)
            ->count();
        // Calculate the total votes for the project
        $totalVotesCount = Comment::where('project_id', $project->id)->count();

        // Calculate the percentage
        $percentage = ($totalVotesCount > 0) ? ($upVotesCount / $totalVotesCount) * 100 : 0;

        return View::make('project.show', compact('project', 'percentage'));
    }
}
