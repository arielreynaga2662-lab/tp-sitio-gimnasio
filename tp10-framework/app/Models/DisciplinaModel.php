<?php

namespace App\Models;

use CodeIgniter\Model;

// ============================================================
// TP10 - Parte B: Modelo del framework.
// Extiende CodeIgniter\Model: hereda findAll(), find(), insert(),
// update() y delete() usando el Query Builder del framework
// (no hace falta escribir SQL a mano).
// ============================================================
class DisciplinaModel extends Model
{
    protected $table         = 'disciplinas';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['nombre', 'descripcion'];
    protected $returnType    = 'array';

    // Reglas de validacion del modelo: se chequean solas en save()
    protected $validationRules = [
        'nombre'      => 'required|max_length[80]',
        'descripcion' => 'permit_empty|max_length[200]',
    ];
}
