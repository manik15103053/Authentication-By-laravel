<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Storage;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $students = Student::paginate(5);
        return view('index')->with('students',$students);
    }

    public function create(){

        return view('create');
    }

    public function store(Request $requst){

        $this->validate($requst,[
            'name'               => 'required|string|max: 10',
            'registration_id'    => 'required',
            'department'         => 'required',
            'info'               => 'nullable',
            'image'               => 'nullable'
            

        ]);

         
        $students = new Student();
        $students->name = $requst->name;
        $students->registration_id = $requst->registration_id;
        $students->department = $requst->department;
        $students->info = $requst->info;
        
        if($requst->hasFile('image')){
            // $requst->file('image')->getClientExtention()
            $file = $requst->file('image');
            $fileName = uniqid('upload__',true) .'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/'),$fileName);
            $students->image = $fileName;
        }
        $students->save();
        return redirect()->back()->with('message', 'Registration Successfully ');

 
}

    public function edit($id){
        $student = Student::find($id);
        return view('edit',compact('student'));
    }

    public function update(Request $requst,$id){
            
        $students =  Student::find($id);
        $students->name = $requst->name;
        $students->registration_id = $requst->registration_id;
        $students->department = $requst->department;
        $students->info = $requst->info;
        $students->save();
        return redirect(route('index'))->with('message', 'Successfully Update');
        //return redirect()->back()->with('message', 'Successfully Update');

    }
    public function delete($id){

        Student::find($id)->delete();
        return redirect(route('index'));
        
    }

    public function view(){
        return view('view');
        
    }
///View Page


  public function show($id){

    $student = Student::find($id);

    return view('view',compact('student'));


  } 
}