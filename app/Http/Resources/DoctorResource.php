<?php

namespace App\Http\Resources;

use App\Models\ScoreItem;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $openingHours = $this->user->openingHours;
        $all_properties = $this->user
            ->properties()
            ->where('is_approved', 1)
            ->orderBy('name', 'desc')
            ->get()
            ->flatten()
            ->unique();
        $services = $this->user
            ->services()
            ->where('is_approved', 1)
            ->get();
        $photos = $this->user->photos;

        // split properties
        $properties = [];
        foreach ($all_properties as $item) {
            $properties[$item->property_category_id][] = (object) [
                'id' => $item->id,
                'name' => $item->name,
            ];
        }
        $google = $this->user->google_id ? true : false;
        $facebook = $this->user->facebook_id ? true : false;

        // count score
        $score_sum = 0;
        $score_count = 0;
        $score_detail = [];
        foreach (ScoreItem::get() as $item) {
            $variable = 'total_score_' . $item->id;
            $score_detail[$item->id] = $this->$variable;
            $score_sum += $this->$variable;
            $score_count++;
        }
        return [
            'id' => $this->user->id,
            'state_id' => $this->state_id,
            'name' => $this->user->name,
            'email' => $this->user->email,
            'avatar' => $this->user->avatar,
            'last_pet' => $this->user->last_pet,

            'search_name' => $this->search_name,
            'description' => $this->description,
            'slug' => $this->slug,
            'speaks_english' => $this->speaks_english,
            'completeness' => $this->profile_completedness,

            'score' => (object) [
                'total' => $score_sum / $score_count,
                'detail' => $score_detail,
            ],
            'open' => $this->open,

            'address' => [
                'street' => $this->street,
                'city' => $this->city,
                'country' => $this->country,
                'post_code' => $this->post_code,
                'website' => $this->website,
                'phone' => $this->phone,
                'second_phone' => $this->second_phone,
                'latitude' => $this->latitude,
                'longitude' => $this->longitude,
            ],

            'opening_hours' => OpeningHoursResource::collection($openingHours),

            'staff_info' => [
                'doctors_count' => $this->working_doctors_count,
                'doctors_names' => $this->working_doctors_names,
                'nurses_count' => $this->nurses_count,
                'others_count' => $this->other_workers_count,
            ],

            'services' => ServiceResource::collection($services),

            'gallery' => PhotoResource::collection($photos),
            'properties' => [
                'equipment' => array_key_exists(1, $properties)
                    ? $properties[1]
                    : [],
                'expertise' => array_key_exists(2, $properties)
                    ? $properties[2]
                    : [],
                'specialization' => array_key_exists(3, $properties)
                    ? $properties[3]
                    : [],
            ],
            'gdpr' => [
                'agreed' => $this->gdpr_agreed,
                'date' => $this->gdpr_agreed_date,
                'ip_address' => $this->gdpr_agreed_ip,
            ],

            'created_at' => $this->user->created_at,
            'updated_at' => $this->user->updated_at,
            'email_verified_at' => $this->user->email_verified_at,
            'activated_at' => $this->user->activated_at,
            
            'google_account' => $google,
            'facebook_account' => $facebook,
        ];
    }
}
