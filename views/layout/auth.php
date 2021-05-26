<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}
.row {
  display: -webkit-flex;
  display: flex;
  margin-top: 40px;
  margin-left: 120px;
  margin-right: 120px;
  background-color: white;
}
.column.left {
   -webkit-flex: 1;
   -ms-flex: 1;
   flex: 1;
}
.column.right {
  -webkit-flex: 2;
  -ms-flex: 2;
  flex: 2;
}
.image{
  /* opacity: 0; */
	/* position: absolute; */
    /* margin-top: 15px; */
	/* right: 10%; */
	/* top: 50%; */
	/* transform: translateY(-50%); */
	animation: fadeIn 1s linear forwards;
	/* animation-delay: 1s; */
	z-index: 100;
}
/* .out-wrapper{
  margin: 0;
  background-color: gray;
} */
@keyframes fadeIn
{
	0%
	{
		opacity: 0;
	}
	100%
	{
		opacity: 1;
	}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>

{{content}}
</body>
</html>