<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $table = "candidates";
    
    protected $fillable = [
        'job_id','name','email','phone','year',
        'created_by','updated_by','deleted_by'
    ];

    public function job() 
    {
        return $this->belongsTo(Job::class,'job_id','id');
    }

    public function skill()
    {
        return $this->belongsToMany(Skill::class,'skill_sets','candidate_id', 'skill_id');
    }
}
