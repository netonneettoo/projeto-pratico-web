@extends('layouts.biblioteca')

@section('styles')
@endsection

@section('content')

    <div class="col-md-12">
        <div class="container">

            <div class="col-sm-5">
                <h3>Admin Works Show</h3>

                Título: <br />
                <b>{{ $work->title }}</b> <br /><br />

                Edição: <br />
                <b>{{ $work->edition }}</b> <br /><br />

                Ano de Publicação: <br />
                <b>{{ $work->publication_year }}</b> <br /><br />

                ISBN: <br />
                <b>{{ $work->isbn }}</b> <br /><br />

                Preço: <br />
                <b>{{ $work->price }}</b> <br /><br />

                Editora: <br />
                <b>{{ $work->publisher->name }}</b> <br /><br />

                Tipo da Obra: <br />
                <b>{{ $work->work_type->description }}</b> <br /><br />

                Status: <br />
                <b>{{ $work->status }}</b> <br /><br />
            </div>

        </div>
    </div>

@endsection

@section('scripts')
@endsection