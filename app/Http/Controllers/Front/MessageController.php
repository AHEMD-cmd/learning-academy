<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Message;
use App\NewsLetters;
use App\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function newsletter(Request $request){

        $data = $request->validate([
            'email' => 'required|email',
        ]);

        NewsLetters::create($data);

        return back();
    }

    public function contact(Request $request){

        $data = $request->validate([
            'email' => 'required|email',
            'name' => 'required|string|max:191',
            'message' => 'required|string|max:1000',
            'subject' => 'nullable|string',
        ]);

        Message::create($data);

        return back();
    }


    public function enroll(Request $request){

        $data = $request->validate([
            'email' => 'required|email',
            'name' => 'nullable|string|max:191',
            'message' => 'nullable|string|max:1000',
            'course_id' => 'required|exists:courses,id',
        ]);


        $old_student = Student::select('id')->where('email', $data['email'])->first();

        if($old_student == null){

            $student =  Student::create([
                'name' => $request->name,
                'spec' =>$request->spec,
                'email' =>$request->email,
            ]);

            $student_id = $student->id;
        }
        else{
            $student_id = $old_student->id;

            if($data['name'] !== null){
                $old_student->update([
                    'name'=>$data['name'],
                ]);
            }

            if($data['spec'] !== null){
                $old_student->update([
                    'spec'=>$data['spec'],
                ]);
            }
        }


        DB::table('course_student')->insert([


            'course_id' => $request->course_id,
            'student_id' => $student_id,
            'created_at' => now(),
            'updated_at' => now(),

        ]);



        return back();
    }
}
