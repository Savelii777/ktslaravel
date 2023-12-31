<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Test;
use App\Models\Chapter;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;


class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
{
    $questions = Order::orderBy('created_at', 'desc');
    $keyword = $request->input('keyword');

    if ($keyword) {
        $questions = $questions->where(function ($query) use ($keyword) {
            $query->where('created_at', 'LIKE', "%$keyword%")
            ->orWhere('user_info', 'LIKE', "%$keyword%");
        });
    }

    $questions = $questions->get();


    return view('admin.test.index', compact('questions'));

}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create() //Добавить вопросы в базу
    {
        //Получить из базы список глав.
        return view('admin.quetions.create');
        // Пример сохранения вопросов в таблицу

    }
    public function updateStatus($id)
    {
        $order = Order::find($id);

        if ($order) {
            // Если статус "Принят", измените его на "Готов"
            if ($order->is_ready === 'В работе') {
                $order->is_ready = 'Готов';
                $order->save();
            }
        }

        return redirect()->back();
    }
    public function testStore(Request $request)
    {
        //return $request;
        $input = $request->all(); // получаем все значения формы

        $input['questions'] = array_map(function ($question) {
            $question['answers'] = array_filter($question['answers'], 'strlen');
            return $question;
        }, $input['questions']); // удаляем все элементы со значением null внутри массива вопросов
        $image = "";

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $imageName);
            $image=$imageName;
        }


        // return $input['manual_answer'];
        $chapter_number = $input['chapter_number'];
        // $chapter_number = $request->input('chapter_number');
        //$questions = $request->input('questions');
        $questions = $input['questions'];
        $chapterExists = Chapter::where('order', $chapter_number)->exists();
        //Нужно получить из таблицы Chapter
        //return $chapterExists;

        if (!$chapterExists) {
            return redirect()
                ->back()
                ->withErrors(['Глава с номером ' . $chapter_number . ' не найдена']);
        }
        $chapter = Chapter::where('order', $chapter_number)->first();
        //return $chapter->id;
        //$course_number = $request->input('course_number');


        $preparedQuestions = array();
        if (isset($input['manual_answer'])) {
            // выполнить какие-то действия
            if ($input['manual_answer'] == 'on') {

                foreach ($questions as $id => $item) {
                    $question = array(
                        "question" => $item["question"],
                        "answers" => array("Свободный ответ"),
                        "correct_answer" => array("Свободный ответ"),
                        "image" => $image
                    );
                    $preparedQuestions[] = $question;
                }
            }
        } else {



            foreach ($questions as $id => $item) {

                if (!isset($item["correct_answer"])) {
                    return redirect()
                        ->back()
                        ->withErrors(['Правильный ответи не выбран!']);
                }

                $question = array(
                    "question" => $item["question"],
                    "answers" => array_values($item["answers"]),
                    "correct_answer" => $item["correct_answer"],
                    "image" => $image
                );
                $preparedQuestions[] = $question;
            }
        }




        Question::create([
            'test_id' => $chapter->id,
            'data' => json_encode($preparedQuestions)
        ]);

        return redirect()
            ->route('tests.home')
            ->with('success', 'Вопрос успешно добавлен!');
    }

    //Метод, обрабатывает кнопку - добавить тест
    public function createOfChapter(Chapter $chapter)
    {


        return view('admin.test.create', [
            'chapter' => $chapter,
        ]);
    }

    public function questions(Test $test)
    {
        return view('admin.test.questions', [
            'test' => $test
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = $request->validate(
            [
                'min_correct' => 'required|integer',
                'minutes' => 'required|integer'
            ],
            [
                'min_correct.required' => 'Поле минимальное количество верных ответов должно быть заполено!',
                'minutes.required' => 'Поле минуты должно быть заполено!',
                'integer' => 'Укажите целое число!',
            ]
        );

        Test::create([
            'min_correct' => $request->get('min_correct'),
            'minutes' => $request->get('minutes'),
            'chapter_id' => $request->get('chapter_id')
        ]);

        return redirect()
            ->route('chapter.tests', $request->get('chapter_id'))
            ->with('success', 'Тест успешно добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function editQuestion(Question $question)
    {
        $data = json_decode($question->data, true);

        if (isset($data[0]['answers'][0])) {
             if ($data[0]['answers'][0] === 'Свободный ответ') {
                return view('admin.quetions.editFreeAnswer', ['question' => $question]);

            }
        }



        return view('admin.quetions.edit', ['question' => $question]);
    }

    public function updateQuestion(Request $request, Question $question)
    {

        //return $request;
        $input = $request->all(); // получаем все значения формы
        $input['questions'] = array_map(function ($question) {
            $question['answers'] = array_filter($question['answers'], 'strlen');
            return $question;
        }, $input['questions']); // удаляем все элементы со значением null внутри массива вопросов
        $image = "";

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $imageName);
            $image = $imageName;
        }


        $whereid = $question['id'];
        //$course_number = $request->input('course_number');
        $chapter_number = $request->input('chapter_number');
        $questions = $input['questions'];

        //return $whereid;




        $preparedQuestions = array();
        if($questions[1]['answers']===[]){
            // выполнить какие-то действия
            foreach ($questions as $id => $item) {
                $question = array(
                    "question" => $item["question"],
                    "answers" => array("Свободный ответ"),
                    "correct_answer" => array("Свободный ответ"),
                    "image" => $image
                );
                $preparedQuestions[] = $question;
            }
        } else {

            foreach ($questions as $id => $item) {
                $question = array(
                    "question" => $item["question"],
                    "answers" => array_values($item["answers"]),
                    "correct_answer" => $item["correct_answer"],
                    "image" => $image
                );
                $preparedQuestions[] = $question;

            }
        }
        //return $whereid;
        Question::where('id', $whereid)
            ->update([
                'test_id' => $chapter_number,
                'data' => json_encode($preparedQuestions)
            ]);

        return redirect()
            ->route('tests.home')
            ->with('success', 'Вопрос успешно добавлен!');
    }

    public function destroyQuestion(Question $question)
    {
        $question->delete();

        return redirect()->back()->withSuccess('Вопрос успешно удален!');
    }

    public function getQuetions(Test $test) //Получить вопросы из базы
    {


        //получения вопросов из таблицы
        $questions = Question::where('test_id', $test->id)->get();
        $questionDataList = array();
        foreach ($questions as $question) {
            $questionDataList[] = json_decode($question->data, true);
        }
        return $questionDataList;
        //echo $questionData[0]['question'];
        //echo $questionData[0]['answers'][0];
        //echo $questionData[0]['answers'][1];
        //echo $questionData[0]['answers'][2];
        //echo $questionData[0]['correct_answer'];
    }
    public function editOfChapter(Chapter $chapter, Test $test)
    {
        $questions = $this->getQuetions($test);
        //return $questions;
        return view('admin.test.edit', [
            'test' => $test,
            'chapter' => $chapter,
            'questions' => $questions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $test)
    {
        $validator = $request->validate(
            [
                'min_correct' => 'required|integer',
                'minutes' => 'required|integer'
            ],
            [
                'min_correct.required' => 'Поле минимальное количество верных ответов должно быть заполено!',
                'minutes.required' => 'Поле минуты должно быть заполено!',
                'integer' => 'Укажите целое число!',
            ]
        );


        $test->min_correct = $request->get('min_correct');
        $test->minutes = $request->get('minutes');
        $test->save();

        return redirect()
            ->route('chapter.tests', $request->get('chapter_id'))
            ->with('success', 'Тест успешно отредактирован');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        $test->delete();

        return redirect()->back()->withSuccess('Тест успешно удален!');
    }
}
