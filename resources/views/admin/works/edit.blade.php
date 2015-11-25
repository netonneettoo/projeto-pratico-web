@extends('layouts.biblioteca')

@section('styles')
@endsection

@section('content')

    <div class="col-md-12">
        <div class="container">

            <div class="col-sm-5">
                <h3>Admin Works Edit</h3>

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @include('admin.works.form', ['formUrl' => '/admin/works/' . $work->id, 'formMethod' => 'PUT'])
            </div>

        </div>
    </div>

@endsection

@section('scripts')
@endsection