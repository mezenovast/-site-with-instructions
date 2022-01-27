@extends('layouts.admin')

@section('title', 'Запросы на публикацию')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Запросы на публикацию</h1>
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
                            Тип
                            </th>
                            <th>
                            Марка
                            </th>
                            <th>
                            Модель
                            </th>
                            <th>
                            Инструкция
                            </th>
                            <th>
                            Дата добавления
                            </th>
                            <th style="width: 30%">
                            Статус
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
                                <a class="btn btn-outline-info" href="{{url('/download', $instruction->file)}}"><i class="fas fa-download"></i> Скачать</a>
                                <a class="btn btn-outline-info" href="{{url('/view', $instruction->id)}}" target="_blank"><i class="fas fa-book"></i> Читать</a>
                              </td>
                              <td>
                                {{$instruction['created_at']}}
                              </td>
                              <td class="project-actions text-left">
                                <form action="{{route('inquiry.update', $instruction['id'])}}" method="POST" style="display: inline-block">
                                  @csrf
                                  @method('PUT')
                                  <button type="submit" class="btn btn-outline-success">
                                    <i class="fas fa-check"> 
                                    </i>
                                     Одобрить
                                </button>
                                </form>
                                  <form action="{{route('inquiry.destroy', $instruction['id'])}}" method="POST" style="display: inline-block">
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