<?php

namespace App\Http\Resources;

use App\Models\ScoreItem;
use Illuminate\Http\Resources\Json\JsonResource;

class MemberResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $google = $this->user->google_id ? true : false;
        $facebook = $this->user->facebook_id ? true : false;

        return [
            'id' => $this->user->id,
            'name' => $this->user->name,
            'firstName' => $this->user->firstName,
            'lastName' => $this->user->lastName,
            'email' => $this->user->email,
            'avatar' => $this->user->avatar,
            'last_pet' => $this->user->last_pet,

            'state_id' => $this->state_id,
            'description' => $this->description,
            'slug' => $this->slug,

            'gdpr' => [
                'agreed' => $this->gdpr_agreed,
                'date' => $this->gdpr_agreed_date,
                'ip_address' => $this->gdpr_agreed_ip,
            ],

            'created_at' => $this->user->created_at,
            'updated_at' => $this->user->updated_at,

            'google_account' => $google,
            'facebook_account' => $facebook,

        ];
    }
}
