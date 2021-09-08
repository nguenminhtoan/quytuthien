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
        <style>
            img {
                width: 400px;
            }
            </style>
    </head>
    <body>
        <div id='filelist'>
            
        </div>
        <form action="/" method="POST" enctype='multipart/form-data' >
            @csrf
            <input class="form-control" id='file' multiple="multiple" type="file" name="image[]" accept="image/jpeg,image/png,image/jpg,image/gif,image/tiff,image/svg" value="{{old('image')}}">
                                
            <button>submit</button>
        </form>
    </body>
    <script>
        let fileInput = document.getElementById('file');
        let list = new DataTransfer();
        window.addEventListener("paste", function(e){
            var item = Array.from(e.clipboardData.items).find(x => /^image\//.test(x.type));

            var blob = item.getAsFile();

            var img = new Image();

            img.onload = function(){
                list.items.add(blob);
                document.body.appendChild(this); 
                fileInput.files = list.files;
            };

            img.src = URL.createObjectURL(blob);
        });
        
    </script>
</html>
