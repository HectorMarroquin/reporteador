function sortTable(n,type) {
	let table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
   
	table = document.getElementById("myTable");
	switching = true;
	dir = "asc";
  
	while (switching) {
	  switching = false;
	  rows = table.rows;
  
	  for (i = 1; i < (rows.length - 2); i++) {
  
		shouldSwitch = false;
  
		x = rows[i].getElementsByTagName("TD")[n];
		y = rows[i + 1].getElementsByTagName("TD")[n];
  
		if (dir == "asc") {
		  if ((type=="str" && x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) || (type=="int" && parseFloat(x.innerHTML) > parseFloat(y.innerHTML))) {
			shouldSwitch= true;
			break;
		  }
		} else if (dir == "desc") {
		  if ((type=="str" && x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) || (type=="int" && parseFloat(x.innerHTML) < parseFloat(y.innerHTML))) {
			shouldSwitch = true;
			break;
		  }
		}
	  }
	  if (shouldSwitch) {
		rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
		switching = true;
		switchcount ++;
	  } else {
		if (switchcount == 0 && dir == "asc") {
		  dir = "desc";
		  switching = true;
		}
	  }
	}
  }
  