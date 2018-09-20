<?php

namespace App\Http\Controllers\Api;

use App\Contact;
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
     * @param CreateContact $request
     * @return Success
     */
    public function store(CreateContact $request)
    {
        $contact = new Contact($request->only(self::FILLABLE_PARAMETERS));

        return new Success($contact, 201);
    }

    /**
     * Обновляет запись.
     *
     * @param UpdateContact $request
     * @param                       $id
     * @return Success
     * @internal param Contact $contact
     */
    public function update(UpdateContact $request, $id)
    {
        $contact = Contact::findOrFail($id);

        return new Success($contact->update($request->only(self::FILLABLE_PARAMETERS)), 202);
    }

    /**
     * Удаляет запись.
     *
     * @param Contact $contact
     * @return Success
     */
    public function destroy(Contact $contact)
    {
        return new Success($contact->delete(), 202);
    }

    /**
     * @return Success
     */
    public function index()
    {
        return new Success(Contact::all());
    }

    /**
     * todo: test
     * @param Contact $contact
     * @return Success
     */
    public function show(Contact $contact)
    {
        return new Success($contact, 202);
    }
}
