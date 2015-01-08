<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Comments extends Controller {

public function action_index() {
  $this->response->body('hello, comments!');
}


public function action_view() {
  $view = View::factory( 'template/default' );
  $view->title = "View Comments";

  $content = View::factory( 'comments/view' );

  $grade = $this->request->param( 'grade' );
  $subject = $this->request->param( 'subject' );

  $content->grade = $grade;
  $content->subject = $subject;

  $query = DB::select()->from( 'categories' );
  $results = $query->execute()->as_array( 'id' );
  $content->categories = $results;

  //print_r( $results );
  //exit();

  $query = DB::select()->from( 'comments' )->where( 'hidden', '=', 0 )->order_by( 'rank', 'DESC' )->order_by( 'id', 'ASC' )->where( 'parent_id', 'IS', NULL );

  if ( $grade != '-' && $grade != 's' && $grade != 'National' )
    $query = $query->where( 'type', '=', $grade );
  if ( $subject != '-' && $grade != 's' )
    $query = $query->where( 'category_ids', 'LIKE', '%,' . $subject . ',%' );
    //$query = $query->where( 'subtype', '=', $subject );

  if ( $grade == 'National' )
    $query = $query->where( 'type', 'REGEXP', '^[[:upper:]]' )->where( 'type', '<>', 'general' );

  if ( $grade == 's' || $subject == 's' )
    $query = $query->where( 'special', '=', 1 );

 if ( $grade =='-' )   
   $query = $query->where( 'type', 'IN', array('1','2','3','4','5','6','7','8','general' ));

  $comments = $query->execute()->as_array();

  // collect all the ids I need to look for children of...
  $parent_ids = array();
  foreach( $comments as $comment ) {
    $parent_ids[] = $comment[ 'id' ];
  }

  if ( sizeof( $parent_ids) > 0 )
    $query = DB::select()->from( 'comments' )->where( 'hidden', '=', 0 )->where( 'parent_id', 'IN', $parent_ids );
  else
    $query = DB::select()->from( 'comments' )->where( 'hidden', '=', 0 );

  $responses = $query->execute()->as_array();

  //echo View::factory('profiler/stats');
  //exit();

  // collect responses by parent_id
  $responses_by_parent_id = array();
  foreach( $responses as $response ) {
    if ( ! array_key_exists( $response['parent_id'], $responses_by_parent_id ) )
      $responses_by_parent_id[ $response['parent_id'] ] = array();
    $responses_by_parent_id[ $response['parent_id'] ][] = $response;
  }

  // attach responses to the correct comments
  foreach( $comments as &$comment ) {
    if ( array_key_exists( $comment['id'], $responses_by_parent_id ) )
      $comment['responses'] = $responses_by_parent_id[ $comment['id'] ];
    else
      $comment['responses'] = array();
  }

  //print_r( $comments );
  //exit();

  $content->rows = $comments;

  $view->content = $content;
  $this->response->body( $view );
}


public function action_reviewasadmin() {

  $view = View::factory( 'template/default' );
  $view->title = "View Comments";

  $content = View::factory( 'comments/view' );

  $grade = $this->request->param( 'grade' );
  $subject = $this->request->param( 'subject' );

  $content->grade = $grade;
  $content->subject = $subject;

  $query = DB::select()->from( 'categories' );
  $results = $query->execute()->as_array( 'id' );
  $content->categories = $results;

  //print_r( $results );
  //exit();

  $query = DB::select()->from( 'comments' )->order_by( 'rank', 'DESC' )->order_by( 'id', 'ASC' );

  //if ( $grade != '-' )
    //$query = $query->where( 'type', '=', $grade );
  //if ( $subject != '-' )
    //$query = $query->where( 'category_ids', 'LIKE', '%,' . $subject . ',%' );
    //$query = $query->where( 'subtype', '=', $subject );


  if ( $grade != '-' && $grade != 's' && $grade != 'National' )
    $query = $query->where( 'type', '=', $grade );
  if ( $subject != '-' && $grade != 's' )
    $query = $query->where( 'category_ids', 'LIKE', '%,' . $subject . ',%' );
    //$query = $query->where( 'subtype', '=', $subject );

  if ( $grade == 'National' )
    $query = $query->where( 'type', 'REGEXP', '^[[:upper:]]' )->where( 'type', '<>', 'general' );


  if ( $grade == 's' || $subject == 's' )
    $query = $query->where( 'special', '=', 1 );

  $comments = $query->execute()->as_array();

  // collect all the ids I need to look for children of...
  $parent_ids = array();
  foreach( $comments as $comment ) {
    $parent_ids[] = $comment[ 'id' ];
  }

  if ( sizeof( $parent_ids) > 0 )
    $query = DB::select()->from( 'comments' )->where( 'hidden', '=', 0 )->where( 'parent_id', 'IN', $parent_ids );
  else
    $query = DB::select()->from( 'comments' )->where( 'hidden', '=', 0 );

  $responses = $query->execute()->as_array();

  // collect responses by parent_id
  $responses_by_parent_id = array();
  foreach( $responses as $response ) {
    if ( ! array_key_exists( $response['parent_id'], $responses_by_parent_id ) )
      $responses_by_parent_id[ $response['parent_id'] ] = array();
    $responses_by_parent_id[ $response['parent_id'] ][] = $response;
  }

  // attach responses to the correct comments
  foreach( $comments as &$comment ) {
    if ( array_key_exists( $comment['id'], $responses_by_parent_id ) )
      $comment['responses'] = $responses_by_parent_id[ $comment['id'] ];
    else
      $comment['responses'] = array();
  }

  //print_r( $comments );
  //exit();

  $content->rows = $comments;
  $content->admin = TRUE;

  $view->content = $content;
  $this->response->body( $view );
}

} // End Comments
