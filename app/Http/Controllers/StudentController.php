<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Mark;
use Lang; 
use Session;
use Redirect;
use Crypt;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::with('Teacher')->orderby('id','desc')->get();
        return view('student',['students'=>$students,'layout'=>'index']);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teacher = Teacher::all();
        return view('student',['teachers'=>$teacher,'layout'=>'create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $validator       =   Validator::make($request->all(), [
                'name'       => 'required',
                'teacher_id' => 'required'
            ]);
        if($validator->fails()) { return Redirect::back()->withErrors($validator); }
        $student             = new Student();
        $student->name       = ucwords($request->input('name'));
        $student->age        = $request->input('age');
        $student->gender     = $request->input('gender');
        $student->teacher_id = $request->input('teacher_id');
        $student->save();
        $created = Lang::get('language.STUDENT_SUCCESS');
        Session::flash('success', $created);
        return redirect('/student');
        } catch(Exception $e){
            return Redirect::back()->withError($e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $student = Student::find($id);
       return view('student',['student'=>$student,'student'=>$student,'layout'=>'show']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id      = Crypt::decrypt($id);
        $student = Student::find($id);
        $teacher = Teacher::all();
        return view('student',['student'=>$student,'teachers'=>$teacher,'layout'=>'edit']);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         try{
            $validator       =   Validator::make($request->all(), [
                'name'       => 'required',
                'teacher_id' => 'required'
            ]);
        if($validator->fails()) { return Redirect::back()->withErrors($validator); }
        $id              = Crypt::decrypt($id);
        $student =Student::find($id);
        $student->name       = ucwords($request->input('name'));
        $student->age        = $request->input('age');
        $student->gender     = $request->input('gender');
        $student->teacher_id = $request->input('teacher_id');
        $student->save();
        return redirect('/student');
         } catch(Exception $e){
            return back()->withError($e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id          = Crypt::decrypt($id);
        $student =Student::find($id);
        $student->delete();
        return redirect('/student');
    }

    /*Student mark create section*/
    public function studentmarks(Request $request){
        $students = Student::orderby('id','desc')->get();
        return view('student',['students'=>$students,'layout'=>'studentmarks']);

    }

    /*add student mark*/
    public function addstudentmarks(Request $request){
        try{
            $validator       =   Validator::make($request->all(), [
                'student_id' => 'required',
            ]);
        if($validator->fails()) { return Redirect::back()->withErrors($validator); }
        $total =0;
        $total = $request->input('maths') + $request->input('science') + $request->input('history');
        $mark             = new Mark();
        $mark->student_id = $request->input('student_id');
        $mark->term       = $request->input('term');
        $mark->maths      = $request->input('maths');
        $mark->science    = $request->input('science');
        $mark->history    = $request->input('history');
        $mark->total      = $total;
        $mark->save();
        $created          = Lang::get('language.STUDENT_SUCCESS');
        Session::flash('success', $created);
        return redirect('/marklist');
        } catch(Exception $e){
            return Redirect::back()->withError($e->getMessage())->withInput();
        }
    }

    /*student mark list*/
    public function marklist() {
        $marks = Mark::with('Student')->orderby('id','desc')->get();
        return view('student',['marks'=>$marks,'layout'=>'marklist']);
    }

    /*student mark edit*/
    public function markedit($id)
    {
        $id   = Crypt::decrypt($id);
        $mark = Mark::find($id);
        $students = Student::orderby('id','desc')->get();
        return view('student',['students'=>$students,'mark'=>$mark,'layout'=>'editmark']);

    }

    /*student mark update*/
    public function markupdate(Request $request, $id)
    {
         try{
            $validator       =   Validator::make($request->all(), [
                'student_id'       => 'required'
            ]);
        if($validator->fails()) { return Redirect::back()->withErrors($validator); }
        $total =0;
        $total = $request->input('maths') + $request->input('science') + $request->input('history');
        $id              = Crypt::decrypt($id);
        $mark =Mark::find($id);
        $mark->student_id = $request->input('student_id');
        $mark->term       = $request->input('term');
        $mark->maths      = $request->input('maths');
        $mark->science    = $request->input('science');
        $mark->history    = $request->input('history');
        $mark->total      = $total;
        $mark->save();
        return redirect('/marklist');
         } catch(Exception $e){
            return back()->withError($e->getMessage())->withInput();
        }
    }

    /*student mark delete*/
    public function markdelete($id)
    {
        $id          = Crypt::decrypt($id);
        $mark =Mark::find($id);
        $mark->delete();
        return redirect('/marklist');
    }
    
}
