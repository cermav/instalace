<?php

namespace app\Http\Controllers\Api;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Exceptions\HttpResponseException;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Pet;
use App\Models\PetAppointment;

use DateTime;
use Symfony\Component\HttpFoundation\Response;

class EventController extends Controller {
    public function index(int $ownerId) {
        $this->authorizeUser($ownerId);

        $events = PetAppointment::where('owners_id', Auth::user()->id)->get();

        return response()->json($events);
    }

    public function getForMember() {
        $events = PetAppointment::where('owners_id', Auth::user()->id)->get();

        return response()->json($events);
    }

    public function getForDoctor() {
        $events = PetAppointment::where('doctor_id', Auth::user()->id)->get();

        return response()->json($events);
    }

    public function createMember(Request $request, int $owners_id) {
        $content = json_decode($request->getContent(), true);

        $this->authorizeUser($owners_id);

        $object = json_decode(json_encode($content), false);
        $this->validateRegistration($content);


        $appointment = $this->createAppointmentMember($object, $owners_id);

        $appointment->save();

        return response()->json($appointment, JsonResponse::HTTP_CREATED);
    }

    public function createDoctor(Request $request, int $doctor_id) {
        $content = json_decode($request->getContent(), true);

        $this->authorizeUser($doctor_id);

        $object = json_decode(json_encode($content), false);
        $this->validateRegistration($content);


        $appointment = $this->createAppointmentDoctor($object, $doctor_id);

        $appointment->save();

        return response()->json($appointment, JsonResponse::HTTP_CREATED);
    }

    public function createAppointmentMember(object $data, int $owners_id) {
        $owner = User::find($owners_id);

        try {
            return PetAppointment::create(['title' => $data->title,
                                           'date' => $data->date,
                                           'owners_id' => $owners_id,
                                           'pet_id' => $data->pet_id,
                                           'doctor_id' => $data->doctor_id,
                                           'assigned_to' => $data->doctor_id,
                                           'start' => $data->startTime ? "{$data->date}T{$data->startTime}" : $data->date,
                                           'end' => $data->endTime ? "{$data->date}T{$data->endTime}" : $data->date,
                                           'allDay' => !$data->startTime && !$data->endTime,
                                           'name' => $owner->firstName,
                                           'surname' => $owner->lastName,
                                           'mail' => $owner->email]);
        } catch (\Exception $ex) {
            throw new HttpResponseException(response()->json(['errors' => "Error creating appointment: " . $ex->getMessage(),], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
        }
    }

    public function updateAppointmentMember(Request $request, int $owner_id, int $id) {
        $content = json_decode($request->getContent(), true);

        $this->authorizeUser($owner_id);

        $object = json_decode(json_encode($content), false);
        $this->validateRegistration($content);

        $event = PetAppointment::find($id);

        try {
            $event->update(['title' => $object->title,
                            'date' => $object->date,
                            'pet_id' => $object->pet_id,
                            'doctor_id' => $object->doctor_id,
                            'assigned_to' => $object->doctor_id,
                            'accepted' => $this->isChangedTime($event, $object) || $this->isReassigned($event, $object) ? false : $event->accepted,
                            'start' => $object->startTime ? "{$object->date}T{$object->startTime}" : $object->date,
                            'end' => $object->endTime ? "{$object->date}T{$object->endTime}" : $object->date,
                            'allDay' => !$object->startTime && !$object->endTime]);

            return response()->json(PetAppointment::find($id), JsonResponse::HTTP_OK);
        } catch (\Exception $ex) {
            throw new HttpResponseException(response()->json(['errors' => "Error updating appointment: " . $ex->getMessage(),], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
        }
    }

    public function createAppointmentDoctor(object $data, int $doctor_id) {
        $mail = $data->mail;
        $owner_id = DB::table('users')->where('email', $mail)->value('id');

        try {
            return PetAppointment::create(['title' => $data->title,
                                           'date' => $data->date,
                                           'owners_id' => $owner_id,
                                           'doctor_id' => $doctor_id,
                                           'assigned_to' => $owner_id,
                                           'start' => $data->startTime ? "{$data->date}T{$data->startTime}" : $data->date,
                                           'end' => $data->endTime ? "{$data->date}T{$data->endTime}" : $data->date,
                                           'allDay' => !$data->startTime && !$data->endTime,
                                           'accepted' => true,
                                           'phone_number' => $data->phone,
                                           'mail' => $mail,
                                           'name' => $data->name,
                                           'surname' => $data->surname]);
        } catch (\Exception $ex) {
            throw new HttpResponseException(response()->json(['errors' => "Error creating appointment: " . $ex->getMessage(),], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
        }
    }

    public function updateAppointmentDoctor(Request $request, int $doctor_id, int $id) {
        $content = json_decode($request->getContent(), true);

        $this->authorizeUser($doctor_id);

        $object = json_decode(json_encode($content), false);
        $this->validateRegistration($content);

        $event = PetAppointment::find($id);

        try {
            $event->update(['title' => $object->title,
                            'date' => $object->date,
                            'accepted' => $this->isChangedTime($event, $object) || $this->isReassigned($event, $object) ? false : $event->accepted,
                            'start' => $object->startTime ? "{$object->date}T{$object->startTime}" : $object->date,
                            'end' => $object->endTime ? "{$object->date}T{$object->endTime}" : $object->date,
                            'allDay' => !$object->startTime && !$object->endTime]);

            return response()->json(PetAppointment::find($id), Response::HTTP_OK);
        } catch (\Exception $ex) {
            throw new HttpResponseException(response()->json(['errors' => "Error updating appointment: " . $ex->getMessage(),], Response::HTTP_UNPROCESSABLE_ENTITY));
        }
    }

    public function memberAccept(int $member_id, int $event_id) {
        $this->authorizeUser($member_id);

        try {
            $event = PetAppointment::findOrFail($event_id);

            $this->authorizeRequestMember($event);

            $event->update(['accepted' => true,
                            'assigned_to' => null]);

            return response()->json($event, Response::HTTP_OK);
        } catch (\Exception $ex) {
            throw new HttpResponseException(response()->json(['errors' => "Error accepting appointment: " . $ex->getMessage(),], Response::HTTP_UNPROCESSABLE_ENTITY));
        }
    }

    public function memberDeny(int $member_id, int $event_id) {
        $this->authorizeUser($member_id);

        try {
            $event = PetAppointment::findOrFail($event_id);

            $this->authorizeRequestMember($event);

            $event->update(['accepted' => false,
                            'assigned_to' => $event->doctor_id]);

            return response()->json($event, JsonResponse::HTTP_OK);
        } catch (\Exception $ex) {
            throw new HttpResponseException(response()->json(['errors' => "Error accepting appointment: " . $ex->getMessage(),], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
        }
    }


    public function doctorAccept(int $member_id, int $event_id) {
        $this->authorizeUser($member_id);

        try {
            $event = PetAppointment::findOrFail($event_id);

            $this->authorizeRequestDoctor($event);

            $event->update(['accepted' => true,
                            'assigned_to' => null]);

            return response()->json($event, JsonResponse::HTTP_OK);
        } catch (\Exception $ex) {
            throw new HttpResponseException(response()->json(['errors' => "Error accepting appointment: " . $ex->getMessage(),], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
        }
    }

    public function doctorDeny(int $doctor_id, int $event_id) {
        $this->authorizeUser($doctor_id);

        try {
            $event = PetAppointment::findOrFail($event_id);

            $this->authorizeRequestDoctor($event);

            $event->update(['accepted' => false,
                            'assigned_to' => null]);

            return response()->json($event, JsonResponse::HTTP_OK);
        } catch (\Exception $ex) {
            throw new HttpResponseException(response()->json(['errors' => "Error declining appointment: " . $ex->getMessage(),], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
        }
    }

    public function memberDelete(int $member_id, int $event_id) {
        $this->authorizeUser($member_id);

        try {
            $event = PetAppointment::findOrFail($event_id);

            $this->authorizeRequestMember($event);

            $event->delete();

            return response()->json(JsonResponse::HTTP_OK);
        } catch (\Exception $ex) {
            throw new HttpResponseException(response()->json(['errors' => "Error deleting appointment: " . $ex->getMessage(),], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
        }
    }

    public function doctorDelete(int $doctor_id, int $event_id) {
        $this->authorizeUser($doctor_id);

        try {
            $event = PetAppointment::findOrFail($event_id);

            $this->authorizeRequestDoctor($event);

            $event->delete();

            return response()->json(JsonResponse::HTTP_OK);
        } catch (\Exception $ex) {
            throw new HttpResponseException(response()->json(['errors' => "Error deleting appointment: " . $ex->getMessage(),], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
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

    /**
     * @throws AuthenticationException
     */
    protected function authorizeRequestDoctor(object $event) {
        $user = Auth::User();

        if ($event->assigned_to === $user->id || $event->doctor_id === $user->id) return;

        throw new AuthenticationException();
    }

    /**
     * @throws AuthenticationException
     */
    protected function authorizeRequestMember($event) {
        $user = Auth::User();

        if ($event->assigned_to === $user->id || $event->owners_id === $user->id) return;

        throw new AuthenticationException();
    }

    protected function validateRegistration(array $input) {
        $validator = Validator::make((array)$input, ['date' => 'required',
                                                     'title' => 'required',]);

        if ($validator->fails()) {
            throw new HttpResponseException(response()->json(['errors' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY));
        }
    }

    /**
     * Determines whether the input value brings change of time to current saved timestamp value
     * returns boolean
     */
    protected function isChangedTime($oldEvent, $inputEvent) {
        if ($oldEvent->date != $inputEvent->date) {
            return true;
        }

        if ($inputEvent->startTime == NULL) {
            if ($oldEvent->start != $oldEvent->date) {
                return true;
            }
        } else {
            if ($oldEvent->start == $oldEvent->date) {
                return true;
            }

            if (date('H:i', strtotime($oldEvent->start)) != date('H:i', strtotime($inputEvent->startTime))) {
                return true;
            }
        }

        if ($inputEvent->endTime == NULL) {
            if ($oldEvent->end != $inputEvent->date) {
                return true;
            }
        } else {
            if ($oldEvent->end == $oldEvent->date) {
                return true;
            }

            if (date('H:i', strtotime($oldEvent->end)) != date('H:i', strtotime($inputEvent->endTime))) {
                return true;
            }
        }

        return false;
    }

    protected function isReassigned($oldEvent, $inputEvent) {
        return $oldEvent->doctor_id != $inputEvent->doctor_id;
    }
}

