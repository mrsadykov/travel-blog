<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class DeleteController extends Controller
{
    public function __invoke(Tag $tag)
    {
        // TODO: Implement __invoke() method.
        // удаление категории
        $tag->delete();
        return redirect()->route('admin.tag.index');
    }
}
