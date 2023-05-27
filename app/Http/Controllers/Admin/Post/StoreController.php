<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\Admin\Post\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        // взаимодействие с базой
        $this->service->store($data);

        return redirect()->route('admin.post.index');
    }
}
