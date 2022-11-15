<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;  

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::latest()->paginate(100);

        return view('students.index',compact('students'))
            ->with('i',(request()->input('page',1)-1)*5);
    }


    public function create()
    {
       return view('students.create');
    }


    public function store(Request $request)
    {
        
        $request->validate([
            'studname'=>'required',
            'course'=>'required',
            'fee'=>'required',
            'uploadfile'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('uploadfile')) {
            $file = $request->file('uploadfile');
            $filename = time().'_'.$file->getClientOriginalName();

         // File upload location
            $location = 'upload';

         // Upload file
            $file->move($location,$filename);

          

    
        }

        $data = $request->all();
        $data['uploadfile'] = $filename;

        Student::create($data); 

        return redirect()->route('students.index')
        ->with('success','Students created successfully.'); 
    }

   

    public function edit(Student $student)
    {
        return view('students.edit',compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        dd($request->file('uploadfile'));
        $request->validate([
            'studname'=>'required',
            'course'=>'required',
            'fee'=>'required',
            'uploadfile'=>'required',

        ]);

        $student->update($request->all());
        return redirect()->route('students.index')
            ->with('success','Student updated successfully');
    }

    public function destroy(Student $student)
    {
        
        $student->delete();

        return redirect()->route('students.index')
        ->with('success','Student deleted successfully');
    }
}
