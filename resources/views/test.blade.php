<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="{{ asset('admin-assets/libs/fastselect/dist/fastselect.min.css') }}" rel="stylesheet">

</head>
<body>
    <div>
        {{-- <form action="{{ asset('test') }}" 
                method="POST"
                enctype="multipart/form-data">

                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <input type="file" name="image[]" multiple>

            <button type="submit">Save</button>
        </form> --}}

        <select class="multipleSelect" multiple name="language">
            <option value="Bangladesh">Bangladesh</option>
            <option selected value="Barbados">Barbados</option>
            <option selected value="Belarus">Belarus</option>
            <option value="Belgium">Belgium</option>
        </select>

    </div>

    <script src="{{ asset('admin-assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('admin-assets/libs/typeahead/dist/bloodhound.js') }}"></script>
    <script src="{{ asset('admin-assets/libs/typeahead/dist/typeahead.bundle.js') }}"></script>
    <script src="{{ asset('admin-assets/js/main.js') }}"></script>
</body>
</html>