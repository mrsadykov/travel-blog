<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Mail\User\PasswordMail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        // TODO: Implement __invoke() method.
        $data = $request->validated();
        $password = Str::random(10);
        $data['password'] = Hash::make($password);
        // уникальная категория
        // $data['email'] - уникальный
        User::firstOrCreate([ 'email' => $data['email'] ], $data);

        // отправка письма на почту
        Mail::to($data['email'])->send(new PasswordMail($password));

        return redirect()->route('admin.user.index');

//        длинная запись
//        Category::firstOrCreate(
//            // по каким ключам определяется уникальность
//            [ 'title' => $data['title'] ],
//            // если уникальное, то запись в бд
//            [ 'title' => $data['title'] ]
//        );
    }
}
