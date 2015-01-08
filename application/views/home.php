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


<div style="width:825px;height:250px;text-align:center;margin-right: auto;margin-left: auto;">
<div style="width:370px;float:left;border-right: 1px solid #EEE2A8;padding-right:27px">
   <div style="font-size:16pt;font-weight:bold;padding-left:12px;">For New York State educators and parents who lived through 2013 testing:</div>
   <br>
  <div style="background-color: #EEE2A8; border: 1px solid black; border-radius: 15px; margin: 0px 10px 0px 10px; padding: 10px; ">
       <center><b><a href="/comment/submit">Submit a Comment</a></b></center><br>Since the release of this site, distinct topics of contribution have emerged. Select from one of these below to view all related comments:
       <select id="topics_jump" onChange="topic_jump();"><option>- Choose a topic -</option></select><br/>
    </div>
 </div>

<div style="width:400px;float:right;border-left;">
     <div style="font-size:16pt;font-weight:bold;padding-left:12px;">For others who want to join in the conversation about this site and its implications:</div>
     <br>
     <div style="background-color: #EEE2A8; border: 1px solid black; border-radius: 15px; margin: 0px 10px 0px 10px; padding: 10px;">
       <center><b><a href="/comment/submit?location">Submit a Comment</a></b><br />
       <br />
       <a href="/comments/view/National/-">View comments</a>
       </center>

     </div>
</div>

</div>
<br />
Since New York State's high stakes test (a Pearson test)  was given, this site has served as a place for teachers and principals to respond to that test. As of May 2, we have created a page for others to react to the postings made by teachers and principals who observed the test in action. 
<br><br>
The entire site was developed in recognition that New York State students have just taken a test that represents a whole new generation of high-stakes CCSS aligned test. These tests will affect curriculum, shape how reading and writing are taught, determine students' futures and their views of themselves, and will influence who is hired and fired. If we are to continually improve testing and teaching, learning from data in the fullest sense of the word, it is important that people who care about education hear from those who have observed the test in action. Although granted, it is not permissable to cite specific test items and passages, it is important that observations, ideas, insights, lessons, and suggestions for future teaching and testing are heard. How can we do better at teaching and at testing another year? 
<br><br>
We invite you to share observations and ideas, and to respond to those that others make here on this site. Although the Teachers College Reading and Writing Project has launched ths site for you, the views expressed will not necessarily represent those of the faculty, trustees or administrators of Teachers College, nor of the team at the TCRWP. 
<br><br>
We reserve the right to edit or delete entries that quote a specific test item or passage in detail that is not permissible by NYS or that contains offensive content. If you see that your entry had been deleted, a bit of it may have crossed the boundary of what is approved by the state. Please check your entry, delete that bit, and then resubmit it. 
<br><br>
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
