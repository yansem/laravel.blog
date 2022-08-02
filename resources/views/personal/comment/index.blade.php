@extends('personal.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Комментарии</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('personal.main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item active">Комментарии</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- /.content-wrapper -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Комментарии</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Сообщение</th>
                                        <th colspan="3" class="text-center">Действие</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($comments as $comment)
                                        <tr>
                                            <td>{{ $comment->id }}</td>
                                            <td>{{ $comment->message }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('personal.comment.edit', $comment->id) }}"><i
                                                        class="fa fa-pen text-success"></i></a>
                                            </td>
                                            <td class="text-center">
                                                <form action="{{ route('personal.comment.destroy', $comment->id) }}"
                                                      method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="border-0 bg-transparent"><i class="fas fa-times
                                                    text-danger"></i></button>

                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div></div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
