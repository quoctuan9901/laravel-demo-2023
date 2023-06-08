<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <button>Show</button>

    <ul></ul>

    <script src="{{ asset('jquery-3.6.4.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("button").click(function() {
                // $.get("http://localhost:8001/data-mobile", function(data) {
                    // var dataJson = JSON.parse(data);

                    // htmlContent = ""
                    // for(var k in dataJson) {
                    //     htmlContent += "<li>" + dataJson[k].name + "</li>";
                    // }

                    // $("ul").html(data)
                //})

                $.ajax({
                    type: "GET",
                    url: "http://localhost:8001/data-mobile",
                    dataType: "html",
                    success: function (response) {
                        $("ul").html(response)
                    }
                });
            })
        })
    </script>
</body>
</html>
