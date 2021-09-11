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
<form action="{{route('teams.store')}}" method="POST">
  @method('POST')
  @csrf
  <div class="form-group">
    <label for="name">Nome do Time</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Adicione o nome do Time" required="required">
    <small id="nameHelp" class="form-text text-muted">Nome do time a ser cadastrado.</small>
  </div>
  <div class="form-group">
    <label for="state">Estado do time</label>
    <textarea type="text" class="form-control" id="state" name="state" placeholder="Adicione o estado de origem do time" required="required"></textarea>
  </div>
  <label for="state">Divisao do time</label>
  <select class="form-control" id='division_id' name="division_id">
    @foreach($divisions as $division)
      <option value="{{$division->id}}">{{$division->name}}</option>
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