<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Job extends Model
{
    use HasFactory;
    use Userstamps;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name','created_by', 
        'updated_by', 'deleted_by'
    ];


    public function candidate()
    {
        return $this->hasMany(Candidate::class);
    }

    // public function jobtoSkill()
    // {
    //     return $this->belongsToMany(Skill_set::class, 'skill_set');
    // }
}
