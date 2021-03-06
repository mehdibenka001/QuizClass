<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Topic;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\Datatables\Datatables;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $section = Section::find($request->query('section_id'));

        $topics=Topic::where('user_id','=',$request->user()->id)->get();

        return View('teacher.questions.index')
        ->with('topics',$topics)
        ->with('section', $section);
    }
    /**
     * This method is for ajax only
     */
    public function ajaxQuestions(Request $request) {
        $sectionOfUser=Section::whereIn('topic_id',$request->user()->topics()->select('id')->get()->toArray())->select('id')->get()->toArray();
        $questionQuery=Question::whereIn('section_id',$sectionOfUser);
        $section_id = (!empty($_GET["section_id"])) ? ($_GET["section_id"]) : ('');
        $search = (!empty($_GET["search"])) ? ($_GET["search"]) : ('');
        if($section_id){
            $questionQuery->whereRaw("questions.section_id = '" . $section_id . "'");
        }
        $questions=$questionQuery->latest('created_at')->select('*');
        return Datatables::of($questions)

        // add actions collumn
        ->addColumn('actions', function (Question $question) {
            return '
            <div class="dropdown">
                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <button
                    data-id="' . $question->id . '"
                    data-type="' . $question->type . '"
                    class="edit dropdown-item">Modifier</button>
                    <button
                    data-id="' . $question->id .'"
                    class="delete dropdown-item">Supprimer</button>
                </div>
            </div>';
        })

        ->addColumn('question', function (Question $question) {
            return '
            <div class="media align-items-center">
                <div class="media-body">
                  <span class="name mb-0 text-sm" id="sectionLabel">' . $question->content . '</span>
                </div>
            </div>
            ';
        })

        ->addColumn('type', function (Question $question) {
            $questionType = 'Multi-choix avec code';

            if($question->type == 2) {
                $questionType = 'Multi-choix avec image';
            } else if ($question->type == 3) {
                $questionType = 'Guess the output';
            }

            return '
            <div class="media align-items-center">
                <div class="media-body">
                  <span class="name mb-0 text-sm" id="sectionLabel">' . $questionType . '</span>
                </div>
            </div>
            ';
        })
        ->addColumn('topic', function(Question $question) {
            return '
            <div class="media align-items-center">
                <a href="#" class="avatar rounded-circle mr-3">
                    <img alt="Image placeholder" src="/uploads/topics/' . $question->section->topic->image . '">
                </a>
                <div class="media-body">
                <span class="name mb-0 text-sm" id="sectionLabel">' . $question->section->topic->label . '</span>
                </div>
            </div>
            ';
            // return $question->section->label;
        })
        ->addColumn('section', function(Question $question) {
            return '
            <div class="media align-items-center">
                <a href="#" class="avatar rounded-circle mr-3">
                    <img alt="Image placeholder" src="/uploads/sections/' . $question->section->image . '">
                </a>
                <div class="media-body">
                <span class="name mb-0 text-sm" id="sectionLabel">' . $question->section->label . '</span>
                </div>
            </div>
            ';
            // return $question->section->topic->label;
        })

        // to interpret html and not considering it as text
        ->rawColumns(['actions', 'type','question', 'section', 'topic'])

        ->toJson();
    }
    /* methode for geting questions of specifique section
    */

    /*
     this method for geting section of topics used in dynamic dropdown menu
    */
    public function getSections($id){
        $sections= Section::where("topic_id",$id)->pluck("label","id");
        return json_encode($sections);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question = new Question();
        if($request->input('type')==1){
        $messages = [
            'correct_answers.required' => 'you must select at least one of the answer as correct',
            ];

        $validator = Validator::make($request->all(), [
            'content' => ['required', 'string'],
            'correct_answers'=>['required'],
            ],$messages);

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()]);
        }
        $question->content=$request->input('content');
        $question->section_id=$request->input('section');
        $question->type=$request->input('type');
        $question->code=$request->input('code');
        $question->save();

        $correctAnswers=$request->input('correct_answers');
        foreach($correctAnswers as $correctAnswer){
            $answer=new Answer();
            $answer->content=$correctAnswer;
            $answer->correct=true;
            $answer->question_id=$question->id;
            $answer->save();
        }

        $wrongAnswers=$request->input('wrong_answers');
        // it could be an empty array if none of answers is correct
        if(is_array($wrongAnswers)){
            foreach($wrongAnswers as $wrongAnswer){
                $answer=new Answer();
                $answer->content=$wrongAnswer;
                $answer->correct=false;
                $answer->question_id=$question->id;
                $answer->save();
            }
        }

        return response()->json(['alert' => 'La question a été ajouté avec succès']);
       }else if($request->input('type')==2){
        $messages = [
            'correct_answers.required' => 'you must select at least one of the answer as correct',
        ];

        $validator = Validator::make($request->all(), [
            'content' => ['required', 'string'],
            'correct_answers'=>['required'],
            'image' => ['required','image','mimes:jpeg,png,jpg,gif', 'max:2084'],
        ],$messages);

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()]);
        }
        $question->content=$request->input('content');
        $question->section_id=$request->input('section');
        $question->type=$request->input('type');
        if($request->hasfile('image')) {
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time() . '.' . $extension;
            $file->move('uploads/questions/',$filename);
            $question->image=$filename;
        }
        $question->save();
        $correctAnswers=json_decode($request->input('correct_answers'), true);
        foreach($correctAnswers as $correctAnswer){
            $answer=new Answer();
            $answer->content=$correctAnswer;
            $answer->correct=true;
            $answer->question_id=$question->id;
            $answer->save();
        }

        $wrongAnswers=json_decode($request->input('wrong_answers'), true);
        // it could be an empty array if none of answers is correct
        if(is_array($wrongAnswers)){
            foreach($wrongAnswers as $wrongAnswer){
                $answer=new Answer();
                $answer->content=$wrongAnswer;
                $answer->correct=false;
                $answer->question_id=$question->id;
                $answer->save();
            }
        }

        return response()->json(['alert' => 'La question a été ajouté avec succès']);

       }else{
        $validator = Validator::make($request->all(), [
            'content' => ['required', 'string'],
            'correct_answer'=>['required'],
            ]);

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()]);
        }
        $question->content=$request->input('content');
        $question->section_id=$request->input('section');
        $question->type=$request->input('type');
        $question->code=$request->input('code');
        $question->save();

        $answer=new Answer();
        $answer->content=$request->input('correct_answer');
        $answer->correct=true;
        $answer->question_id=$question->id;
        $answer->save();
        return response()->json(['alert' => 'La question a été ajouté avec succès']);

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question=Question::findOrFail($id);
        $question->delete();
        return redirect('questions');
    }
}
