<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller {


public function action_index() {
  $view = View::factory( 'template/default' );
  $view->title = "Homepage";

  $content = View::factory( 'home' );

  $query = DB::select()->from( 'categories' );
  $results = $query->execute()->as_array( 'id' );
  $content->categories = $results;

  $view->content = $content;
  $this->response->body( $view );
}


public function action_jose() {
  $view = View::factory( 'template/default' );
  $view->title = "Homepage";

  $content = View::factory( 'home_jose' );

  $query = DB::select()->from( 'categories' );
  $results = $query->execute()->as_array( 'id' );
  $content->categories = $results;

  $view->content = $content;
  $this->response->body( $view );
}


}
