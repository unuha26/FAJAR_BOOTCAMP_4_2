<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Student;
use App\Course;
use App\Assignment;
use App\Nilai;

class StudentDataController extends Controller
{
    function AddStudent(Request $req){
        DB::beginTransaction();
        try{
            $this->validate($req, [
                'name' => 'required'
            ]);
            $student = new Student;
            $student->name = $req->input('name');
            $student->save();
            DB::commit();
            return response()->json($student, 201);
        }
        catch(\Exception $e){
            DB::rollback();
            return response()->json(['message' => 'Failed to add new student data, exception:' + $e], 500);
        }
    }

    function UpdateStudent(Request $req){
        DB::beginTransaction();
        try{
            $this->validate($req, [
                'id' => 'required',
                'name' => 'required'
            ]);
            $id = $req->input('id');
            $name = $req->input('name');
            $updateStudent = DB::table('students')
            ->where('id', $id)
            ->update(['name' => $name]);
            DB::commit();
            return "Successfully update student data";
        }
        catch(\Exception $e){
            DB::rollback();
            return response()->json(['message' => 'Failed to add new student data, exception:' + $e], 500);
        }
    }
}
