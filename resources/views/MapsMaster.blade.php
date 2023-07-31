<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            width: 100%;
            height:100%;
            padding: 0px;
            margin:0px;
        }
        td {
            text-align: center;
            padding: 0px;
            margin: 0px;
            vertical-align: top;
        }

        table, td {
            /* border: 1px solid white; */
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        body{
            background-color:#11142C;
        }

        table,tr,td{
            color: white;
        }

        div {
            background-color: transparent;
            width: 80%;
            border: 3px solid rgb(12,227,198,1);
            padding-left: 10px;
            padding-right: 10px;
            padding-top: 5px;
            padding-bottom: 5px;
            margin-right: 5px;
            margin-top:100px;
            margin-left:5px;
        }

        div.a{
            font-family: Arial;
            font-size: 25px;
        }

        text{
            color:white;
        }

        div.ex1 {
            height: 100%;
            width: 100%;
            overflow-y: scroll;
        }
        /* Number Effect */
        
    </style>
    <style>
    .alert {
    padding: 20px;
    background-color: #f44336;
    color: white;
    opacity: 1;
    transition: opacity 0.6s;
    margin-bottom: 15px;
    }

    .alert.success {background-color: #04AA6D;}
    .alert.info {background-color: #2196F3;}
    .alert.warning {background-color: #ff9800;}

    .closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
    }

    .closebtn:hover {
    color: black;
    }
    </style>
</head>
<body style="vertical-align: middle;text-align: center;">
<div id="mydiv" class="alert" hidden>
    <input id="deleteid" hidden>
    <button onclick="deldat();">Delete Data</button>
  <span class="closebtn">&times;</span>
</div>
    <table>
        <tr>
            <td style="padding-left:3%;padding-right:3%;margin:0px;">
                <svg version="1.1" xmlns:x="&ns_extend;" xmlns:i="&ns_ai;" xmlns:graph="&ns_graphs;"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 200 200"
                    xml:space="preserve">
                    <image id="hibob" overflow="visible" width="100%" height="100%" margin="0px" xlink:href="http://mcc.pakuwon.com/asset/hibob1.png">
                    </image>
                    <g onclick="hibobclick();">
                        <rect class="btn" style="background-color: yellow;fill-opacity:0;" x="0" y="0" fill="yellow" width="100%" height="100%"/>
                    </g>
                    <g id="hibobrect" overflow="scroll">
                    </g>
                </svg>
                <input type="hidden" id="hibobstatus" value="0">
            </td>
            <td rowspan="2" style="width:60%;height:50%;margin:0px;padding:0px;">
                <table>
                    <tr>
                        <td>
                            <select id="type" onchange="changetype();">
                                <option value="hibob" selected>HiBob</option>
                                <option value="cctv">CCTV</option>
                                <option value="pc">People Counting</option>
                                <option value="wifi">Wifi</option>
                            </select>
                            <form action="/save" method="post">
                            {!! csrf_field() !!}
                                <input type="text" id="location" name="location" value="{{$FloorID}}" hidden>
                                <!-- <label for="typeppoint">Type</label> -->
                                <input type="text" id="typeppoint" name="typeppoint" value="hibob" hidden>
                                <input type="text" id="company" name="company" value="{{$CompID}}" hidden>
                                <!-- <label for="x">X Axis</label> -->
                                <input type="text" id="x" name="x" hidden>
                                <!-- <br> -->
                                <!-- <label for="y">Y Axis</label> -->
                                <input type="text" id="y" name="y" hidden>
                                <!-- <br> -->
                                <label for="name" id="nametext">Name</label>
                                <input type="text" id="name" name="name" >
                                <br id="brname">
                                <label for="idn" id='idtext' hidden>Source ID</label>
                                <input type="hidden" id="idn" name="idn" value="">
                                <br id='brtext'>
                                <label for="link" id="linktext" hidden>Link</label>
                                <input type="hidden" id="link" style="width:70%;" name="link" value="">
                                <br id='brlink'>
                                <label for="link" id="idlinktext" hidden>ID</label>
                                <input type="hidden" id="idlink" name="idlink" value="">
                                <br id='bridlink'>
                                <button type="submit">Save</button>
                            </form>
                            <svg version="1.1" id="Layer_1" xmlns:x="&ns_extend;" xmlns:i="&ns_ai;" xmlns:graph="&ns_graphs;"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1903 1000"
                                xml:space="preserve" width="100%" height="100%">
                                <image id="mps" overflow="visible" width="100%" height="100%" xlink:href="peta/b2.png">
                                </image>
                                <g onclick="clicked(evt)">
                                    <rect class="btn" style="background-color: blue;fill-opacity:0;" id="_x3C_Slice_x3E_" x="0" y="0" fill="blue" width="100%" height="100%"/>
                                    <!-- <text x="0" y="875" font-family="Arial" font-size="20" fill="#e8e8e8" >Information :</text>
                                    <rect style="background-color: #04d9ff;fill-opacity:1;" x="0" y="894" fill="#04d9ff" width="18" height="18"></rect>
                                    <text x="20" y="905" font-family="Arial" font-size="18" fill="#e8e8e8" >:</text>
                                    <text x="25" y="905" font-family="Arial" font-size="18" fill="#e8e8e8" >Wifi</text>
                                    <rect style="background-color: #f79545;fill-opacity:1;" x="0" y="924" fill="#f79545" width="18" height="18"></rect>
                                    <text x="20" y="935" font-family="Arial" font-size="18" fill="#e8e8e8" >:</text>
                                    <text x="25" y="935" font-family="Arial" font-size="18" fill="#e8e8e8" >People Counting</text>
                                    <rect style="background-color: #db2525;fill-opacity:1;" x="0" y="954" fill="#db2525" width="18" height="18"></rect>
                                    <text x="20" y="965" font-family="Arial" font-size="18" fill="#e8e8e8" >:</text>
                                    <text x="25" y="965" font-family="Arial" font-size="18" fill="#e8e8e8" >CCTV</text>
                                    <rect style="background-color: #21de54;fill-opacity:1;" x="0" y="984" fill="#21de54" width="18" height="18"></rect>
                                    <text x="20" y="995" font-family="Arial" font-size="18" fill="#e8e8e8" >:</text>
                                    <text x="25" y="995" font-family="Arial" font-size="18" fill="#e8e8e8" >Gateaway - HiBob</text> -->
                                    
                                </g>
                                <g id="maps">
                                </g>
                            </svg>
                            
                        </td>
                    </tr>
                </table>
            </td>
            <td style="padding-left:3%;padding-right:3%;margin:0px;">
                <svg version="1.1" xmlns:x="&ns_extend;" xmlns:i="&ns_ai;" xmlns:graph="&ns_graphs;"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 200 200"
                    xml:space="preserve">
                    <image id="wifi" overflow="visible" width="100%" height="100%" xlink:href="http://mcc.pakuwon.com/asset/wifi1.png">
                    </image>
                    <g onclick="wificlick();">
                        <rect class="btn" style="background-color: yellow;fill-opacity:0;" x="0" y="0" fill="yellow" width="100%" height="100%"/>
                    </g>
                    <g id="wifirect">
                    </g>
                </svg>
                <input type="hidden" id="wifistatus" value="0">
            </td>
        </tr>
        <tr>
            <td style="padding-left:3%;padding-right:3%;margin:0px;">
                <svg version="1.1" xmlns:x="&ns_extend;" xmlns:i="&ns_ai;" xmlns:graph="&ns_graphs;"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 200 200"
                    xml:space="preserve">
                    <image overflow="visible" width="100%" height="100%" xlink:href="http://mcc.pakuwon.com/asset/survace1.png">
                    </image>
                    <g id="srect">
                    </g>
                </svg>
            </td>
            <td style="padding-left:3%;padding-right:3%;margin:0px;">
                <svg version="1.1" xmlns:x="&ns_extend;" xmlns:i="&ns_ai;" xmlns:graph="&ns_graphs;"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 200 200"
                    xml:space="preserve">
                    <image id="pc" overflow="visible" width="100%" height="100%" xlink:href="http://mcc.pakuwon.com/asset/pc1.png">
                    </image>
                    <g onclick="pcclick();">
                        <rect class="btn" style="background-color: yellow;fill-opacity:0;" x="0" y="0" fill="yellow" width="100%" height="100%"/>
                    </g>
                    <g id="pcrect">
                    </g>
                </svg>
                <input type="hidden" id="pcstatus" value="0">
            </td>
        </tr>
    </table>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
        var index = 0;
        var type = 'hibob';

        var floor = <?php echo isset($floor) ? json_encode($floor):0; ?>;
        // Hibob = #21de54,CCTV = #db2525,People Counting = #f79545,Wifi = #04d9ff
        var color = '#21de54';
        var menu = 1;
        var maxmenu = parseInt(floor.length/4);
        if(parseInt(floor.length%4) != 0){
            maxmenu++;
        }

        var colortext = 'white';

        var colormenuon = 'white';
        var colormenuoff = '#DFE2E2';

        var textdelete='red';
        
        var height = window.screen.availHeight;
        var width = window.screen.availWidth;

        // console.log("Width: "+width+",Height: "+height);

        document.getElementById("_x3C_Slice_x3E_").style.height = height
        document.getElementById("_x3C_Slice_x3E_").style.width = width
        
        const now = new Date();
        currentHours = now.getHours();
        currentHours = ("0" + currentHours).slice(-2);

        currentMinutes = now.getMinutes();
        currentMinutes = ("0" + currentMinutes).slice(-2);

        window.onload = function(){
            var hibob = <?php echo isset($hibob) ? json_encode($hibob):0; ?>;
            document.getElementById("hibobrect").innerHTML ='<text x="32%" y="58%" font-family="Arial" font-weight="bold" font-size="60px" fill="'+colortext+'" >'+hibob+'</text><text x="32%" y="75%" font-family="Arial" font-size="16px" fill="'+colortext+'">Total Staff</text>';
            document.getElementById("wifirect").innerHTML = '<text id="wificount1" x="20%" y="55%" font-family="Arial" font-size="55px" fill="'+colortext+'" font-weight="bold"></text><text x="30%" y="80%" font-family="Arial" font-size="9px" fill="'+colortext+'">'+<?php echo isset($compname) ? json_encode($compname):0; ?>+'</text><text x="30%" y="90%" font-family="Arial" font-size="15px" fill="'+colortext+'" font-height="bold">WIFI UNIFI</text>';
            document.getElementById("pcrect").innerHTML = '<text x="22%" y="25%" font-family="Arial" font-size="14px" fill="'+colortext+'">'+<?php echo isset($compname) ? json_encode($compname):0; ?>+'</text><text id="pccount" x="23%" y="58%" font-family="Arial" font-size="50px" fill="'+colortext+'" font-weight="bold"></text><text x="33%" y="75%" font-family="Arial" font-size="10px" fill="'+colortext+'">People Counting</text><text x="39%" y="85%" font-family="Arial" font-size="15px" fill="'+colortext+'">'+currentHours+' : '+currentMinutes+'</text>';
            var unifi = <?php echo isset($unifi) ? json_encode($unifi):0; ?>;
            if(unifi != 0 || unifi != '0'){
                counter("wificount1",0,parseInt(unifi),1);
            }else{
                document.getElementById("wificount1").value = 0;
            }
            var pcounting = <?php echo isset($PeopleCounting) ? json_encode($PeopleCounting):0; ?>;
            if(pcounting < 500){
                counter("pccount",0,pcounting,1);
            }else{
                counter("pccount",parseInt(pcounting-500),pcounting,1);
            }
            menus();
            var FloorID = <?php echo isset($FloorID) ? json_encode($FloorID):1; ?>;
            changemaps(FloorID);
        }

        function changetype(){
            var value = document.getElementById('type').value;
            if(value == 'hibob'){
                document.getElementById('typeppoint').value = 'hibob';
                type = 'hibob';
                color = '#21de54';

                document.getElementById('name').type = 'text';
                document.getElementById('name').value = '';

                document.getElementById('idn').type = 'hidden';
                document.getElementById('idn').value = '';

                document.getElementById('link').type = 'hidden';
                document.getElementById('link').value= '';
                
                document.getElementById('idtext').style.display = 'none';
                document.getElementById('brtext').style.display = 'none';

                document.getElementById('brlink').style.display = 'none';
                document.getElementById('linktext').style.display='none';

                document.getElementById('nametext').style.display = 'block';
                document.getElementById('brname').style.display = 'block';

                document.getElementById('idlinktext').style.display='none';
                document.getElementById('bridlink').style.display='none';
                document.getElementById('idlink').type='hidden';
            }else if(value == 'cctv'){
                document.getElementById('typeppoint').value = 'cctv';
                type = 'cctv';
                color = '#db2525';
                document.getElementById('name').type = 'hidden';
                document.getElementById('name').value = '';
                document.getElementById('idn').type = 'hidden';
                document.getElementById('link').type = 'text';
                document.getElementById('idn').value = '';
                document.getElementById('link').value= '';

                document.getElementById('idtext').style.display = 'none';
                document.getElementById('brtext').style.display = 'none';
                document.getElementById('brlink').style.display = 'block';
                document.getElementById('linktext').style.display='block';
                document.getElementById('nametext').style.display = 'none';
                document.getElementById('brname').style.display = 'none';

                document.getElementById('idlinktext').style.display='block';
                document.getElementById('bridlink').style.display='block';
                document.getElementById('idlink').type='text';
            }else if(value == 'pc'){
                document.getElementById('typeppoint').value = 'pc';
                type = 'pc';
                color = '#f79545';
                document.getElementById('name').type = 'text';
                document.getElementById('name').value = '';
                document.getElementById('idn').type = 'text';
                document.getElementById('link').type = 'hidden';
                document.getElementById('idn').value = '';
                document.getElementById('link').value= '';

                document.getElementById('idtext').style.display = 'block';
                document.getElementById('brtext').style.display = 'block';
                document.getElementById('brlink').style.display = 'none';
                document.getElementById('linktext').style.display='none';
                document.getElementById('nametext').style.display = 'block';
                document.getElementById('brname').style.display = 'block';

                document.getElementById('idlinktext').style.display='none';
                document.getElementById('bridlink').style.display='none';
                document.getElementById('idlink').type='hidden';
            }else if(value == 'wifi'){
                document.getElementById('typeppoint').value = 'wifi';
                type = 'wifi';
                color = '#04d9ff';
                document.getElementById('name').type = 'text';
                document.getElementById('name').value = '';
                document.getElementById('idn').type = 'hidden';
                document.getElementById('link').type = 'hidden';
                document.getElementById('idn').value = '';
                document.getElementById('link').value= '';

                document.getElementById('idtext').style.display = 'none';
                document.getElementById('brtext').style.display = 'none';
                document.getElementById('brlink').style.display = 'none';
                document.getElementById('linktext').style.display='none';

                document.getElementById('nametext').style.display='block';
                document.getElementById('brname').style.display = 'block';
                document.getElementById('linktext').style.display='none';

                document.getElementById('idlinktext').style.display='none';
                document.getElementById('bridlink').style.display='none';
                document.getElementById('idlink').type='hidden';
            }
        }

        function nexts(){
            if(menu != maxmenu){
                menu++;
            }else{
                menu=1;
            }
            menus();
        }

        function prevs(){
            if(menu != 1){
                menu--;
            }else{
                menu=maxmenu;
            }
            menus();
        }

        function changemaps(a){
            var idfloor = '';
            var div = document.getElementById('maps');
            $.ajax({
                type: 'GET',
                url: window.location.origin+"/changefloor/"+a,
                beforeSend: function() {
                },
                success: function (response) {
                    var data = JSON.parse(response)
                    document.getElementById('mps').setAttribute('href', 'http://mcc.pakuwon.com/'+data[0]['maps_img']);
                    idfloor = data[0]['id'].toString();
                    document.getElementById('location').value = idfloor;
                    $.ajax({
                        type: 'GET',
                        url: window.location.origin+"/floor/"+idfloor,
                        beforeSend: function() {
                            div.innerHTML = '';
                        },
                        success: function (response) {
                            var data = JSON.parse(response)
                            if(data.length != 0){
                                for(var i = 0;i < data.length;i++){
                                    if(data[i]['type'] == 'hibob'){
                                        var x = data[i]['x_axis'];
                                        var y = data[i]['y_axis'];
                                        var id = data[i]['id'];
                                        div.innerHTML += '<circle id="c1'+index+'" fill="transparent" stroke="#21de54" stroke-width="0.5" cx="'+x+'" cy="'+y+'" r="12"><animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="1" /></circle><circle id="c2'+index+'" fill="transparent" stroke="#21de54" stroke-width="0.5" cx="'+x+'" cy="'+y+'" r="10"><animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="0" /></circle><circle id="c3'+index+'" cx="'+x+'" cy="'+y+'" r="8" fill="#21de54" onclick="deleteddata('+id+')"></circle>';
                                        // onclick="hibobclickjs(\''+name+'\')"
                                        index++;
                                    }else if(data[i]['type'] == 'cctv'){
                                        var x = data[i]['x_axis'];
                                        var y = data[i]['y_axis'];
                                        var id = data[i]['id'];
                                        div.innerHTML += '<circle id="c1'+index+'" fill="transparent" stroke="#db2525" stroke-width="0.5" cx="'+x+'" cy="'+y+'" r="12"><animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="1" /></circle><circle id="c2'+index+'" fill="transparent" stroke="#db2525" stroke-width="0.5" cx="'+x+'" cy="'+y+'" r="10"><animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="0" /></circle><circle  id="c3'+index+'" cx="'+x+'" cy="'+y+'" r="8" fill="#db2525" onclick="deleteddata('+id+')" onmouseover="inmouse(\'Name: '+id+'\',\''+index+'\')" onmouseout="outmouse(\''+index+'\')"></circle><svg width="300" height="150" x="'+(x+15)+'" y="'+(y+15)+'"  id="pop'+index+'" visibility="hidden"><image width="100%" height="100%" margin="0px" xlink:href="http://mcc.pakuwon.com/asset/rectpop.svg"></image><text id="text'+index+'" visibility="hidden" x="10" y="25" font-family="Arial" font-size="18" fill="'+colortext+'"></text></svg>';
                                        //  onclick="cctvclick('+id+')"
                                        // 
                                        index++;
                                    }else if(data[i]['type'] == 'pc'){
                                        var x = data[i]['x_axis'];
                                        var y = data[i]['y_axis'];
                                        var id = data[i]['id'];
                                        div.innerHTML += '<circle id="c1'+index+'" fill="transparent" stroke="#f79545" stroke-width="0.5" cx="'+x+'" cy="'+y+'" r="12"><animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="1" /></circle><circle id="c2'+index+'" fill="transparent" stroke="#f79545" stroke-width="0.5" cx="'+x+'" cy="'+y+'" r="10"><animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="0" /></circle><circle  id="c3'+index+'" cx="'+x+'" cy="'+y+'" r="8" fill="#f79545" onclick="deleteddata('+id+')" onmouseover="inmouse(\'Name: '+data[i]['name']+'\',\''+index+'\')" onmouseout="outmouse(\''+index+'\')"></circle><svg width="300" height="150" x="'+(x+15)+'" y="'+(y+15)+'"  id="pop'+index+'" visibility="hidden"><image width="100%" height="100%" margin="0px" xlink:href="http://mcc.pakuwon.com/asset/rectpop.svg"></image><text id="text'+index+'" visibility="hidden" x="10" y="25" font-family="Arial" font-size="18" fill="'+colortext+'"></text></svg>';
                                        index++;
                                    }else if(data[i]['type'] == 'wifi'){
                                        var x = data[i]['x_axis'];
                                        var y = data[i]['y_axis'];
                                        var id = data[i]['id'];
                                        div.innerHTML += '<circle id="c1'+index+'" fill="transparent" stroke="#04d9ff" stroke-width="0.5" cx="'+x+'" cy="'+y+'" r="12"><animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="1" /></circle><circle id="c2'+index+'" fill="transparent" stroke="#04d9ff" stroke-width="0.5" cx="'+x+'" cy="'+y+'" r="10"><animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="0" /></circle><circle  id="c3'+index+'" cx="'+x+'" cy="'+y+'" r="8" fill="#04d9ff" onclick="deleteddata('+id+')"></circle>';
                                        // onclick="wificlickjs(\''+id+'\');
                                        index++;
                                    }
                                }
                            }
                        }
                    });
                }
            });
            
        }

        function deleteddata(id){
            document.getElementById("mydiv").removeAttribute("hidden");
            document.getElementById("deleteid").value = id;
        }

        function deldat(){
            document.getElementById("mydiv").setAttribute("hidden", "hidden");
            id = document.getElementById("deleteid").value;
            $.ajax({
            url: "/deletedata/"+id
            // context: document.body
            }).done(function() {
                location.reload();
            });
        }

        function menus(){
            var firstmenu = parseInt(menu*4)-3;
            var lastmenu = parseInt(menu*4);
            var innerhtml = '';
            innerhtml = '<text x="50%" y="85%" font-family="Arial" font-size="10px" fill="'+colortext+'" onclick="prevs();">Previous</text><text x="80%" y="85%" font-family="Arial" font-size="10px" fill="'+colortext+'" onclick="nexts();">Next</text>';
            for(var i = 0; i < floor.length; i++){
                if(parseInt(floor[i]['sequence_number']) >= firstmenu && parseInt(floor[i]['sequence_number']) <= lastmenu){
                    if(parseInt(i%4) == 0){
                        innerhtml = innerhtml+'<text onclick="changemaps('+floor[i]['id']+');" x="10%" y="40%" font-family="Arial" font-size="12px" fill="'+colortext+'">&#8226; '+floor[i]['name']+'</text>';
                    }else if(parseInt(i%4) == 1){
                        innerhtml = innerhtml+'<text onclick="changemaps('+floor[i]['id']+');" x="10%" y="50%" font-family="Arial" font-size="12px" fill="'+colortext+'">&#8226; '+floor[i]['name']+'</text>';
                    }else if(parseInt(i%4) == 2){
                        innerhtml = innerhtml+'<text onclick="changemaps('+floor[i]['id']+');" x="10%" y="60%" font-family="Arial" font-size="12px" fill="'+colortext+'">&#8226; '+floor[i]['name']+'</text>';
                    }else if(parseInt(i%4) == 3){
                        innerhtml = innerhtml+'<text onclick="changemaps('+floor[i]['id']+');" x="10%" y="70%" font-family="Arial" font-size="12px" fill="'+colortext+'">&#8226; '+floor[i]['name']+'</text>';
                    }
                }
            }

            for(var i = 1;i <= maxmenu;i++){
                var xposition = 85 - parseInt((maxmenu - i)*10);
                if(i == menu){
                    innerhtml = innerhtml+'<rect style="fill-opacity:1;" x="'+xposition+'%" y="20%" height="2" width="15" fill="'+colormenuon+'"></rect>';
                }else{
                    innerhtml = innerhtml+'<rect style="fill-opacity:0.3;" x="'+xposition+'%" y="20%" height="2" width="15" fill="'+colormenuoff+'"></rect>';
                }
            }
            
            document.getElementById("srect").innerHTML = innerhtml;
        }
        
        function clicked(evt){
            if(width == 1920 && height == 1080){
                var div = 0.605;
            }else if(width == 1920 && height == 1032){
                var div = 0.605;
            }else if(width == 1680 && height == 1002){
                var div = 0.605;
            }else if(width == 1600 && height == 852){
                var div = 1.726;
            }else if(width == 1440 && height == 852){
                var div = 1.5715;
            }else if(width == 1400 && height == 1002){
                var div = 1.528;
            }else if(width == 1366 && height == 720){
                var div = 1.4725;
            }else if(width == 1280 && height == 976){
                var div = 1.395;
            }else if(width == 1280 && height == 752){
                var div = 1.39575;
            }else if(width == 1280 && height == 720){
                var div = 1.378;
            }else if(width == 1280 && height == 672){
                var div = 1.376;
            }else if(width == 1024 && height == 720){
                var div = 1.117;
            }else if(width == 800 && height == 552){
                var div = 0.8725;
            }else{
                var div = 1;
            }
            var e = evt.target;
            var dim = e.getBoundingClientRect();
            var x =(evt.clientX - dim.left)/div;
            var y = (evt.clientY - dim.top)/div;
            var div = document.getElementById('maps');
            div.innerHTML += '<circle id="c1'+index+'" fill="transparent" stroke="'+color+'" stroke-width="0.5" cx="'+x+'" cy="'+y+'" r="12"><animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="1" /></circle><circle id="c2'+index+'" fill="transparent" stroke="'+color+'" stroke-width="0.5" cx="'+x+'" cy="'+y+'" r="10"><animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="0" /></circle><circle  id="c3'+index+'" cx="'+x+'" cy="'+y+'" r="8" fill="'+color+'" </circle>';
            // onmouseover="inmouse(\'Hello\',\''+index+'\')" onmouseout="outmouse(\''+index+'\')"><svg width="300" height="150" x="'+(x+15)+'" y="'+(y+15)+'"  id="pop'+index+'" visibility="hidden"><image width="100%" height="100%" margin="0px" xlink:href="asset/rectpop.svg"></image><text id="text'+index+'" visibility="hidden" x="10" y="25" font-family="Arial" font-size="18" fill="'+colortext+'"></text></svg>
            index++;
            document.getElementById('x').value = x;
            document.getElementById('y').value = y;
        }

        function inmouse(a,index1){
            document.getElementById("pop"+index1).style.visibility = "visible"
            document.getElementById("text"+index1).style.visibility = "visible"
            document.getElementById("text"+index1).innerHTML = a
            document.getElementById("textdelete"+index1).style.visibility = "visible"
            document.getElementById("mps").style.filter = 'blur(2px)';
            for(var i = 0;i < index;i++){
                if(i != index1){
                    document.getElementById("c1"+i).style.filter = 'blur(2px)';
                    document.getElementById("c2"+i).style.filter = 'blur(2px)';
                    document.getElementById("c3"+i).style.filter = 'blur(2px)';
                }
            }
        }

        function outmouse(index1){
            document.getElementById("pop"+index1).style.visibility = "hidden"
            document.getElementById("text"+index1).style.visibility = "hidden"
            document.getElementById("mps").style.filter = 'blur(0px)';
            document.getElementById("textdelete"+index1).style.visibility = "hidden"
            for(var i = 0;i < index;i++){
                document.getElementById("c1"+i).style.filter = 'blur(0px)';
                document.getElementById("c2"+i).style.filter = 'blur(0px)';
                document.getElementById("c3"+i).style.filter = 'blur(0px)';
            }
        }
        
        function hibobclick(){
            var div = document.getElementById('hibobstatus');
            if(div.value == '0'){
                div.value = '1';
                document.getElementById('hibob').setAttribute('href', "asset/hibob2.png");
                document.getElementById("hibobrect").innerHTML = '<rect">';
                for(var i = 0;i < 2; i++){
                    var y = 40 + (i * 75);
                    var y2 = 55 + (i * 75);
                    document.getElementById("hibobrect").innerHTML += '<rect x="10" y="'+y+'" width="55" height="70" fill="red"></rect><text x="70" y="'+y2+'" font-size="12px" fill="'+colortext+'">Hello</text><text x="70" y="'+parseInt(y2+15)+'" font-size="12px" fill="'+colortext+'">Hello</text><text x="70" y="'+parseInt(y2+30)+'" font-size="12px" fill="'+colortext+'">Hello</text><text x="70" y="'+parseInt(y2+45)+'" font-size="12px" fill="'+colortext+'">Hello</text>';
                }
                document.getElementById("hibobrect").innerHTML += '</rect>';
            }else{
                var hibob = <?php echo isset($hibob) ? json_encode($hibob):0; ?>;
                div.value = '0';
                document.getElementById('hibob').setAttribute('href', "asset/hibob1.png");
                document.getElementById("hibobrect").innerHTML = '<text x="32%" y="58%" font-family="Arial" font-weight="bold" font-size="60px" fill="'+colortext+'" >'+hibob+'</text><text x="32%" y="75%" font-family="Arial" font-size="16px" fill="'+colortext+'">Total Staff</text>';
            }
        }

        function wificlick(){
            var div = document.getElementById('wifistatus');
            if(div.value == '0'){
                div.value = '1';
                document.getElementById('wifi').setAttribute('href', "asset/wifi2.png");
                document.getElementById("wifirect").innerHTML = "";
            }else{
                div.value = '0';
                document.getElementById('wifi').setAttribute('href', "asset/wifi1.png");
                document.getElementById("wifirect").innerHTML = '<text id="wificount1" x="20%" y="55%" font-family="Arial" font-size="55px" fill="'+colortext+'" font-weight="bold"></text><text x="33%" y="83%" font-family="Arial" font-size="9px" fill="'+colortext+'">'+<?php echo isset($compname) ? json_encode($compname):0; ?>+'</text><text x="37%" y="93%" font-family="Arial" font-size="15px" fill="'+colortext+'">Wifi Unifi</text>';
                var unifi = <?php echo isset($unifi) ? json_encode($unifi):0; ?>;
                counter("wificount1",0,parseInt(unifi),1);
            }
        }

        function pcclick(){
            var div = document.getElementById('pcstatus');
            if(div.value == '0'){
                div.value = '1';
                document.getElementById('pc').setAttribute('href', "asset/pc2.png");
                document.getElementById("pcrect").innerHTML = '<text x="22%" y="25%" font-family="Arial" font-size="14px" fill="'+colortext+'">'+<?php echo isset($compname) ? json_encode($compname):0; ?>+'</text><text id="pccount" x="23%" y="58%" font-family="Arial" font-size="50px" fill="'+colortext+'" font-weight="bold"></text><text x="30%" y="75%" font-family="Arial" font-size="10px" fill="'+colortext+'">Gate Away Number</text><text x="39%" y="85%" font-family="Arial" font-size="15px" fill="'+colortext+'">'+currentHours+' : '+currentMinutes+'</text>';
                //counter("pccount",parseInt(900-700),900,1);
            }else{
                div.value = '0';
                document.getElementById('pc').setAttribute('href', "asset/pc1.png");
                document.getElementById("pcrect").innerHTML = '<text x="22%" y="25%" font-family="Arial" font-size="14px" fill="'+colortext+'">'+<?php echo isset($compname) ? json_encode($compname):0; ?>+'</text><text id="pccount" x="23%" y="58%" font-family="Arial" font-size="50px" fill="'+colortext+'" font-weight="bold"></text><text x="33%" y="75%" font-family="Arial" font-size="10px" fill="'+colortext+'">People Counting</text><text x="39%" y="85%" font-family="Arial" font-size="15px" fill="'+colortext+'">'+currentHours+' : '+currentMinutes+'</text>';
                //counter("pccount",parseInt(1200-700),1200,1);
            }
        }

        function counter(id, start, end, duration) {
            let obj = document.getElementById(id),
            current = start,
            range = end - start,
            increment = end > start ? 1 : -1,
            step = Math.abs(Math.floor(duration / range)),
            timer = setInterval(() => {
                current += increment;
                obj.innerHTML = current;
                if (current == end) {
                    clearInterval(timer);
                }
            }, step);
        }

        // function deletedata(id){
        //     $.ajax({
        //     url: "/deletedata/"+id
        //     // context: document.body
        //     }).done(function() {
        //         location.reload();
        //     });
        // }
    </script>
<script>
var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
  close[i].onclick = function(){
    var div = this.parentElement;
    div.style.opacity = "0";
    setTimeout(function(){ div.style.display = "none"; }, 600);
  }
}
</script>
    <!-- string vlc -->
</body>
</html>