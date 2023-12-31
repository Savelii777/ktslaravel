<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Test;
use App\Models\Store;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tests(Chapter $chapter)
    {
        //test_id может вызвать проблему.
        //Сделать так, что бы вытягивались данные из тоблицы вопросы
        //Страница со всеми тестами
        $questions = Question::where('test_id', $chapter->id)->get();
        //return $questions[0];
        return view('admin.chapter.tests', [
            'chapter' => $chapter,
            'questions' =>$questions
        ]);
    }

    public function index()
    {
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

    public function createOfCourse(Course $course)
    {
        return view('admin.chapter.create', [
            'course' => $course,
        ]);
    }

    public function viewChapterCount()
    {
        $user = Auth::user();
        if ($user === null) {
            return redirect('/login');
        }
        $chapterCount = Chapter::count();
        return view('index', ['chapterCount' => $chapterCount]);
    }

    public function files(Chapter $chapter)
    {
        return view('admin.chapter.files', [
            'chapter' => $chapter
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = $request->validate([
            'title' => 'required|max:255',
            'order' => 'integer'
        ],
            [
                'title.required' => 'Поле название должно быть заполено!',
                'max' => 'Максимальная длина параметра 255 символов!',
                'order.integer' => 'Порядок должен быть целым числом',
            ]);

            $chapter_id = Chapter::create([
                'title' => $request->get('title'),
                'order' => $request->get('order'),
                'course_id' => $request->get('course_id')
            ])->id;

        Test::create([
            'min_correct' => 1,
            'minutes' => 25,
            'chapter_id' => $chapter_id
        ]);


        return redirect()
            ->route('course.chapters', $request->get('course_id'))
            ->with('success', 'Глава успешно добавлена');


    }


    public function editOfCourse(Course $course, Chapter $chapter)
    {
        return view('admin.chapter.edit', [
            'course' => $course,
            'chapter' => $chapter,
        ]);
    }

    public function update(Request $request, Chapter $chapter)
    {
        $validator = $request->validate([
            'title' => 'required|max:255',
            'order' => 'integer'
        ],
            [
                'title.required' => 'Поле название должно быть заполено!',
                'max' => 'Максимальная длина параметра 255 символов!',
                'order.integer' => 'Порядок должен быть целым числом',
            ]);

        $chapter->title = $request->get('title');
        $chapter->order = $request->get('order');
        $chapter->save();

        return redirect()
            ->route('course.chapters', $request->get('course_id'))
            ->with('success', 'Глава успешно отредактирована');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Chapter $chapter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chapter $chapter)
    {
        $chapter->delete();

        return redirect()->back()->withSuccess('Глава успешно удалена!');
    }
}
