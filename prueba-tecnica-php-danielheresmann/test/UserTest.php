<?php
namespace App;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase {
    public function testGetters() {
        $user = new User(
            1, 
            'Daniel Heresmann', 
            'dheresmann@gmail.com', 
            '12345678'
        );

        $this->assertEquals(
            1, 
            $user->getId()
        );
        $this->assertEquals(
            'Daniel Heresmann', 
            $user->getNombre()
        );
        $this->assertEquals(
            'dheresmann@gmail.com', 
            $user->getCorreo()
        );
        $this->assertEquals(
            '12345678', 
            $user->getPass()
        );
    }

    public function testSetters() {
        $user = new User(
            1, 
            'Daniel Heresmann', 
            'dheresmann@gmail.com', 
            '12345678'
        );

        $user->setNombre('Daniel Andres Heresmann Bustos');
        $user->setCorreo('dheresmann2@gmail.com');
        $user->setPass('1231234');

        $this->assertEquals(
            'Daniel Andres Heresmann Bustos', 
            $user->getNombre()
        );
        $this->assertEquals(
            'dheresmann2@gmail.com', 
            $user->getCorreo()
        );
        $this->assertEquals(
            '1231234', 
            $user->getPass()
        );
    }

    public function testRepositoryIntegration() {
        $userRepo = new UserRepository();
        $user = new User(
            1, 
            'Daniel Heresmann', 
            'dheresmann@gmail.com', 
            '12345678'
        );
        $userRepo->save($user);

        $user_recuperado = $userRepo->getUserById(1);
        $this->assertEquals(
            $user, 
            $user_recuperado
        );

        $user->setNombre('Nombre Actualizado');
        $userRepo->update($user);

        $userUpdated = $userRepo->getUserById(1);
        $this->assertEquals(
            'Nombre Actualizado', 
            $userUpdated->getNombre()
        );

        $userRepo->delete(1);
        $this->assertNull($userRepo->getUserById(1));
    }
}