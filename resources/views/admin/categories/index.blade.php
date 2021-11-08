@extends('admin.layouts.master')
@section('maincontent')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Categories</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v3</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="mb-3">
                    <a href="{{route('categories.create')}}" class="btn btn-warning">Add category</a>
                </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Categories</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kateqoriya adı</th>
                                        <th>Yaranma tarixi</th>
                                        <th>Dəyişiklik tarixi</th>
                                        <th>Əməliyyatlar</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($no = 1)
                                    @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{$category->category_name}}</td>
                                        <td>{{$category->created_at->diffForHumans()}}</td>
                                        <td>
                                            @if($category->updated_at !== null)
                                            {{$category->updated_at->diffForHumans()}}
                                            @else
                                            <span class="text-info">{{'There is no info'}}</span>
                                            @endif

                                        </td>
                                        <td>
                                            <a href="{{route('categories.edit', $category->id)}}" class="btn btn-info">Edit</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Kateqoriya adı</th>
                                        <th>Yaranma tarixi</th>
                                        <th>Dəyişiklik tarixi</th>
                                        <th>Əməliyyatlar</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
