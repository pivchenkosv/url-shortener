@extends('app')

@section('content')

    <div class='container jumbotron card shadow w-25 py-4 my-4'>
        <form method='post' action="/urls">
            {{ csrf_field() }}
            <div>
                <h3 class='modal-title mb-2'>Create your short url</h3>
            </div>
            <div class='container row justify-content-between'>
                <input class="form-control col-9"
                       type='text'
                       name='link'
                       placeholder="Enter your URL here"
                />
                <button type='submit'
                        class='btn btn-primary float-right'
                >Create
                </button>
                <div id="message">
                    @include('flash-message')
                </div>
            </div>
        </form>
    </div>

@endsection
