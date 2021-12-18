@extends('admin.layouts.master')
@section('maincontent')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Articles</h1>
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
                    <a href="{{route('articles.create')}}" class="btn btn-warning">Add article</a>
                    <a href="" class="btn btn-info">Trash</a>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Articles</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Başlıq</th>
                                <th>Slug</th>
                                <th>Açıqlama</th>
                                <th>Foto</th>
                                <th>Əməliyyatlar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($articles as $article)
                                <tr>
                                    <td>{{ $articles->firstItem() + $loop->index  }}</td>
                                    <td>{{$article->title}}</td>
                                    <td>{{$article->slug}}</td>
                                    <td>{{$article->desc}}</td>
                                    <td>
                                        <img src="{{asset('uploads/'.$article->image)}}" alt="" width="200">
                                    </td>
                                    <td>
                                        <a href="{{route('articles.edit', $article->id)}}" class="btn btn-info">Edit</a>
                                        <a href="" class="btn btn-danger">Delete</a>
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
                        <div class="mt-4">
                            {{$articles->links()}}
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
