<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\Review\StoreReviewRequest;
use App\Models\Review;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::paginate(15);

        return view('main.reviews.index', [
            'items' => $reviews
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReviewRequest $request)
    {
        try {
            Review::create([
                'service_id' => $request->service_id,
                'name'       => $request->name,
                'phone'      => $request->phone,
                'comment'    => $request->comment,
                'rating'     => 5,
                'active'     => false,
                'approve'    => false,
            ]);

            return response()->json(['status' => 'success', 'message' => 'Your review successfully submitted!.']);

        } catch (\Exception $exception) {
            logger()->error($exception->getMessage());

            return response()->json(['status' => 'error', 'message' => 'Something wrong, try again'], 404);
        }
    }
}
