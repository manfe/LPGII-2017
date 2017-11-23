@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Dashboard</h1></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row" id="blocos">
                        <div class="col-md-4">
                            <p>CRUD Categorias</p>
                            <a href=" {{ route('categories.index') }}" class="btn btn-large btn-primary">Listar Categorias</a>
                            <br /><br />
                            <p>Uma categoria terá vários posts.</p>
                        </div>
                        <div class="col-md-4">
                            <p>CRUD Posts</p>
                            <a href=" {{ route('home') }}" class="btn btn-large btn-primary">Listar Posts</a>
                            <br /><br />
                            <p>Um post pertencerá a uma categoria e <br /> terá uma ou várias tags.</p>
                        </div>
                        <div class="col-md-4">
                            <p>CRUD Tags</p>
                            <a href=" {{ route('home') }}" class="btn btn-large btn-primary">Listar Tags</a>
                            <br /><br />
                            <p>Uma tag pertencerá/terá um ou vários posts.</p>
                        </div>
                    <div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
