<?php

namespace App\Http\Controllers\Api;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Responses\Success;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreatePhone;
use App\Http\Requests\Api\UpdatePhone;

/**
 * Class PhoneController
 * @package App\Http\Controllers\Api
 */
class PhonesController extends Controller
{
    /**
     * Заполняемые параметры.
     */
    const FILLABLE_PARAMETERS = ['name', 'phone', 'comment'];

    /**
     * Добавляет новую запись.
     *
     * @param CreatePhone|Request $request
     * @return Success
     */
    public function create(CreatePhone $request)
    {
        $phone = new Contact($request->only(self::FILLABLE_PARAMETERS));

        return new Success($phone, 201);
    }

    /**
     * Обновляет запись.
     *
     * @param UpdatePhone|Request $request
     * @param Contact $contact
     * @return Success
     * @internal param Contact $phone
     */
    public function update(UpdatePhone $request, Contact $contact)
    {
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
