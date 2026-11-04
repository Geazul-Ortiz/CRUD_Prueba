<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // Obtener los pedidos guardados en la sesión
    private function getPedidos()
    {
        if (!session()->has('pedidos_bocho')) {
            $pedidos = [
                1 => [
                    'id' => 1,
                    'cliente' => 'Frutería Don Chuy',
                    'producto' => 'Huacales de madera',
                    'cantidad' => 120,
                    'entrega' => '2026-11-10',
                    'estatus' => 'Orden recibida'
                ],
                2 => [
                    'id' => 2,
                    'cliente' => 'Artesanías Raíces',
                    'producto' => 'Cajas de embalaje',
                    'cantidad' => 60,
                    'entrega' => '2026-11-12',
                    'estatus' => 'En fabricación'
                ],
                3 => [
                    'id' => 3,
                    'cliente' => 'Abarrotes La Esperanza',
                    'producto' => 'Bolsas de papel kraft',
                    'cantidad' => 2000,
                    'entrega' => '2026-11-09',
                    'estatus' => 'Control de calidad'
                ],
            ];

            session()->put('pedidos_bocho', $pedidos);
        }

        return session()->get('pedidos_bocho', []);
    }

    // Mostrar todos los pedidos
    public function index()
    {
        $pedidos = $this->getPedidos();

        return view('productos.index', compact('pedidos'));
    }

    // Mostrar formulario para agregar
    public function create()
    {
        return view('productos.create');
    }

    // Guardar un pedido nuevo
    public function store(Request $request)
    {
        $request->validate([
            'cliente' => 'required|string|max:100',
            'producto' => 'required|string|max:100',
            'cantidad' => 'required|integer|min:1',
            'entrega' => 'required|date',
            'estatus' => 'required|string',
        ]);

        $pedidos = $this->getPedidos();

        $nuevoId = empty($pedidos) ? 1 : max(array_keys($pedidos)) + 1;

        $pedidos[$nuevoId] = [
            'id' => $nuevoId,
            'cliente' => $request->cliente,
            'producto' => $request->producto,
            'cantidad' => $request->cantidad,
            'entrega' => $request->entrega,
            'estatus' => $request->estatus,
        ];

        session()->put('pedidos_bocho', $pedidos);
        session()->save();

        return redirect()->route('productos.index')
            ->with('success', 'Pedido agregado correctamente.');
    }

    // Mostrar formulario para editar
    public function edit($id)
    {
        $pedidos = $this->getPedidos();

        if (!isset($pedidos[$id])) {
            return redirect()->route('productos.index')
                ->with('error', 'Pedido no encontrado.');
        }

        $pedido = $pedidos[$id];

        return view('productos.edit', compact('pedido'));
    }

    // Actualizar un pedido
    public function update(Request $request, $id)
    {
        $request->validate([
            'cliente' => 'required|string|max:100',
            'producto' => 'required|string|max:100',
            'cantidad' => 'required|integer|min:1',
            'entrega' => 'required|date',
            'estatus' => 'required|string',
        ]);

        $pedidos = $this->getPedidos();

        if (!isset($pedidos[$id])) {
            return redirect()->route('productos.index')
                ->with('error', 'Pedido no encontrado.');
        }

        $pedidos[$id] = [
            'id' => $id,
            'cliente' => $request->cliente,
            'producto' => $request->producto,
            'cantidad' => $request->cantidad,
            'entrega' => $request->entrega,
            'estatus' => $request->estatus,
        ];

        session()->put('pedidos_bocho', $pedidos);
        session()->save();

        return redirect()->route('productos.index')
            ->with('success', 'Pedido actualizado correctamente.');
    }

    // Eliminar un pedido
    public function destroy($id)
    {
        $pedidos = $this->getPedidos();

        if (!isset($pedidos[$id])) {
            return redirect()->route('productos.index')
                ->with('error', 'Pedido no encontrado.');
        }

        unset($pedidos[$id]);

        session()->put('pedidos_bocho', $pedidos);
        session()->save();

        return redirect()->route('productos.index')
            ->with('success', 'Pedido eliminado correctamente.');
    }
}