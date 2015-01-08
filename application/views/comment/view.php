<script type="text/javascript">
//<!--

function respond( id ) {
  $( '#respond_' + id ).after().load( '/comment/respond/' + id );
}

//-->
</script>

<br /><br />
<div style="margin:10px 5px 5px 10px">
<div class="comments">
  <div class="comment" id="<?php print( $row['id'] ); ?>" style="<?php if ( $row['hidden'] == 1 ) print( 'color: lightgray' ); ?>">
    <table width="100%"><tr><td>
    <b>Subject:</b>  <?php print($row['subtype']); ?>
	<br />
	<b><?php if ( isset( $row['type'] ) && strlen( $row['type'] ) > 0 && ctype_upper( trim( $row['type'][0] ) ) ) { print( 'Location: ' ); }else{ print( 'Grade: ' ); } ?></b>    <?php print($row['type']); ?>
	</td><td>
    <b>Responses: </b><?php print($row['visible_children']); ?>
    <br />
    <a href="#" onclick="respond( '<?php print($row['id'] ); ?>' );">Respond</a>
    <!-- <a >Respond to this comment</a>-->
    </td></tr></table>
    <br />
	<br />
	<?php print( nl2br( $row['content'], TRUE ) ); ?>
	<br />
	<span style="font-style:italic;font-size:.85em;font-weight:bold;"><?php print($row['name']); if ( $row['role'] != '' ) print ' - ' . $row['role'];  ?></span>
    <div id="respond_<?php print( $row['id'] ); ?>"></div>
    <br />
    <div class="responses" style="margin-left: 100px; font-size: 14px">
      <?php foreach ( $responses as $response ) { ?>
        <div class="response" style="<?php if ( $response['hidden'] == 1 ) print( 'color: gray' ); ?>">
        <?php print( nl2br( $response['content'], TRUE ) ); ?>
        <br />
        <span style="font-style:italic;font-size:.85em;font-weight:bold;"><?php print($response['name']); if ( $response['role'] != '' ) print ' - ' . $response['role']; ?></span>
        <?php if ( isset( $admin ) ) { ?>
          <?php if ( $response['hidden'] == 0 ) { ?>
            <a href="/comment/hide/<?php print( $response['id'] ); ?>" style="background-color: lightpink; padding: 5px">HIDE</a>
          <?php } else { ?>
            <a href="/comment/show/<?php print( $response['id'] ); ?>" style="background-color: lightgreen; padding: 5px">SHOW</a>
          <?php } ?>
        <?php } ?>
        <hr />
        </div>
      <?php } ?>

  </div>
</div>
</div>
