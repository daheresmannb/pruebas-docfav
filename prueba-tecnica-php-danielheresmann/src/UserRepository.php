<?php

namespace App;

class UserRepository {
    private $usuarios = [];

    public function save(User $usuario) {
        $this->usuarios[$usuario->getId()] = $usuario;
    }

    public function getUserById($userId) {
        return isset($this->usuarios[$userId]) ? $this->usuarios[$userId] : null;
    }

    public function update(User $usuario) {
        if (isset($this->usuarios[$usuario->getId()])) {
            $this->usuarios[$usuario->getId()] = $usuario;
        } else {
            throw new \Exception(
                "El usuario con ID {$usuario->getId()} no existe en el repositorio."
            );
        }
    }

    public function delete($userId) {
        if (isset($this->usuarios[$userId])) {
            unset($this->usuarios[$userId]);
        } else {
            throw new \Exception(
                "El usuario con ID {$userId} no existe en el repositorio."
            );
        }
    }
}