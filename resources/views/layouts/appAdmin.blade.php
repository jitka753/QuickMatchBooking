<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
   
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="js/printThis.js"></script>

    <!-- datepicker-->
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles bootstrap-->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/table_style.css') }}" rel="stylesheet">



    <!-- script for radio button uncheck-->
    <script>
        // check if jQuery works   -  remove it from code !!!
        $(document).ready(function () {

            //toggle checkboxes in one line for one company - only one timeslot can be selected for one company
            $(".radio").click(function () {
                var x = $(this);
                //alert(x.prop('checked'));
                if (x.prop('checked')) {
                    var group = "input:checkbox[name='" + $(this).attr("name") + "']";
                    //alert(group);
                    $(group).prop("checked", "");
                    $(this).prop("checked", "checked");
                }
            });

        });
</script>


        <!-- check for duplicit values of timeslots in the form-->
    <script>
        function validateForm() {
            var list = [];
            var formLength = document.forms['myForm'].length;

            for (var i = 0; i < formLength; i++) {
                var radio = document.forms['myForm'][i].checked;
                if (radio) {
                    var x = document.forms['myForm'][i].value;
                    list.push(x);
                }
            }
            if ((new Set(list)).size == list.length) {
                return true;
            }
            alert("Sorry, you cannot have appointment with more companies in a same time.")
            return false;
        }
 </script>

</head>

<body>
    <div id="app">
        <main class="py-4">
            @include ('inc/navbar2')
            <div class='container'>
                @include ('inc.messages')
                @yield('content')
        </main>
    </div>
    </div>

</body>

</html>