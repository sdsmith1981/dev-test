<?php

namespace App\Services;

use App\Contracts\PetApiInterface;
use App\Exceptions\CatApiException;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

class CatApiService implements PetApiInterface
{
    protected string $apiKey;

    protected string $baseUrl;

    protected bool $attachImage = true;

    public function __construct()
    {

        throw_if(empty(config('services.cat_api.api_key')), CatApiException::class, 'API key is not set');
        throw_if(empty(config('services.cat_api.base_url')), CatApiException::class, 'Base URL is not set');
        $this->apiKey = config('services.cat_api.api_key');
        $this->baseUrl = config('services.cat_api.base_url');
    }

    /**
     * @throws \Throwable
     * @throws CatApiException
     * @throws ConnectionException
     */
    protected function performLookup($url, $params = [])
    {

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'x-api-key' => $this->apiKey,
        ])->get($this->baseUrl.$url, $params);

        if ($response->failed()) {
            throw new CatApiException('Failed to fetch data from Cat API: '.$response->body(), $response->status());
        }

        return $response->json();
    }

    /**
     * @throws CatApiException
     */
    public function getBreeds(): array
    {
        return $this->performLookup('breeds');
    }

    /**
     * @throws CatApiException
     */
    public function getBreed(string $breedId): array
    {
        return $this->performLookup('breeds/'.$breedId);
    }

    /**
     * @throws CatApiException
     */
    public function getBreedFacts(string $breedId): array
    {
        return $this->performLookup('breeds/'.$breedId.'/facts');
    }

    /**
     * @throws CatApiException
     */
    public function searchBreed(string $search): array
    {
        return $this->performLookup('breeds/search', [
            'q' => $search,
            'attach_image' => $this->attachImage,
        ]);
    }

    /**
     * @throws CatApiException
     */
    public function getImage(string $imageId): array
    {
        return $this->performLookup('images/'.$imageId);
    }
}
