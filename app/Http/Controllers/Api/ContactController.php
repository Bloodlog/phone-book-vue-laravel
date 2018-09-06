<?php

namespace App\Http\Controllers\Api;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Responses\Success;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateContact;
use App\Http\Requests\Api\UpdateContact;

/**
 * Class ContactController
 *
 * @package App\Http\Controllers\Api
 */
class ContactController extends Controller
{
    /**
     * Заполняемые параметры.
     */
    const FILLABLE_PARAMETERS = ['name', 'phone', 'comment'];

    /**
     * Добавляет новую запись.
     *
     * @param CreateContact|Request $request
     * @return Success
     */
    public function store(CreateContact $request)
    {
        $phone = new Contact($request->only(self::FILLABLE_PARAMETERS));

        return new Success($phone, 201);
    }

    /**
     * Обновляет запись.
     *
     * @param UpdateContact|Request $request
     * @param                       $contact
     * @return Success
     * @internal param Contact $phone
     */
    public function update(UpdateContact $request, $contact)
    {
        $contact = Contact::findOrFail($contact);

        return new Success($contact->update($request->only(self::FILLABLE_PARAMETERS)), 202);
    }

    /**
     * Удаляет запись.
     *
     * @param Request $request
     * @param Contact $phone
     * @return Success
     */
    public function destroy(Request $request, Contact $phone)
    {
        return new Success($phone->delete(), 202);
    }

    // todo: index
    public function index(Request $request)
    {
        return new Success(Contact::all());
    }
}
