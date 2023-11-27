<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController 
{
  // An array of strings that can be printed to the user
  private array $messages = [ 'Hello', 'Hi', 'Bye' ];

  // This line defines the route for the index() method.
  // When the server gets a request at the root of the website ("/"), it uses this method.
  #[Route('/', name: 'app_index')]  
  public function index(): Response
  {
    // This method creates a new HTTP response that contains all the messages, 
    // concatenated together with commas in between, and returns it.
    return new Response(implode(',', $this->messages));    
  } 

  // This line defines the route for the showOne() method.
  // When the server gets a request for "/messages/{id}" (where {id} can be any string), 
  // it uses this method.
  #[Route('/messages/{id}', name: 'app_show_one')]
  public function showOne($id): Response
  {
    // This method creates a new HTTP response that contains the message at the 
    // index specified by {id}, then returns the HTTP response.
    // If the {id} given in the URL does not correspond with an index in $messages, it will throw an error.
    return new Response($this->messages[$id]);
  }
}

