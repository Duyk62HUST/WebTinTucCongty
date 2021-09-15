@extends('back.templates.master')

@section('title', 'Xóa Tin')

@section('content')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
   body {
    background: rgb(99, 39, 120)
}

.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
}
    </style>
</head>
<body>
    <h1>Xóa tin</h1>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card-header"><a class="btn btn-block btn-danger ad_add" href="{{ url('/admin/slider/list') }}">Quay lại</a></div>

    <div class="container rounded bg-white mt-5 mb-5">
    <form action="{{ url('admin/slider/delete/'.$slider->id) }}" method="POST">
        @csrf
    <div class="row">
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Xóa Slide</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12"><label class="labels">Tên tin tức</label><input type="text" name="name" class="form-control" placeholder="" value="{{ $slider->name }}"></div>
                </div>
                
                <div>
                    <br>
                    <label for="">Trạng thái</label>
                    <br>
                    <select name="status" id="">
                        <option value="" placeholder="Trạng thái">---Trạng thái---</option>
                        <?php $check1 = ($slider->status == 1) ? "selected" : "";?>
                        <option {{ $check1 }} value="1">Bật</option>
                        <?php $check0 = ($slider->status == 0) ? "selected" : "";?>
                        <option {{ $check0 }} value="0">Tắt</option>
                    </select>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label for="">Ảnh đại diện</label><br>
                        @if($slider->images != NULL)
                        <img src=" {{ asset("/be-assets/img/slider/".$slider->images) }} " alt="">
                        @endif
                        <input type="file" name="images" id="">
                    </div>               
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Xóa</button></div>
            </div>
        </div>
    </div>
    </form>
</div>
</div>
</div>


</body>
</html>
@endsection