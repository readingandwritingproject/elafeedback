<br />
<fieldset>
<form action="/comment/respond" method="POST"">
  <input type="hidden" name="parent_id" value="<?php print( $parent_id ); ?>" />
  Name: <input name="name" />
  Email: <input name="email" /> &nbsp;&nbsp;&nbsp;
  <input type="checkbox" name="role[]" value="Principal" /> Principal
  <input type="checkbox" name="role[]" value="Teacher"/> Teacher
  <input type="checkbox" name="role[]" value="Parent"/> Parent
  <input type="checkbox" name="role[]" value="Other"/> Other
  <br />
  <textarea name="comment" rows="5" cols="100"></textarea>
  <input type="submit" value="Submit response"/>
</form>
</fieldset>
