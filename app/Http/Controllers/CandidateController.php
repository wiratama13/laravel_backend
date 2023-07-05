<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Candidate;
use App\Models\Skill_set;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\CandidateResource;
use Illuminate\Support\Facades\Validator;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidate = Candidate::with(['job:id,name','skill:id,name'])->get();

        return response()->json([
            "message" => "success",
            "data" => $candidate
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute harus diisi',
            'phone.numeric' => 'phone harus diisi angka',
            'phone.unique' => 'phone sudah digunakan',
            'email.unique' => ':attribute sudah digunakan',
            'email' => ':attribute harus valid',
            'year.numeric' => 'tahun harus menggunakan angka',
        ];

        $validate = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email:rfc,dns|unique:candidates,email',
            'phone' => 'required|numeric|unique:candidates,phone',
            'year' => 'required|numeric',
            'job_id' => 'required|integer|exists:skills,id',
        ], $messages);

        $candidate = Candidate::create($request->all());

        $skill = [];

        foreach ($request->skill_id as $value) {
            $skill[] = [
                'skill_id' => $value,
                'candidate_id' => $candidate->id
            ];
        }

        DB::table('skill_sets')
            ->insert($skill);

        return new CandidateResource($candidate->loadMissing(['job:id,name', 'skill:id,name']));

       
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $candidate = Candidate::with(['skill', 'job'])->findOrFail($id);

        return response()->json([
            "message" => "success",
            "data" => $candidate
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidate $candidate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Candidate $candidate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidate $candidate)
    {
        //
    }
}
