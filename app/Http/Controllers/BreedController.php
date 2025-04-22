<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;

class BreedController extends Controller
{
    public function __construct(
        protected \App\Contracts\PetApiInterface $petApiService
    ) {}

    public function __invoke(string $breedId)
    {

        $breed = Cache::remember('breeds_'.$breedId, now()->addDay(), function () use ($breedId) {
            return $this->petApiService->getBreed($breedId);
        });

        if (empty($breed)) {
            abort(404, 'Breed not found');
        }

        $imageId = $breed['reference_image_id'] ?? null;
        $image = Cache::remember('breeds_'.$imageId.'_image', now()->addDay(), function () use ($imageId) {
            return $this->petApiService->getImage($imageId);
        });

        return view('breed.show', [
            'breed' => $breed,
            'image' => $image,
        ]);
    }
}
