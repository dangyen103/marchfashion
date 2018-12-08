<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <form action="{{ asset('test') }}" 
                method="POST"
                enctype="multipart/form-data">

                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <input type="file" name="image[]" multiple>

            <button type="submit">Save</button>
        </form>
    </div>
</body>
</html>