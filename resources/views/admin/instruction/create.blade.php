@extends('layouts.admin')

@section('title', 'Добавить инструкцию')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Добавить инструкцию</h1>
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
                    <form action="{{route('instruction.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                      <div class="card-body">
                        <div class="form-group">
                          <label for="">Выберите категорию</label>
                          <select name="cat_id" class="form-control" required>
                            @foreach ($categories as $category)
                              <option value="{{$category['id']}}">{{$category['title']}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Марка</label>
                          <input type="text" name="title" class="form-control" placeholder="Введите марку техники" required>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Модель</label>
                          <input type="text" name="model" class="form-control" placeholder="Введите модель техники" required>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputFile">Загрузка файла</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" name="file" class="custom-file-input" id="exampleInputFile" accept="application/pdf" required>
                              <label class="custom-file-label" for="exampleInputFile">Выберите PDF файл</label>
                            </div>
                          </div>
                          <br>
                          <button type="submit" class="btn btn-primary">Добавить</button>
                    </div>
                    </form>
                  </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->

@endsection