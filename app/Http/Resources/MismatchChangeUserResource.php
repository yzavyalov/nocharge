<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MismatchChangeUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $keys = ['email', 'agent', 'ip', 'platform', 'limit','chargeback_initiator'];
        $result = [];

        foreach ($keys as $key) {
            if (isset($this[$key])) {
                $result[$key] = $this[$key];
            }
        }

        if (isset($this['ludoman'])) {
            $result['gambler'] = $this['ludoman'];
        }

        return $result;
    }
}
