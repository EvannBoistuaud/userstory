<?php

namespace App\Repositories;

use App\Models\CoordonneeBancaire;

class CoordonneeBancaireRepository
{
    protected $coordonneeBancaire;
    public function __construct(CoordonneeBancaire $coordonneeBancaire)
    {
        $this->coordonneeBancaire = $coordonneeBancaire;
    }
    private function save(CoordonneeBancaire $coordonneeBancaire, array $inputs)
    {
        $coordonneeBancaire->save();
        return $coordonneeBancaire;
    }
    public function store(array $inputs)
    {
        $coordonneeBancaire = new $this->coordonneeBancaire;
        return $this->save($coordonneeBancaire, $inputs);
    }
    public function update(CoordonneeBancaire $coordonneeBancaire, array $inputs)
    {
        return $this->save($coordonneeBancaire, $inputs);
    }
}
