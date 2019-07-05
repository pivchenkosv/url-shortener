@extends('app')

@section('content')

    <div class='container jumbotron card shadow w-25 py-4 my-4'>
        <div class='my-3 info' id='info'>
            <p>Short URL:&nbsp; {{env('APP_URL', 'shourl.loc/') . $url->code}}</p>
            <p>Original URL:&nbsp; {{$url->original_url}}</p>
            <p>Usage quantity:&nbsp; {{$url->usage_quantity ?? 0}}</p>
        </div>
        @if($errors->first())
            <div class="alert alert-danger small py-0 mt-1" role="alert">
                {{$errors->first()}}
            </div>
        @endif
    </div>

@endsection
