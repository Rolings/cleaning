<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TermsCondition\StoreTermsConditionRequest;
use App\Http\Requests\Admin\TermsCondition\UpdateTermsConditionRequest;
use App\Models\TermCondition;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TermsConditionController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $item = TermCondition::when($request->route()->named('admin.condition.cookies.edit'), function ($query) {
            return $query->pageCookies();
        })->when($request->route()->named('admin.condition.privacy-policy.edit'), function ($query) {
            return $query->pagePrivacyPolicy();
        })->when($request->route()->named('admin.condition.terms-condition.edit'), function ($query) {
            return $query->pageTermsCondition();
        })->first();

        return view('admin.terms-condition.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTermsConditionRequest $request, TermCondition $termCondition): RedirectResponse
    {
        $termCondition->update($request->validated());

        return redirect()->back();
    }
}
