<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Movie;
use AppBundle\Entity\People;
use AppBundle\Entity\Role;
use AppBundle\Entity\Combined;
use AppBundle\Form\MovieType;
use AppBundle\Form\PeopleType;
use AppBundle\Form\CombinedType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Doctrine\Common\Collections\ArrayCollection;


class MovieController extends Controller
{
    /**
     * @Route("/", name="movie_list")
     */
    public function listAction()
    {   
        $movies = $this->getDoctrine()->getRepository('AppBundle:Movie')->findAll();

        return $this->render('movie/index.html.twig', array('movies' => $movies));
    }

    /**
     * @Route("/movie/create", name="movie_create")
     */
    public function createAction(Request $request)
    {   
        $movie = new movie;

        $writer = new people;
        $director = new people;
        $actor = new people;

        $role1 = $this->getDoctrine()->getRepository('AppBundle:Role')->find(1);
        $role2 = $this->getDoctrine()->getRepository('AppBundle:Role')->find(2);
        $role3 = $this->getDoctrine()->getRepository('AppBundle:Role')->find(3);

        $combined = new combined($movie);

        $combined->getPeople()->add($writer);
        $combined->getPeople()->add($director);
        $combined->getPeople()->add($actor);

        $combined->getRole()->add($role1);
        $combined->getRole()->add($role2);
        $combined->getRole()->add($role3);

        $form=$this->createForm(CombinedType::class, $combined);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {   

            $combined = $form->getData();
            $combined->setPeople($writer);
            $combined->setRole($role1);

            $em = $this->getDoctrine()->getManager();
            $em->persist($movie);
            $em->persist($combined);
            $em->flush();
            $em->clear();

            $movie = $this->getDoctrine()->getRepository('AppBundle:Movie')->find($movie->getId());
            $role2 = $this->getDoctrine()->getRepository('AppBundle:Role')->find($role2->getId());
            $combined->setMovie($movie);
            $combined->setPeople($director);
            $combined->setRole($role2);

            $em = $this->getDoctrine()->getManager();
            $em->persist($combined);
            $em->flush();
            $em->clear();

            $movie = $this->getDoctrine()->getRepository('AppBundle:Movie')->find($movie->getId());
            $role3 = $this->getDoctrine()->getRepository('AppBundle:Role')->find($role3->getId());
            $combined->setMovie($movie);
            $combined->setPeople($actor);
            $combined->setRole($role3);

            $em = $this->getDoctrine()->getManager();
            $em->persist($combined);
            $em->flush();
            $em->clear();

            $this->addFlash(
                'notice',
                'Movie Added'
                );
        
            return $this->redirectToRoute('movie_list');
        }

        return $this->render('movie/create.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/movie/edit/{id}", name="movie_edit")
     */
    public function editAction($id, Request $request)
    {   
        
        $movie = $this->getDoctrine()->getRepository('AppBundle:Movie')->find($id);

        $combined = new combined($movie);
        $comb = new ArrayCollection();
        $comb = $movie->getCombined();

        $writer = $comb[0]->getPeople();
        $director = $comb[1]->getPeople();
        $actor = $comb[2]->getPeople();
        
        $role1 = $this->getDoctrine()->getRepository('AppBundle:Role')->find(1);
        $role2 = $this->getDoctrine()->getRepository('AppBundle:Role')->find(2);
        $role3 = $this->getDoctrine()->getRepository('AppBundle:Role')->find(3);

        $combined->getPeople()->add($writer);
        $combined->getPeople()->add($director);
        $combined->getPeople()->add($actor);

        $combined->getRole()->add($role1);
        $combined->getRole()->add($role2);
        $combined->getRole()->add($role3);

        $form = $this->createForm(CombinedType::class, $combined);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {  

            $writer = $this->getDoctrine()->getRepository('AppBundle:People')->find($writer->getId());
            $combined = $form->getData();
            $combined->setMovie($movie);
            $combined->setPeople($writer);
            $combined->setRole($role1);

            $em = $this->getDoctrine()->getManager();
            $em->persist($movie);
            $em->persist($writer);
            $em->persist($role1);
            $em->flush();
            $em->clear();

            $movie = $this->getDoctrine()->getRepository('AppBundle:Movie')->find($movie->getId());
            $role2 = $this->getDoctrine()->getRepository('AppBundle:Role')->find($role2->getId());
            $director = $this->getDoctrine()->getRepository('AppBundle:People')->find($director->getId());
            $combined->setMovie($movie);
            $combined->setPeople($director);
            $combined->setRole($role2);

            $em = $this->getDoctrine()->getManager();
            $em->persist($movie);
            $em->persist($director);
            $em->persist($role2);
            $em->flush();
            $em->clear();

            $movie = $this->getDoctrine()->getRepository('AppBundle:Movie')->find($movie->getId());
            $role3 = $this->getDoctrine()->getRepository('AppBundle:Role')->find($role3->getId());
            $actor = $this->getDoctrine()->getRepository('AppBundle:People')->find($actor->getId());
            $combined->setMovie($movie);
            $combined->setPeople($actor);
            $combined->setRole($role3);

            $em = $this->getDoctrine()->getManager();
            $em->persist($movie);
            $em->persist($actor);
            $em->persist($role3);
            $em->flush();
            $em->clear();

            $this->addFlash(
                'notice',
                'Movie Updated'
                );
        
            return $this->redirectToRoute('movie_list');
        }

        return $this->render('movie/edit.html.twig', array('movie' => $movie,'form'=>$form->createView()));
    }

    /**
     * @Route("/movie/details/{id}", name="movie_details")
     */
    public function detailsAction($id)
    {   
        $movie = $this->getDoctrine()->getRepository('AppBundle:Movie')->find($id);

        $combined = new combined($movie);
        $comb = new ArrayCollection();
        $comb = $movie->getCombined();

        $writer = $comb[0]->getPeople();
        $director = $comb[1]->getPeople();
        $actor = $comb[2]->getPeople();
        
        $role1 = $this->getDoctrine()->getRepository('AppBundle:Role')->find(1);
        $role2 = $this->getDoctrine()->getRepository('AppBundle:Role')->find(2);
        $role3 = $this->getDoctrine()->getRepository('AppBundle:Role')->find(3);

        $combined->getPeople()->add($writer);
        $combined->getPeople()->add($director);
        $combined->getPeople()->add($actor);

        $combined->getRole()->add($role1);
        $combined->getRole()->add($role2);
        $combined->getRole()->add($role3);

        return $this->render('movie/details.html.twig', array('movie' => $movie,'writer' => $writer,'director' => $director,'actor' => $actor));
    }

    /**
     * @Route("/movie/delete/{id}", name="movie_delete")
     */
    public function deleteAction($id)
    {   
        $em = $this->getDoctrine()->getManager();
        $movie = $em->getRepository('AppBundle:Movie')->find($id);

        $comb = new ArrayCollection();
        $comb = $movie->getCombined();
        
        $role1 = $this->getDoctrine()->getRepository('AppBundle:Role')->find($comb[0]->getRole()->getId());
        $role2 = $this->getDoctrine()->getRepository('AppBundle:Role')->find($comb[1]->getRole()->getId());
        $role3 = $this->getDoctrine()->getRepository('AppBundle:Role')->find($comb[2]->getRole()->getId());

        foreach ($comb as $combined) {
            $em->remove($combined);
            $em->flush();
        }

        $em->remove($movie);
        $em->flush();        

        $this->addFlash(
                'notice',
                'Movie Deleted'
            );


        return $this->redirectToRoute('movie_list');
    }
}
