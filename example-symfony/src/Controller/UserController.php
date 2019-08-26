<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\User1Type;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @Route("/user")
 */
class UserController extends BaseController
{
    /**
     * @Route("/", name="user_index", methods={"GET"})
     * @param UserRepository $userRepository
     * @return Response
     */
    public function index(UserRepository $userRepository): Response
    {
        return $this->responseSuccess($userRepository->findAll());
    }



    /**
     * @Route("/new", name="user_new", methods={"GET","POST"})
     * @param ValidatorInterface $validator
     * @param Request            $request
     * @return Response
     */
    public function new(ValidatorInterface $validator,Request $request): Response
    {
        $user = (new User()) (
            $request->get("nombres"),
            $request->get("apellidos"),
            is_numeric($request->get("cedula")) ? (double)$request->get("cedula") : $request->get("cedula"),
            $request->get("correo"),
            is_numeric($request->get("telefono")) ? (double)$request->get("telefono") : $request->get("telefono")
        );

        $error = $user->validator($validator);

        if (count($error) > 0)
        {
            return $this->responseError($error);
        }

        $entityManager = $this->getDoctrine()
            ->getManager();
        $entityManager->persist($user);
        $entityManager->flush();

        return $this->responseSuccess(
            [
                "menssage" => "usuario agregado con exito",
                "user" => $user
            ]
        );
    }

    /**
     * @Route("/delete_in", name="user_delete_in", methods={"POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */

    public function deleteIn(Request $request){
        $where = $request->get("where");
        $entityManager = $this->getDoctrine()->getManager();
        $users = $entityManager->getRepository(User::class)->findByIn($where);
        return $this->responseSuccess(["menssage"=>"Usuarios Eliminados", "cantidad" => $users]);
    }


    /**
     * @Route("/{id}", name="user_show", methods={"GET"})
     * @param User $user
     * @return Response
     */
    public function show(User $user = null): Response
    {
        if (!$user) {
            return $this->responseError("no existe el usuario");
        }
        return $this->responseSuccess($user);
    }

    /**
     * @Route("/{id}/edit", name="user_edit", methods={"GET","POST"})
     * @param ValidatorInterface $validator
     * @param Request            $request
     * @param User               $user
     * @return Response
     */
    public function edit(ValidatorInterface $validator,Request $request, User $user = null): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        if (!$user) {
            return $this->responseError("no existe el usuario");
        }
        $user->setNombres(!empty($request->get("nombres")) ? $request->get("nombres") : $user->getNombres());
        $user->setApellidos(!empty($request->get("apellidos")) ? $request->get("apellidos") : $user->getApellidos());
        $user->setCedula(!empty($request->get("cedula")) ? is_numeric($request->get("cedula")) ? (double)$request->get("cedula") : $request->get("cedula") : (double)$user->getCedula());
        $user->setCorreo(!empty($request->get("correo")) ? $request->get("correo") : $user->getCorreo());
        $user->setTelefono(!empty($request->get("telefono")) ? is_numeric($request->get("telefono")) ? (double)$request->get("telefono") : $request->get("telefono") : (double)$user->getTelefono());

        $error = $user->validator($validator);
        if (count($error) > 0)
        {
            return $this->responseError($error);
        }
        $entityManager->flush();
        return $this->responseSuccess($user);
    }

    /**
     * @Route("/{id}", name="user_delete", methods={"DELETE"})
     */
    public function delete(Request $request, User $user): Response
    {
        $entityManager = $this->getDoctrine()
            ->getManager();
        $entityManager->remove($user);
        $entityManager->flush();

        return $this->responseSuccess("usuerio eliminado");
    }



}
