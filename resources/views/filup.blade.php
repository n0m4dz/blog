<form action="/admin/fileup/load" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="file" name="thumb">
    <input type="submit" value="send">
</form>