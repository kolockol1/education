<?php

namespace App\Handlers\Request;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use RuntimeException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class Auth
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    /**
     * @param Request $request
     * @param UserPasswordEncoderInterface $encoder
     * @return User
     */
    public function handleRegister(Request $request, UserPasswordEncoderInterface $encoder): User
    {
        $password = $request->get('password');
        $email = $request->get('email');

        if (empty($password) || empty($email)){
            throw new RuntimeException("Invalid Password or Email");
        }

        return $this->createUser($encoder, $email, $password);
    }

    private function createUser(
        UserPasswordEncoderInterface $encoder,
        string $email,
        string $password
    ): User {
        $user = new User();
        $user->setPassword($encoder->encodePassword($user, $password));
        $user->setEmail($email);
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return $user;
    }
}
