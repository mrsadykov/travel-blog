<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;

class DeleteController extends Controller
{
    public function __invoke(Category $category)
    {
        // TODO: Implement __invoke() method.
        // удаление категории
        $category->delete();
        return redirect()->route('admin.category.index');
    }
}
