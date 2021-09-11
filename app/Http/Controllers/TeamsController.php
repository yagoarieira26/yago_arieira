<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Division;
use App\Http\Resources\TeamResource;
use App\Http\Resources\DivisionResource;

use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;

use Illuminate\Support\Facades\Cache;

class TeamsController extends Controller
{
    public function index()
    {
        $teamModel = app(Team::class);

        $teamsResource = new TeamResource($teamModel->with('division')->paginate('5'));

        return view('teams.index', ['teams' => $teamsResource]);       
    }


    public function create()
    {
        $divisionModel = app(Division::class);

        Cache::forget('division');

        $divisionsResource = Cache::remember('division', (60*5), function () use($divisionModel) {
            return DivisionResource::collection($divisionModel->all());
        });
        return view('teams.create', ['divisions' => $divisionsResource]);        
    }


    public function store(StoreTeamRequest $request)
    {
        $data = $request->validated();

        $teamModel = app(Team::class);

        $team = $teamModel->create($data);

        if($team){
            return redirect()->route('teams.index')->with('success', 'Time cadastrado com sucesso!!!');
        }
        else{
            return redirect()->route('teams.index')->with('warning', 'Erro ao cadastrar o time...');
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $teamModel = app(Team::class);
        $divisionModel = app(Division::class);
        $team = $teamModel->with('division')->find($id);
        $divisionsResource = Cache::remember('division', (60*5), function () use($divisionModel) 
        {
            return DivisionResource::collection($divisionModel->all());
        });

        $teamResource =  new TeamResource($team);
        return view('teams.edit', compact('teamResource','divisionsResource'));
    }


    public function update(UpdateTeamRequest $request, $id)
    {
        $data = $request->validated();

        $teamModel = app(Team::class);

        $team = $teamModel->find($id)->update($data);

        if($team){
            return redirect()->route('teams.index')->with('success', 'Time cadastrado com sucesso!!!');
        }
        else{
            return redirect()->route('teams.index')->with('warning', 'Erro ao cadastrar o time...');
        }
    }

    
    public function destroy($id)
    {
        $teamModel = app(Team::class);
        $team = $teamModel->find($id)->delete();

        return redirect()->route('teams.index')->with('warning', 'Time deletado com sucesso!!!');
    }


}

