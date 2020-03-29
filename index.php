<?php
//category_id,category_name,description,id,name,price
?>
<head>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script
			  src="https://code.jquery.com/jquery-3.4.1.min.js"
			  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			  crossorigin="anonymous"></script>
<script type="text/javascript">
const url = "http://nishasite.com/api/product/read.php";
const options = {
method:'GET',
headers:{
'Content-Type':'application/json'
}
};
var response = [];
window.addEventListener("load",function(e){
//console.log("I got the event");
fetch(url,options).then(json=>json.json()).then(res=>{
	response =  res.records;
	let html = "<table class='table table-hover'><thead><tr><th>category_id</th><th>category_name</th><th>id</th><th>description</th><th>name</th><th>price</th></tr></thead><tbody>";
for(let i=0;i<response.length;i++)
{
	html += "<tr><td>"+response[i].category_id+"</td><td>"+response[i].category_name+"</td><td>"+response[i].id+"</td><td>"+response[i].description+"</td><td>"+response[i].name+"</td><td>"+response[i].price+"</td></tr>";
}

html += "</tbody></table>";
document.getElementById("data1").innerHTML = html;
}).catch(err=>console.log(err.message))
});
</script>
</head>

<div class="jumbotron" id="data1">
</div>
