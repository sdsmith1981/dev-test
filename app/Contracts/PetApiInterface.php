<?php

namespace App\Contracts;

interface PetApiInterface
{
    public function getBreeds(): array;

    public function getBreed(string $breedId): array;

    public function getBreedFacts(string $breedId): array;

    public function searchBreed(string $search): array;

    public function getImage(string $imageId): array;
}
