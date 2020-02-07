<?php

namespace App\Controller;

use App\Entity\Candidature;
use App\Form\CandidatureType;
use App\Repository\EtapeRepository;
use App\Repository\CandidatureRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/")
 */
class CandidatureController extends AbstractController
{
    private $menu_etapes;

    function __construct (EtapeRepository $repo)
    {
        $this->menu_etapes = $repo->findAll();
        // $this->candParEtape = $repo->countByEtapes();
    }

    /**
     * @Route("/", name="candidature_index", methods={"GET"})
     */
    public function index(Request $request, CandidatureRepository $candidatureRepository): Response
    {
        return $this->render('candidature/index.html.twig', [
            'candidatures' => $candidatureRepository->findAll(),
            'candidaturesDESC' => $candidatureRepository->findBy(
                [],
                ['Date_envoi' => 'DESC']
            ),
            'candidaturesASC' => $candidatureRepository->findBy(
                [],
                ['Date_envoi' => 'ASC']
            ),
            // dump($this->menu_etapes),
            'menu_etapes' => $this->menu_etapes,
            'nbCandidatures'=>$candidatureRepository->countCandidatures(),
            dump($request->attributes->get('_route')),
            'route'=>$request->attributes->get('_route')
            // 'candParEtape' => $this->candParEtape
        ]);
    }

    /**
     * @Route("/new", name="candidature_new", methods={"GET","POST"})
     */
    public function new(Request $request,CandidatureRepository $candidatureRepository): Response
    {
        $candidature = new Candidature();
        $form = $this->createForm(CandidatureType::class, $candidature);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($candidature);
            $entityManager->flush();

            return $this->redirectToRoute('candidature_index');
        }

        return $this->render('candidature/new.html.twig', [
            'candidatures' => $candidatureRepository->findAll(),
            'candidature' => $candidature,
            'form' => $form->createView(),
            'menu_etapes' => $this->menu_etapes,
            'nbCandidatures'=>$candidatureRepository->countCandidatures(),
            'route'=>$request->attributes->get('_route')
        ]);
    }

    /**
     * @Route("/{id}", name="candidature_show", methods={"GET"})
     */
    public function show(Request $request, Candidature $candidature,CandidatureRepository $candidatureRepository): Response
    {
        return $this->render('candidature/show.html.twig', [
            'candidatures' => $candidatureRepository->findAll(),
            'candidature' => $candidature,
            'menu_etapes' => $this->menu_etapes,
            'nbCandidatures'=>$candidatureRepository->countCandidatures(),
            'route'=>$request->attributes->get('_route')
        ]);
    }

    /**
     * @Route("/{id}/edit", name="candidature_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Candidature $candidature, CandidatureRepository $candidatureRepository): Response
    {
        $form = $this->createForm(CandidatureType::class, $candidature);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('candidature_index');
        }

        return $this->render('candidature/edit.html.twig', [
            'candidatures' => $candidatureRepository->findAll(),
            'candidature' => $candidature,
            'form' => $form->createView(),
            'menu_etapes' => $this->menu_etapes,
            'nbCandidatures'=>$candidatureRepository->countCandidatures(),
            'route'=>$request->attributes->get('_route')
        ]);
    }

    /**
     * @Route("/{id}", name="candidature_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Candidature $candidature): Response
    {
        if ($this->isCsrfTokenValid('delete'.$candidature->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($candidature);
            $entityManager->flush();
        }

        return $this->redirectToRoute('candidature_index');
    }

    /**
     * @Route("/candidatures/{id}", name="candidature_etape")
     */
    public function candidatureByEtape(Request $request, $id, EtapeRepository $repo, CandidatureRepository $candidatureRepository){
        $etape = $repo->find($id);
        $candidatures = $etape->getCandidatures();
        $cand = $etape->getCandidatures('id');
        return $this->render('candidature/index.html.twig', [
            'lesCandidatures' => $candidatureRepository->findAll(),
            'candidatures' => $candidatures,
            'candidaturesDESC' => $candidatureRepository->findBy(
                [],
                ['Date_envoi' => 'DESC']
            ),
            'candidaturesASC' => $candidatureRepository->findBy(
                [],
                ['Date_envoi' => 'ASC']
            ),
            // dump($this->menu_etapes),
            // dump($candidatureRepository->findBy(array('etape'=>$this->menu_etapes))),
            'menu_etapes' => $this->menu_etapes,
            'nbCandidatures'=>$candidatureRepository->countCandidatures(),
            'route'=>$request->attributes->get('_route')
            // 'candParEtape' => $this->candParEtape

        ]);
    }

}
