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

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Doctrine\Common\Collections\ArrayCollection;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;


class GraphController extends Controller
{

    /**
     * @Route("/graph", name="graph_data")
     */

    public function queryAction()
    {
        $username = "root"; 
        $password = "root";   
        $host = "127.0.0.1";
        $database = "MovieLand";
    
        $conn = mysqli_connect($host, $username, $password, $database);
        $myquery = "SELECT id, birth_date FROM people";
        $query = mysqli_query($conn, $myquery);

        if ( ! $query ) {
            echo mysqli_error($conn);
            die;
        }
    
        $data = array();
    
        for ($x = 0; $x < mysqli_num_rows($query); $x++) {
            $data[] = mysqli_fetch_assoc($query);
        }

        return $this->render('graph/index.html.twig', array('data' => $data));
        #return new JsonResponse([
        #    'data' => $data, 
        #    'html' => $this->render('graph/index.html.twig')
        #]);
    }
}
