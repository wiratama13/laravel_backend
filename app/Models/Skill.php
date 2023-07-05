<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skill extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name','creted_by','updated_by','deleted_by'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function skilltoSkill()
    {
        return $this->belongsToMany(Candidate::class,'skill_sets', 'skill_id', 'candidate_id');
    }
}
