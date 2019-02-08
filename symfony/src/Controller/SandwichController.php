<?php
// src/Controller/SandwichController.php

/**
 * @Author: OMAO
 * @Date:   2019-02-01 16:50:01
 * @Last Modified by:   Mchar
 * @Last Modified time: 2019-02-08 15:29:24
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class SandwichController extends AbstractController
{
    /**
     * accueil de la sandwicherie
     * @Route(
     *     "/sandwich/accueil",
     *     name="sandwich_accueil"
     * )
     */
    public function accueil() {
        return $this->render("/sandwich/accueil.html.twig");
    }

    /**
     * menus de la sandwicherie
     * @Route(
     *     "/sandwich/menu",
     *     name="sandwich_menu"
     * )
     */
    public function menu() {
        return $this->render("/sandwich/menu.html.twig");
    }

    /**
     * liste des sandwichs de la sandwicherie
     * @Route(
     *     "/sandwich/list",
     *     name="sandwich_list"
     * )
     */
    public function list() {
        return $this->render("/sandwich/list.html.twig");
    }

    /**
     * contact des sandwichs de la sandwicherie
     * @Route(
     *     "/sandwich/contact",
     *     name="sandwich_contact"
     * )
     */
    public function contact() {
        return $this->render("/sandwich/contact.html.twig");
    }

}