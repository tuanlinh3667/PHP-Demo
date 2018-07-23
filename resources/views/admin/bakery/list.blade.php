<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>List Bakery</h1>
    <ul>
        <li>
            <a href="/admin/bakery/create">Create New</a>
        </li>
        <li>
            <a href="/admin/bakery/list">List Bakery</a>
        </li>
    </ul>
    <ul>
        @foreach($bakeries_in_view as $item)
            <li>
                {{$item -> name}}
                <img src="{{$item -> images}}" alt="" style="width: 100px; border-radius: 50%">
                <a href="/admin/bakery/edit/{{$item -> id}}">Edit</a>&nbsp;&nbsp;
                <a href="/admin/bakery/delete/{{$item -> id}}">Delete</a>&nbsp;&nbsp;
                <span class="btn-delete" id="{{$item-> id}}">Delete With Ajax</span>
            </li>
        @endforeach
    </ul>
    <script>

        var listDeleteButton = document.getElementsByClassName('btn-delete');
        for (var i = 0; i < listDeleteButton.length; i++) {
            listDeleteButton[i].onclick = function () {
                if(confirm('Are you sure ?')){
                    var params = '_token={{csrf_token()}}';
                    var currentId = this.id;
                    var xhttp = new XMLHttpRequest();
                    xhttp.open("POST", "/admin/bakery/destroy/" + currentId, true);
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            alert('Delete success!');
                        }
                    };
                    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhttp.send(params);
                }
            }
        }
    </script>
</body>
</html>