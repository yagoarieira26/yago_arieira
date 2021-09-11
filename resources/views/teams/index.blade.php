@extends('teams.template')

@section('title','Visualizar Times')

@section('content')
@if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif
@if (\Session::has('warning'))
    <div class="alert alert-warning">
        <ul>
            <li>{!! \Session::get('warning') !!}</li>
        </ul>
    </div>
@endif
@if (\Session::has('error'))
    <div class="alert alert-danger">
        <ul>
            <li>{!! \Session::get('error') !!}</li>
        </ul>
    </div>
@endif
<button type="button" class="btn btn-success btn-icon btn-sm" title='Adicionar time' onclick='location.href="{{ route('teams.create')}}"'>
  Adicionar
  <i class="fa fa-pen"></i>
</button>
<br>
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Time</th>
        <th scope="col">Divisão</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($teams->items() as $team)
        <tr>
          <th scope="row">{{$team->id}}</th>
          <td>{{$team->name}}</td>
          <td>{{$team->division->name}}</td>
          <td>
            <button type="button" class="btn btn-info btn-icon btn-sm" title='Editar' onclick='location.href="{{ route('teams.edit', $team)}}"'>
              Alterar dados
              <i class="fa fa-pen"></i>
            </button>
            <br>
            <form action="{{route('teams.destroy',[$team->id])}}" method="POST">
              @method('DELETE')
              @csrf
              <button  type="submit" class="btn btn-danger btn-icon btn-sm" title='Deletar'>
                Deletar time
                <i class="fa fa-pen"></i>
              </button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{$teams->links()}}
@endsection