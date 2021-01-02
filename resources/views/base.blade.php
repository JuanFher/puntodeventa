@extends('layouts.template')
@section('styles')
  {{-- expr --}}
@endsection
@section('content')
  <div class="content-wrapper">
          <div class="page-header">
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item d-none d-lg-flex">
                <a class="nav-link" href="#">
                  <span class="btn btn-primary">+ Create new</span>
                </a>
                <a class="nav-link" href="#">
                  <span class="btn btn-success"><i class="fas fa-download"></i> Exportar</span>
                </a>
              </li>
            </ul>
            <h3 class="page-title">
              Data table
            </h3>
            
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Tables</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data table</li>
              </ol>
            </nav>
          </div>
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Data table</h4>

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
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            
                            <td>
                              <label class="badge badge-info">On hold</label>
                            </td>
                            <td>
                              <button class="btn btn-outline-primary">View</button>
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