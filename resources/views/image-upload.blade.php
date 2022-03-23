<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Laravel Image Upload</title>
    <style>
        .container {
            max-width: 500px;
        }
        dl, ol, ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        .imgPreview img {
            padding: 8px;
            max-width: 100px;
        }
        .img-thumbnail{
  width:100%;
  height:100px;
  object-fit: cover;
  object-position: center;
  margin:10px;
}

@media(max-width: 480px) {
  .img-thumbnail{
    height:50px;
  }
}
    </style>
</head>
<body>
<div class="container">
  <h3 class="page-header">Upload Photos Page</h3>

  <form class="form-horizontal">
    <div class="form-group">
      <label for="photo" class="col-sm-2 control-label">Upload</label>
      <div class="col-sm-10">
        <input type="file" class="form-control" name="photo" id="photo" accept=".png, .pdf, .jpg, .jpeg" onchange="readFile(this);" multiple>
      </div>
    </div>
  </form>

  <div id="status"></div>
  <div id="photos" class="row"></div>
</div>

<script>
	function readFile(input) {
  	$("#status").html('Processing...');
    counter = input.files.length;
		for(x = 0; x<counter; x++){
			if (input.files && input.files[x]) {

				var reader = new FileReader();

				reader.onload = function (e) {
        	$("#photos").append('<div class="col-md-3 col-sm-3 col-xs-3"><img src="'+e.target.result+'" class="img-thumbnail"></div>');
				};

				reader.readAsDataURL(input.files[x]);
			}
    }
    if(counter == x){$("#status").html('');}
  }
</script>
</body>
</html>
