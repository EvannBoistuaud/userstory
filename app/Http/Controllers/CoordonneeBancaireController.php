<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoordonneeBancaireRequest;
use App\Models\CoordonneeBancaire;
use Illuminate\Http\Request;

class CoordonneeBancaireController extends Controller
{
    private $repository;

    public function create()
    {
        return view('coordonneeBancaire.edit');
    }

    public function store(CoordonneeBancaireRequest $request)
    {
        $this->repository->store($request->all());
    }

    public function show(CoordonneeBancaire $coordonneeBancaire)
    {

    }

    public function edit(CoordonneeBancaire $coordonneeBancaire)
    {
        return view('coordonneeBancaire.edit', compact('coordoneeBancaire'));
    }

    public function update(CoordonneeBancaire $coordonneeBancaire, CoordonneeBancaireRequest $request)
    {
        $this->repository->update($coordonneeBancaire, $request->all());
    }
}
