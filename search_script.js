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
    window.location.href = "NegativeTraitsSelection.html" + queryString;
	}
function includes(array,trait) {
	for (var i=0; i<array.length; i++) {
		if (array[i] == trait)
			return true;
	}
	return false;
}
function selectInitialTraits() { // For NegativeTraitsSelection.html
	var queryString = "";
	var x = document.getElementById("frm1"); // x is the form
	var selectedTraits = []; // included traits (so as to not include a trait more than once)
	for (var i = 0; i < x.length; i++) {
		if (x.elements[i].type == "checkbox" && x.elements[i].checked && !includes(selectedTraits,x.elements[i].name)) {
			queryString += "?" + x.elements[i].name;
			selectedTraits.push(x.elements[i].name);
		}
	}
	window.location.href = "preference_selection.html" + queryString;
}
function selectAdditionalTraits() { // For MostImportantTraitsSelection.html
	var queryString = decodeURIComponent(window.location.search);
	var selectedTraits = queryString.split("?");
	var x = document.getElementById("frm1"); // x is the form
	for (var i=0; i<x.length; i++) {
		if (x.elements[i].type == "checkbox" && x.elements[i].checked && !includes(selectedTraits,x.elements[i].name)) {
			queryString += "?" + x.elements[i].name;
			selectedTraits.push(x.elements[i].name);
		}
	}
	window.location.href = "preference_selection.html" + queryString;
}
function displaySelectedBreeds() { // For NegativeTraitsSelection.html
	var breedPhotos = new Map();
	breedPhotos.set("Beagle","http://www.dogbreedchart.com/img/beagle.jpg");
	breedPhotos.set("Chihuahua","http://www.dogbreedchart.com/img/chihuahua.jpg");
	breedPhotos.set("Golden Retriever","http://www.dogbreedchart.com/img/golden-retriever.jpg");
	breedPhotos.set("Pug","http://www.dogbreedchart.com/img/pug.jpg");

	var queryString = decodeURIComponent(window.location.search);
	var queries = queryString.split("?");
	var breedTraits = "";
	for (var i=1; i<queries.length; i++) {
		breedTraits += (
			"<u><em><strong><font size=\"20\">" + queries[i] + "</font></strong></em></u>   <br>" +
			"<img src=" + breedPhotos.get(queries[i]) + " height=112 >" +
        "<p1>" + 
            "<ul>" +
                "<li>Barking level: 5  <input type=\"checkbox\" name=\"barking\" > </li>" +
                "<li>Activity level: 5  <input type=\"checkbox\" name=\"energy\" > </li>" +
                "<li>Intelligence: 5  <input type=\"checkbox\" name=\"intelligence\");\"> </li>" +
                "<li>Shedding: 5  <input type=\"checkbox\" name=\"shedding\"> </li>" +
                "<li>Good with kids: 3  <input type=\"checkbox\" name=\"kids\" > </li>" +
                "<li>Cuddliness: 3  <input type=\"checkbox\" name=\"cuddle\" > </li>" +
                "<li>Temperament: 4  <input type=\"checkbox\" name=\"temperament\"> </li>" +
                "<li>Time commitment: 4  <input type=\"checkbox\" name=\"time\" > </li>" +
                "<li>Easy to train: 5  <input type=\"checkbox\" name=\"training\"> </li>" +
                "<li>Size: 3  <input type=\"checkbox\" name=\"size\" > </li>" +
                "<li>Health: 4  <input type=\"checkbox\" name=\"health\"> </li>" +                  
            "</ul>" +
        "</p1>"
        );
        document.getElementById("info").innerHTML = breedTraits;
	}
}
function update() { // Updates the search on breed_search.html
	var selected = "Selected: ";
	var x = document.getElementById("frm1"); // x is the form
    for (var i = 0; i < x.length; i++) {
    	if (x.elements[i].type == "checkbox" && x.elements[i].checked)
    		selected += x.elements[i].value + " "; // send name and value from form
    }
    document.getElementById("selected").innerHTML = selected;
}
function displayQuestionnaire() { // Filters html on preference_selection.html
	var queryString = decodeURIComponent(window.location.search);
	var queries = queryString.split("?");

	// Declare variables 
	var form, sp, inp, i, j;
	form = document.getElementById("frm1");
	sp = form.getElementsByTagName("span");

	// Loop through all questions, and hide those who don't match the question type
	for (i = 0; i < sp.length; i++) {
	    inp = sp[i].getElementsByTagName("input")[0];
    	var included = false;
    	for (j=0; j<queries.length && !included; j++) // Loop through every question category
    		if (inp.name == queries[j]) {
		        sp[i].style.display = "";
		        included = true;
		    }
    	if (!included)
    		sp[i].style.display = "none";
	  }
}
