    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add your picture</h1>
                </div>
                <div class="modal-body">
                    <form action={{ route('gallery.store') }} method="POST" enctype="multipart/form-data">
                        @csrf
                        <img src={{ asset('ceweku/default.jpg') }} alt="avatar" class="img-pre w-50">
                        <div class="my-3">
                            <label for="formFile" class="form-label">Masukkan Gambar Anda</label>
                            <input class="form-control" type="file" name="picture" id="formFile"
                                onchange="getImg(event)">
                        </div>
                        @error('picture')
                            <p class="error"> {{ $message }} </p>
                        @enderror
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                style="height: 100px" name="caption"></textarea>
                            <label for="floatingTextarea2">Caption</label>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    @include('admin.script')
