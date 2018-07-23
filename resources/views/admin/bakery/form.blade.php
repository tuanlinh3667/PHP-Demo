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
    <h1>Create New Bakery</h1>
    <ul>
        <li>
            <a href="/admin/bakery/create">Create New</a>
        </li>
        <li>
            <a href="/admin/bakery/list">List Bakery</a>
        </li>
    </ul>
    <form action="{{$action}}" method="post">
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{$bakery -> id}}">
        <div>
            <label>Name</label>
            <input type="text" name="name" value="{{$bakery -> name}}">
        </div>
        <div>
            <label>Category</label>
            <select name="categoryId" value="{{$bakery -> categoryId}}">
                <option value="1">Bánh mặn</option>
                <option value="2">Bánh ngọt</option>
                <option value="3">Bánh kem</option>
            </select>
        </div>
        <div>
            <label>Price</label>
            <input type="text" name="price" value="{{$bakery -> price}}">
        </div>
        <div>
            <label>Description</label>
            <input type="text" name="description" value="{{$bakery -> description}}">
        </div>
        <div>
            <label>Image</label>
            <input type="text" name="images" value="{{$bakery -> images}}">
        </div>
        <div>
            <label>Detail</label>
            <textarea name="content" cols="30" rows="10">{{$bakery -> content}}</textarea>
        </div>
        <div>
            <label>Note</label>
            <input type="text" name="note" value="{{$bakery -> note}}">
        </div>
        <div>
            <input type="submit" value="Save">
            <input type="reset" value="Reset">
        </div>
    </form>
</body>
</html>