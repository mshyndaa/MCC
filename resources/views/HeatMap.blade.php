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
    <svg version="1.1" id="Layer_1" xmlns:x="&ns_extend;" xmlns:i="&ns_ai;" xmlns:graph="&ns_graphs;"
        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1903 1000"
        xml:space="preserve" width="90%" height="90%">
        <g id="maps">
        </g>
        <image id="mps" overflow="visible" width="100%" height="100%" xlink:href="peta/b2.png">
        </image>
        <g id="maps2">
        </g>
    </svg>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
        var index = 0;

        window.onload = function(){
            var FloorID = <?php echo isset($FloorID) ? json_encode($FloorID):1; ?>;
            changemaps(FloorID);
        }

        function reload(){
            var FloorID = <?php echo isset($FloorID) ? json_encode($FloorID):1; ?>;
            changemaps(FloorID);
        }

        const firstInterval = setInterval(() => {
            reload();
        }, 2000);

        function changemaps(a){
            var idfloor = '';
            var div = document.getElementById('maps');
            var div2 = document.getElementById('maps2');
            $.ajax({
                type: 'GET',
                url: window.location.origin+"/heatdata/"+a,
                beforeSend: function() {

                },
                success: function (data) {
                    div.innerHTML = '';
                    div2.innerHTML = '';
                    if(data.length != 0){
                        document.getElementById('mps').setAttribute('href', 'http://mcc.pakuwon.com/'+data[0]['maps_img']);
                        for(var i = 0;i < data.length;i++){
                            var x = data[i]['x_axis'];
                            var y = data[i]['y_axis'];
                            var count = parseInt(data[i]['count']);
                            if(count > 0 && count <= 7){
                                var color = 'green';
                            }else if(count > 7 && count <= 15){
                                var color = 'yellow';
                            }else if(count > 15){
                                var color = 'red';
                            }else{
                                var color = 'green';
                            }
                            div.innerHTML += '<circle style="filter: blur(30px);" id="c1'+index+'" cx="'+x+'" cy="'+y+'" r="70" fill="'+color+'"></circle>';
                            div2.innerHTML += '<circle id="c1'+index+'" cx="'+x+'" cy="'+y+'" r="8" fill="#04d9ff"></circle>';
                            index++;
                        }
                    }
                }
            });
            
        }
    </script>
</body>
</html>