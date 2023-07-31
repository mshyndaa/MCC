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
            /* background-color:#11142C; */
            background-color:black;
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
            <td rowspan="2" style="width:60%;height:50%; padding : 0px;">
                <!-- <iframe width="100%" height="930px" id="cctv"></iframe> -->
                <img width="100%" height="100%" id="cctv" />
            </td>
        </tr>
    </table>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
        window.onload = (event) => {
            var link = <?php echo isset($Link) ? json_encode($Link):0; ?>;
            document.getElementById('cctv').src = link;
        };

        function reload(){
            var id = <?php echo isset($NewCCTV) ? json_encode($NewCCTV):0; ?>;
            $.ajax({
                type: 'GET',
                url: window.location.origin+"/cctv/"+id,
                beforeSend: function() {
                },
                success: function (response) {
                    if(response == 'Change'){
                        window.location.reload();
                    }
                }
            });
        }

        const firstInterval = setInterval(() => {
            reload();
        }, 2000);
    </script>
</body>
</html>