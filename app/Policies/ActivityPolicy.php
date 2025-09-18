<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\User as AuthUser;
use Spatie\Activitylog\Models\Activity;

final class ActivityPolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Activity');
    }

    public function view(AuthUser $authUser, Activity $activity): bool
    {
        return $authUser->can('View:Activity');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Activity');
    }

    public function update(AuthUser $authUser, Activity $activity): bool
    {
        return $authUser->can('Update:Activity');
    }

    public function delete(AuthUser $authUser, Activity $activity): bool
    {
        return $authUser->can('Delete:Activity');
    }
}
