export function XML(){
	let http = new XMLHttpRequest();
	
	if (window.XMLHttpRequest){
		http=new XMLHttpRequest();
	}
	else{
		http=new ActiveXObject("Microsoft.XMLHTTP");
	}
	return http;
}

export async function php(params){
	let http = XML();
	let odp = {
		"error" : "Server not responde, try again"
	};
	
	http.onreadystatechange=function(){
        if (http.readyState==4 && http.status==200){
		odp = JSON.parse(this.responseText);
        }
	}
	
	name = './Backend/Server.php';

	var url = `${name}?${params}`;

	http.open('POST', url, true);
	http.send();

	let promise = new Promise((resolve, reject) => {
		setTimeout(() => resolve(odp), 1000)
	});

	let result = await promise;
	return result;
}
