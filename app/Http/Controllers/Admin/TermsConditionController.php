<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TermsCondition\StoreTermsConditionRequest;
use App\Http\Requests\Admin\TermsCondition\UpdateTermsConditionRequest;
use App\Models\TermCondition;

class TermsConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = TermCondition::all();

        return view('pages.admin.terms_conditions.index', [
            'items' => $items
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TermCondition $termCondition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTermsConditionRequest $request, TermCondition $termCondition)
    {
        //
    }
}
