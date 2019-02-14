<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Holiday;
use App\Repository\HolidayRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

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
     * @Route("/holiday/{id<\d+>?}", name="holiday_show")
     */
    public function show(HolidayRepository $repo, Holiday $holiday = null)
    {
        if ($holiday == null) {
            throw $this->createNotFoundException("ben oui connard ta variable holiday n'est pas trouvé, surement parceque tu as mis le mauvais ID");
        }
        dump($holiday);

        return $this->render('holiday/show.html.twig', [
            "holiday" => $holiday
        ]);
    }

    /**
     * @Route("/holiday/new", name="holiday_create")
     * @Route("/holiday/{id<\d+>}/edit", name="holiday_edit")
     */
    public function form(Request $req, ObjectManager $manager, Holiday $holiday = null)
    {
        dump($holiday);

        if ($holiday == null) { // is null -> true , is not null -> false
            $holiday = new Holiday();
        }

        $form = $this->createFormBuilder($holiday)
                     ->add("location")
                     ->add("duration")
                     ->add("peopleCount")
                     ->getForm();

        $form->handleRequest($req);

        if ($form->isSubmitted()) {
            $manager->persist($holiday);
            $manager->flush();

            dump($holiday);

            return $this->redirectToRoute("holiday_show", [
                "id" => $holiday->getId()
            ]);
        }

        return $this->render('holiday/create.html.twig', [
            "formHoliday" => $form->createView(),
            "isEditMode" =>  $holiday->getId() !== null  // false -> creation, true -> modification
        ]);
    }



}
