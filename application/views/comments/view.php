<style type="text/css">
.comments{
	padding-right: 5px;
	visibility: visible;
	border: thin solid white;
}

.comment {
    border-top: 1px solid #E2E2E2;
    font-size: 1em;
    list-style-type: none;
    margin-bottom: 10px;
    padding-bottom: 0;
    padding-top: 10px;
    padding-left:5px;
    padding-right:5px;
    position: relative;
}

.comment:hover {
    background-color:#B5D2F4;
    color:#000000;
    //text-decoration:underline;
}

.label {
	font-weight:bold;
	font-size:9.5pt;
}

.light {
  color: lightgray;
}

.admin_button {
  padding: 5px;
  color: blue;
  cursor:pointer;
  cursor:hand;
  text-decoration: underline;
}

.admin_show {
  background-color: lightgreen;
}
.admin_hide {
  background-color: lightpink;
}

</style>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript">

var categories = Array();
<?php foreach( $categories as $category ) { ?>
categories[<?php print $category['id']; ?>] = "<?php print $category['name']; ?>";
<?php } ?>

var states = [
['AL','Alabama'],
['AK','Alaska'],
['AZ','Arizona'],
['AR','Arkansas'],
['CA','California'],
['CO','Colorado'],
['CT','Connecticut'],
['DE','Delaware'],
['FL','Florida'],
['GA','Georgia'],
['HI','Hawaii'],
['ID','Idaho'],
['IL','Illinois'],
['IN','Indiana'],
['IA','Iowa'],
['KS','Kansas'],
['KY','Kentucky'],
['LA','Louisiana'],
['ME','Maine'],
['MD','Maryland'],
['MA','Massachusetts'],
['MI','Michigan'],
['MN','Minnesota'],
['MS','Mississippi'],
['MO','Missouri'],
['MT','Montana'],
['NE','Nebraska'],
['NV','Nevada'],
['NH','New Hampshire'],
['NJ','New Jersey'],
['NM','New Mexico'],
//['NY','New York'],
['NC','North Carolina'],
['ND','North Dakota'],
['OH','Ohio'],
['OK','Oklahoma'],
['OR','Oregon'],
['PA','Pennsylvania'],
['RI','Rhode Island'],
['SC','South Carolina'],
['SD','South Dakota'],
['TN','Tennessee'],
['TX','Texas'],
['UT','Utah'],
['VT','Vermont'],
['VA','Virginia'],
['WA','Washington'],
['WV','West Virginia'],
['WI','Wisconsin'],
['WY','Wyoming']
];

//console.log( categories );
// add the subject options

//for ( var key in categories ) {
//  $( "select#subject" ).append( $('<option/>'), { value: key, text: categories[key] } );
//}

// set selected in options
$(document).ready( function() {
  $.each( categories, function( key, value ) {
    if ( key != '' ) {
      $( 'select#subject' ).append( $('<option/>', { value: key, text: value } ) );
      //console.log( key + '=' + value );
    }
  } );

  $("select#grade option")
   .each(function() { this.selected = (this.value == '<?php print $grade ?>' ); });

  $("select#subject option")
   .each(function() { this.selected = (this.value == '<?php print $subject ?>' ); });

  // hide grades
  if ( location.href.indexOf( 'National' ) != -1 ) {
    $('#filter').hide();
    $('#submit_comment_link').attr( 'href', '/comment/submit?location' );
    /*
    $("label[for='grade']").hide();
    $('select#grade').hide();
    $('#sep').hide(); */
  }

  // add the states
  /*
  for( var i = 0; i < states.length; ++i ) {
    $( 'select#state' ).append( $('<option/>', { value: states[i][0], text: states[i][1] } ) );
    //console.log( states[i][0] + ' = ' + states[i][1] )
  }
  */

} );

</script>
<script type="text/javascript">
//<!--
function refresh() {
  var grade = $('select#grade option:selected').val();
  var subject = $('select#subject option:selected').val();
  window.location = '/comments/view/' + grade + '/' + subject;
}

function respond( id ) {
  $( '#respond_' + id ).after().load( '/comment/respond/' + id );
}

//-->
</script>



<br /><br />
<div style="margin:10px 5px 5px 10px">

<div style="height:75px;width:990px;">
   <div id="filter" style="width:500px;float:left;background-color: #EEE2A8; border: 1px solid black; border-radius: 15px; margin: 0px 50px 0px 10px; padding: 10px">
Since release of this site, distinct topics of contribution have emerged. Select from one of these below to view all related comments:<br />
<!-- <select id="topics_jump" onChange="topic_jump();"></select>-->
<label for="subject">Topic:</label>
<select id="subject" name="subject" size="1" onchange="refresh();">
  <option value="-"> - All - </option>
</select>
<span id="sep">|</span>
<label for="grade" >Grade:</label>
<select id="grade" name="grade" size="1" onchange="refresh();">
  <option value="-"> - All - </option>
  <option value="3">3rd</option>
  <option value="4">4th</option>
  <option value="5">5th</option>
  <option value="6">6th</option>
  <option value="7">7th</option>
  <option value="8">8th</option>
  <option value="general">General</option>
</select>
<!--
<label style="display: none" for="state" class="label">State:</label>
<select style="display: none" name="state" id="state">
  <option value="National">-</option>
</select>
-->
</div>
   <div style="width:175px;float:right;background-color: #EEE2A8; border: 1px solid black; border-radius: 15px; margin: 0px 50px 0px 10px; padding: 10px">
       <center><a id="submit_comment_link" href="/comment/submit"><b>Submit Comment</b></a></center>
   </div>
</div>

<!--
<div class="label">
<label for="grade">Grade:</label>
<select id="grade" name="grade" size="1" onchange="refresh();">
  <option value="-"> - All - </option>
  <option value="3">3rd</option>
  <option value="4">4th</option>
  <option value="5">5th</option>
  <option value="6">6th</option>
  <option value="7">7th</option>
  <option value="8">8th</option>
  <option value="general">General</option>
</select> |
<label for="subject" >Topic:</label>
<select id="subject" name="subject" size="1" onchange="refresh();">
  <option value="-"> - All - </option>
</select>
</div>
-->

<br />
<br />
<div class="comments">
  <?php foreach ( $rows as $row ) { ?>
  <div class="comment<?php if ( $row['hidden'] == 1 ) print( ' light' ); ?>" id="<?php print( $row['id'] ); ?>" style="<?php if ( $row['special'] ) print( 'background-color: #CDB1DE;' )?>">
    <table width="100%"><tr><td width="50%">
    <span style="font-size:.50em"><?php print($row['id']); ?></span><br />
    <b><?php if ( isset( $row['type'] ) && strlen( $row['type'] ) > 0 && ctype_upper( trim( $row['type'][0] ) ) ) { print( 'Location: ' ); }else{ print( 'Grade: ' ); } ?></b>    <?php print($row['type']); ?>&nbsp;&nbsp;&nbsp;<b>Subject:</b>  <?php print($row['subtype']); ?><br />

    <!-- <b>Topics:</b><br />-->

	</td><td valign="top">
    <b><a href="/comment/view/<?php print( $row['id'] ); ?>">Respond to this comment</a> <!-- <?php if ( $row['visible_children'] > 0 ) { ?> and view the <?php print($row['visible_children']); ?> response<?php if ( $row['visible_children'] > 1 ) {?>s<?php } ?></a></b><br /><?php } ?> -->
    <!--<a href="#" onclick="respond( '<?php print($row['id'] ); ?>' );">Post a response to this comment</a>-->
    <br />
    <a href=""></a>
    <!-- <a >Respond to this comment</a>-->

    </td></tr></table>
    <br />
	<span style="font-size: 14px"><?php print( nl2br( $row['content'], TRUE ) ); ?></span>
	<br />
	<span style="font-style:italic;font-size:.85em;font-weight:bold;"><?php print($row['name']); if ( $row['role'] != '' ) print ' - ' . $row['role'];  ?></span>

  <div style="margin-left: 200px; background-color: #BFDBC0; padding: 5px; font-size: 13px">
    <!-- Here -->
    <?php foreach( $row['responses'] as $response ) { ?>
      <span style="font-size:.50em"><?php print( $response['id'] ); ?></span><br />
      <?php print( nl2br( $response['content'], TRUE ) ); ?><br />
      <span style="font-style:italic;font-size:.75em;font-weight:bold;"><?php print($response['name']); if ( $response['role'] != '' ) print ' - ' . $response['role'];  ?></span>
      <br />
      <hr />
    <?php } ?>
  </div>

    <div id="respond_<?php print( $row['id'] ); ?>"></div>
        <?php if ( isset( $admin ) ) { ?>
          <?php if ( $row['hidden'] == 0 ) { ?>

<script type="text/javascript">
function toggle( id ) {
  // is currently visible
  if ( $( '#action_' + id ).hasClass( 'admin_hide' ) ) {
    $.ajax( { url: '/comment/hide/' + id } )
     .done( function() {
      $( '#' + id ).addClass( 'light' );
      $( '#action_' + id ).removeClass( 'admin_hide' );
      $( '#action_' + id ).addClass( 'admin_show' );
      $( '#action_' + id ).html( 'SHOW' );
      } );
  }
  else {
    $.ajax( { url: '/comment/show/' + id } )
     .done( function() {
      $( '#' + id ).removeClass( 'light' );
      $( '#action_' + id ).removeClass( 'admin_show' );
      $( '#action_' + id ).addClass( 'admin_hide' );
      $( '#action_' + id ).html( 'HIDE' );
      } );
  }
}
</script>
          <!-- <a href="/comment/hide/<?php print( $row['id'] ); ?>" style="background-color: lightpink; padding: 5px">HIDE</a> -->
          <span id="action_<?php print( $row['id'] ); ?>" onclick="toggle( '<?php print( $row['id'] ); ?>' );" class="admin_button admin_hide">HIDE</span>
          <?php } else { ?>
          <!-- <a href="/comment/show/<?php print( $row['id'] ); ?>" style="background-color: lightgreen; padding: 5px">SHOW</a> -->
          <span id="action_<?php print( $row['id'] ); ?>" onclick="toggle( '<?php print( $row['id'] ); ?>' );" class="admin_button admin_show">SHOW</span>
          <?php } ?>
        <?php } ?>
  </div>

<?php } ?>
</div>
