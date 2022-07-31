@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{ $post->title }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <tbody>
                                        <tr>
                                            <td>ID</td>
                                            <td>{{ $post->id }}</td>
                                        </tr>
                                        <tr>
                                            <td>Название</td>
                                            <td>{{ $post->title }}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <a href="{{ route('admin.post.edit', $post->id) }}" class="btn
                        btn-success">Редактировать</a>
                        <form action="{{ route('admin.post.destroy', $post->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger mt-2">Удалить</button>
                        </form>
                    </div>
                    <div></div>
                </div>
            </div>
        </section>

    </div>
@endsection
