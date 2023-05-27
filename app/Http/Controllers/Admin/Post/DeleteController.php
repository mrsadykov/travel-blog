<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;

class DeleteController extends BaseController
{
    public function __invoke(Post $post)
    {
        // TODO: Implement __invoke() method.
        // удаление категории
        $post->delete();
        return redirect()->route('admin.post.index');
    }
}
