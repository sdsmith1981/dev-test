<?php

namespace Tests\Feature;

use App\Exceptions\CatApiException;
use App\Services\CatApiService;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class CatApiServiceTest extends TestCase
{
    public function testFetchesAllBreeds()
    {
        Config::set('services.cat_api.api_key', 'test_api_key');
        Config::set('services.cat_api.base_url', 'https://api.example.com/');
        Http::fake([
            'https://api.example.com/breeds' => Http::response([
                ['id' => '1', 'name' => 'Breed 1'],
                ['id' => '2', 'name' => 'Breed 2'],
            ], 200),
        ]);

        $service = new CatApiService;
        $breeds = $service->getBreeds();

        $this->assertIsArray($breeds);
        $this->assertCount(2, $breeds);
    }

    public function testThrowsExceptionWhenApiKeyIsMissing()
    {
        Http::fake();
        Config::set('services.cat_api.api_key', null);

        $this->expectException(CatApiException::class);
        $this->expectExceptionMessage('API key is not set');

        $service = new CatApiService;
        $service->getBreeds();
    }

    public function testThrowsExceptionWhenBaseUrlIsMissing()
    {

        Http::fake();
        Config::set('services.cat_api.base_url', null);

        $this->expectException(CatApiException::class);
        $this->expectExceptionMessage('Base URL is not set');

        $service = new CatApiService;
        $service->getBreeds();
    }

    public function testHandlesFailedApiResponseGracefully()
    {
        Config::set('services.cat_api.api_key', 'test_api_key');
        Config::set('services.cat_api.base_url', 'https://api.example.com/');
        Http::fake([
            'https://api.example.com/breeds' => Http::response('Error', 500),
        ]);

        $this->expectException(CatApiException::class);
        $this->expectExceptionMessage('Failed to fetch data from Cat API: Error');

        $service = new CatApiService;
        $service->getBreeds();
    }

    public function testFetchesBreedDetailsSuccessfully()
    {
        Config::set('services.cat_api.api_key', 'test_api_key');
        Config::set('services.cat_api.base_url', 'https://api.example.com/');
        Http::fake([
            'https://api.example.com/breeds/1' => Http::response(['id' => '1', 'name' => 'Breed 1'], 200),
        ]);

        $service = new CatApiService;
        $breed = $service->getBreed('1');

        $this->assertIsArray($breed);
        $this->assertArrayHasKey('id', $breed);
        $this->assertEquals('1', $breed['id']);
    }

    public function testSearchesForABreedSuccessfully()
    {
        Config::set('services.cat_api.api_key', 'test_api_key');
        Config::set('services.cat_api.base_url', 'https://api.example.com/');
        Http::fake([
            'https://api.example.com/breeds/search?q=siamese&attach_image=1' => Http::response([
                ['id' => '1', 'name' => 'Siamese'],
            ], 200),
        ]);

        $service = new CatApiService;
        $results = $service->searchBreed('siamese');

        $this->assertIsArray($results);
        $this->assertCount(1, $results);
    }

    public function testFetchesImageDetailsSuccessfully()
    {

        Config::set('services.cat_api.api_key', 'test_api_key');
        Config::set('services.cat_api.base_url', 'https://api.example.com/');
        Http::fake([
            'https://api.example.com/images/abc123' => Http::response(['id' => 'abc123', 'url' => 'https://example.com/image.jpg'], 200),
        ]);

        $service = new CatApiService;
        $image = $service->getImage('abc123');

        $this->assertIsArray($image);
        $this->assertArrayHasKey('id', $image);
        $this->assertEquals('abc123', $image['id']);
    }
}
