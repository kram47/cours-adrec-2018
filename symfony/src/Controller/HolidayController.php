<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Holiday;
use App\Repository\HolidayRepository;
use Symfony\Component\HttpFoundation\Response;

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
        * @Route("/holiday/{id}", name="holiday_show")
     */
    public function show(HolidayRepository $repo, $id)
    {
        $holiday = $repo->findOneById($id);
        dump($holiday);

        return $this->render('holiday/show.html.twig', [
            "holiday" => $holiday
        ]);
    }


}
