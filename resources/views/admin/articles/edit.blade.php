@extends('admin.layouts.master')
@section('maincontent')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Məqalədə dəyişiklik et</h1>
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
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{route('articles.update', $article->id)}}" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Məqalənin başlığı</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{old('title', $article->title)}}">
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Açıqlama</label>
                                <textarea class="form-control" name="desc" id="description">{{old('desc', $article->desc)}}</textarea>
                                @error('desc')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">Məqalə</label>
                                <textarea class="form-control" name="content" id="content" rows="20">{{old('content', $article->content)}}</textarea>
                                @error('content')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div>
{{--                                    <img src="{{$article->image}}" alt="">--}}
                                    <img src="{{asset('uploads/'.$article->image)}}" alt="" width="200">
                                    <input type="hidden" value="{{$article->image}}" name="old_image">
                                </div>
                                <label for="photo" class="form-label">Şəkil</label>
                                <input type="file" class="form-control" name="image" id="photo">
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Kateqoriyalar</label>
                                <select name="categories[]" id="category" class="form-control" multiple>
                                    @foreach($categories as $category)
                                        <option
                                            value="{{$category->id}}"
                                            @if($article->getCategories->contains($category->id))
                                                {{'selected'}}
                                            @endif>
                                            {{$category->category_name}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('categories')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Dəyişdir</button>
                        </form>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
