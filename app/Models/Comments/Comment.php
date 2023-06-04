<?php

namespace App\Models\Comments;

use App\Models\Profiles\Profile;
use App\Models\Projects\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = ['profile_id', 'project_id', 'body', 'value'];
    
    const VOTE_TYPE = [
        'up' => 'up-vote',
        'down' => 'down-vote'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
