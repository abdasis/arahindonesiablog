@extends('layouts.app')

@section('content')
<div class="container-fluid" style="margin-top: 100px">
    <form action="{{ route('posts.update', $post->slug) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-12">
                @if (Session::has('status'))
                    <div class="alert alert-success">{{ Session::get('status') }}</div>
                @endif
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Tambah Artikel</h3>

                        <div class="form-group">
                            <label for="">Judul Artikel</label>
                            <input type="text" value="{{ $post->judul_artikel }}" class="form-control" placeholder="Masukan Judul Artikel" name="judul_artikel">
                        </div>

                        <div class="form-group">
                            <label for="">Isi Artikel</label>
                            <textarea name="isi_artikel" placeholder="Tulis isi artikel disini" id="editor1" rows="10" cols="80">
                                {{ $post->isi_artikel }}
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Option</h3>
                        <div class="form-group">
                            <button class="btn btn-block btn-info"><i class="fa fa-paper-plane mr-1"></i>Simpan Artikel</button>
                        </div>

                        <div class="form-group">
                            <label>Pilih Status</label>
                            <select id="status_artikel" name="status_artikel" class="form-control">
                                <option {{ $post->status_artikel == 'Drafted' ? 'selected' : '' }} value="Dafted">Drafted</option>
                                <option {{ $post->status_artikel == 'Published' ? 'selected' : '' }} value="Published">Published</option>
                                <option {{ $post->status_artikel == 'Featured' ? 'selected' : '' }} value="Featured">Featured</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Pilih Kategori</label>
                            <select id="status_artikel" name="kategori_artikel" class="form-control">
                                <option value="">Pilih Kategori</option>
                                <option {{ $post->kategori_artikel == 'ReactJS' ? 'selected' : '' }} value="ReactJS">ReactJS</option>
                                <option {{ $post->kategori_artikel == 'PHP Programing' ? 'selected' : '' }} value="PHP Programing">PHP Programing</option>
                                <option {{ $post->kategori_artikel == 'Laravel' ? 'selected' : '' }} value="Laravel">Laravel</option>
                                <option {{ $post->kategori_artikel == 'Bootstrap' ? 'selected' : '' }} value="Bootstrap">Bootstrap</option>
                                <option {{ $post->kategori_artikel == 'JQuery' ? 'selected' : '' }} value="JQuery">JQuery</option>
                            </select>
                        </div>

                        <div class="form-group mb-0">
                            <label>Tambah Featured Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="thumbnail_artikel" id="inputGroupFile04">
                                    <label class="custom-file-label" for="inputGroupFile04">Pilih Gambar</label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('js')
<script src="https://cdn.tiny.cloud/1/3kubek8r1p1mz4kvit7hc1z2mxd8wgg551cbeu82qkmenprf/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
$(document).ready(function() {
    tinymce.init({
        selector: "textarea",
        height : "480",
        plugins: "nonbreaking",
        nonbreaking_force_tab: true,
        toolbar: "nonbreaking",
        relative_urls: false,
        paste_data_images: true,
        image_title: true,
        statusbar: false,
        automatic_uploads: true,
        images_upload_url: "/posts/upload",
        file_picker_types: "image",
        codesample_global_prismjs: true,
        image_class_list: [
            {title: 'Full width', value: 'img-fluid img-responsive img-thumbnail'},
            {title: 'Bootstrap', value: 'w-100'},
        ],
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern code",
            "codesample"
        ],
        toolbar1:
            "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | codesample bullist numlist outdent indent | link image",
        // override default upload handler to simulate successful upload
        file_picker_callback: function(cb, value, meta) {
            var input = document.createElement("input");
            input.setAttribute("type", "file");
            input.setAttribute("accept", "image/*");
            input.onchange = function() {
                var file = this.files[0];
                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function() {
                    var id = "blobid" + new Date().getTime();
                    var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(",")[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);
                    cb(blobInfo.blobUri(), { title: file.name });
                };
            };
            input.click();
        }
    });
});
</script>

@endsection
