@extends('layouts.admin')

@section('title', 'Добавить пользователя')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Добавить пользователя</h1>
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
                    
                    @error('email')
                    <div class="alert alert-danger">Данный email уже зарегистрирован</div>
                    @enderror
                    
                    <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Имя пользователя</label>
                          <input type="text" name="name" class="form-control" placeholder="Введите имя" required>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email</label>
                          <input type="email" name="email" class="form-control" placeholder="Введите email" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Введите пароль" required>
                          </div>
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Добавить</button>
                      </div>
                    </div>
                    </form>
                  </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->

@endsection