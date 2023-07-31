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
</head>
<body style="vertical-align: middle;text-align: center;">
    <table>
        <tr>
            <td style="width:50%;height:50%;margin:0px;padding:20px;">
                <table>
                    <tr>
                        <td>
                            <svg version="1.1" id="Layer_1" xmlns:x="&ns_extend;" xmlns:i="&ns_ai;" xmlns:graph="&ns_graphs;"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1903 1000"
                                xml:space="preserve" width="auto" height="auto">
                                <image id="mps" overflow="visible" width="100%" height="100%" xlink:href="peta/b2.png">
                                </image>
                                <g onclick="clicked(evt)">
                                    <rect class="btn" style="background-color: blue;fill-opacity:0;" id="_x3C_Slice_x3E_" x="0" y="0" fill="blue" width="100%" height="100%"/>
                                    <text x="0" y="875" font-family="Arial" font-size="20" fill="#e8e8e8" >Information :</text>
                                    <rect style="background-color: #f0e62b;fill-opacity:1;" x="0" y="894" fill="#f0e62b" width="18" height="18"></rect>
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
                                    <text x="25" y="995" font-family="Arial" font-size="18" fill="#e8e8e8" >Gateaway - HiBob</text>
                                </g>
                                <g id="maps">
                                </g>
                            </svg>
                            
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
        var index = 0;
        var type = 'hibob';
        // Hibob = #21de54,CCTV = #db2525,People Counting = #f79545,Wifi = #f0e62b
        var color = '#21de54';
        var menu = 0;
        var colortext = 'white';

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
            var data = <?php echo isset($Data) ? json_encode($Data):0; ?>;
            var div = document.getElementById('maps');
            for(var i = 0;i < data.length;i++){
                if(data[i]['type'] == 'hibob'){
                    var x = data[i]['x_axis'];
                    var y = data[i]['y_axis'];
                    div.innerHTML += '<circle id="c1'+index+'" fill="transparent" stroke="#21de54" stroke-width="0.5" cx="'+x+'" cy="'+y+'" r="10"><animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="1" /></circle><circle id="c2'+index+'" fill="transparent" stroke="#21de54" stroke-width="0.5" cx="'+x+'" cy="'+y+'" r="8"><animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="0" /></circle><circle  id="c3'+index+'" cx="'+x+'" cy="'+y+'" r="6" fill="#21de54" onmouseover="inmouse(\'Name: '+data[i]['name']+'\',\''+index+'\')" onmouseout="outmouse(\''+index+'\')"></circle><svg width="300" height="150" x="'+(x+15)+'" y="'+(y+15)+'"  id="pop'+index+'" visibility="hidden"><image width="100%" height="100%" margin="0px" xlink:href="asset/rectpop.svg"></image><text id="text'+index+'" visibility="hidden" x="10" y="25" font-family="Arial" font-size="18" fill="'+colortext+'"></text></svg>';
                    index++;
                }else if(data[i]['type'] == 'cctv'){
                    var x = data[i]['x_axis'];
                    var y = data[i]['y_axis'];
                    div.innerHTML += '<circle id="c1'+index+'" fill="transparent" stroke="#db2525" stroke-width="0.5" cx="'+x+'" cy="'+y+'" r="10"><animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="1" /></circle><circle id="c2'+index+'" fill="transparent" stroke="#db2525" stroke-width="0.5" cx="'+x+'" cy="'+y+'" r="8"><animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="0" /></circle><circle  id="c3'+index+'" cx="'+x+'" cy="'+y+'" r="6" fill="#db2525" onmouseover="inmouse(\'Link: '+data[i]['link']+'\',\''+index+'\')" onmouseout="outmouse(\''+index+'\')"></circle><svg width="300" height="150" x="'+(x+15)+'" y="'+(y+15)+'"  id="pop'+index+'" visibility="hidden"><image width="100%" height="100%" margin="0px" xlink:href="asset/rectpop.svg"></image><text id="text'+index+'" visibility="hidden" x="10" y="25" font-family="Arial" font-size="18" fill="'+colortext+'"></text></svg>';
                    index++;
                }else if(data[i]['type'] == 'pc'){
                    var x = data[i]['x_axis'];
                    var y = data[i]['y_axis'];
                    div.innerHTML += '<circle id="c1'+index+'" fill="transparent" stroke="#f79545" stroke-width="0.5" cx="'+x+'" cy="'+y+'" r="10"><animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="1" /></circle><circle id="c2'+index+'" fill="transparent" stroke="#f79545" stroke-width="0.5" cx="'+x+'" cy="'+y+'" r="8"><animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="0" /></circle><circle  id="c3'+index+'" cx="'+x+'" cy="'+y+'" r="6" fill="#f79545" onmouseover="inmouse(\'Name: '+data[i]['name']+'\',\''+index+'\')" onmouseout="outmouse(\''+index+'\')"></circle><svg width="300" height="150" x="'+(x+15)+'" y="'+(y+15)+'"  id="pop'+index+'" visibility="hidden"><image width="100%" height="100%" margin="0px" xlink:href="asset/rectpop.svg"></image><text id="text'+index+'" visibility="hidden" x="10" y="25" font-family="Arial" font-size="18" fill="'+colortext+'"></text></svg>';
                    index++;
                }else if(data[i]['type'] == 'wifi'){
                    var x = data[i]['x_axis'];
                    var y = data[i]['y_axis'];
                    div.innerHTML += '<circle id="c1'+index+'" fill="transparent" stroke="#f0e62b" stroke-width="0.5" cx="'+x+'" cy="'+y+'" r="10"><animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="1" /></circle><circle id="c2'+index+'" fill="transparent" stroke="#f0e62b" stroke-width="0.5" cx="'+x+'" cy="'+y+'" r="8"><animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="0" /></circle><circle  id="c3'+index+'" cx="'+x+'" cy="'+y+'" r="6" fill="#f0e62b" onmouseover="inmouse(\'Name: '+data[i]['name']+'\',\''+index+'\')" onmouseout="outmouse(\''+index+'\')"></circle><svg width="300" height="150" x="'+(x+15)+'" y="'+(y+15)+'"  id="pop'+index+'" visibility="hidden"><image width="100%" height="100%" margin="0px" xlink:href="asset/rectpop.svg"></image><text id="text'+index+'" visibility="hidden" x="10" y="25" font-family="Arial" font-size="18" fill="'+colortext+'"></text></svg>';
                    index++;
                }
            }
            document.getElementById("hibobrect").innerHTML ='<text x="25%" y="58%" font-family="Arial" font-weight="bold" font-size="60px" fill="'+colortext+'" ></text><text x="32%" y="75%" font-family="Arial" font-size="16px" fill="'+colortext+'">Total Staff</text>';
            document.getElementById("wifirect").innerHTML = '<text id="wificount1" x="20%" y="55%" font-family="Arial" font-size="55px" fill="'+colortext+'" font-weight="bold"></text><text x="33%" y="83%" font-family="Arial" font-size="9px" fill="'+colortext+'">Gandaria City Mall</text><text x="37%" y="93%" font-family="Arial" font-size="15px" fill="'+colortext+'">Wifi Unifi</text>';
            document.getElementById("pcrect").innerHTML = '<text x="22%" y="25%" font-family="Arial" font-size="14px" fill="'+colortext+'">Gandaria City Mall</text><text id="pccount" x="23%" y="58%" font-family="Arial" font-size="50px" fill="'+colortext+'" font-weight="bold"></text><text x="33%" y="75%" font-family="Arial" font-size="10px" fill="'+colortext+'">People Counting</text><text x="39%" y="85%" font-family="Arial" font-size="15px" fill="'+colortext+'">'+currentHours+' : '+currentMinutes+'</text>';
            // counter("wificount1",parseInt(3900-700),3900,1);
            // counter("pccount",parseInt(1290-700),1290,1);
            document.getElementById("srect").innerHTML = '<text x="50%" y="85%" font-family="Arial" font-size="10px" fill="'+colortext+'" onclick="prevs();">Previous</text><text x="80%" y="85%" font-family="Arial" font-size="10px" fill="'+colortext+'" onclick="nexts();">Next</text><text onclick="changemaps(0);" x="10%" y="40%" font-family="Arial" font-size="12px" fill="'+colortext+'">&#8226; B2</text><text onclick="changemaps(1);" x="10%" y="50%" font-family="Arial" font-size="12px" fill="'+colortext+'">&#8226; B1</text><text onclick="changemaps(2);" x="10%" y="60%" font-family="Arial" font-size="12px" fill="'+colortext+'">&#8226; LG</text><text onclick="changemaps(3);" x="10%" y="70%" font-family="Arial" font-size="12px" fill="'+colortext+'">&#8226; GF</text><rect style="fill-opacity:1;" x="45%" y="20%" height="2" width="15" fill="'+colormenuon+'"></rect><rect style="fill-opacity:0.3;" x="55%" y="20%" height="2" width="15" fill="'+colormenuoff+'"></rect><rect style="fill-opacity:0.3;" x="65%" y="20%" height="2" width="15" fill="'+colormenuoff+'"></rect><rect style="fill-opacity:0.3;" x="75%" y="20%" height="2" width="15" fill="'+colormenuoff+'"></rect><rect style="fill-opacity:0.3;" x="85%" y="20%" height="2" width="15" fill="'+colormenuoff+'"></rect>';
        }

        function nexts(){
            if(menu != 4){
                menu++;
            }else{
                menu=0;
            }
            menus();
        }

        function prevs(){
            if(menu != 0){
                menu--;
            }else{
                menu=4;
            }
            menus();
        }

        function changemaps(a){
            var floor = 'b2';
            if(a == 0){
                document.getElementById('mps').setAttribute('href', "peta/b2.png");
                // document.getElementById('location').value = 'b2';
                floor = 'b2';                
            }else if(a == 1){
                document.getElementById('mps').setAttribute('href', "peta/b1.png");
                // document.getElementById('location').value = 'b1';
                floor = 'b1';
            }else if(a == 2){
                document.getElementById('mps').setAttribute('href', "peta/Lower Ground.png");
                // document.getElementById('location').value = 'lg';
                floor = 'lg';
            }else if(a == 3){
                document.getElementById('mps').setAttribute('href', "peta/Ground Mall.png");
                // document.getElementById('location').value = 'gf';
                floor = 'gf';
            }

            else if(a == 4){
                document.getElementById('mps').setAttribute('href', "peta/Upper Ground.png");
                // document.getElementById('location').value = 'ug';
                floor = 'ug';
            }else if(a == 5){
                document.getElementById('mps').setAttribute('href', "peta/1st Floor.png");
                // document.getElementById('location').value = '1stFloor';
                floor = '1stFloor';
            }else if(a == 6){
                document.getElementById('mps').setAttribute('href', "peta/MSCP 1A.png");
                // document.getElementById('location').value = 'MSCP 1A';
                floor = 'MSCP 1A';
            }else if(a == 7){
                document.getElementById('mps').setAttribute('href', "peta/2st Floor.png");
                // document.getElementById('location').value = '2st Floor';
                floor = '2st Floor';
            }

            else if(a == 8){
                document.getElementById('mps').setAttribute('href', "peta/MSCP 2.png");
                // document.getElementById('location').value = 'MSCP 2A';
                floor = 'MSCP 2A';
            }else if(a == 9){
                document.getElementById('mps').setAttribute('href', "peta/MSCP 2A.png");
                // document.getElementById('location').value = 'MSCP 2B';
                floor = 'MSCP 2B';
            }else if(a == 10){
                document.getElementById('mps').setAttribute('href', "peta/3st Floor.png");
                // document.getElementById('location').value = '3st Floor';
                floor = '3st Floor';
            }else if(a == 11){
                document.getElementById('mps').setAttribute('href', "peta/MSCP 3.png");
                // document.getElementById('location').value = 'MSCP 3A';
                floor = 'MSCP 3A';
            }

            else if(a == 12){
                document.getElementById('mps').setAttribute('href', "peta/MSCP 3A.png");
                // document.getElementById('location').value = 'MSCP 3B';
                floor = 'MSCP 3B';
            }else if(a == 13){
                document.getElementById('mps').setAttribute('href', "peta/MSCP 4.png");
                // document.getElementById('location').value = 'MSCP 4';
                floor = 'MSCP 4';
            }else if(a == 14){
                document.getElementById('mps').setAttribute('href', "peta/MSCP 4A.png");
                // document.getElementById('location').value = 'MSCP 4A';
                floor = 'MSCP 4A';
            }else if(a == 15){
                document.getElementById('mps').setAttribute('href', "peta/MSCP 4B.png");
                // document.getElementById('location').value = 'MSCP 4B';
                floor = 'MSCP 4B';
            }

            else if(a == 16){
                document.getElementById('mps').setAttribute('href', "peta/Lift.png");
                // document.getElementById('location').value = 'Lift';
                floor = 'Lift';
            }else if(a == 17){
                document.getElementById('mps').setAttribute('href', "peta/MO P5.png");
                // document.getElementById('location').value = 'MO P5';
                floor = 'MO P5';
            }else if(a == 18){
                document.getElementById('mps').setAttribute('href', "peta/MO P6.png");
                // document.getElementById('location').value = 'MO P6';
                floor = 'MO P6';
            }
            else{
                document.getElementById('mps').setAttribute('href', "");
                document.getElementById('location').value = '';
                floor = '';
            }
            var div = document.getElementById('maps');
            $.ajax({
                type: 'GET',
                url: window.location.origin+"/floor/"+floor,
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
                                div.innerHTML += '<circle id="c1'+index+'" fill="transparent" stroke="#21de54" stroke-width="0.5" cx="'+x+'" cy="'+y+'" r="10"><animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="1" /></circle><circle id="c2'+index+'" fill="transparent" stroke="#21de54" stroke-width="0.5" cx="'+x+'" cy="'+y+'" r="8"><animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="0" /></circle><circle  id="c3'+index+'" cx="'+x+'" cy="'+y+'" r="6" fill="#21de54" onmouseover="inmouse(\'Name: '+data[i]['name']+'\',\''+index+'\')" onmouseout="outmouse(\''+index+'\')"></circle><svg width="300" height="150" x="'+(x+15)+'" y="'+(y+15)+'"  id="pop'+index+'" visibility="hidden"><image width="100%" height="100%" margin="0px" xlink:href="asset/rectpop.svg"></image><text id="text'+index+'" visibility="hidden" x="10" y="25" font-family="Arial" font-size="18" fill="'+colortext+'"></text></svg>';
                                index++;
                            }else if(data[i]['type'] == 'cctv'){
                                var x = data[i]['x_axis'];
                                var y = data[i]['y_axis'];
                                div.innerHTML += '<circle id="c1'+index+'" fill="transparent" stroke="#db2525" stroke-width="0.5" cx="'+x+'" cy="'+y+'" r="10"><animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="1" /></circle><circle id="c2'+index+'" fill="transparent" stroke="#db2525" stroke-width="0.5" cx="'+x+'" cy="'+y+'" r="8"><animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="0" /></circle><circle  id="c3'+index+'" cx="'+x+'" cy="'+y+'" r="6" fill="#db2525" onmouseover="inmouse(\'Name: '+data[i]['name']+'\',\''+index+'\')" onmouseout="outmouse(\''+index+'\')"></circle><svg width="300" height="150" x="'+(x+15)+'" y="'+(y+15)+'"  id="pop'+index+'" visibility="hidden"><image width="100%" height="100%" margin="0px" xlink:href="asset/rectpop.svg"></image><text id="text'+index+'" visibility="hidden" x="10" y="25" font-family="Arial" font-size="18" fill="'+colortext+'"></text></svg>';
                                index++;
                            }else if(data[i]['type'] == 'pc'){
                                var x = data[i]['x_axis'];
                                var y = data[i]['y_axis'];
                                div.innerHTML += '<circle id="c1'+index+'" fill="transparent" stroke="#f79545" stroke-width="0.5" cx="'+x+'" cy="'+y+'" r="10"><animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="1" /></circle><circle id="c2'+index+'" fill="transparent" stroke="#f79545" stroke-width="0.5" cx="'+x+'" cy="'+y+'" r="8"><animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="0" /></circle><circle  id="c3'+index+'" cx="'+x+'" cy="'+y+'" r="6" fill="#f79545" onmouseover="inmouse(\'Name: '+data[i]['name']+'\',\''+index+'\')" onmouseout="outmouse(\''+index+'\')"></circle><svg width="300" height="150" x="'+(x+15)+'" y="'+(y+15)+'"  id="pop'+index+'" visibility="hidden"><image width="100%" height="100%" margin="0px" xlink:href="asset/rectpop.svg"></image><text id="text'+index+'" visibility="hidden" x="10" y="25" font-family="Arial" font-size="18" fill="'+colortext+'"></text></svg>';
                                index++;
                            }else if(data[i]['type'] == 'wifi'){
                                var x = data[i]['x_axis'];
                                var y = data[i]['y_axis'];
                                div.innerHTML += '<circle id="c1'+index+'" fill="transparent" stroke="#f0e62b" stroke-width="0.5" cx="'+x+'" cy="'+y+'" r="10"><animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="1" /></circle><circle id="c2'+index+'" fill="transparent" stroke="#f0e62b" stroke-width="0.5" cx="'+x+'" cy="'+y+'" r="8"><animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="0" /></circle><circle  id="c3'+index+'" cx="'+x+'" cy="'+y+'" r="6" fill="#f0e62b" onmouseover="inmouse(\'Name: '+data[i]['name']+'\',\''+index+'\')" onmouseout="outmouse(\''+index+'\')"></circle><svg width="300" height="150" x="'+(x+15)+'" y="'+(y+15)+'"  id="pop'+index+'" visibility="hidden"><image width="100%" height="100%" margin="0px" xlink:href="asset/rectpop.svg"></image><text id="text'+index+'" visibility="hidden" x="10" y="25" font-family="Arial" font-size="18" fill="'+colortext+'"></text></svg>';
                                index++;
                            }
                        }
                    }
                }
            });
        }

        function menus(){
            if(menu == 0){
                document.getElementById("srect").innerHTML = '<text x="50%" y="85%" font-family="Arial" font-size="10px" fill="'+colortext+'" onclick="prevs();">Previous</text><text x="80%" y="85%" font-family="Arial" font-size="10px" fill="'+colortext+'" onclick="nexts();">Next</text><text onclick="changemaps(0);" x="10%" y="40%" font-family="Arial" font-size="12px" fill="'+colortext+'">&#8226; B2</text><text onclick="changemaps(1);" x="10%" y="50%" font-family="Arial" font-size="12px" fill="'+colortext+'">&#8226; B1</text><text onclick="changemaps(2);" x="10%" y="60%" font-family="Arial" font-size="12px" fill="'+colortext+'">&#8226; LG</text><text onclick="changemaps(3);" x="10%" y="70%" font-family="Arial" font-size="12px" fill="'+colortext+'">&#8226; GF</text><rect style="fill-opacity:1;" x="45%" y="20%" height="2" width="15" fill="'+colormenuon+'"></rect><rect style="fill-opacity:0.3;" x="55%" y="20%" height="2" width="15" fill="'+colormenuoff+'"></rect><rect style="fill-opacity:0.3;" x="65%" y="20%" height="2" width="15" fill="'+colormenuoff+'"></rect><rect style="fill-opacity:0.3;" x="75%" y="20%" height="2" width="15" fill="'+colormenuoff+'"></rect><rect style="fill-opacity:0.3;" x="85%" y="20%" height="2" width="15" fill="'+colormenuoff+'"></rect>';
            }else if(menu == 1){
                document.getElementById("srect").innerHTML = '<text x="50%" y="85%" font-family="Arial" font-size="10px" fill="'+colortext+'" onclick="prevs();">Previous</text><text x="80%" y="85%" font-family="Arial" font-size="10px" fill="'+colortext+'" onclick="nexts();">Next</text><text onclick="changemaps(4);" x="10%" y="40%" font-family="Arial" font-size="12px" fill="'+colortext+'">&#8226; UG</text><text onclick="changemaps(5);" x="10%" y="50%" font-family="Arial" font-size="12px" fill="'+colortext+'">&#8226; First Floor</text><text onclick="changemaps(6);" x="10%" y="60%" font-family="Arial" font-size="12px" fill="'+colortext+'">&#8226; 1A</text><text onclick="changemaps(7);" x="10%" y="70%" font-family="Arial" font-size="12px" fill="'+colortext+'">&#8226; Second Floor</text><rect style="fill-opacity:0.3;" x="45%" y="20%" height="2" width="15" fill="'+colormenuoff+'"></rect><rect style="fill-opacity:1;" x="55%" y="20%" height="2" width="15" fill="'+colormenuon+'"></rect><rect style="fill-opacity:0.3;" x="65%" y="20%" height="2" width="15" fill="'+colormenuoff+'"></rect><rect style="fill-opacity:0.3;" x="75%" y="20%" height="2" width="15" fill="'+colormenuoff+'"></rect><rect style="fill-opacity:0.3;" x="85%" y="20%" height="2" width="15" fill="'+colormenuoff+'"></rect>';
            }else if(menu == 2){
                document.getElementById("srect").innerHTML = '<text x="50%" y="85%" font-family="Arial" font-size="10px" fill="'+colortext+'" onclick="prevs();">Previous</text><text x="80%" y="85%" font-family="Arial" font-size="10px" fill="'+colortext+'" onclick="nexts();">Next</text><text onclick="changemaps(8);" x="10%" y="40%" font-family="Arial" font-size="12px" fill="'+colortext+'">&#8226; 2A</text><text onclick="changemaps(9);" x="10%" y="50%" font-family="Arial" font-size="12px" fill="'+colortext+'">&#8226; 2B</text><text onclick="changemaps(10);" x="10%" y="60%" font-family="Arial" font-size="12px" fill="'+colortext+'">&#8226; Level 3</text><text onclick="changemaps(11);" x="10%" y="70%" font-family="Arial" font-size="12px" fill="'+colortext+'">&#8226; Level Roof 3A</text><rect style="fill-opacity:0.3;" x="45%" y="20%" height="2" width="15" fill="'+colormenuoff+'"></rect><rect style="fill-opacity:0.3;" x="55%" y="20%" height="2" width="15" fill="'+colormenuoff+'"></rect><rect style="fill-opacity:1;" x="65%" y="20%" height="2" width="15" fill="'+colormenuon+'"></rect><rect style="fill-opacity:0.3;" x="75%" y="20%" height="2" width="15" fill="'+colormenuoff+'"></rect><rect style="fill-opacity:0.3;" x="85%" y="20%" height="2" width="15" fill="'+colormenuoff+'"></rect>';
            }else if(menu == 3){
                document.getElementById("srect").innerHTML = '<text x="50%" y="85%" font-family="Arial" font-size="10px" fill="'+colortext+'" onclick="prevs();">Previous</text><text x="80%" y="85%" font-family="Arial" font-size="10px" fill="'+colortext+'" onclick="nexts();">Next</text><text onclick="changemaps(12);" x="10%" y="40%" font-family="Arial" font-size="12px" fill="'+colortext+'">&#8226; Level 3B</text><text onclick="changemaps(13);" x="10%" y="50%" font-family="Arial" font-size="12px" fill="'+colortext+'">&#8226; Level 4</text><text onclick="changemaps(14);" x="10%" y="60%" font-family="Arial" font-size="12px" fill="'+colortext+'">&#8226; Level 4A</text><text onclick="changemaps(15);" x="10%" y="70%" font-family="Arial" font-size="12px" fill="'+colortext+'">&#8226; Level 4B</text><rect style="fill-opacity:0.3;" x="45%" y="20%" height="2" width="15" fill="'+colormenuoff+'"></rect><rect style="fill-opacity:0.3;" x="55%" y="20%" height="2" width="15" fill="'+colormenuoff+'"></rect><rect style="fill-opacity:0.3;" x="65%" y="20%" height="2" width="15" fill="'+colormenuoff+'"></rect><rect style="fill-opacity:1;" x="75%" y="20%" height="2" width="15" fill="'+colormenuon+'"></rect><rect style="fill-opacity:0.3;" x="85%" y="20%" height="2" width="15" fill="'+colormenuoff+'"></rect>';
            }else if(menu == 4){
                document.getElementById("srect").innerHTML = '<text x="50%" y="85%" font-family="Arial" font-size="10px" fill="'+colortext+'" onclick="prevs();">Previous</text><text x="80%" y="85%" font-family="Arial" font-size="10px" fill="'+colortext+'" onclick="nexts();">Next</text><text onclick="changemaps(16);" x="10%" y="40%" font-family="Arial" font-size="12px" fill="'+colortext+'">&#8226; Lift</text><text onclick="changemaps(17);" x="10%" y="50%" font-family="Arial" font-size="12px" fill="'+colortext+'">&#8226; MO P5</text><text onclick="changemaps(18);" x="10%" y="60%" font-family="Arial" font-size="12px" fill="'+colortext+'">&#8226; MO P6</text><rect style="fill-opacity:0.3;" x="45%" y="20%" height="2" width="15" fill="'+colormenuoff+'"></rect><rect style="fill-opacity:0.3;" x="55%" y="20%" height="2" width="15" fill="'+colormenuoff+'"></rect><rect style="fill-opacity:0.3;" x="65%" y="20%" height="2" width="15" fill="'+colormenuoff+'"></rect><rect style="fill-opacity:0.3;" x="75%" y="20%" height="2" width="15" fill="'+colormenuoff+'"></rect><rect style="fill-opacity:1;" x="85%" y="20%" height="2" width="15" fill="'+colormenuon+'"></rect>';
            }
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
                div.value = '0';
                document.getElementById('hibob').setAttribute('href', "asset/hibob1.png");
                document.getElementById("hibobrect").innerHTML = '<text x="25%" y="58%" font-family="Arial" font-weight="bold" font-size="60px" fill="'+colortext+'" ></text><text x="32%" y="75%" font-family="Arial" font-size="16px" fill="'+colortext+'">Total Staff</text>';
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
                document.getElementById("wifirect").innerHTML = '<text id="wificount1" x="20%" y="55%" font-family="Arial" font-size="55px" fill="'+colortext+'" font-weight="bold"></text><text x="33%" y="83%" font-family="Arial" font-size="9px" fill="'+colortext+'">Gandaria City Mall</text><text x="37%" y="93%" font-family="Arial" font-size="15px" fill="'+colortext+'">Wifi Unifi</text>';
                // counter("wificount1",parseInt(1000-700),1000,1);
            }
        }

        function pcclick(){
            var div = document.getElementById('pcstatus');
            if(div.value == '0'){
                div.value = '1';
                document.getElementById('pc').setAttribute('href', "asset/pc2.png");
                document.getElementById("pcrect").innerHTML = '<text x="22%" y="25%" font-family="Arial" font-size="14px" fill="'+colortext+'">Gandaria City Mall</text><text id="pccount" x="23%" y="58%" font-family="Arial" font-size="50px" fill="'+colortext+'" font-weight="bold"></text><text x="30%" y="75%" font-family="Arial" font-size="10px" fill="'+colortext+'">Gate Away Number</text><text x="39%" y="85%" font-family="Arial" font-size="15px" fill="'+colortext+'">'+currentHours+' : '+currentMinutes+'</text>';
                // counter("pccount",parseInt(900-700),900,1);
            }else{
                div.value = '0';
                document.getElementById('pc').setAttribute('href', "asset/pc1.png");
                document.getElementById("pcrect").innerHTML = '<text x="22%" y="25%" font-family="Arial" font-size="14px" fill="'+colortext+'">Gandaria City Mall</text><text id="pccount" x="23%" y="58%" font-family="Arial" font-size="50px" fill="'+colortext+'" font-weight="bold"></text><text x="33%" y="75%" font-family="Arial" font-size="10px" fill="'+colortext+'">People Counting</text><text x="39%" y="85%" font-family="Arial" font-size="15px" fill="'+colortext+'">'+currentHours+' : '+currentMinutes+'</text>';
                // counter("pccount",parseInt(1200-700),1200,1);
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
    </script>

    <!-- string vlc -->
</body>
</html>