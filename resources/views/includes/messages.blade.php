@if(count($errors) > 0)
  @foreach ($errors->all() as $messages)
    <div class="alert alert-danger" role="alert">
      {{$messages}}
      <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
    </div>
  @endforeach
@endif

@if(session('success'))
  <div class="alert alert-success" role="alert">
    {{session('success')}}
    <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
  </div>
@endif


@if(session('error'))
  <div class="alert alert-danger" role="alert">
    {{session('error')}}
    <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
  </div>
@endif
