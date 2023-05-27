<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Tag;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Tag $tag)
    {
        // TODO: Implement __invoke() method.
        $data = $request->validated();
        // обновление категории
        $tag->update($data);
        return redirect()->route('admin.tag.show', $tag->id);
    }
}
