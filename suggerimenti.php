  <script>
<?php
include("credenziali.php");
echo "$( function() {
			var availableTags = [";
$conn2 = new mysqli($servername, $username, $password, $dbname);
$sql1 = "SHOW TABLES";
$table = $conn2->query($sql1);
if ($table->num_rows > 0) {
	while($row = $table->fetch_assoc()) {
		$tablename=$row['Tables_in_'.$dbname];
		$richiedistruttura="SHOW COLUMNS FROM $tablename";
		$struttura = $conn2->query($richiedistruttura);
		echo "\"$tablename\",\n";
		if ($struttura->num_rows > 0) {

			

			while($row = $struttura->fetch_assoc()) {

				foreach ($row as $value) {
					echo "\"$tablename.$value\",\n";
					echo "\"$value\",\n";
					break;

				}

			}

			

		} else {

			echo "errore richiesta colonne tabelle";

		}
	}
} else {

    echo "errore richiesta tabelle";

}

echo "\"SELECT\",
			  \"WHERE\",
			  \"GROUP BY\",
			  \"CREATE TABLE\",
			  \"INNER JOIN\",
			  \"ON\",
			  \"VARCHAR(n)\"
			];";

$conn2->close();
?>

    function split( val ) {
      return val.split( /\s/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
 
    $( "#tags" )
      // don't navigate away from the field on tab when selecting an item
      .on( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).autocomplete( "instance" ).menu.active ) {
          event.preventDefault();
        }
      })
      .autocomplete({
        minLength: 1,
	autoFocus: true,
        source: function( request, response ) {
          // delegate back to autocomplete, but extract the last term
          response( $.ui.autocomplete.filter(
            availableTags, extractLast( request.term ) ) );
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
          this.value = terms.join( " " );
          return false;
        }
      });
  } );
  </script>
  <!--//autoresize-->
  <script src="./lib/jquery.autosize.js"></script>
  <script>
 $(function(){
	 $('textarea').autosize();
 });
  </script>
