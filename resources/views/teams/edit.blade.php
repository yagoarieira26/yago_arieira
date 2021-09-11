@extends('teams.template')

@section('title','Visualizar Times')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method='POST' action="{{route('teams.update',$teamResource->id)}}" method="POST">
  @method('PUT')
  @csrf
  <div class="form-group">
    <label for="name">Nome do Time</label>
    <input disabled="disabled" type="text" class="form-control" value="{{old('name',$teamResource->name)}}" id="name" name="name" placeholder="Adicione o nome do Time." required="required">
    <small id="nameHelp" class="form-text text-muted">Nome do Time a ser cadastrado.</small>
  </div>
  <div class="form-group">
    <label for="state">Estado do Time</label>
    <textarea disabled="disabled" type="text" class="form-control" id="estado" name="estado" placeholder="Adicione o estado de origem do time." required="required">{{old('state',$teamResource->state)}}</textarea>
  </div>
  <label for="state">Divisao do Time</label>
  <select class="form-control" id='division_id' name="division_id">
    @foreach($divisionsResource as $division)
      <option value="{{$division->id}}" @if($teamResource->division_id == $division->id) selected="selected" @endif>{{$division->name}}</option>
    @endforeach
  </select>
  <br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
@push('scripts')
<script>
</script>
@endpush