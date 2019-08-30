
// editing salary higher than 1500 $ on fly
$("<span class='salary'>1500 $</span>").insertBefore($( ".salary" ).filter(function( index ) {
	// substracting " $" from a salary string and converting to integer
    return +$(this).text().substring(0, $(this).text().length-2) > 1500;
  }).addClass('too-high').attr("title","salary can't be higher than 1500"));




$("#name").on('click', sortByName.bind(null,0))
$('#department').on('click', sortByName.bind(null,1))
$('#amount').on('click', sortByName.bind(null,2))
$('.salary').each(function(index){ $(this).prop('value', $(this).text()) })
$('#salary').on('click', sortByName.bind(null,3))

// $("#salary").on('click', sortTable.bind(null,3))
// source w3schools.com/howto/tryit.asp?filename=tryhow_js_sort_table_desc
function sortByName(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("td")[n].firstElementChild;
      y = rows[i + 1].getElementsByTagName("td")[n].firstElementChild;
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.value.toLowerCase() > y.value.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.value.toLowerCase() < y.value.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}