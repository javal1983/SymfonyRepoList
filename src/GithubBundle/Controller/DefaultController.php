<?php

namespace GithubBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Github\Client;

class DefaultController extends Controller
{
    public function indexAction()
    {
		try {
		$client = new Client();
		$repos = $client->api('user')->repositories('symfony');
        return $this->render('GithubBundle:Default:index.html.twig' , array(
			'title' => 'GitHub Symfony Repositories',
			'msg' => '',
			'repos' => $repos));
		} catch(\Exception $ex) {
			return $this->render('GithubBundle:Default:index.html.twig' , array(
			    'title' => $ex->getMessage(),
			    'msg' => $ex->getMessage()
			));
		}	
    }
}
