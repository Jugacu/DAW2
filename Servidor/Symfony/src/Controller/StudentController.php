<?php

namespace App\Controller;

use App\Entity\Student;
use App\Form\StudentFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentController extends AbstractController
{
    /**
     * @Route("/student", name="student")
     */
    public function index()
    {
        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',
        ]);
    }

    /**
     * @Route("/registerStudent", name="registerStudent")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function registerStudent(Request $request)
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('home');
        }

        $student = new Student();
        $form = $this->createForm(StudentFormType::class, $student);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

        }

        return $this->render('student/register.html.twig', [
            'studentForm' => $form->createView(),
        ]);

    }
}
