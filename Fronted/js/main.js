import { XML, php } from './Modules/Ajax.js'

window.countries = async function countries(){
	let params = 'function=countries';

	let countries = await php(params);

	let list = document.getElementById("countries");

	if(!countries.error){
		countries.forEach(el => {
			let select = document.createElement("option");
			select.text = el.name;
			select.value = el.alpha2Code;
			list.add(select);
		});
	}
	else{
		document.getElementById("gender").innerText = countries.error;;
	}

}

window.go = async function go(){
	let name = document.getElementById("name");
	let countries = document.getElementById("countries");

	let temp = name.value.substring(1).toLowerCase();
	temp = name.value.substring(0,1).toUpperCase() + temp;

    let params = 'function=gender&name=' + name.value + "&country=" + countries.value;

	let gender = await php(params);

	document.getElementById("gender").innerText = gender.gender == "undefined" || gender.gender ==  null ? "Gender is undefined for " + temp + " in " + countries.options[countries.selectedIndex].text : temp + " is " + gender.probability + " " + gender.gender +  " in " + countries.options[countries.selectedIndex].text;
	name.value = "";
}
