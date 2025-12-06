<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class OrdenamientoController extends Controller
{
    /**
     * Muestra el formulario para ingresar datos (GET /ordenar).
     */
    public function index(): View
    {
        // Pasa datos vacíos para la primera carga de la vista
        return view('ordenamiento', [
            'datosOriginales' => [],
            'datosOrdenados' => [],
            'algoritmo' => 'Bubble Sort'
        ]);
    }

    /**
     * Procesa los datos de entrada y aplica el algoritmo de ordenamiento (POST /ordenar).
     */
    public function ordenar(Request $request): View
    {
        // 1. Validar y preparar los datos de entrada
        $datosRaw = $request->input('datos', '');
        $datosArray = $this->prepararDatos($datosRaw);
        
        // 2. Aplicar el algoritmo de ordenamiento
        $datosOrdenados = $this->aplicarOrdenamiento($datosArray);
        
        // 3. Devolver la vista con los resultados
        return view('ordenamiento', [
            // Se devuelve el array original para mostrar lo que ingresó el usuario
            'datosOriginales' => $datosArray, 
            'datosOrdenados' => $datosOrdenados,
            'algoritmo' => 'Bubble Sort'
        ]);
    }

    /**
     * Lógica del algoritmo de ordenamiento de burbuja (Bubble Sort).
     * Este método es usado por el controlador y probado en el Unit Test.
     *
     * @param array $array La lista de números a ordenar.
     * @return array La lista de números ordenados.
     */
    public function aplicarOrdenamiento(array $array): array
    {
        $n = count($array);
        if ($n <= 1) {
            return $array; // Lista vacía o con un solo elemento
        }

        // Implementación de Bubble Sort (Ordenamiento de Burbuja)
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if ($array[$j] > $array[$j + 1]) {
                    // Intercambio de elementos
                    $temp = $array[$j];
                    $array[$j] = $array[$j + 1];
                    $array[$j + 1] = $temp;
                }
            }
        }

        return $array;
    }
    
    /**
     * Convierte una cadena de texto (ej. "5,1,4,2,8") en un array de enteros válidos.
     * @param string $datosRaw
     * @return array
     */
    private function prepararDatos(string $datosRaw): array
    {
        // 1. Limpia espacios en blanco alrededor de las comas
        $datos = array_map('trim', explode(',', $datosRaw));
        
        // 2. Filtra elementos no numéricos y convierte a enteros
        $datos = array_filter($datos, 'is_numeric');
        
        return array_map('intval', $datos);
    }
}