@extends('layouts.template')
@section('title', 'Lista de Categorías')
@section('styles')
  <style type="text/css">
    .unstyled-button{
      border: none;
      padding: 0;
      background: none;
    }
  </style>
@endsection
@section('content')
	<div class="content-wrapper">
          <div class="page-header">
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item d-none d-lg-flex">
                <a class="nav-link" href="{{ route('categories.create') }}">
                  <span class="btn btn-primary">+ Crear </span>
                </a>
                
                <a class="nav-link ml-2" href="#">
                  <span class="btn btn-success"><i class="fas fa-download"></i> Exportar</span>
                </a>
              </li>
              
            </ul>
            <h3 class="page-title">
              Lista de Categorias
            </h3>
            
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Categorias</li>
              </ol>
            </nav>
          </div>
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Categorias</h4>

              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOMBRE</th>
                            <th>DESCRIPCIÓN</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($categories as $category)
                        	<tr>
                            <td scope="row">{{ $category->id }}</td>
                            <td>
                              <a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a>
                              
                            </td>
                            <td>{{ $category->description }}</td>
                            <td>
                              {!! Form::open(['route' => ['categories.destroy', $category ], 'method' => 'DELETE']) !!}
                                 <a href="{{ route('categories.edit', $category) }}" title="Editar" class="jsgrid-button jsgrid-edit-button">
                                   <i class="far fa-edit"></i>
                                 </a>
                                 <button title="Eliminar" class="jsgrid-button jsgrid-delete-button unstyled-button">
                                   <i class="far fa-trash-alt" type="submit"></i>
                                 </button>
                              {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection
@section('scripts')
	<script src="{{asset ('assets/js/data-table.js')}}"></script>
@endsection