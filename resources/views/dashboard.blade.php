@extends('layouts.app')

@section('title', 'Home')

@push('style')
    <style>
        #searchInput {
            padding: 10px 22px;
            border-color: var(--primary-bg-color-dark);
            min-width: 350px;
        }

        .searchInput-icon {
            right: 22px;
            top: 50%;
            transform: translateY(-50%);
        }
    </style>
@endpush

@section('content')
    <h3 class="typewriter mb-4">
        <span id="typewriterText">What pet are you looking for?</span>
    </h3>

    <form class="d-flex justify-content-center w-100" style="max-width: 800px;" action="{{ route('search') }}" method="GET">
        <div class="position-relative w-100">
            <input
                    id="searchInput" class="form-control me-2 rounded-5 form-control-lg" type="search"
                    placeholder="Search" aria-label="Search"
                    name="search"
                    value="{{ request()->get('search') }}"
            >
            <i class="ph ph-magnifying-glass position-absolute searchInput-icon"></i>
        </div>
    </form>

    <div class="mt-4">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 rows-col-xl-4 g-4">
            @foreach($breeds as $breed)

                <div class="col">
                    <div class="card h-100">
                        @if(Arr::get($breed, 'image.url'))
                        <a href="{{ route('breed.show', Arr::get($breed, 'id')) }}">
                            <img src="{{ Arr::get($breed, 'image.url') }}" class="card-img-top img-thumbnail" alt="{{ Arr::get($breed, 'name') }}">
                        </a>
                        @endif
                        <div class="card-body">
                            <h3 class="card-title">{{ Arr::get($breed, 'name') }}</h3>
                            <p>
                                {{ Arr::get($breed, 'description') }}
                            </p>

                            <a href="{{ route('breed.show', Arr::get($breed, 'id')) }}" class="btn btn-primary">More info</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@push('scripts')
    <script>

    </script>
@endpush
