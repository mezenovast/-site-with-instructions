@extends('layouts.admin')

@section('title', 'Редактирование инструкции')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Редактирование инструкции: {{$instruction['title'].' '.$instruction['model']}}</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
          @if (session('success'))
          <div class="alert alert-success" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
              <h4><i class="icon fa fa-check"></i>{{session('success')}}</h4>
          </div>
          @endif
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                  <div class="card card-primary">
                    <!-- form start -->
                    <form action="{{route('instruction.update', $instruction['id'])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                              <label for="">Категория</label>
                              <select name="cat_id" class="form-control" required>
                                @foreach ($categories as $category)
                                  <option value="{{$category['id']}}" @if ($category['id'] == $instruction['cat_id']) selected @endif>{{$category['title']}}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Марка</label>
                              <input type="text" name="title" class="form-control" value="{{$instruction['title']}}" required>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Модель</label>
                              <input type="text" name="model" class="form-control" value="{{$instruction['model']}}" required>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputFile">Загрузка файла</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" name="file" class="custom-file-input" id="exampleInputFile" accept="application/pdf">
                                  <label class="custom-file-label" for="exampleInputFile">Выберите PDF файл</label>
                                </div>
                              </div>
                              <br>
                              <button type="submit" class="btn btn-primary">Обновить</button>
                        </div>
                    </form>
                  </div>
            </div>
                </div>

        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->

@endsection