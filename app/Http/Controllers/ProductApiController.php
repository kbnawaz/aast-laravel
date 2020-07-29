<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductApiRequest;
use App\Product;
use http\Env\Request;
use Illuminate\Http\JsonResponse;
use View;

/**
 * Class ProductApiController
 * @package App\Http\Controllers
 */
class ProductApiController extends Controller
{

    public function index(ProductApiRequest $request)
    {
        $validated = $request->validated();
        if($validated){
            $status = $request->get('is_active');
            $status = explode(',', $status);
            $data = Product::select('id', 'name', 'sku', 'description', 'price', 'is_active')
            ->whereIn('is_active', $status)
            ->get();
            $html = View::make('productDetail', ['data' => $data])->render();
            return new JsonResponse(
                [
                    'status' => 'success',
                    'message' => 'Successfully retrieved products.',
                    'data' => $html
                ],
                200
            );
        }
    }

    public function pView()
    {
        return view('productIndex');
    }
}
