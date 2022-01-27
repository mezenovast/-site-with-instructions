{{-- @extends('layouts.main_layout') --}}
@extends('layouts.app')

@section('title', 'Оставить жалобу')

@section('content')


    <div class="container-fluid">
        <div class="container-xxl mt-5">
            <div class="row d-flex align-items-center">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                <h6>{{session('success')}}</h6>
                            </div>
                            @endif
                            <form method="POST" action="{{route('complaint.store')}}">
                                @csrf
                                <div class="mb-3">
                                    <label for="instr_id" class="form-label">Инструкция к модели</label>
                                    <select name="instr_id" class="form-control" required>
                                        @foreach ($instructions as $instruction)
                                        <option value="{{$instruction['title'].' '.$instruction['model']}}" @if ($instruction['id'] == $instr_id['id']) selected @endif>{{$instruction['title'].' '.$instruction['model']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                <label for="complaint" class="form-label">Причина жалобы</label>
                                <textarea type="text" name="complaint" class="form-control" id="complaint" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email для обратной связи</label>
                                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" required>
                                </div>
                        
                                <button type="submit" class="btn btn-outline-danger">Отправить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    </div>



@endsection
