<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\Question\StoreQuestionRequest;
use App\Models\Question;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $questions = Question::onlyActive()->orderBy('top', 'DESC')->orderBy('active', 'DESC')->get();

        return view('main.questions.index', [
            'items' => $questions
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuestionRequest $request): JsonResponse
    {
        try {
            Question::create($request->validated());
        } catch (\Exception $exception) {

            logger()->error($exception);

            return response()->json(['status' => 'error', 'message' => 'Something wrong'], 404);
        }

        return response()->json(['status' => 'success', 'message' => 'Your question has been created!']);
    }
}
