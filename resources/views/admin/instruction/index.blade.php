@extends('layouts.admin')

@section('title', 'Все инструкции')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Все инструкции</h1>
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
                              Категория
                              </th>
                              <th>
                              Марка
                              </th>
                              <th>
                              Модель
                              </th>
                              <th>
                              Дата добавления
                              </th>
                              <th style="width: 30%">
                              </th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($instructions as $instruction)
                            <tr>
                              <td>
                                {{$instruction['id']}}
                              </td>
                              <td>
                                {{$instruction->category['title']}}
                              </td>
                              <td>
                                {{$instruction['title']}}
                              </td>
                              <td>
                                {{$instruction['model']}}
                              </td>
                              <td>
                                {{$instruction['created_at']}}
                              </td>
                              <td class="project-actions text-right">
                                  <a class="btn btn-outline-success" href="{{route('instruction.edit', $instruction['id'])}}">
                                      <i class="fas fa-pencil-alt">
                                      </i>
                                      Редактировать
                                  </a>
                                  <form action="{{route('instruction.destroy', $instruction['id'])}}" method="POST" style="display: inline-block">
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