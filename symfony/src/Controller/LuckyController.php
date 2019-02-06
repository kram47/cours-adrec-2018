<?php
// src/Controller/LuckyController.php

/**
 * @Author: OMAO
 * @Date:   2019-01-31 16:19:12
 * @Last Modified by:   OMAO
 * @Last Modified time: 2019-02-04 17:08:09
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LuckyController extends AbstractController
{

    /**
     * @Route("/lucky/number")
     */
    public function number()
    {
        $number = random_int(0, 100);

        return $this->render("lucky/number.html.twig", [
            "poil" => $number
        ]);
    }

}