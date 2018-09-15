
<html>
<head>


</head>

<body>


<input type='text' id='dat'/>

</body>

<script>
var date = new Date();
var y = date.getFullYear();
var m = date.getMonth();
var d = date.getDay();
document.getElementById("dat").value = y + "-" + m + "-" +d;
</script>
		

</html>