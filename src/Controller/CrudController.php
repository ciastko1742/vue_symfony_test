<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class CrudController extends AbstractController
{
    /**
     * @Route("/crud", name="crud")
     */
    public function index(): Response
    {
        return $this->render('crud/index.html.twig', [
            'controller_name' => 'CrudController',
        ]);
    }

    /**
     * @Route("/crud/addUser", name="addUser", methods={"POST"})
     */
    public function addUser(Request $request) : JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];

        if(empty($name) || empty($email) || empty($phone)){
            throw new NotFoundHttpException('Nie wypełniono wszystkich danych');
        }
        $user = new User();
        $user->setName($name);
        $user->setEmail($email);
        $user->setPhone($phone);

        $manager = $this->getDoctrine()->getManager();
        $manager->persist($user);
        $manager->flush();

        return new JsonResponse(['status'=> 'Dodano użytkownika'], Response::HTTP_CREATED);
    }

    /**
     * @Route("'/deleteUser", name="deleteUser")
     */
    public function deleteUser(int $id, EntityManager $manager) : JsonResponse
    {
        $user = $this->getDoctrine()->getRepository(User::class)->find($id);

        $manager->remove($user);
        $manager->flush();

        return new JsonResponse(['status'=> 'Usunięto użytkownika'], Response::HTTP_CREATED);
    }

    /**
     * @Route("/crud/getAll", name="getAllUsers")
     */
    public function getUsers() : JsonResponse
    {
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();

        $response = [
            'users'=>$users
        ];
        return $this->json($response);
    }

}
