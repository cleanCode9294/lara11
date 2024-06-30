<?php

namespace App\Repositories\User;

use App\DTO\UserDTO;

interface IUserRepository
{
    public function create(array $data);

    public function getAll();

    public function update(int $id, $data);

    public function delete(int $id);
}
