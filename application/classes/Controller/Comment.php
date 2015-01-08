<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Comment extends Controller {

public function action_index() {
  $this->response->body('hello, comment!');
}

public function action_hide() {

  $id = $this->request->param( 'id' );

  $query = DB::update( 'comments' )->set( array( 'hidden' => 1 ) )->where( 'id', '=', $id );
  $query->execute();

  // if parent_id is set update visible children
  $query = DB::select()->from( 'comments' )->where( 'id', '=', $id );
  $result = $query->execute()->as_array();
  if ( $result[0]['parent_id'] != NULL ) {
    $parent_id = $result[0]['parent_id'];
    $query = DB::select()->from( 'comments' )->where( 'parent_id', '=', $parent_id )->where( 'hidden', '=', 0 );
    $result = $query->execute()->as_array();
    $query = DB::update( 'comments' )->set( array( 'visible_children' => sizeof( $result ) ) )->where( 'id', '=', $parent_id );
    $query->execute();
  }

  //$this->redirect( $this->request->referrer() );
}

public function action_show() {

  $id = $this->request->param( 'id' );

  $query = DB::update( 'comments' )->set( array( 'hidden' => 0 ) )->where( 'id', '=', $id );
  $query->execute();

  // if parent_id is set update visible children
  $query = DB::select()->from( 'comments' )->where( 'id', '=', $id );
  $result = $query->execute()->as_array();
  if ( $result[0]['parent_id'] != NULL ) {
    $parent_id = $result[0]['parent_id'];
    $query = DB::select()->from( 'comments' )->where( 'parent_id', '=', $parent_id )->where( 'hidden', '=', 0 );
    $result = $query->execute()->as_array();
    $query = DB::update( 'comments' )->set( array( 'visible_children' => sizeof( $result ) ) )->where( 'id', '=', $parent_id );
    $query->execute();
  }

  //$this->redirect( $this->request->referrer() );
}

public function action_view() {
  $view = View::factory( 'template/default' );
  $view->title = "View Comment";

  $content = View::factory( 'comment/view' );

  $id = $this->request->param( 'id' );

  $query = DB::select()->from( 'comments' )->where( 'id', '=', $id );

  $results = $query->execute()->as_array();
  $content->row = $results[0];

  $query = DB::select()->from( 'comments' )->where( 'parent_id', '=', $id )->where( 'hidden', '=', 0 );
  $results = $query->execute()->as_array();
  $content->responses = $results;

  $view->content = $content;

  $this->response->body( $view );
}


public function action_reviewasadmin() {
  $view = View::factory( 'template/default' );
  $view->title = "View Comment";

  $content = View::factory( 'comment/view' );

  $id = $this->request->param( 'id' );

  $query = DB::select()->from( 'comments' )->where( 'id', '=', $id );

  $results = $query->execute()->as_array();
  $content->row = $results[0];

  $query = DB::select()->from( 'comments' )->where( 'parent_id', '=', $id )->where( 'hidden', '=', 0 );
  $results = $query->execute()->as_array();
  $content->responses = $results;
  $content->admin = TRUE;

  $view->content = $content;

  $this->response->body( $view );
}


public function action_specialsubmit() {
  $view = View::factory( 'template/default' );
  $view->title = "View Comment";
  $view->special = TRUE;

  $content = View::factory( 'comment/submit' );

  $query = DB::select()->from( 'categories' );
  $results = $query->execute()->as_array( 'id' );
  $content->categories = $results;
  $content->special = $view->special;

  $view->content = $content;

  $this->response->body( $view );

}


public function action_submit() {

  if ( $this->request->method() !== HTTP_Request::POST ) {
    $view = View::factory( 'template/default' );
    $view->title = "View Comment";

    $content = View::factory( 'comment/submit' );

    $query = DB::select()->from( 'categories' );
    $results = $query->execute()->as_array( 'id' );
    $content->categories = $results;

    $view->content = $content;

    $this->response->body( $view );

  }
  else {

    $post = $this->request->post();

    $query = DB::select()->from( 'categories' );
    $results = $query->execute()->as_array( 'name' );

    // find the "basic category_id" in the submitted 'subject'
    $basic_category_id = ',' . $results[ $post['subject'] ]['id'] . ',';

    if ( trim( $post['name'] ) == '' )
      $post['name'] = 'Anonymous';

    if ( trim( $post['comment'] ) != '' ) {

      if ( array_key_exists( 'role', $post ) )
        $post['role'] = implode( ', ', $post['role'] );
      else
        $post['role'] = '';

      if ( array_key_exists( 'special', $post ) )
        $post['special'] = 1;
      else
        $post['special'] = 0;

      if ( $post['location'] == 'Other' ) {
        $post['grade'] = $post['state'];
      }

      $query = DB::insert( 'comments', array( 'type', 'subtype', 'name', 'role', 'email', 'content', 'special', 'category_ids' ) )
        ->values( array( $post['grade'], $post['subject'], $post['name'], $post['role'], $post['email'], $post['comment'], $post['special'], $basic_category_id ) );


      //$query->execute();

    }

    $this->redirect( '/comments/view/' . $post['grade'] . '/' . $results[ $post['subject'] ]['id'] );

  }
}

public function action_respond() {

  if ( $this->request->method() !== HTTP_Request::POST ) {
    $id = $this->request->param( 'id' );
    $view = View::factory( 'comment/_respond' );
    $view->parent_id = $id;
    $this->response->body( $view );
  }
  else {

    $post = $this->request->post();

    if ( trim( $post['name'] ) == '' )
      $post['name'] = 'Anonymous';

    if ( trim( $post['comment'] ) != '' ) {
      if ( array_key_exists( 'role', $post ) )
        $post['role'] = implode( ', ', $post['role'] );
      else
        $post['role'] = '';

      $query = DB::insert( 'comments', array( 'name', 'role', 'email', 'content', 'parent_id', 'level' ) )
        ->values( array( $post['name'], $post['role'], $post['email'], $post['comment'], $post['parent_id'], 1 ) );

      $query->execute();

      // now update the parent_ids visible_children value
      $query = DB::select()->from( 'comments' )->where( 'parent_id', '=', $post['parent_id'] )->where( 'hidden', '=', 0 );
      $result = $query->execute()->as_array();
      $query = DB::update( 'comments' )->set( array( 'visible_children' => sizeof( $result ) ) )->where( 'id', '=', $post['parent_id' ] );
      $query->execute();
    }

    $this->redirect( '/comment/view/' . $post['parent_id'] );
  }


}

} // End Comment
