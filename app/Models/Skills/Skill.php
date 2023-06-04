<?php

namespace App\Models\Skills;

use App\Models\Profiles\Profile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $guarded = false;

    public function profiles()
    {
        return $this->belongsTo(Profile::class);
    }
}
