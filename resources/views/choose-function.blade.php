<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

    <select name="choose">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>

    <div id="content">{{ $data->migration }}</div>

    <script src="{{ asset('jquery-3.6.4.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("select[name='choose']").change(function() {
                var valueSelected = $(this).val();

                $.ajax({
                    type: "POST",
                    url: "http://localhost:8001/get-data-for-selected",
                    data: {"id": valueSelected},
                    dataType: "html",
                    success: function (response) {
                        $("#content").html(response)
                    }
                });
            })
        })




    </script>
</body>
</html>
