//JavaScript, use pictures as buttons, sends and receives values to/from the Rpi
//These are all the buttons
var button_0 = document.getElementById("button_0");


//this function sends and receives the pin's status
function change_pin (pin, status) {
	//this is the http request
	var request = new XMLHttpRequest();
	request.open( "GET" , "gpio.php?pin=" + pin + "&status=" + status );
	request.send(null);
	//receiving information
	request.onreadystatechange = function () {
		if (request.readyState == 4 && request.status == 200) {
			return (parseInt(request.responseText));
		}
	//test if fail
		else if (request.readyState == 4 && request.status == 500) {
			alert ("server error");
			return ("fail");
		}
	//else 
		else { return ("fail"); }
	}
}

//these are all the button's events, it just calls the change_pin function and updates the page in function of the return of it.
button_0.addEventListener("click", function () { 
	//if red
	if ( button_0.alt === "off" ) {
		//use the function
		var new_status = change_pin ( 0, 0);
		if (new_status !== "fail") { 
			button_0.alt = "on"
			button_0.src = "data/img/green/green_0.jpg"; 
			return 0;
			}
		}
	//if green
	if ( button_0.alt === "on" ) {
		//use the function
		var new_status = change_pin ( 0, 1);
		if (new_status !== "fail") { 
			button_0.alt = "off"
			button_0.src = "data/img/red/red_0.jpg"; 
			return 0;
			}
		}
} );
	
