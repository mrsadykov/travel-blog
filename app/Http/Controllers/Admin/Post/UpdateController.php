<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        // TODO: Implement __invoke() method.
        $data = $request->validated();
        $post = $this->service->update($data, $post);

        return redirect()->route('admin.post.index', compact('post'));
    }
}
