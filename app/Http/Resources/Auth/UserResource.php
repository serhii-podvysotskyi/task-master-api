<?php

namespace App\Http\Resources\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin User
 */
class UserResource extends JsonResource
{
    private const array GATES = [
        'viewHorizon',
        'viewPulse',
        'viewTelescope',
    ];

    /**
     * Transform the resource into an array.
     */
    #[\Override]
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'abilities' => $this->getAbilities(),
        ];
    }

    private function getAbilities(): array
    {
        $abilities = [
            'accessAdminPanel'
        ];

        foreach (self::GATES as $gate) {
            if ($this->can($gate)) {
                $abilities[] = $gate;
            }
        }

        return $abilities;
    }
}
