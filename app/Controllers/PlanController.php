<?php
// ============================================================
// TP10 - Parte A: Controlador PlanController (MVC nativo)
// Recibe la solicitud (GET/POST), valida, llama al Modelo
// y decide qué Vista mostrar. No contiene SQL ni HTML.
// ============================================================

require_once __DIR__ . '/../Models/Plan.php';

class PlanController
{
    private Plan $plan;

    public function __construct(PDO $pdo)
    {
        $this->plan = new Plan($pdo);
    }

    // GET admin/index.php - listado de planes
    public function index(): void
    {
        $planes = [];
        $error  = null;
        try {
            $planes = $this->plan->todos();
        } catch (PDOException $e) {
            error_log('Error al listar planes: ' . $e->getMessage());
            $error = 'No se pudieron cargar los planes.';
        }

        $status = $_GET['status'] ?? '';
        $this->render('listado', compact('planes', 'error', 'status'));
    }

    // GET/POST admin/crear.php - formulario + alta de plan
    public function crear(): void
    {
        $errores = [];
        $valores = ['nombre' => '', 'precio_mensual' => '', 'descripcion' => ''];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $valores = $this->leerFormulario();
            $errores = $this->validar($valores);

            if (empty($errores)) {
                try {
                    $this->plan->crear(
                        $valores['nombre'],
                        (float) $valores['precio_mensual'],
                        $valores['descripcion']
                    );
                    header('Location: index.php?status=creado');
                    exit;
                } catch (PDOException $e) {
                    error_log('Error al crear plan: ' . $e->getMessage());
                    $errores[] = 'No se pudo guardar el plan. Revisá que el nombre no esté repetido.';
                }
            }
        }

        $this->render('formulario', [
            'errores'       => $errores,
            'valores'       => $valores,
            'titulo_pagina' => 'Nuevo plan',
            'accion'        => 'crear.php',
            'id'            => 0,
        ]);
    }

    // GET/POST admin/editar.php - formulario + edición de plan
    public function editar(): void
    {
        $id = (int) ($_GET['id'] ?? $_POST['id'] ?? 0);

        try {
            $plan = $this->plan->buscar($id);
        } catch (PDOException $e) {
            error_log('Error al buscar plan: ' . $e->getMessage());
            $plan = null;
        }

        if (!$plan) {
            header('Location: index.php');
            exit;
        }

        $errores = [];
        $valores = [
            'nombre'         => $plan['nombre'],
            'precio_mensual' => $plan['precio_mensual'],
            'descripcion'    => $plan['descripcion'] ?? '',
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $valores = $this->leerFormulario();
            $errores = $this->validar($valores);

            if (empty($errores)) {
                try {
                    $this->plan->actualizar(
                        $id,
                        $valores['nombre'],
                        (float) $valores['precio_mensual'],
                        $valores['descripcion']
                    );
                    header('Location: index.php?status=editado');
                    exit;
                } catch (PDOException $e) {
                    error_log('Error al editar plan: ' . $e->getMessage());
                    $errores[] = 'No se pudo actualizar el plan.';
                }
            }
        }

        $this->render('formulario', [
            'errores'       => $errores,
            'valores'       => $valores,
            'titulo_pagina' => 'Editar plan',
            'accion'        => 'editar.php',
            'id'            => $id,
        ]);
    }

    // GET admin/eliminar.php - borra un plan y vuelve al listado
    public function eliminar(): void
    {
        $id = (int) ($_GET['id'] ?? 0);

        if ($id > 0) {
            try {
                $this->plan->eliminar($id);
            } catch (PDOException $e) {
                error_log('Error al eliminar plan: ' . $e->getMessage());
            }
        }

        header('Location: index.php?status=eliminado');
        exit;
    }

    // ---------- helpers internos (solo del controlador) ----------

    private function leerFormulario(): array
    {
        return [
            'nombre'         => trim($_POST['nombre'] ?? ''),
            'precio_mensual' => trim($_POST['precio_mensual'] ?? ''),
            'descripcion'    => trim($_POST['descripcion'] ?? ''),
        ];
    }

    private function validar(array $valores): array
    {
        $errores = [];
        if ($valores['nombre'] === '') {
            $errores[] = 'El nombre es obligatorio.';
        }
        if ($valores['precio_mensual'] === '') {
            $errores[] = 'El precio mensual es obligatorio.';
        } elseif (!is_numeric($valores['precio_mensual']) || $valores['precio_mensual'] < 0) {
            $errores[] = 'El precio mensual debe ser un número mayor o igual a 0.';
        }
        return $errores;
    }

    // Renderiza una vista de app/Views/planes/ pasándole variables
    private function render(string $vista, array $datos = []): void
    {
        extract($datos);
        require __DIR__ . '/../Views/planes/' . $vista . '.php';
    }
}
