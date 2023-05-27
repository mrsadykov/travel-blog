<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Category;
use App\Models\Tag;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $categories = Category::all();
        $tags = Tag::all();
        // TODO: Implement __invoke() method.
        return view('admin.post.create', compact('categories', 'tags'));
    }
}
