<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMessageRequest;
use App\Http\Resources\MessageResource;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;


class MessageController extends Controller
{

    public function create(CreateMessageRequest $request): \Illuminate\Http\RedirectResponse
    {
        $user = User::query()->firstOrCreate([
            'email' => $request->email
        ], [
            'name' => $request->name
        ]);

        $message = Message::query()->create([
            'text' => $request->message,
            'user_id' => $user->id
        ]);

        return back();
    }


    public function index()
    {
        return MessageResource::collection(
            Message::query()
                ->with(['user'])
                ->orderBy(
                    'created_at',
                    request()->order == 'asc' ? 'ASC' : 'DESC'
                )
                ->paginate(10)
        );
    }

    public function show(int $id)
    {
        return MessageResource::make(
            Message::query()
                ->find($id)
        );
    }

    public function getXlsx()
    {
        //TODO: to exel
    }


}
