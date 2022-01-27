@extends('layouts.app')
@section('title', 'Все инструкции')


@section('content')

<div class="container-fluid bg-white first-block">
  <div class="container-xxl">
    <div class="row d-flex align-items-center">
      <div class="col-sm-6">
        <h1 class="mt-5">Инструкции и руководства по эксплуатации бытовой техники и электроники</h1>
        <p class="text-danger">Потеряли инструкцию? Не беда, мы создали этот сервис специально для вас.</p>
      </div>
      <div class="col-sm-6">
        <img src="/public/img/4436224.png" class="img-fluid" alt="instruct">
      </div>
    </div>
  </div>
</div>

  <div class="container-fluid search-block">
    <div class="container-xxl">
      <div class="row mb-4">
        <h3 class="mb-3">Найдите необходимую инструкцию</h3>
        <p class="text-danger">Вам нужно всего лишь ввести марку или модель в поисковую строку ниже.</p>
      </div>
      <form action="{{route('instruction')}}" method="get">
      <div class="row">
            <div class="col d-flex">
                <input name="search_field" class="form-control me-2" type="text" placeholder="Введите ключевые слова" aria-label="Search">
                <button class="btn btn-outline-danger" type="submit">Поиск</button>
              </div>
            </div>
          </form>
    </div>
  </div>


  @if(!count($instructions))

  <div class="container-xxl result-block mt-5">
    <div class="row no-search">
      <div class="col">
        <h3 class="mb-3">К сожалению, по вашему запросу ничего не найдено.</h3>
        <p>Если инструкция для вашей модели отсутствует, то незамедлительно сообщите нам. Мы в кратчайшие сроки устраним такую проблему. Огромнейшее количество информации по бытовой и электронной технике занесено в базу данных нашего сайта. И она регулярно пополняется.</p>
      </div>
    </div>
  </div>  
      
  @else

    <div class="container-xxl mt-5 d-flex flex-wrap justify-content-center">
      
      @foreach ($instructions as $instruction)
      <div class="card m-3" style="width: 22rem;">
        <div class="card-body">
          <h6 class="card-subtitle mb-2 text-muted">{{$instruction->category['title']}}</h6>
          <h5 class="card-title">{{$instruction['title']}}</h5>
          <p class="card-text">{{$instruction['model']}}</p>
          <a class="btn btn-outline-success m-1" href="{{url('/view', $instruction->id)}}" target="_blank"><i class="bi bi-book"></i> Читать</a>
          <a class="btn btn-outline-success m-1" href="{{url('/download', $instruction->file)}}"><i class="fas fa-download"></i> Скачать</a>
          <a class="btn btn-outline-danger m-1" href="{{url('/complaint', $instruction->id)}}" target="_blank"><i class="fas fa-poo"></i> Пожаловаться</a>

        </div>
      </div>
      @endforeach
    
    </div>

    <div class="container-xxl mt-5 mb-5 d-flex flex-wrap justify-content-center">
      <nav>
        <ul class="pagination">
          {{ $instructions->links() }}
        </ul>
      </nav>
    </div>

  @endif

  <div class="container-fluid wrap-upload">
    <div class="container-xxl upload">
      <div class="row mt-3">
          <div class="col">
            <h3 class="mb-3">Загрузите свою инструкцию</h3>
            <p>Вы также можете помочь нашему сервису и загрузить свою инструкцию. Важное условие: вы должны быть зарегистрированным пользователем. При загрузке обязательно укажите тип техники, бренд, модель и прикрепите файл. После модерации ваша инструкция появится у нас на сайте. Авторизуйтесь и  <a href="{{url('upload')}}" target="_blank">переходите по ссылке.</a></p> 
          </div>
      </div>
    </div>
  </div>




@endsection

