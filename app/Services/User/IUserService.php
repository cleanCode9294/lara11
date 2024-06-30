<?php

namespace App\Services\User;

use App\DTO\UserDTO;

interface IUserService
{
    public function findAllUsers();

    public function createUser(UserDTO $userDto);

    public function updateUser(int $id, UserDTO $userDto);

    public function deleteUser(int $id);
}
