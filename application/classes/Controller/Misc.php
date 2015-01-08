<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Misc extends Controller {

public function action_lcletter() {
  $view = View::factory( 'template/default' );
  $view->title = "Letter from Lucy Calkins";

  $content = View::factory( 'misc/lcletter' );

  $view->content = $content;
  $this->response->body( $view );
}


public function action_links() {
  $view = View::factory( 'template/default' );
  $view->title = "Letter from Lucy Calkins";

  $content = View::factory( 'misc/links' );

  $view->content = $content;
  $this->response->body( $view );
}



}
