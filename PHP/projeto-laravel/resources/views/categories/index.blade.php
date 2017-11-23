@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('partials/alerts')

                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Lista de Categoria</h1></div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="content-section mt-20">
                                <p class="clearfix">
                                    <a href="{{ route('categories.create') }}" class="btn btn-success pull-right">Nova Categoria</a>
                                </p>

                                <table class="table mt-20">                
                                    <tr>
                                        <th class="col-md-2">ID</th>
                                        <th class="col-md-9">Nome</th>
                                        <th class="col-md-1">Ações</th>
                                    </tr>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td class="col-sm-2">{{ $category->id }}</td>
                                            <td class="col-md-8">{{ $category->nome }}</td>
                                            <td class="col-md-1">
                                                <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-sm">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['categories.destroy', $category->id], 'class' => 'pull-right', 'onsubmit' => 'return confirm("Você tem certeza?")']) !!}
                                                    {!! Form::hidden('id', $category->id) !!}
                                                    {!! Form::button('<i class="fa fa-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-sm')) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>                        
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection