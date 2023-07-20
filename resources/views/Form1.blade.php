<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="http://codeseven.github.io/toastr/build/toastr.min.js"></script>
  <link href="http://codeseven.github.io/toastr/build/toastr.min.css" rel="stylesheet"/>
</head>
<body>
    <h1>Create Post</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <form action="{{ route('customer.store') }}" method="POST" id="idForm">
            @csrf
            <div class="field">
                <label class="label">TenKH</label>
                <div class="control">
                    <input class="input" type="text" placeholder="e.g. barryallen@example.com" name="TenKH">
                </div>
                <p class="help is-danger">{{ $errors->first('TenKH') }}</p>
            </div>
            <div class="field">
                <label class="label">DiaChi</label>
                <div class="control">
                    <input class="input" type="text" placeholder="e.g. barryallen@example.com" name="DiaChi">
                </div>
                <p class="help is-danger">{{ $errors->first('DiaChi') }}</p>
            </div>
            <div class="field">
                <label class="label">MaThue</label>
                <div class="control">
                    <input class="input" type="text" placeholder="e.g. barryallen@example.com" name="MaThue">
                </div>
                <p class="help is-danger">{{ $errors->first('MaThue') }}</p>
            </div>
            <div class="field">
                <label class="label">MaBHXH</label>
                <div class="control">
                    <input class="input" type="text" placeholder="e.g. barryallen@example.com" name="MaBHXH">
                </div>
                <p class="help is-danger">{{ $errors->first('MaBHXH') }}</p>
            </div>
            <button class="btn btn-success" type="submit">submit</button>
        </form>
    </div>
</body>
<script>
    $("#idForm").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var actionUrl = form.attr('action');

    $.ajax({
            type: "POST",
            url: actionUrl,
            data: form.serialize(), // serializes the form's elements.
            success: function(data)
            {
                console.log(data.oke)
                if(data.oke){
                    toastr.success(data.oke)
                }else{
                    $.each(data, function(index,value){
                    toastr.error(value)
                });
                }

            }
        });
    });
</script>
</html>
