<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'cover_image',
        'repo_name',
        'repo_link',
        'description',
        'type_id'
    ];

    public static function generateRepoName($title) {
        return Str::slug($title, '-');
    }

    public function type(): BelongsTo {
        return $this->belongsTo( Type::class );
    }

    public function technologies(): BelongsToMany {
        return $this->belongsToMany(Technology::class);
    }
}
