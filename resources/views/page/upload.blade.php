@extends('layouts.app')

@section('title', 'Загрузить инструкцию')

@section('content')

<div class="container-fluid">
  <div class="container-xxl mt-5">
    <div class="row">
      <div class="col">
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            <h6>{{session('success')}}</h6>
        </div>
        @endif
      </div>
        <div class="col-lg-12">
          <div class="card card-primary">
            <!-- form start -->
            <form action="{{route('upload.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="card-body">
                <div class="mb-3">
                  <label for="">Выберите тип техники</label>
                  <select name="cat_id" class="form-control" required>
                    @foreach ($categories as $category)
                      <option value="{{$category['id']}}">{{$category['title']}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1">Марка</label>
                  <input type="text" name="title" class="form-control" placeholder="Введите марку техники" required>
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1">Модель</label>
                  <input type="text" name="model" class="form-control" placeholder="Введите модель техники" required>
                </div>
                <div class="mb-3">
                  <label for="exampleInputFile">Загрузка файла</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="file" class="form-control" id="exampleInputFile" accept="application/pdf" required>
                    </div>
                  </div>
                  <br>
                  <button type="submit" class="btn btn-primary">Добавить</button>
            </div>
            </form>
          </div>
        </div>
    </div>
  </div>
</div>


@endsection