<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProjectPolicy
{
    public function viewAny(User $user): bool
    {
        return true; // All authenticated users can view projects
    }

    public function view(User $user, Project $project): bool
    {
        return true; // All can view specific projects
    }

    public function create(User $user): bool
    {
        return $user->isManager();
    }

    public function update(User $user, Project $project): bool
    {
        return $user->isManager() && $user->id === $project->created_by;
    }

    public function delete(User $user, Project $project): bool
    {
        return $user->isManager() && $user->id === $project->created_by;
    }
}