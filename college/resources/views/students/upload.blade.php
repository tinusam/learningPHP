<h1>Upload File</h1>
<form action="uploadfile" METHOD="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file"> <br> <br>
    <button type="submit"> Upload File</button>

</form>

