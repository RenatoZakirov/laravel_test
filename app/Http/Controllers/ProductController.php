<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * показать все продукты
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Log::info('ProductController@index was called');
        // получаем все продукты из БД
        $products = Product::all();
        // отправляем все продукты на фронт
        return response()->json($products);
    }

    /**
     * добавить новый продукт
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // валидируем данные
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|between:0,9999999.99',
            'count' => 'required|integer|min:0',
        ]);
        // записываем продукт в БД
        $product = Product::create($validateData);
        // отправляем сам продукт на фронт и код успеха
        return response()->json($product, 201);
    }

    /**
     * показать один продукт
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // находим продукт в БД по его id
        $product = Product::findOrFail($id);
        // отправляем найденный продукт на фронт
        return response()->json($product);
    }

    /**
     * обновить один продукт
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // находим продукт в БД по его id
        $product = Product::findOrFail($id);
        // валидируем данные
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|between:0,9999999.99',
            'count' => 'required|integer|min:0',
        ]);
        // обновляем продукт в БД
        $product->update($validateData);
        // отправляем найденный продукт на фронт и код успеха
        return response()->json($product, 201);
    }

    /**
     * удалить один продукт
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // находим продукт в БД по его id
        $product = Product::findOrFail($id);
        // удаляем продукт из БД
        $product->delete();
        // отправляем пустой ответ и код с отсутствием продукта
        return response()->json(null, 204);
    }
}
