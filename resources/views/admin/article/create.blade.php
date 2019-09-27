<!-- Modal -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
                <div class="modal-body">
                <form action="{{ route('article.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                            <label for="">Title</label>
                            <input class="form-control{{ $errors->has('judul') ? ' is-invalid' : '' }}" type="text" name="judul" required>
                         @if ($errors->has('judul'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('judul') }}</strong>
                            </span>
                         @endif
                         </div>
                         <div class="form-group">
                            <label>Content</label>
                            <textarea id="editor1" rows="8" cols="30" type="text" name="konten" required></textarea>
                         @if ($errors->has('konten'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('konten') }}</strong>
                            </span>
                        @endif
                        </div>
                        @php
                            $category = \App\Category::all();
                        @endphp
                        <div class="form-group">
                            <label for="">Category</label>
                            <select name="kategori" class="form-control" required>
                                <option value="">- Choose Category -</option>
                                @foreach($category as $data)
                                    <option value="{{ $data->id }}">
                                        {{ $data->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @php
                            $tag = \App\Tag::all();
                        @endphp
                        <div class="form-group">
                            <label for="">Tag</label>
                            <select name="tag[]" id="select2" class="form-control multiple" required multiple>
                                <option value="">- Choose Tag -</option>
                                @foreach($tag as $data)
                                    <option value="{{ $data->id }}">
                                        {{ $data->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('tag'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tag') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" class="form-control" name="foto" required>
                            @if ($errors->has('foto'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('foto') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>