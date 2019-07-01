@extends('welcome')

@section('content')

    <div class='container jumbotron card shadow w-25 py-4 my-4'>
        <div class='my-3 info' id='info'>
            <p>Short URL:&nbsp; {{'shourl.loc/'.$shortUrl}}</p>
            <p>Original URL:&nbsp; {{$originalUrl}}</p>
            <p>Usage quantity:&nbsp; {{$usage_quantity ?? 0}}</p>
        </div>
    </div>

@endsection
