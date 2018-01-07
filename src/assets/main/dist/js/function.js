
function is_array(mixed_var) {	// Finds whether a variable is an array
	//
	// +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
	// +   improved by: Legaev Andrey
	// +   bugfixed by: Cord
	
	return (mixed_var instanceof Array);
}

function empty(mixed_var) {	// Determine whether a variable is empty
	//
	// +   original by: Philippe Baumann
	
	return (typeof mixed_var === 'undefined' || mixed_var === "" || mixed_var === 0 || mixed_var === "0" || mixed_var === null || mixed_var === false || (is_array(mixed_var) && mixed_var.length === 0));
}
