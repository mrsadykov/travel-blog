<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

/**
 * Класс отвечает за взаимодействие с базой,
 * на выходе происходит изменения в базе
 */

class PostService
{
    public function store($data) {
        try {
            DB::beginTransaction();
            // TODO: Implement __invoke() method.
            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }

            // храним картинки в хранилище Storage /storage/app/images
            if (isset($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }

            if (isset($data['main_image'])) {
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }
            // уникальный пост
            $post = Post::firstOrCreate($data);
            if (isset($tagIds)) {
                // прикрпеление
                $post->tags()->attach($tagIds);
            }
            DB::commit();
            //        длинная запись
//        Category::firstOrCreate(
//            // по каким ключам определяется уникальность
//            [ 'title' => $data['title'] ],
//            // если уникальное, то запись в бд
//            [ 'title' => $data['title'] ]
//        );
        } catch (\Exception $exception) {
            Db::rollBack();
            abort(500);
        }
    }

    public function update($data, $post) {
        try {
            DB::beginTransaction();
            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }
            // храним картинки в хранилище Storage /storage/app/images
            if (isset($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }
            if (isset($data['main_image'])) {
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }
            $post->update($data);

            if (isset($tagIds)) {
                // удаление старых привязок
                $post->tags()->sync($tagIds);
            }
            Db::commit();
        } catch (\Exception $exception) {
            Db::rollBack();
            abort(500);
        }

        return $post;
    }
}
