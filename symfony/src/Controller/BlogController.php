<?php
// src/Controller/BlogController.php

/**
 * @Author: OMAO
 * @Date:   2019-02-01 16:50:01
 * @Last Modified by:   Mchar
 * @Last Modified time: 2019-02-08 15:34:45
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

class BlogController extends AbstractController
{

    /**
     * index du blog
     * @Route(
     *     "/",
     *     name="homepage"
     * )
     */
    public function  index() {
        return $this->redirectToRoute("sandwich_accueil");
        $urlListDefault = $this->generateUrl('blog_list');
        $urlList = $this->generateUrl('blog_list', ['page' => random_int(0,100)]);
        $urlShow = $this->generateUrl('blog_show', ['slug' => "pouetpoeut"]);

        return new Response("<h1>Petit site de présentation de symfony 4</h1>
            <p>List : <a href='{$urlListDefault}'>{$urlListDefault}</a></p>
            <p>List : <a href='{$urlList}'>{$urlList}</a></p>
            <p>Show : <a href='{$urlShow}'>{$urlShow}</a></p>
            ");
    }

    /**
     * Matches /blog exactly
     *
     * @Route(
     *     "/blog/{page<\d+>?15}",
     *     name="blog_list"
     * )
     */
    public function list($page)
    {
        if (!isset($page)) {
            $page = 100;
        }
        return new Response("<H1> VAS Y C'EST MON BLOG WESH ! </H1> <p>au fait tu m'as donné la page : {$page}</p>");
    }

    /**
     * Matches /blog/*
     *
     * @Route(
     *     "/blog/{slug}",
     *     name="blog_show"
     * )
     */
    public function show($slug)
    {
        $slug = str_replace("pouet", "t'en as pas marre de mettre des putain de pouet", $slug);

        $url = $this->generateUrl('homepage');

        return $this->render("blog/article_content.html.twig", [
            "title" => $slug,
            "url" => $url
        ]);
    }

    /**
     * @Route(
     *  "/articles/{_locale}/{year}/{slug}.{_format}",
     *  defaults= {
     *      "_format": "html"
     *  },
     *  requirements = {
     *      "_locale": "en|fr|ru",
     *      "_format": "html|rss",
     *      "year": "\d+"
     *  },
     * name="blog_advanced_show"
     * )
     */
    public function advanced_show(Request $request, $_locale, $year, $slug) {

       // redirects to a route and maintains the original query string parameters
        // return $this->redirectToRoute('blog_show', ["slug" => implode("-", $request->query->all())]);

        return new Response("
            <p> _locale = {$_locale} </p>
            <p> year = {$year} </p>
            <p> slug = {$slug} </p>
        ");
    }

    /**
     * @Route({
     *     "fr": "/a-propos",
     *     "en": "/about-us"
     * }, name="about_us")
     */
    public function about(LoggerInterface $logger)
    {
        dump($logger);

        $logger->info("je log sa maman !");
        $logger->error("ouh la mechante erreur !");
        $logger->warning("ouh la mechante erreur !");
        return new Response("<html><body> PAGE A PROPOS </body></html>");
    }

    /**
     * @Route(
     *     "/get",
     *     name="blog_get"
     * )
     */
    public function getteuh(Request $request)
    {
        $page = $request->query->get('page');
        return new Response("<body>
            {$page}
        </body>");
    }

    /**
     * @Route(
     *     "/json",
     *     name="blog_json"
     * )
     */
    public function testJson()
    {
        return $this->json(["coucou" => "pouet", "coucou2" => ["pouet", "pouet", "pouet"]]);
    }


    /**
     * @Route(
     *     "/download",
     *     name="blog_download"
     * )
     */
    public function download()
    {
        $file = new File("monfichier.pdf");
        return $this->file($file, "nouveaunom.pdf", ResponseHeaderBag::DISPOSITION_INLINE);
    }

    /**
     * @Route(
     *     "/link",
     *     name="blog_link"
     * )
     */
    public function link(LoggerInterface $logger) {
        $url = $this->generateUrl('blog_list', ['page' => 3]);
        return $this->render("blog/link.html.twig", [
            "url" => $url
        ]);
    }

    /**
     * @Route("/redirection")
     */
    public function redirection() {
        return $this->redirectToRoute('blog_advanced_show', ["_locale" => "fr", "year" => 2009, "slug" => "pouetpouet"]);
    }

    /**
     * @Route("/loglag", name="blog_log")
     */
    public function loglag(LoggerInterface $logger)
    {
        $logger->info("je log sa maman !");
        $logger->error("ouh la mechante erreur !");
        $logger->warning("ouh le mechant warning !");
        return new Response("<html><body> LOG LAG </body></html>");
    }

    /**
     * @Route("/request", name="blog_request")
     */
    public function request(Request $request)
    {
        $param = $request->query->get("pouet");
        return new Response("<body>
            <h4>{$param}</h4>
        </body>");
    }

    /**
     * @Route("/session", name="blog_session")
     */
    public function session(SessionInterface $session)
    {
        $session->set("pouet", "je suis contenu dans la session");
        return $this->redirectToRoute("lucky_session");
    }

    /**
     * @Route("/couleurs", name="blog_couleurs")
     */
    public function couleurs() {
        $couleurList = ["bleu", "rouge", "vert"];
        return $this->render("/blog/couleurs.html.twig", [
            "name" => "Chapeau en toile à bords rabattus sur la calotte.",
            "age" => 20,
            "couleurList" => $couleurList,
            "couleurString" => implode(",", $couleurList)
        ]);
    }
}
