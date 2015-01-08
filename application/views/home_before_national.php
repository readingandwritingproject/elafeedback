<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript">
//<!--
var categories = Array();
<?php foreach( $categories as $category ) { ?>
categories[<?php print $category['id']; ?>] = "<?php print $category['name']; ?>";
<?php } ?>

function topic_jump() {
  var topic = $('select#topics_jump option:selected').val();
  window.location = '/comments/view/-/' + topic;
}

$(document).ready( function() {
  $.each( categories, function( key, value ) {
    if ( key != '' ) {
      $( 'select#topics_jump' ).append( $('<option/>', { value: key, text: value } ) );
      //console.log( key + '=' + value );
    }
  } );
  $( 'select#topics_jump' ).append( $('<option/>', { value: '-', text: '- All -' } ) );
} );

//-->
</script>
<br>
<br>
<div style="background-color: lightyellow; border: 1px solid black; border-radius: 15px; margin: 0px 50px 0px 50px; padding: 10px">
<b>UPDATE: </b>Since the release of this site, distinct topics of contribution have emerged. Select from one of these below to view all related comments:<br />
<select id="topics_jump" onChange="topic_jump();"><option>- Choose a topic -</option></select>
</div>
<br />
Many of you have requested a site as a place to respond to the 2013 ELA test. The test that New York State students have just taken represents a whole new generation of high-stakes CCSS aligned test. These tests will affect curriculum, shape how reading and writing are taught, determine students' futures and their views of themselves, and will influence who is hired and fired.
<br /><br />
If we are to continually improve testing and teaching, learning from data in the fullest sense of the word, it is important that test makers and policy leaders hear from those who have observed the test in action. Although granted, it is not permissable to cite specific test items and passages, it is important that your observations, ideas, insights, lessons, and suggestions for future teaching and testing are heard. How can we do better at teaching and at testing another year?
<br /><br />
We invite you to share observations and ideas, and to respond to those that others make here on this site. Although the Teachers College Reading and Writing Project has launched ths site for you, the views expressed will not necessarily represent those of the faculty, trustees or administrators of Teachers College or of the team at the TCRWP.
<br /><br />
We reserve the right to edit or delete entries that quote a specific test item or passage in detail that is not permissible by NYS or contains offensive content. If you see that your entry had been deleted, a bit of it may have crossed the boundary of what is approved by the state.  Please check your entry, delete that bit, and then resubmit it.
<br />
<br />
<div class="text" style="color:#A84D2E;font-weight:bold;">
<a href="comment/submit?grade=general">Click Here to Submit Your Comment</a>

<!--Please select a test you wish to comment on:-->
<br />

<!--
<a href="comment/submit?grade=3"><img src="/static/images/Grade3.jpg" height="162" width="106" alt="grade3" /></a>
<a href="comment/submit?grade=4"><img src="/static/images/Grade4.jpg" height="162" width="106" alt="grade4" /></a>
<a href="comment/submit?grade=5"><img src="/static/images/Grade5.jpg" height="162" width="106" alt="grade5" /></a>
<a href="comment/submit?grade=6"><img src="/static/images/Grade6.jpg" height="162" width="106" alt="grade6" /></a>
<a href="comment/submit?grade=7"><img src="/static/images/Grade7.jpg" height="162" width="106" alt="grade7" /></a>
<a href="comment/submit?grade=8"><img src="/static/images/Grade8.jpg" height="162" width="106" alt="grade8" /></a>
<a href="comment/submit?grade=general"><img src="/static/images/comments.png" alt="general" /></a>
-->
<br />
<br />

</div>
