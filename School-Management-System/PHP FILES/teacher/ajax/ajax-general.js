function search_class(){
	var class1 = document.getElementById("class1").value;
	alert(class1);
  	var req = new XMLHttpRequest();
	req.open("GET","requests/search-class.php?class=" + class1,true);
	req.send();
	req.onreadystatechange=function()
	{
	document.getElementById('block').innerHTML = req.responseText;
	}
}