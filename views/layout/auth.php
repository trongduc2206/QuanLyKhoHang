<?php
// var_dump(Application::$app->user);
?>

<!DOCTYPE html>
<html>
<head>
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial;
  /* padding: 10px; */
  background: #f1f1f1;
  margin: 0;
}

/* Header/Blog Title */
.header {
  padding: 30px;
  text-align: center;
  background: white;
}

.header h1 {
  font-size: 50px;
}

/* Style the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: #EFF8FB;
}

/* Style the topnav links */
.topnav a {
  float: left;
  display: block;
  color: #666;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
  background-color: #4CAF50;
  color: white;
}

/* Create two unequal columns that floats next to each other */
/* Left column */
.leftcolumn {   
  float: left;
  width: 100%;
}

/* Right column */
.rightcolumn {
  float: left;
  width: 0%;
  background-color: #f1f1f1;
  padding-left: 20px;
}

/* Fake image */
.fakeimg {
  background-color: #aaa;
  width: 100%;
  padding: 20px;
}

/* Add a card effect for articles */
.card {
  background-color: white;
  padding: 20px;
  margin-top: 20px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Footer */
.footer {
  padding: 20px;
  text-align: center;
  background: #ddd;
  margin-top: 20px;
  /* position: fixed;
  left: 0;
  bottom: 0;
  width: 100%; */
}

.table, .search {
  background-color: white;
  padding: 20px;
  margin-top: 20px;
}
.dropdown {
  float: left;
  overflow: hidden;
}
.dropdown .dropbtn {
  font-size: 17px;
  border: none;
  outline: none;
  color: #666;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}
.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}
.dropdown:hover .dropbtn {
  background-color: #4CAF50;
  color: white;
}
.dropdown-content a:hover {
  background-color: #4CAF50;
  color: white;
}
.dropdown:hover .dropdown-content {
  display: block;
}
/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 800px) {
  .leftcolumn, .rightcolumn {   
    width: 100%;
    padding: 0;
  }
}

/* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
@media screen and (max-width: 400px) {
  .topnav a {
    float: none;
    width: 100%;
  }
}
</style>
</head>
<body>

<!-- <div class="header">
  <h1>My Website</h1>
  <p>Resize the browser window to see the effect.</p>
</div> -->



<div class="row">
  <div class="leftcolumn">
    <div class="container">
    {{content}}
    </div>
    
    
  </div>
  <!-- <div class="rightcolumn">
    <div class="card">
      <h2>About Me</h2>
      <div class="fakeimg" style="height:100px;">Image</div>
      <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
    </div>
    <div class="card">
      <h3>Popular Post</h3>
      <div class="fakeimg"><p>Image</p></div>
      <div class="fakeimg"><p>Image</p></div>
      <div class="fakeimg"><p>Image</p></div>
    </div>
    <div class="card">
      <h3>Follow Me</h3>
      <p>Some text..</p>
    </div>
  </div> -->
</div>

<!-- <div class="footer">
  <h2>Footer</h2>
</div> -->

</body>
</html>
