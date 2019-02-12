<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Holiday;
use App\Repository\HolidayRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;

class HolidayController extends AbstractController
{
    /**
     * @Route("/holiday", name="holiday_index")
     */
    public function index(HolidayRepository $repo)
    {
        //$repo = $this->getDoctrine()->getRepository(Holiday::class);
        $holidayList = $repo->findAll();
        dump($holidayList);

        return $this->render('holiday/index.html.twig', [
            'controller_name' => 'HolidayController',
            "holidayList" => $holidayList
        ]);
    }

    /**
        * @Route("/holiday/{id<\d+>?1}", name="holiday_show")
     */
    public function show(HolidayRepository $repo, $id)
    {
        $holiday = $repo->findOneById($id);
        dump($holiday);

        return $this->render('holiday/show.html.twig', [
            "holiday" => $holiday
        ]);
    }

    /**
     * @Route("/holiday/new", name="holiday_create")
     * @Route("/holiday/{id}/edit", name="holiday_edit")
     */
    public function form(Holiday $holiday = null, Request $req, ObjectManager $manager)
    {
        if (!$holiday) {
            $holiday = new Holiday();
        }

        $form = $this->createFormBuilder($holiday)
                     ->add("location")
                     ->add("duration")
                     ->add("peopleCount")
                     ->getForm();

        $form->handleRequest($req);
        if ($form->isSubmitted() && $form->isValid()) {
            if (!$holiday->getId()) {
                // date de creation
            }
            else {
                // date de modification
            }

            $manager->persist($holiday);
            $manager->flush();

            return $this->redirectToRoute("holiday_show",
                ["id" => $holiday->getId()]
            );
        }

        return $this->render('holiday/create.html.twig', [
            "formHoliday" => $form->createView(),
            "isEditMode" => $holiday->getId() !== null
        ]);
    }




}
