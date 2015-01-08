<style type="text/css">
.label {
        width:75px;
        font-weight:bold;
        font-size:10pt;
        display:inline-block;
        vertical-align:top;
}
.subheader{
        font-weight:bold;
        font-size:16pt;
        width:auto;
        text-align:center;
}

.main{
        width: 900px;
        margin-left: auto;
        margin-right: auto;
}

.form_left_box{
    float: left;
    padding: 5px;
    width: 450px;
    border-right: 1px solid gray;
}

.form_right_box{
    float: right;
    padding: 5px;
    width: 400px;
    font-size:.85em;
    /*border: 1px solid gray;*/
}

.form_footer{
    clear:both;
    padding: 5px;
    width: 890px;
}

.text {
	text-align:center;
	width:auto;
	font-size:20px;
	font-weight:bold;
}

</style>

<script type="text/javascript">
//<!--

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

var categories = Array();
<?php foreach( $categories as $category ) { ?>
categories[<?php print $category['id']; ?>] = "<?php print $category['name']; ?>";
<?php } ?>

// set selected in options
$(document).ready( function() {
  $.each( categories, function( key, value ) {
    if ( key != '' ) {
	$( '#subject_goes_here' ).after( '<input type="checkbox" name="category_ids" value="' + key + '" />' + value + '<br/>' );
	//console.log( key + '=' + value );
    }
  } );

  for( var i = 0; i < states.length; ++i ) {
    $( 'select#state' ).append( $('<option/>', { value: states[i][0], text: states[i][1] } ) );
    //console.log( states[i][0] + ' = ' + states[i][1] )
  }

  if ( location.search.indexOf( 'location' ) != -1 ) {
    $( "label[for='state']" ).show();
    $( 'select#state' ).show();
    $( "label[for='grade']" ).hide();
    $( 'select#grade' ).hide();
    $( '#really' ).hide();
    $( "input[name='location']").val( 'Other' );
    //console.log( location.search );

    // add other roles
    var other_roles = [ 'Researcher', 'Policy maker', 'Administrator', 'Test maker' ];
    for ( var i = 0; i < other_roles.length; ++i ) {
      //console.log( other_roles[i] );
      $( "#more_roles" ).after( '<input type="checkbox" name="role[]" name="role[]" value="' + other_roles[i] + '"/>' + other_roles[i] );
    }
  }

} );

/*
function location_change() {
  var selected = $( 'select#location' ).val();
  if ( selected == 'New York State' ) {
    $( "label[for='state']" ).hide();
    $( 'select#state' ).hide();
    $( "label[for='grade']" ).show();
    $( 'select#grade' ).show();
    $( '#really' ).show();
  }
  else {
    $( "label[for='state']" ).show();
    $( 'select#state' ).show();
    $( "label[for='grade']" ).hide();
    $( 'select#grade' ).hide();
    $( '#really' ).hide();
  }
  //console.log( $( 'select#location' ).val() );
}
*/
  /*
var qs = getQueryStrings();
var myParam = qs["grade"];

function getQueryStrings() {
  var assoc  = {};
  var decode = function (s) { return decodeURIComponent(s.replace(/\+/g, " ")); };
  var queryString = location.search.substring(1);
  var keyValues = queryString.split('&');

  for(var i in keyValues) {
    var key = keyValues[i].split('=');
    if (key.length > 1) {
      assoc[decode(key[0])] = decode(key[1]);
    }
  }
  return assoc;
}
*/
//-->
</script>

<br>
<br>
<div class="subheader">Submit Your Comment:</div>
<br />
<div class="main">
<form action="/comment/submit" method="post" >

<?php if ( isset( $special ) ) print( '<input type="hidden" name="special" value="TRUE" />' ) ?>

<div class="form_right_box">
<input type="hidden" name="gradeX" id="gradeX" />
<!-- We categorized your comments on the ELA and found that they address these subtopics.  Please when you add a new comment, do so under one of these subtopics.<br/> -->
<label for="subject" class="label" style="width:250px;">Subject* <!-- (select all that apply):</label><br /> --></label><br /><br />
<input type="hidden" id="subject_goes_here_" />
<input type="radio" name="subject" checked="true" value="Observations"/>Observations<br />
<input type="radio" name="subject" value="Implications for Instruction"/>Implications for Instruction<br />
<input type="radio" name="subject" value="Ideas for Constructive Action"/>Ideas for Constructive Action<br />
<br />

<input type="hidden" name="location" value="" />
<!--
<label for="location" class="label">Location:</label><br />
<select name="location" id="location" onChange="location_change();"><option value="New York State">New York State</option><option value="Other">Other</option></select>
<br />
<br />
-->


<label for="grade" class="label" style="width:250px;">Grade:</label><br id="really" />
<!-- <input type="hidden" name="grade" /> -->
<select name="grade" id="grade">
  <option value="general">General</option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option>
  <option value="7">7</option>
  <option value="8">8</option>
</select>

<label style="display: none" for="state" class="label">State:</label><br />
<select style="display: none" name="state" id="state">
  <option value="National">-</option>
</select>

</div>


<div class="form_left_box">
<label for="role" class="label" style="width:250px;">Role (select all that apply):</label><br />
<input type="checkbox" name="role[]" value="Principal" /> Principal
<input type="checkbox" name="role[]" value="Teacher"/> Teacher
<input type="checkbox" name="role[]" value="Parent"/> Parent
<input type="checkbox" name="role[]" value="Other"/> Other<br />
<span id="more_roles"></span>
<br />
<br />
<label for="comment" class="label">Comment*:</label><br><textarea name="comment" cols="50" rows="8"></textarea>
<br />* marks required fields
<br />
<br />
<label for="name" class="label">Name:</label> <input name="name" type="text" /><br />
<label for="email" class="label">Email:</label> <input name="email" type="text" />
</div>


<div  class='form_footer'>
Submissions can be made anonymously and it is understood that some of you
work in contexts where you may feel that is necessary.  On the other hand,
this site will be much more influential if people are willing to stand
behind their comments. Email addresses will not be displayed or shared.
<br />
<br />
<input disabled="true" name="btnSubmit" type="submit" value="Submit Comment temporarily disabled"/>
</div>
</form>
</div>

<!--
<script type="text/javascript">
  document.getElementById('grade').value = qs['grade'];
  var anchor = document.getElementById('view_comments_link');
  anchor.setAttribute( 'href', '/comments/view/' + qs['grade'] + '/-' );
</script>
-->
