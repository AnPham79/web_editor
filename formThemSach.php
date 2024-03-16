<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sách Mới</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .ck-editor__editable_inline {
            min-height: 250px;
            max-height: 450px;
        }
    </style>
</head>
<?php
if (isset($_POST['btnLuu'])) {
    echo "<xmp>";
    print_r($_POST);
}
?>

<body>
    <div class="m-auto border border-secondary p-2" style="width:800px">
        <form method="post" class="row" enctype='multipart/form-data'>
            <div class="mb-3 col-6">
                <label class="form-label">Tên Sách</label>
                <input name="tensach" placeholder="Nhập tên sách" class="form-control" type="text">
            </div>
            <div class="mb-3 col-6">
                <label class="form-label">Giá</label>
                <input name="gia" placeholder="Nhập giá" type="number" class="form-control">
            </div>
            <div class="mb-3 col-6">
                <label class="form-label">Hình</label>
                <input ondblclick="openPopup('hinh')" id="hinh" name="hinh" placeholder="Địa chỉ hình" type="text" class="form-control">
            </div>
            <div class="mb-3 col-6">
                <label class="form-label">Ngày nhập</label>
                <input name="ngay" type="date" class="form-control">
            </div>
            <div class="mb-3 col-6">
                <label class="form-label">Loại sách</label>
                <select name="loaisach" class="form-select">
                    <option selected> Sách lịch sử </option>
                    <option value="1">Văn học </option>
                    <option value="2">Nghệ thuật sống</option>
                    <option value="3">Học làm người</option>
                </select>
            </div>
            <div class="mb-3 col-6">
                <label class="form-label">Ẩn hiện</label>
                <div class="form-control">
                    <div class="form-check form-check-inline">
                        <input name="anhien" id="hien" value="1" class="form-check-input" type="radio">
                        <label class="form-check-label" for="hien">Hiện</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input name="anhien" id="an" value="0" class="form-check-input" type="radio">
                        <label class="form-check-label" for="an">Ẩn</label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <textarea id="mota" name="mota" rows="4" placeholder="Mô tả" class="form-control"></textarea>
            </div>
            <div class="text-center">
                <button name="btnLuu" type="submit" class="btn btn-primary py-1 px-5">Lưu dữ liệu</button>
                <button type="reset" class="btn btn-danger py-1 px-5">Xóa làm lại</button>
            </div>
        </form>
    </div>

    <script src="./ckeditor5/ckeditor.js"></script>
    <script>
        ClassicEditor.create(document.querySelector('#mota'), {
                language: 'vi',
                ckfinder: {
                    uploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
                },
                toolbar: {
                    items: [
                        'fontfamily', 'fontsize', '|',
                        'heading', '|',
                        'alignment', '|',
                        'fontColor', 'fontBackgroundColor', '|',
                        'bold', 'italic', 'underline', 'subscript', 'superscript', '|',
                        'link', '|',
                        'outdent', 'indent', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'code', 'codeBlock', '|',
                        'insertTable', '|',
                        'uploadImage', '|',
                        'ckfinder',
                        'undo', 'redo'
                    ],
                    shouldNotGroupWhenFull: true
                }
            })
            .then(editor => {})
            .catch(error => {
                console.error(error)
            });
    </script>
    <script src="./ckfinder_php_3.6.1/ckfinder/ckfinder.js"></script>
    <script>
        function openPopup(idobj) {
            CKFinder.popup({
                chooseFiles: true,
                onInit: function(finder) {
                    finder.on('files:choose', function(evt) {
                        var file = evt.data.files.first();
                        document.getElementById(idobj).value = file.getUrl();
                    });
                    finder.on('file:choose:resizedImage', function(evt) {
                        document.getElementById(idobj).value = evt.data.resizedUrl;
                    });
                }
            });
        }
    </script>
</body>

</html>