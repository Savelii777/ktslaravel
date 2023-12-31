@extends('layouts.admin_layout')

@section('title', 'Курсы')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2" style="display: flex; justify-content: space-between">
                <div class="col-sm-6">
                    <h1>Товар</h1>
                </div>
                <div class="col-sm-6" style="display: flex; justify-content: space-between; margin-right: 0; max-width: 470px">

                    <form style="margin-left:-1000px;margin-top: 10px; display: flex; flex-direction: row; height: 46px" action="/admin/course" method="GET">
                        <input  type="text" name="keyword" placeholder="Введите ключевое слово" style="min-width: 500px; border-radius: 5px; border: 1px solid #007bff">
                        <button type="submit" class="btn btn-primary">Поиск</button>
                    </form>

                    <form style="margin-top: 10px; display: flex; flex-direction: row; height: 46px" action="/admin/dollar" method="POST">
                        @csrf
                        <input type="text" name="dollar" id="dollar" value="{{ $currentDollar }}" placeholder="Введите курс" style="max-width: 100px; border-radius: 5px; border: 1px solid #007bff">
                        <button type="submit" class="btn btn-primary">Применить</button>
                    </form>
                    <form action="{{ route('user.import') }}" method="POST" enctype="multipart/form-data" style="margin-top: 10px; display: flex; flex-direction: row; height: max-content">
                        @csrf
                        <input type="file" name="xlsxFile" id="fileInput" style="display: none;">
                        <a href="#" id="selectFile" class="btn btn-success" style="margin-right: 10px;">
                            <img src="/images/excel.png" width="32" height="32"> Загрузить товар
                        </a>
                        <button type="submit" class="btn btn-primary">Отправить</button>
                    </form>
<form action="{{ route('stores.deleteAll') }}" method="POST" style="margin-top: 10px; display: flex; flex-direction: row; height: 46px">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Удалить все товары</button>
</form>
         </div>
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session('success') }}
                </div>
            @endif
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content" style="max-width: 1600px; overflow: hidden;">

        <!-- Default box -->
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            @sortablelink('section', 'Раздел')
                        </th>
                        <th>
                            @sortablelink('name', 'Название')
                        </th>
                        <th>
                            @sortablelink('retail_price', 'Розница')
                        </th>
                        <th>
                            @sortablelink('dealer', 'Дилер')
                        </th>
                        <th>
                            Наличие
                        </th>
                        <th>
                            Описание
                        </th>
                        <th>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td style="min-width: 270px">
                                {{ $item->section }}
                            </td >
                            <td style="max-width:450px">
                                {{ $item->name }}
                            </td>
                            <td style="min-width: 150px; max-width:200px">
                                {{ $item->retail_price }}
                            </td>
                            <td style="min-width: 150px; max-width:200px">
                                {{ $item->dealer }}
                            </td>
                            <td style="min-width: 150px; max-width:200px">
                                {{ $item->availability }}
                            </td>
                            <td  style="min-width: 150px; max-width:200px; word-wrap: break-word;">
                                {{ $item->description }}
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <div class="w100 d-flex justify-content-center">
            {{ $courses->links() }}
        </div>
    </section>

    <!-- /.content -->
@endsection



