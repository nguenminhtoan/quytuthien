<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="/" method="POST" enctype='multipart/form-data'>
            @csrf
            <input class="form-control" multiple="" type="file" name="image" accept="image/jpeg,image/png,image/jpg,image/gif,image/tiff,image/svg" value="{{old('image')}}">
                                
            <button>submit</button>
        </form>
    </body>
</html>
