@extends('layouts.biblioteca')

@section('styles')
@endsection

@section('content')

    <div class="col-md-12">
        <div class="container">

            <div class="col-sm-5">
                <h3>Admin Users Create</h3>

                @include('admin.users.form', ['formUrl' => 'users', 'formMethod' => 'post', 'user' => $user])
            </div>

        </div>
    </div>

@endsection

@section('scripts')
@endsection