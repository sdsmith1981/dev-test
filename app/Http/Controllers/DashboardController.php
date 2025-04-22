<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    public function __construct(
        protected \App\Contracts\PetApiInterface $petApiService,
    ) {}

    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\View\View
     */
    public function __invoke()
    {

        $breeds = Cache::remember('breeds', now()->addDay(), function () {
            return $this->petApiService->getBreeds();
        });

        return view(
            'dashboard',
            [
                'breeds' => $breeds,
            ],
        );
    }
}
