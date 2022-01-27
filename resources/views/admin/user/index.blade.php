@extends('layouts.admin')

@section('title', 'Все пользователи')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Все пользователи</h1>
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
              <div class="card">
                <div class="card-body p-0">
                  <table class="table table-striped projects">
                      <thead>
                          <tr>
                            <th style="width: 5%">
                            ID
                            </th>
                            <th>
                            Имя
                            </th>
                            <th>
                            Почтовый адрес
                            </th>
                            <th>
                            Дата регистрации
                            </th>
                            <th style="width: 30%">
                            </th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($users as $user)
                            <tr>
                              <td>
                                {{$user['id']}}
                              </td>
                              <td>
                                {{$user['name']}}
                              </td>
                              <td>
                                {{$user['email']}}
                              </td>
                              <td>
                                {{$user['created_at']}}
                              </td>
                              <td class="project-actions text-right">

                                @if($user['status'] == null) 

                                  <form action="{{route('user.update', $user['id'])}}" method="POST" style="display: inline-block">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-outline-danger">
                                      <i class="fas fa-thumbs-down">
                                      </i>
                                      Заблокировать
                                  </button>
                                  </form>


                                @else

                                <form action="{{route('user.update', $user['id'])}}" method="POST" style="display: inline-block">
                                  @csrf
                                  @method('PUT')
                                  <button type="submit" class="btn btn-outline-success">
                                    <i class="fas fa-thumbs-up">
                                    </i>
                                    Разблокировать
                                </button>
                                </form>

                                @endif

                                  <form action="{{route('user.destroy', $user['id'])}}" method="POST" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">
                                      <i class="fas fa-trash">
                                      </i>
                                      Удалить
                                  </button>
                                  </form>
                              </td>
                          </tr>
                        @endforeach
                      </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->

@endsection