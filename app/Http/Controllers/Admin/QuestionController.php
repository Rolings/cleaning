<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Question\StoreQuestionRequest;
use App\Http\Requests\Admin\Question\UpdateQuestionRequest;
use App\Models\Question;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $questions = Question::orderBy('top','DESC')->orderBy('active','DESC')->paginate(5);

        return view('admin.questions.index', [
            'items' => $questions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.questions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuestionRequest $request): RedirectResponse
    {
        Question::create($request->validated());

        return redirect()->route('admin.questions.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question): View
    {
        return view('admin.questions.edit', [
            'item' => $question
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuestionRequest $request, Question $question): RedirectResponse
    {
        $question->update($request->validated());

        return redirect()->route('admin.questions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question): RedirectResponse
    {
        $question->delete();

        return redirect()->route('admin.questions.index');
    }
}
