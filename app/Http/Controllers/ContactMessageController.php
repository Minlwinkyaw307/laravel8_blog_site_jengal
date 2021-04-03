<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactMessageIndexRequest;
use App\Http\Requests\ContactMessageShowReqeust;
use App\Models\ContactMessage;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    /**
     * List all the income contact message
     *
     * @param ContactMessageIndexRequest $request
     * @return Application|Factory|View
     */
    public function index(ContactMessageIndexRequest $request)
    {
        $contact_messages = ContactMessage::select(['id', 'email', 'subject', 'message', 'created_at']);

        if($request->has('search'))
        {
            $search = $request->get('search');
            $contact_messages->where("email", "like", "%$search%")
            ->orWhere("subject", "like", "%$search%")
            ->orWhere("message", "like", "%$search%");
        }

        $contact_messages = $contact_messages->orderBy('created_at', 'desc')->paginate($request->get('per_page') ?? 10);

        return view('admin.contact-message.index', [
            'contact_messages'        => $contact_messages,
        ]);
    }

    /**
     * Show Detail of contact message
     *
     * @param ContactMessageShowReqeust $request
     * @param $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function show(ContactMessageShowReqeust $request, $id)
    {
        $item = ContactMessage::find($id);

        if(!$item)
        {
            return redirect()->back()->withErrors('Invalid Request');
        }

        return view('admin.contact-message.show', [
            'title'         => $item->subject,
            'item'          => $item,
            'id'            => $id,
        ]);
    }
}
