<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

<script>
$(document).ready( function() {
  //$( '#grade option[value=<?php print $grade ?>]' ).attr( 'selected', 'selected' );
  //$( '#subject option' ).val( '<?php print $subject ?>' ).attr( 'selected', 'selected' );

  $("select#grade option")
   .each(function() { this.selected = (this.value == '<?php print $grade ?>' ); });


  $("select#subject option")
   .each(function() { this.selected = (this.text == '<?php print $subject ?>' ); });

} );

//var grade = '<?php print $grade ?>';
//var subject = '<?php print $subject ?>';

</script>

<style>
.comments{
	//width:550px;
	//overflow-y: scroll;
	//overflow-x: hidden;
	padding-right: 5px;
	visibility: visible;
	//border: thin solid black;	
	border: thin solid white;
	//background-color: #336699;
	//scrollbar-face-color: #336699; scrollbar-3dlight-color: #336699; scrollbar-base-color: #336699;
	//scrollbar-track-color: #336699; scrollbar-darkshadow-color: #000; scrollbar-arrow-color: #000;
	//scrollbar-shadow-color: #fff; scrollbar-highlight-color: #fff;		
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

</style>

<script>
//<!--
function refresh() {
  var grade = $('select#grade option:selected').val();
  var subject = $('select#subject option:selected').val();
  window.location = '/comments/view/' + grade + '/' + subject;
  //alert( 'grade:' + grade + ', subject:' + subject );
}
//-->
</script>

<p>
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
<label for="subject" >Subject:</label>
<select id="subject" name="subject" size="1" onchange="refresh();">
  <option value="-"> - All - </option>
  <option value="Observations">Observations</option>
  <option value="Implications for Instruction">Implications for Instruction</option>
  <option value="Ideas for Constructive Action">Ideas for Constructive Action</option>
</select>
<a href="/" style="font-size: 16px; background-color: lightblue; padding: 5px;">S U B M I T &nbsp;&nbsp; A &nbsp;&nbsp; C O M M E N T</a>
</div>
<p>
<p>
<div class="comments">  

 <h3>Comments are temporarily unavailable</h3>

</div>











