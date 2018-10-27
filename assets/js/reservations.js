window.onload = function (){
	var dateFlag = document.getElementById("dateFlag");

	if(!dateFlag){
		setMinDate();
	}
}

function setMinDate(){
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth()+1; //January is 0!
	var yyyy = today.getFullYear();
	if(dd<10){
		dd='0'+dd
	} 
	if(mm<10){
		mm='0'+mm
	} 

	today = yyyy+'-'+mm+'-'+dd;
	document.getElementById("arrDate").setAttribute("min", today);
	document.getElementById("arrDate").value = today;
	document.getElementById("whenDate").setAttribute("min", today);
	document.getElementById("whenDate").value = today;
	var depDate = document.getElementById("depDate");

	if(depDate){
		depDate.setAttribute("min", today);
		depDate.value = today;
	}
}
