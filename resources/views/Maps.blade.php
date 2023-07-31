<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="300">
    <title>Document</title>
    <style>
        body{
            width: 100%;
            height:100%;
            padding: 0;
            margin:0;
        }
        td {
            text-align: center;
            padding: 0px;
            margin: 0px;
            /* vertical-align: middle; */
            height:100%;
        }

        table, td {
            /* border: 1px solid white; */
        }

        table {
            border-collapse: collapse;
            width: 100%;
            height:700px;
            /* margin-bottom:auto;margin-top:auto; */
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
</head>
<body style="text-align: center;">
    <table >
        <tr>
            <td colspan="3" style="height:50px;">
                <text style="font-size:30px;font-family:arial;fill:#e8e8e8;font-weight:bold;" id="floorname_id"></text>
            </td>
        </tr>
        <tr>
            <td style="padding-left:3%;padding-right:3%;margin:0px;vertical-align:bottom;">
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
                            <svg version="1.1" id="Layer_1" xmlns:x="&ns_extend;" xmlns:i="&ns_ai;" xmlns:graph="&ns_graphs;"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1903 1000"
                                xml:space="preserve" width="100%" height="100%">
                                <image id="mps" overflow="visible" width="100%" height="100%" xlink:href="peta/b2.png">
                                </image>
                                <g onclick="clicked(evt)">
                                    <rect class="btn" style="background-color: blue;fill-opacity:0;" id="_x3C_Slice_x3E_" x="0" y="0" fill="blue" width="100%" height="100%"/>
                                    
                                    <text x="1500" y="30" font-family="Arial" font-size="30" fill="#e8e8e8"font-weight="bold" id="point_id"></text>
                                    <text x="0" y="965" font-family="Arial" font-size="24" fill="#e8e8e8" font-weight="bold">Information</text>
                                    <rect style="background-color: #04d9ff;fill-opacity:1;" x="0" y="974" fill="#04d9ff" width="18" height="18"></rect>
                                    <text x="20" y="990" font-family="Arial" font-size="20" fill="#e8e8e8" >:</text>
                                    <text x="25" y="990" font-family="Arial" font-size="20" fill="#e8e8e8" >Wifi</text>
                                    <rect style="background-color: #f79545;fill-opacity:1;" x="0" y="1004" fill="#f79545" width="18" height="18"></rect>
                                    <text x="20" y="1020" font-family="Arial" font-size="20" fill="#e8e8e8" >:</text>
                                    <text x="25" y="1020" font-family="Arial" font-size="20" fill="#e8e8e8" >People Counting</text>
                                    <rect style="background-color: #db2525;fill-opacity:1;" x="0" y="1034" fill="#db2525" width="18" height="18"></rect>
                                    <text x="20" y="1050" font-family="Arial" font-size="20" fill="#e8e8e8" >:</text>
                                    <text x="25" y="1050" font-family="Arial" font-size="20" fill="#e8e8e8" >CCTV</text>
                                    <rect style="background-color: #21de54;fill-opacity:1;" x="0" y="1064" fill="#21de54" width="18" height="18"></rect>
                                    <text x="20" y="1078" font-family="Arial" font-size="20" fill="#e8e8e8" >:</text>
                                    <text x="25" y="1078" font-family="Arial" font-size="20" fill="#e8e8e8" >Gateaway - HiBob</text>
                                </g>
                                <g id="maps">
                                </g>
                            </svg>
                            
                        </td>
                    </tr>
                </table>
            </td>
            <td style="padding-left:3%;padding-right:3%;margin:0px;vertical-align:bottom;">
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
            <td style="padding-left:3%;padding-right:3%;margin:0px;vertical-align:top;">
                <svg version="1.1" xmlns:x="&ns_extend;" xmlns:i="&ns_ai;" xmlns:graph="&ns_graphs;"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 200 200"
                    xml:space="preserve">
                    <image overflow="visible" width="100%" height="100%" xlink:href="http://mcc.pakuwon.com/asset/survace1.png">
                    </image>
                    <g id="srect">
                    </g>
                </svg>
            </td>
            <td style="padding-left:3%;padding-right:3%;margin:0px;vertical-align:top;">
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
        var colortext = 'white';
        var colortextalert = 'red';
        var maxmenu = parseInt(floor.length/4);
        if(parseInt(floor.length%4) != 0){
            maxmenu++;
        }

        var colormenuon = 'white';
        var colormenuoff = '#DFE2E2';
        
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
            document.getElementById("pcrect").innerHTML = '<text x="22%" y="25%" font-family="Arial" font-size="14px" fill="'+colortext+'">'+<?php echo isset($compname) ? json_encode($compname):0; ?>+'</text><text id="pccount" x="15%" y="58%" font-family="Arial" font-size="50px" fill="'+colortext+'" font-weight="bold"></text><text x="33%" y="75%" font-family="Arial" font-size="10px" fill="'+colortext+'">People Counting</text><text x="39%" y="85%" font-family="Arial" font-size="15px" fill="'+colortext+'">'+currentHours+' : '+currentMinutes+'</text>';
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
                    document.getElementById('floorname_id').innerHTML = data[0]['company_name'].toString()+' - '+data[0]['name'].toString();
                    idfloor = data[0]['id'].toString();
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
                                        var name = data[i]['id'];
                                        div.innerHTML += '<circle id="c1'+index+'" fill="transparent" stroke="#21de54" stroke-width="0.5" cx="'+x+'" cy="'+y+'" r="12"><animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="1" /></circle><circle id="c2'+index+'" fill="transparent" stroke="#21de54" stroke-width="0.5" cx="'+x+'" cy="'+y+'" r="10"><animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="0" /></circle><circle id="c3'+index+'" cx="'+x+'" cy="'+y+'" r="8" fill="#21de54" onclick="hibobclickjs(\''+name+'\')"></circle>';
                                        index++;
                                    }else if(data[i]['type'] == 'cctv'){
                                        var x = data[i]['x_axis'];
                                        var y = data[i]['y_axis'];
                                        var id = data[i]['id'];
                                        div.innerHTML += '<circle id="c1'+index+'" fill="transparent" stroke="#db2525" stroke-width="0.5" cx="'+x+'" cy="'+y+'" r="12"><animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="1" /></circle><circle id="c2'+index+'" fill="transparent" stroke="#db2525" stroke-width="0.5" cx="'+x+'" cy="'+y+'" r="10"><animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="0" /></circle><circle  id="c3'+index+'" cx="'+x+'" cy="'+y+'" r="8" fill="#db2525" onclick="cctvclick('+id+')"></circle>';
                                        // onmouseover="inmouse(\'Name: '+data[i]['name']+'\',\''+index+'\')" onmouseout="outmouse(\''+index+'\')"<svg width="300" height="150" x="'+(x+15)+'" y="'+(y+15)+'"  id="pop'+index+'" visibility="hidden"><image width="100%" height="100%" margin="0px" xlink:href="asset/rectpop.svg"></image><text id="text'+index+'" visibility="hidden" x="10" y="25" font-family="Arial" font-size="18" fill="'+colortext+'"></text></svg>
                                        index++;
                                    }else if(data[i]['type'] == 'pc'){
                                        var x = data[i]['x_axis'];
                                        var y = data[i]['y_axis'];
                                        var id = data[i]['id'];
                                        div.innerHTML += '<circle id="c1'+index+'" fill="transparent" stroke="#f79545" stroke-width="0.5" cx="'+x+'" cy="'+y+'" r="12"><animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="1" /></circle><circle id="c2'+index+'" fill="transparent" stroke="#f79545" stroke-width="0.5" cx="'+x+'" cy="'+y+'" r="10"><animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="0" /></circle><circle  id="c3'+index+'" cx="'+x+'" cy="'+y+'" r="8" fill="#f79545" onclick="pcclickjs('+id+')"</circle>';
                                        //  onmouseover="inmouse(\'Name: '+data[i]['name']+'\',\''+index+'\')" onmouseout="outmouse(\''+index+'\')"></circle><svg width="300" height="150" x="'+(x+15)+'" y="'+(y+15)+'"  id="pop'+index+'" visibility="hidden"><image width="100%" height="100%" margin="0px" xlink:href="http://mcc.pakuwon.com/asset/rectpop.svg"></image><text id="text'+index+'" visibility="hidden" x="10" y="25" font-family="Arial" font-size="18" fill="'+colortext+'"></text></svg>
                                        index++;
                                    }else if(data[i]['type'] == 'wifi'){
                                        var x = data[i]['x_axis'];
                                        var y = data[i]['y_axis'];
                                        var id = data[i]['id'];
                                        div.innerHTML += '<circle id="c1'+index+'" fill="transparent" stroke="#04d9ff" stroke-width="0.5" cx="'+x+'" cy="'+y+'" r="12"><animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="1" /></circle><circle id="c2'+index+'" fill="transparent" stroke="#04d9ff" stroke-width="0.5" cx="'+x+'" cy="'+y+'" r="10"><animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="0" /></circle><circle  id="c3'+index+'" cx="'+x+'" cy="'+y+'" r="8" fill="#04d9ff"  onclick="wificlickjs(\''+id+'\');"></circle>';
                                        index++;
                                    }
                                }
                            }
                        }
                    });
                }
            });
            
        }

        function hibobclickjs(id){
            $.ajax({
                type: 'GET',
                url: window.location.origin+"/hibobdata/"+id,
                beforeSend: function() {
                },
                success: function (response) {
                    console.log(response);
                    if(response.length != 0){
                        document.getElementById("point_id").innerHTML = response[0]['nama_gateway'].toString();
                    }
                    var div = document.getElementById('hibobstatus');
                    div.value = '1';
                    document.getElementById('hibob').setAttribute('href', "http://mcc.pakuwon.com/asset/hibob2.png");
                    document.getElementById("hibobrect").innerHTML = '<rect">';
                    
                    for(var i = 0;i < response.length; i++){
                        var y = 40 + (i * 75);
                        var y2 = 55 + (i * 75);
                        var nama = response[i]['nama_staff'];
                        var type = response[i]['tipe_alert'];
                        if(type == 'Late'){
                            var image = 'http://hibob.id:2092/images/?url='+response[i]['url_photo'];
                            document.getElementById("hibobrect").innerHTML += '<text x="10" y="45" font-size="12px" font-family="Arial" fill="'+colortext+'">'+name+'</text><svg x="10" y="'+y+'" width="55" height="70" fill="red"><image width="55" height="70" margin="0px" xlink:href="'+image+'"></image></svg><text x="70" y="'+y2+'" font-size="12px" font-family="Arial" fill="'+colortext+'">'+nama+'</text><text x="70" y="'+parseInt(y2+15)+'" font-family="Arial" font-size="12px" fill="'+colortextalert+'">'+type+'</text>';
                        }else{
                            var image = 'http://hibob.id:2092/images/?url='+response[i]['url_photo'];
                            document.getElementById("hibobrect").innerHTML += '<text x="10" y="45" font-size="12px" font-family="Arial" fill="'+colortext+'">'+name+'</text><svg x="10" y="'+y+'" width="55" height="70" fill="red"><image width="55" height="70" margin="0px" xlink:href="'+image+'"></image></svg><text x="70" y="'+y2+'" font-size="12px" font-family="Arial" fill="'+colortext+'">'+nama+'</text><text x="70" y="'+parseInt(y2+15)+'" font-size="12px" font-family="Arial" fill="'+colortext+'">'+type+'</text>';
                        }
                        // <text x="70" y="'+parseInt(y2+30)+'" font-size="12px" fill="'+colortext+'">Alert Type:</text><text x="70" y="'+parseInt(y2+45)+'" font-size="12px" fill="'+colortext+'">'+type+'</text>
                    }
                    document.getElementById("hibobrect").innerHTML += '</rect>';
                }
            });
        }

        function wificlickjs(id){
            $.ajax({
                type: 'GET',
                url: window.location.origin+"/wifidatadetail/"+id,
                beforeSend: function() {
                },
                success: function (data) {
                    var response = JSON.parse(data);
                    document.getElementById("point_id").innerHTML = response[0]['Name'].toString();
                    var div = document.getElementById('wifistatus');
                    div.value = '1';
                    document.getElementById('wifi').setAttribute('href', "http://mcc.pakuwon.com/asset/wifi2.png");
                    document.getElementById("wifirect").innerHTML = '<text id="wificount1" x="20%" y="55%" font-family="Arial" font-size="55px" fill="'+colortext+'" font-weight="bold"></text><text x="30%" y="80%" font-family="Arial" font-size="9px" fill="'+colortext+'">'+<?php echo isset($compname) ? json_encode($compname):0; ?>+'</text><text x="20%" y="90%" font-family="Arial" font-size="15px" fill="'+colortext+'" font-height="bold">'+response[0]['Name']+'</text>';
                    if(response[0]['Count'] != 0 || response[0]['Count'] != '0'){
                        counter("wificount1",0,parseInt(response[0]['Count']),1);
                    }else{
                        document.getElementById('wifi').value = 0;
                    }
                }
            });
        }

        function cctvclick(id){
            $.ajax({
                type: 'GET',
                url: window.location.origin+"/cctvchange/"+id,
                beforeSend: function() {
                },
                success: function (response) {
                    document.getElementById("point_id").innerHTML = response.toString();
                }
            });
        }

        function pcclickjs(id){
            $.ajax({
                type: 'GET',
                url: window.location.origin+"/pcclick/"+id,
                beforeSend: function() {
                },
                success: function (response) {
                    console.log(response)
                    document.getElementById("point_id").innerHTML = response[0]['Name'].toString();
                    var count = response[0]['Count'].toString();
                    var div = document.getElementById('pcstatus');
                    div.value = '1';
                    document.getElementById('pc').setAttribute('href', "http://mcc.pakuwon.com/asset/pc2.png");
                    document.getElementById("pcrect").innerHTML = '<text x="22%" y="25%" font-family="Arial" font-size="14px" fill="'+colortext+'">'+<?php echo isset($compname) ? json_encode($compname):0; ?>+'</text><text id="pccount" x="15%" y="58%" font-family="Arial" font-size="50px" fill="'+colortext+'" font-weight="bold"></text><text x="30%" y="75%" font-family="Arial" font-size="10px" fill="'+colortext+'">Gate Away Number</text><text x="39%" y="85%" font-family="Arial" font-size="15px" fill="'+colortext+'">'+currentHours+' : '+currentMinutes+'</text>';
                    if(count < 500){
                        counter("pccount",0,count,1);
                    }else{
                        counter("pccount",parseInt(count-500),count,1);
                    }
                }
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

        function inmouse(a,index1){
            document.getElementById("pop"+index1).style.visibility = "visible"
            document.getElementById("text"+index1).style.visibility = "visible"
            document.getElementById("text"+index1).innerHTML = a
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
            for(var i = 0;i < index;i++){
                document.getElementById("c1"+i).style.filter = 'blur(0px)';
                document.getElementById("c2"+i).style.filter = 'blur(0px)';
                document.getElementById("c3"+i).style.filter = 'blur(0px)';
            }
        }
        
        function hibobclick(){
            var div = document.getElementById('hibobstatus');
            // if(div.value == '0'){
            //     div.value = '1';
            //     document.getElementById('hibob').setAttribute('href', "asset/hibob2.png");
            //     document.getElementById("hibobrect").innerHTML = '<rect">';
            //     for(var i = 0;i < 2; i++){
            //         var y = 40 + (i * 75);
            //         var y2 = 55 + (i * 75);
            //         document.getElementById("hibobrect").innerHTML += '<rect x="10" y="'+y+'" width="55" height="70" fill="red"></rect><text x="70" y="'+y2+'" font-size="12px" fill="'+colortext+'">Hello</text><text x="70" y="'+parseInt(y2+15)+'" font-size="12px" fill="'+colortext+'">Hello</text><text x="70" y="'+parseInt(y2+30)+'" font-size="12px" fill="'+colortext+'">Hello</text><text x="70" y="'+parseInt(y2+45)+'" font-size="12px" fill="'+colortext+'">Hello</text>';
            //     }
            //     document.getElementById("hibobrect").innerHTML += '</rect>';
            // }else{
                var hibob = <?php echo isset($hibob) ? json_encode($hibob):0; ?>;
                div.value = '0';
                document.getElementById('hibob').setAttribute('href', "http://mcc.pakuwon.com/asset/hibob1.png");
                document.getElementById("hibobrect").innerHTML = '<text x="32%" y="58%" font-family="Arial" font-weight="bold" font-size="60px" fill="'+colortext+'" >'+hibob+'</text><text x="32%" y="75%" font-family="Arial" font-size="16px" fill="'+colortext+'">Total Staff</text>';
                document.getElementById("point_id").innerHTML = '';
            // }
        }

        function wificlick(){
            var div = document.getElementById('wifistatus');
            // if(div.value == '0'){
            //     div.value = '1';
            //     document.getElementById('wifi').setAttribute('href', "asset/wifi2.png");
            //     document.getElementById("wifirect").innerHTML = '<text id="wificount1" x="20%" y="55%" font-family="Arial" font-size="55px" fill="'+colortext+'" font-weight="bold"></text><text x="30%" y="80%" font-family="Arial" font-size="9px" fill="'+colortext+'">'+<?php echo isset($compname) ? json_encode($compname):0; ?>+'</text><text x="30%" y="90%" font-family="Arial" font-size="15px" fill="'+colortext+'" font-height="bold">WIFI UNIFI</text>';
            // }else{
                div.value = '0';
                document.getElementById('wifi').setAttribute('href', "http://mcc.pakuwon.com/asset/wifi1.png");
                document.getElementById("wifirect").innerHTML = '<text id="wificount1" x="20%" y="55%" font-family="Arial" font-size="55px" fill="'+colortext+'" font-weight="bold"></text><text x="30%" y="80%" font-family="Arial" font-size="9px" fill="'+colortext+'">'+<?php echo isset($compname) ? json_encode($compname):0; ?>+'</text><text x="30%" y="90%" font-family="Arial" font-size="15px" fill="'+colortext+'" font-height="bold">WIFI UNIFI</text>';
                var unifi = <?php echo isset($unifi) ? json_encode($unifi):0; ?>;
                if(unifi != 0 || unifi != '0'){
                    counter("wificount1",0,parseInt(unifi),1);
                }else{
                    document.getElementById("wificount1").value = 0;
                }
                document.getElementById("point_id").innerHTML = '';
            // }
        }

        function pcclick(){
            var div = document.getElementById('pcstatus');
            // if(div.value == '0'){
            //     div.value = '1';
            //     document.getElementById('pc').setAttribute('href', "http://mcc.pakuwon.com/asset/pc2.png");
            //     document.getElementById("pcrect").innerHTML = '<text x="22%" y="25%" font-family="Arial" font-size="14px" fill="'+colortext+'">'+<?php echo isset($compname) ? json_encode($compname):0; ?>+'</text><text id="pccount" x="15%" y="58%" font-family="Arial" font-size="50px" fill="'+colortext+'" font-weight="bold"></text><text x="30%" y="75%" font-family="Arial" font-size="10px" fill="'+colortext+'">Gate Away Number</text><text x="39%" y="85%" font-family="Arial" font-size="15px" fill="'+colortext+'">'+currentHours+' : '+currentMinutes+'</text>';
            //     document.getElementById("point_id").innerHTML = '';
            //     counter("pccount",parseInt(900-700),900,1);
            // }else{
                var pcounting = <?php echo isset($PeopleCounting) ? json_encode($PeopleCounting):0; ?>;
                div.value = '0';
                document.getElementById('pc').setAttribute('href', "http://mcc.pakuwon.com/asset/pc1.png");
                document.getElementById("pcrect").innerHTML = '<text x="22%" y="25%" font-family="Arial" font-size="14px" fill="'+colortext+'">'+<?php echo isset($compname) ? json_encode($compname):0; ?>+'</text><text id="pccount" x="15%" y="58%" font-family="Arial" font-size="50px" fill="'+colortext+'" font-weight="bold"></text><text x="33%" y="75%" font-family="Arial" font-size="10px" fill="'+colortext+'">People Counting</text><text x="39%" y="85%" font-family="Arial" font-size="15px" fill="'+colortext+'">'+currentHours+' : '+currentMinutes+'</text>';
                document.getElementById("point_id").innerHTML = '';
                counter("pccount",parseInt(pcounting-500),pcounting,1);
            // }
        }

        function counter(id, start, end, duration) {
            if(end == 0){
                document.getElementById(id).innerHTML = 0;
            }else{
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
            
        }
    </script>
</body>
</html>