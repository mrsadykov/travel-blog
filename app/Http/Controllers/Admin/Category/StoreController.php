<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Models\Category;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        // TODO: Implement __invoke() method.
        $data = $request->validated();
        // уникальная категория
        Category::firstOrCreate($data);
        return redirect()->route('admin.category.index');

//        длинная запись
//        Category::firstOrCreate(
//            // по каким ключам определяется уникальность
//            [ 'title' => $data['title'] ],
//            // если уникальное, то запись в бд
//            [ 'title' => $data['title'] ]
//        );
    }
}
