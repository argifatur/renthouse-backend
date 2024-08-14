<?php

namespace App\Http\Controllers\API;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class ListingController extends Controller
{
    public function index(): JsonResponse {
        $listings = Listing::withCount('transaction')->orderBy('transaction_count', 'desc')->paginate();

        return response()->json([
            'success' => true,
            'message' => 'get all listings',
            'data' => $listings
        ]);
    }

    public function show(Listing $listing): JsonResponse {
        return response()->json([
            'success' => true,
            'message' => 'get detail listing',
            'data' => $listing
        ]);
    }
}
