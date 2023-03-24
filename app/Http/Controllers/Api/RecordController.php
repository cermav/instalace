<?php

namespace app\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\InvoiceItem;
use App\Models\PetAppointment;
use App\Models\PriceChart;
use App\Models\Record;
use App\Models\User;
use App\Types\UserRole;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class RecordController extends Controller {
    /**
     * @throws AuthenticationException
     */
    public function index() {
        $records = Record::where('doctor_id', Auth::user()->id)->get();

        return response()->json($records);
    }

    /**
     * @throws AuthenticationException
     */
    public function store(Request $request, int $event_id) {
        $doctor_id = $this->authorizeDoctor();

        $object = json_decode($request->getContent(), false);

        $record = $this->createRecord($object, $doctor_id, $event_id);
        $record->save();

        $this->createInvoiceItems($object, $record, $doctor_id);

        return response()->json(Response::HTTP_CREATED);
    }

    public function update(Request $request) {}

    public function delete(Request $request) {}

    public function createRecord(object $data, int $doctor_id, int $event_id) {
        try {
            $event = PetAppointment::findOrFail($event_id);

            return Record::create([
                'appointment_id' => $event_id,
                'doctor_id' => $doctor_id,
                'date' => $event->date,
                'time' => $event->time,
                'medical_record' => $data->medical_record,
                'description' => $data->description
            ]);
        } catch (\Exception $ex) {
            throw new HttpResponseException(response()->json(['errors' => "Error creating appointment: " . $ex->getMessage(),], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
        }
    }

    /**
     * @throws AuthenticationException
     */
    protected function authorizeUser(int $id) {
        $requestUser = User::Find($id);
        $loggedUser = Auth::User();

        if ($requestUser->id !== $loggedUser->id && $loggedUser->role_id !== UserRole::ADMINISTRATOR) {
            throw new AuthenticationException();
        }
    }

    protected function authorizeDoctor() {
        $loggedUser = Auth::User();

        if ($loggedUser->role_id !== UserRole::DOCTOR && $loggedUser->role_id
            !== UserRole::ADMINISTRATOR) {
            throw new AuthenticationException();
        }

        return $loggedUser->id;
    }

    private function createInvoiceItems(object $data, Record $record, int $doctor_id) {
        foreach ($data->billing_items as $item) {
            $chart = PriceChart::findOrFail($item->id);

            if ($chart->doctor_id !== $doctor_id) {
                throw new BadRequestHttpException();
            }

            InvoiceItem::create([
                'record_id' => $record->id,
                'item_id' => $item->id,
                'count' => $item->count
            ]);
        }
    }
}

