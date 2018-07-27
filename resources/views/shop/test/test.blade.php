@extends("shop.layouts.default")

@section("content")
<form action="" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="file" name="img">
    <input type="submit">
</form>
    @endsection