<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Review\StoreReviewRequest;
use App\Http\Requests\Admin\Review\UpdateReviewRequest;
use App\Models\Review;
use App\Services\File\FileService;
use Illuminate\Http\RedirectResponse;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::orderBy('created_at', 'desc')->paginate(15);

        return view('admin.reviews.index', [
            'items' => $reviews
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReviewRequest $request, Review $review, FileService $fileService)
    {
        $file = $request->hasFile('image')
            ? $fileService->setParams($request, 'image', 'public')->storeFile()->id
            : null;

        $review->fill(array_merge($request->validated(), [
            'image_id' => $file,
            'approved' => true
        ]))->save();

        return redirect()->route('admin.reviews.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        return view('admin.reviews.edit', [
            'item' => $review
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReviewRequest $request, Review $review, FileService $fileService): RedirectResponse
    {
        $file = $request->hasFile('image')
            ? $fileService->setParams($request, 'image', 'public')->storeFile($review->image_id)->id
            : $review->image_id;

        $review->fill(array_merge($request->all(), [
            'image_id' => $file,
            'approved' => true
        ]))->save();

        return redirect()->route('admin.reviews.index');
    }

    /**
     * @param Review $review
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approve(Review $review): RedirectResponse
    {
        $review->update(['approve' => true]);

        return redirect()->route('admin.reviews.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review, FileService $fileService): RedirectResponse
    {
        $review->load('image');

        if (!is_null($review->image)) {
            $fileService->remove($review->image);
        }

        $review->delete();

        return redirect()->route('admin.reviews.index');
    }
}
