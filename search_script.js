function search() {
	  // Declare variables 
	  var input, filter, table, tr, td, i;
	  input = document.getElementById("myInput");
	  filter = input.value.toUpperCase();
	  table = document.getElementById("myTable");
	  tr = table.getElementsByTagName("tr");

	  // Loop through all table rows, and hide those who don't match the search query
	  for (i = 0; i < tr.length; i++) {
	    td = tr[i].getElementsByTagName("td")[1]; // 1 is the 2nd column (change it to change what column is searched)
	    if (td) {
	      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
	        tr[i].style.display = "";
	      } else {
	        tr[i].style.display = "none";
	      }
	    } 
	  }
	}
	function send() {
	    var queryString = ""; // string with information to be sent to the next page
	    var x = document.getElementById("frm1"); // x is the form
	    for (var i = 0; i < x.length; i++) {
	    	if (x.elements[i].type == "checkbox" && x.elements[i].checked)
	    		queryString += "?" + x.elements[i].value; // send name and value from form
	    }
	    console.log("queryString: " + queryString);
	    window.location.href = "search_response.html" + queryString;
		}
	function update() {
		var selected = "Selected: ";
		var x = document.getElementById("frm1"); // x is the form
	    for (var i = 0; i < x.length; i++) {
	    	if (x.elements[i].type == "checkbox" && x.elements[i].checked)
	    		selected += x.elements[i].value + " "; // send name and value from form
	    }
	    document.getElementById("selected").innerHTML = selected;
	}