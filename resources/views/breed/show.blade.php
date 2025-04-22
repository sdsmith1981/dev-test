@extends('layouts.app')

@section('title', 'Home')

@push('style')
    <style>

    </style>
@endpush

@section('content')
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                @if(Arr::get($image, 'url'))
                <img
                        src="{{ Arr::get($image, 'url') }}" class="img-fluid rounded-start"
                        alt="{{ Arr::get($breed, 'name') }}"
                >
                @endif
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5>{{ Arr::get($breed, 'name') }}</h5>
                    <p class="card-text"> {{ Arr::get($breed, 'description') }}</p>
                    <p class="card-text">
                        @foreach(explode(',', Arr::get($breed, 'temperament', '')) as $temperament)
                            <span class="badge badge-pill badge-info">{{ $temperament }}</span>
                        @endforeach
                    </p>
                </div>
            </div>
        </div>

        <table class="table">
            <tbody>
            @if(Arr::get($breed, 'alt_names'))
                <tr>
                    <th scope="row">Alternative Names</th>
                    <td>{{ Arr::get($breed, 'alt_names') }}</td>
                </tr>
            @endif
            <tr>
                <th scope="row">Origin</th>
                <td>{{ Arr::get($breed, 'origin') }}</td>
            </tr>
            <tr>
                <th scope="row">Life Expectancy</th>
                <td>{{ Arr::get($breed, 'life_span') }}</td>
            </tr>
            </tbody>
        </table>

        <a href="{{ Arr::get($breed, 'wikipedia_url') }}" class="btn btn-primary" target="_blank">Wikipedia</a>
    </div>

    <div class="container">
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Go Back</a>
    </div>

@endsection

@push('scripts')
    <script>

    </script>
@endpush
