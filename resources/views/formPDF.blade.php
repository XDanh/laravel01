<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.5/sl-1.7.0/datatables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.5/sl-1.7.0/datatables.min.js"></script>

    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/dataTable.css">
</head>

<body>
    <form action="/api/upload" id="idForm" enctype="multipart/form-data">
        @csrf
        <input type="text" name="SO_HOA_DO">
        <input type="file" name="pdf[]" multiple>
        <button type="submit">submit</button>
    </form>
</body>
<script>
    $("#idForm").submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.

        var form = $(this)
        var actionUrl = form.attr('action')
        var formData = new FormData(this)
        $.ajax({
            type: "POST",
            url: actionUrl,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                console.log(data)


            }
        });
    });
</script>

</html>
