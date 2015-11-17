@extends('layouts.biblioteca')

@section('styles')
@endsection

@section('content')

    <div class="col-md-12">
        <div class="container">

            <div class="col-sm-5">
                <h3>Admin Users Show</h3>

                Name: <br />
                <b>{{ $user->name }}</b> <br /><br />

                Email: <br />
                <b>{{ $user->email }}</b> <br /><br />

                Telephone: <br />
                <b>{{ $user->telephone }}</b> <br /><br />
            </div>

        </div>
    </div>

@endsection

@section('scripts')
@endsection