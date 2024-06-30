<?php

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class UserRepository implements IUserRepository
{
    /**
     * @param array $data
     * @return Builder|Model
     */
    public function create(array $data): Builder|Model
    {
        return User::query()->create($data);
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function update(int $id, $data)
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }
}
