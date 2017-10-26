


$(document).ready(function() {
    $(".tap_node").click(function () {
        //$(this).addClass('pressed');
        console.log($(this).val());

        var coordinate = $(this).val();

        var node_id = $(this).attr("data-value");
        var x = getx(coordinate);
        console.log(x);
        var y = gety(coordinate);
        console.log(y);

        if ($(this).hasClass('idle')) {

            $(this).removeClass('idle');
            $(this).addClass('pressed');


            var para = document.createElement("button");
            var t = document.createTextNode(node_id);

            para.appendChild(t);
            para.classList.add("show");
            para.classList.add("node");
            para.value = coordinate;
            para.id = node_id;

            $(para).css('position', 'absolute');
            $(para).css('left', parseInt(x));
            $(para).css('top', parseInt(y));
            document.getElementById("image").appendChild(para);

        }
        else if($(this).hasClass('pressed')){           //remove button
            //var elem = document.elementFromPoint(parseInt(x), parseInt(y)) // x, y
            //$(elem).remove();
            var parent = document.getElementById("image");
            var child = document.getElementById(node_id);
            parent.removeChild(child);
            $(this).addClass('idle');
        }
    });

//on NODE CLICKED using delegated binding using on, because the buttons are just created
    $("#image").on("click", "button.node", function(){
        alert('You clicked node with coordinate : ' + $(this).val());
        addNode($(this).val());
    });

//on ADD NODE OPTION CLICKED
    $("#bola").click(function () {

        if ($(this).hasClass('idle')) {

            $(this).removeClass('idle');
            $(this).addClass('pressed');
            $(".title").removeClass('hide');
            $(".title").addClass('show_title');


            $('#image').click(function (e) {                    //ON IMAGE CLICKED
                var posX = Math.round(e.pageX - $(this).offset().left);
                var posY = Math.round(e.pageY - $(this).offset().top);
                var coordinate = posX + ',' + posY;
                alert((posX) + ' , ' + (posY));              //offset mouse position
                var r = confirm("Add a node on this position?");
                if (r == true) {                    //add node here

                    //show node form
                    $('#workshop-div').removeClass('hide');
                    $('#workshop-div').addClass('show_title');
                    $('#node_coordinate').val(coordinate);

                    var para = document.createElement("button");
                    var t = document.createTextNode("n");

                    para.appendChild(t);
                    para.classList.add("show");
                    para.classList.add("node");
                    para.value = posX + ',' + posY;

                    $(para).css('position', 'absolute');
                    $(para).css('left', parseInt(posX));
                    $(para).css('top', parseInt(posY));
                    document.getElementById("image").appendChild(para);



                } else {

                }
            });
        }

        else if($(this).hasClass('pressed')) {      //disable add node mode
            $('#image').off('click');
            $(this).addClass('idle');
            $(".title").removeClass('show_title');
            $(".title").addClass('hide');
        }
    });

});



function getx(str) {
    var i = str.indexOf(",");
    if(i > 0)
        return  str.slice(0, i);
    else
        return "";
}

function gety(str) {
        return  str.substr(str.indexOf(",") + 1);
}

function addNode(coordinate) {

    console.log("add nodee");
    if(coordinate == "") {
        alert("Coordinate passed is empty");
        return;
    }
    $.ajax({
        type  : 'GET',
        url  : 'addnode.php',
        data : {pt:'7',coord:coordinate},
        success: function (data) {
            //document.getElementById('outter-wp').innerHTML = data;
        }
    });
}