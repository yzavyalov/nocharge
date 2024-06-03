<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CheckUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'ip' => $this->ip,
            'browser' => $this->browser,
            'agent' => $this->agent,
            'platform' => $this->platform,
            'chargeback_initiator' => $this->chargeback_initiator,
            'gambler' => $this->ludoman,
            'limit' => $this->limit,
        ];
    }
}
