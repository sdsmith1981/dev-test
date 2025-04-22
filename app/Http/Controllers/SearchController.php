<?php

namespace App\Http\Controllers;

use App\Http\SearchRequest;
use Illuminate\Support\Facades\Cache;

class SearchController extends Controller
{
    public function __construct(
        protected \App\Contracts\PetApiInterface $petApiService,
    ) {}

    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\View\View
     */
    public function __invoke(SearchRequest $request)
    {
        $search = $request->input('search');
        $breeds = Cache::remember('breeds_'.$search, now()->addDay(), function () use ($search) {
            return $this->petApiService->searchBreed($search);
        });

        return view(
            'dashboard',
            [
                'breeds' => $breeds,
            ],
        );
    }
}
