@extends('adminlte::page')

@section('plugins.Datatables', true)
{{-- Setup data for datatables --}}
@section('content_header')
    <h1>Парсер новостей</h1>
@stop

@section('content')

        <form action="{{route('notice.update')}}" method="POST">
            @csrf
            <div class="p-4">
                <button type="submit" class="btn btn-success">Обновить новости</button>
            </div>
        </form>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <table  class="table table-bordered table-striped table-dark">
                        <thead>
                            <tr>
                                <th >Заголовок</th>
                                <th>Краткое описание </th>
                                <th>Дата публикации</th>
                                <th>Изображение</th>
                                <th>Автор</th>
                                <th >Ссылка на ресурс</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($notices as $notice)
                            <tr>
                                <td>{{$notice->title}} </td>
                                <td>{{$notice->description}}</td>
                                <td>{{$notice->datePublication}}</td>
                                <td><img src="{{$notice->imagePath}}" width="100px" alt="Изображение статьи"></td>
                                <td>{{$notice->author}}</td>
                                <td><a target="_blank" href="{{$notice->link}}">Открыть ссылку</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@stop
