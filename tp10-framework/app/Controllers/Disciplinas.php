<?php

namespace App\Controllers;

use App\Models\DisciplinaModel;

// ============================================================
// TP10 - Parte B: Controlador del framework.
// Gestiona la solicitud de cada ruta: lee datos, usa el Modelo
// (ORM/Query Builder de CI4) y devuelve Vistas o JSON.
// ============================================================
class Disciplinas extends BaseController
{
    private DisciplinaModel $modelo;

    public function __construct()
    {
        // El modelo se conecta solo usando app/Config/Database.php
        $this->modelo = new DisciplinaModel();
    }

    // GET /disciplinas - listado de todas las disciplinas
    public function index()
    {
        $datos = [
            'disciplinas' => $this->modelo->orderBy('id', 'ASC')->findAll(),
            'mensaje'     => session()->getFlashdata('mensaje'),
        ];
        return view('disciplinas/index', $datos);
    }

    // GET /disciplinas/nueva - formulario vacio
    public function nueva()
    {
        return view('disciplinas/form', [
            'titulo'      => 'Nueva disciplina',
            'accion'      => 'disciplinas/guardar',
            'disciplina'  => ['id' => 0, 'nombre' => '', 'descripcion' => ''],
            'errores'     => session()->getFlashdata('errores') ?? [],
        ]);
    }

    // POST /disciplinas/guardar - crea el registro
    public function guardar()
    {
        $datos = [
            'nombre'      => trim((string) $this->request->getPost('nombre')),
            'descripcion' => trim((string) $this->request->getPost('descripcion')),
        ];

        // save() valida con las reglas del modelo; false si falla
        if ($this->modelo->save($datos) === false) {
            return redirect()->back()->withInput()
                ->with('errores', $this->modelo->errors());
        }

        return redirect()->to(base_url('disciplinas'))
            ->with('mensaje', 'La disciplina se creo correctamente.');
    }

    // GET /disciplinas/editar/{id} - formulario con datos cargados
    public function editar($id)
    {
        $disciplina = $this->modelo->find((int) $id);
        if (!$disciplina) {
            return redirect()->to(base_url('disciplinas'));
        }

        return view('disciplinas/form', [
            'titulo'     => 'Editar disciplina',
            'accion'     => 'disciplinas/actualizar/' . (int) $id,
            'disciplina' => $disciplina,
            'errores'    => session()->getFlashdata('errores') ?? [],
        ]);
    }

    // POST /disciplinas/actualizar/{id} - guarda los cambios
    public function actualizar($id)
    {
        $datos = [
            'id'          => (int) $id,
            'nombre'      => trim((string) $this->request->getPost('nombre')),
            'descripcion' => trim((string) $this->request->getPost('descripcion')),
        ];

        if ($this->modelo->save($datos) === false) {
            return redirect()->back()->withInput()
                ->with('errores', $this->modelo->errors());
        }

        return redirect()->to(base_url('disciplinas'))
            ->with('mensaje', 'La disciplina se actualizo correctamente.');
    }

    // GET /disciplinas/borrar/{id} - elimina el registro
    public function borrar($id)
    {
        $this->modelo->delete((int) $id);
        return redirect()->to(base_url('disciplinas'))
            ->with('mensaje', 'La disciplina se elimino correctamente.');
    }

    // GET /api/disciplinas - API REST: devuelve JSON
    public function api()
    {
        return $this->response->setJSON([
            'status' => 'success',
            'total'  => $this->modelo->countAll(),
            'data'   => $this->modelo->orderBy('id', 'ASC')->findAll(),
        ]);
    }
}
