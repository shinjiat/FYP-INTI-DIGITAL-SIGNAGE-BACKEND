<!DOCTYPE html>
<html>
<head>
    <title>Summer html image map creator</title>
    <link href="main.css" type="text/css" rel="stylesheet" />
    <meta charset="UTF-8" />
    <!--
        Summer html image map creator
        http://github.com/summerstyle/summer

        Copyright 2016 Vera Lobacheva (http://iamvera.com)
        Released under the MIT license
    -->
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Dialog - Modal form</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <style>
    label, input { display:block; }
    input.text { margin-bottom:12px; width:95%; padding: .4em; }
    fieldset { padding:0; border:0; margin-top:25px; }
    h1 { font-size: 1.2em; margin: .6em 0; }
    div#users-contain { width: 350px; margin: 20px 0; }
    div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
    div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
    .ui-dialog .ui-state-error { padding: .3em; }
    .validateTips { border: 1px solid transparent; padding: 0.3em; }
  </style>
  <script>
function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
}
</script>
  <script>
  $(document).ready(function() {


    //when upload button is clicked, hide the image form(because dialog appear in the background behind the image form)
    $('#uploadImage').click(function()
    {
        $('#get_image_wrapper').hide();

    });


     dialog = $( "#upload" ).dialog({
         title: 'Map details',
         autoOpen:false,
         modal: true,
         draggable: false,
         resizable: false,
         width:350,
         height:400,
         buttons: {
        Return: function() {
            $('#get_image_wrapper').show();
            dialog.dialog('close');
            // $('#get_image_wrapper').toggle();
        }//end cancel function
      }//end close function
    });//end dialog


     $('#uploadImage').click(function(e) {
         e.preventDefault();
         dialog.load('form.php', function(){
             dialog.dialog('open');
         });
      });
});
function openCity(evt, listName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("list_content");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(listName).style.display = "block";
    evt.currentTarget.className += " active";
}
  </script>

</head>
<body>
<noscript>
    <div id="noscript">
        Please, enable javascript in your browser
    </div>
</noscript>
<style>
.hide{
  display:none;
}

.show{
  display:block;
}
</style>

<?php
session_start();
include ('dbconfig.php');

?>

<div id="wrapper">
    <header id="header">
        <h1 id="logo">
                <a href="index.php" onclick="deselectCurrentMap('null')"><img src="http://newinti.edu.my/edm/20131218/img/inti.jpg" alt="Summer html image map creator" />
            </a>
        </h1>
        <nav id="nav" class="clearfix">
            <ul>
                <li id="Home"><a href="index.php" onclick="deselectCurrentMap('null')">Home</a></li>
                <li id="save"><a href="#">save</a></li>
                <li id="load"><a href="#">load</a></li>
                <li id="from_html"><a href="#">from html</a></li>
                <li id="rectangle"><a href="#">rectangle</a></li>
                <li id="circle"><a href="#">circle</a></li>
                <li id="polygon"><a href="#">polygon</a></li>
                <li id="edit"><a href="#">edit</a></li>
                <li id="to_html"><a href="#">Save area</a></li>
                <li id="save_path"><a href="#">Save path</a></li>
                <li id="preview"><a href="#">preview</a></li>
                <li id="clear"><a href="#">clear</a></li>
                <li id="new_image"><a href="#">new image</a></li>
                <li id="show_help"><a href="#">?</a></li>
                <li id="path"><a href="#">Draw path</a></li>
                <li id="showFirebaseForm"><a href="#">Firebase</a></li>
                <li id="bullet"><a href="#">Add Node</a></li>
                <li id="update"><a href="#">Update Coordinates</a></li>
            </ul>
        </nav>
        <div id="coords"></div>
        <div id="debug"></div>
    </header>
    <!--<div class ="canvas" id="canvas" onclick="addNode(event)" onmousemove="showCoords(event)" onmouseout="clearCoor()"></div>-->
    <p id="demo"></p>
    <div id="image_wrapper" ondrop="drop(event)" ondragover="allowDrop(event)">
        <div id="image" >
            <img src="" alt="#" id="img" draggable="true" ondragstart="drag(event)" />
            <svg xmlns="http://www.w3.org/2000/svg" version="1.2" baseProfile="tiny" id="svg" draggable="true" ondragstart="drag(event)"></svg>
            <input class ="free" type="button" name ="kl" id="kl"  onclick="buttonClick(event)" value=""/>
        </div>
    </div>
</div>


<!-- For html image map code -->
<div id="code">
    <span class="close_button" title="close"></span>
    <div id="code_content">
    <form action="./addArea.php" method="post">
     <label><strong>Area Details</strong></label>
    Map ID : <input type="text" name="mapID" id="mapid"><br/>
    Area Name : <input type="text" name="areaName" id="areaName"><br/>
    Coordinate : <input type="text" name="coordinate" id="coordinate"><br/>
    <input type="submit" value="Save">
    </form>
    </div>
</div>

<!-- For html image map code to path-->
<div id="path_code">
    <span class="close_button" title="close"></span>
    <div id="path_content">
    <form action="./addpath.php" method="post">
     <label><strong>Path Details</strong></label>
    Map ID : <input type="text" name="mapID" id="mapid"><br/>
    Path Name : <input type="text" name="name" id="name"><br/>
    Coordinate : <input type="text" name="path_coordinate" id="path_coordinate"><br/>
    <input type="submit" value="Save">
    </form>
    </div>
</div>

<div class="tab" id="tab">
  <button class="tablinks" onclick="openCity(event, 'list')">Area</button>
  <button class="tablinks" onclick="openCity(event, 'path_list')">Path</button>
</div>


<div id="list" class="tabcontent2">
  <div id="list_content">
    AREAS
    <?php
    // Check connection

    if($_SESSION['mapid'] != null && !empty($_SESSION['mapid']))
    {
      $getmapid = $_SESSION['mapid'];
      $sql_area = mysqli_query($dbconfig, "SELECT * from area where mapid = $getmapid");

      echo "oi ini " .$getmapid;

      if(mysqli_num_rows($sql_area) > 0)   //if query runs
      {
        //echo 'query runs';
        while ($row = mysqli_fetch_array($sql_area)){
          $coords= $row['coords'];
          $name= $row['name'];

          echo '<br/> Name : <button name="tap_area" class="tap_area" value="'.$coords.'">' .$name . '</button><br/>';
          echo 'Coordinate : ' . $coords;
          echo '<br/>';

        }
      }

      else{   //if query doesnt run
        echo "query error";
      }
    }
    else{
      echo 'Failed to get map id';
    }

    ?>

  </div>
</div>

<div id="path_list" class="tabcontent2">
  <div id="path_content">
    PATHS
    <?php
    // Check connection
    if ($dbconfig->connect_error) {
        die("Connection failed: " . $dbconfig->connect_error);
    }

    //$map_id = $_SESSION['map_id'];

    if($_SESSION['mapid'] != null && !empty($_SESSION['mapid']))
    {
      $getmapid = $_SESSION['mapid'];
      $sql_path = mysqli_query($dbconfig, "SELECT * from path where mapid='.$getmapid.'");

      echo "oi ini " .$getmapid;

      if($sql_path){
          while ($row = mysqli_fetch_array($sql_path)){
            $coords= $row['coords'];
            $id= $row['id'];
            $name = $row['name'];

            echo '<br/> Path Name : <button id="tap_area" name="tap_area" class="tap_path" value="'.$coords.'">' .$name. '</button><br/>';
            echo 'Coordinate : ' . $coords;
            echo '<br/>';

          }
      }
      else{
        echo '<script> alert("SQL ERROR");</script>';
      }
    }


    ?>

  </div>
</div>


<script>

function buttonClick(subEvent)
{
    var mainEvent = subEvent ? subEvent : window.event;

//    alert("This button click occurred at: X(" +
//    mainEvent.clientX + ") and Y(" + mainEvent.clientY + ")");

alert("You click me");
}

function addNode(event)
{
    var d = document.getElementById('kl');
    var left = d.style.left = event.clientX + "px";
    var top = d.style.top = event.clientY + "px";
    alert("This button click occurred at: X(" +
    left + ") and Y(" + top + ")");
}

function showCoords(event) {
    var x = event.clientX;
    var y = event.clientY;
    var coor = "X coords: " + x + ", Y coords: " + y;
    document.getElementById("demo").innerHTML = coor;
}

function clearCoor() {
    document.getElementById("demo").innerHTML = "";
}

</script>

<!-- Edit details block -->
<form id="edit_details">
    <h5>Attributes</h5>
    <span class="close_button" title="close"></span>
    <p>
        <label for="href_attr">href</label>
        <input type="text" id="href_attr" />
    </p>
    <p>
        <label for="alt_attr">alt</label>
        <input type="text" id="alt_attr" />
    </p>
    <p>
        <label for="title_attr">title</label>
        <input type="text" id="title_attr" />
    </p>
    <button id="save_details">Save</button>
</form>

<!-- From html block -->
<div id="from_html_wrapper">
    <form id="from_html_form">
        <h5>Loading areas</h5>
        <span class="close_button" title="close"></span>
        <p>
            <label for="code_input">Enter your html code: </label>
            <textarea id="code_input"></textarea>
        </p>
        <button id="load_code_button">Load</button>
    </form>
</div>

<img src="47159008-image.png" alt="" usemap="#map" />
<map name="map">
    <area shape="poly" coords="321, 112, 383, 141, 363, 231, 207, 151" />
</map>

<!-- Get image form -->
<div id="get_image_wrapper">

    <!-- MAPLIST -->
    <div id="map_list">
      <div id="map_list_content">

        <p style="font-size:20px"><strong>Existing Map Name</strong></p>
        <?php echo include 'retrieve_image.php';
        $map_count = 0;

        while ($row = mysqli_fetch_array($sql_map)){
          $map_id = $row['id'];
          $name = $row['name'];
          $image = $row['image'];
          $map_count++;

          echo  '<br/>Map Name : '.$name.'<br/><input type="submit" onclick="setCurrentMap('.$map_id.')" class="mapmap" value=" ' . $image . '"/><br/>';
        }

     ?>
      </div>
    </div>
    <div id="get_image">
        <span title="close" class="close_button"></span>
        <div id="logo_get_image">
            <a href="http://github.com/summerstyle/summer">
            </a>
        </div>
        <div id="loading">Loading</div>
        <div id="file_reader_support">
            <label>Drag an image</label>
            <div id="dropzone">
                <span class="clear_button" title="clear">x</span>
                <img src="" alt="preview" id="sm_img" />
            </div>
            <b>or</b>
        </div>
        <label for="url">type a url</label>
        <span id="url_wrapper">
            <span class="clear_button" title="clear">x</span>
            <input type="text" id="url" />
        </span>
        <button id="button">OK</button>

        <br><b>or</b><br>

      <a href="#" id="uploadImage">Upload image to database</a>
      <div id="upload"></div>
    </div>
</div>

<!-- Help block -->
<div id="overlay"></div>
<div id="help">
    <span class="close_button" title="close"></span>
    <div class="txt">
        <section>
            <h2>Main</h2>
            <p><span class="key">F5</span> &mdash; reload the page and display the form for loading image again</p>
            <p><span class="key">S</span> &mdash; save map params in localStorage</p>
        </section>
        <section>
            <h2>Drawing mode (rectangle / circle / polygon)</h2>
            <p><span class="key">ENTER</span> &mdash; stop polygon drawing (or click on first helper)</p>
            <p><span class="key">ESC</span> &mdash; cancel drawing of a new area</p>
            <p><span class="key">SHIFT</span> &mdash; square drawing in case of a rectangle and right angle drawing in case of a polygon</p>
        </section>
        <section>
            <h2>Editing mode</h2>
            <p><span class="key">DELETE</span> &mdash; remove a selected area</p>
            <p><span class="key">ESC</span> &mdash; cancel editing of a selected area</p>
            <p><span class="key">SHIFT</span> &mdash; edit and save proportions for rectangle</p>
            <p><span class="key">I</span> &mdash; edit attributes of a selected area (or dblclick on an area)</p>
            <p><span class="key">CTRL</span> + <span class="key">C</span> &mdash; a copy of the selected area</p>
            <p><span class="key">&uarr;</span> &mdash; move a selected area up</p>
            <p><span class="key">&darr;</span> &mdash; move a selected area down</p>
            <p><span class="key">&larr;</span> &mdash; move a selected area to the left</p>
            <p><span class="key">&rarr;</span> &mdash; move a selected area to the right</p>
        </section>
    </div>
    <footer>
        <a href="http://github.com/summerstyle/summer">Summer html image map creator 0.5</a><br />
        &copy; 2016 Vera Lobatcheva<br />
        MIT License
    </footer>
</div>

<script type="text/javascript" src="summerHTMLImageMapCreator.js"></script>
<script>

function openCity(evt, codeName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent2");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(codeName).style.display = "block";
    evt.currentTarget.className += " active";
}

function setCurrentMap(str) {
  alert("Map Id : " + str);
     if (str == "") {
         //document.getElementById("txtHint").innerHTML = "";
         return;
     } else {
         if (window.XMLHttpRequest) {
             // code for IE7+, Firefox, Chrome, Opera, Safari
             xmlhttp = new XMLHttpRequest();
         } else {
             // code for IE6, IE5
             xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
         }
         xmlhttp.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {
                 //document.getElementById("txtHint").innerHTML = this.responseText;
             }
         };
         xmlhttp.open("GET","setmap.php?q="+str,true);
         xmlhttp.send();
         //location.reload();
     }
 }

 function deselectCurrentMap(str){
     if (str == "") {
         //document.getElementById("txtHint").innerHTML = "";
         return;
     } else {
         if (window.XMLHttpRequest) {
             // code for IE7+, Firefox, Chrome, Opera, Safari
             xmlhttp = new XMLHttpRequest();
         } else {
             // code for IE6, IE5
             xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
         }
         xmlhttp.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {
                 //document.getElementById("txtHint").innerHTML = this.responseText;
             }
         };
         xmlhttp.open("GET","deselectMap.php?q="+str,true);
         xmlhttp.send();
     }

 }
 </script>
</body>

</html>
