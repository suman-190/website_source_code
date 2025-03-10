@extends('backend.layout.master')
@section('title', 'Edit-Post')
@section('main-content')

<div class="container-fluid  dashboard-content">

    <form action="{{ route('post.update', $data['id']) }}" id="" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="row">
        <div class="col-md-8 col-12">
            <div class="card">
                <h5 class="card-header">Add post</h5>
                @error('name')
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
                @error('email')
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                @error('phone')
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                @error('password')
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
                @error('role')
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        <strong>{{ session('status') }}</strong>
                    </div>
                @endif
                <div class="card-body">
                        <div class="form-group">
                            <label for="catname">Post Title</label>
                            <input type="text" value="{{$data['post_title']}}"  name="post_title" class="form-control" id="catname12" placeholder="post_title">
                        </div>
                        <div class="form-group">
                            <label for="catname">Sub Title or Export</label>
                            <input type="text" name="post_export" value="{{$data['post_export']}}" class="form-control" id="catname12" placeholder="post_export">
                        </div>
                        <div class="form-group">
                            <label for="catname">Choose Image</label>
                            <input type="file" name="post_images" class="form-control" id="catname12" placeholder="post_images">
                        </div>
                        <div class="form-group">
                            <label for="catname">Author</label>
                            <?php
                                $users = DB::table('users')->where('role','user')
                                ->orwhere('role','Editor')
                                ->orwhere('role','Author')
                                ->orwhere('role','Admin')
                                ->get();
                            ?>
                            <select class="form-control" name="post_author">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ $data['post_author'] == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="catname"></label>
                            <textarea  type="text" name="post_content" class="form-control" id="summernote" placeholder="post_content"> {{$data['post_content']}} </textarea>
                        </div>
                        {{-- <section id='section-dropdown-tags'>
                                        <style contenteditable>
                                        .tags-look .tagify__dropdown__item{
                                        display: inline-block;
                                        border-radius: 3px;
                                        padding: .3em .5em;
                                        border: 1px solid #CCC;
                                        background: #F3F3F3;
                                        margin: .2em;
                                        font-size: .85em;
                                        color: black;
                                        transition: 0s;
                                        }

                                        .tags-look .tagify__dropdown__item--active{
                                        color: black;
                                        }

                                        .tags-look .tagify__dropdown__item:hover{
                                        background: lightyellow;
                                        border-color: gold;
                                        }
                                        </style>
                            <aside class='rightSide'>
                                <label for="catname">Tags</label>
                                <input name='post_tags'  class='tagify--custom-dropdown' placeholder='write some tags' value=''>
                                <p style="text-align: right">Separate tags with commas</p>
                            </aside>
                        </section> --}}
                        <div class="row pt-2">
                            <div class="col-sm-12 pl-0">
                                <p class="text-center">
                                    <button type="submit" name="submit" class="btn btn-space btn-primary">Publish</button>
                                    <a href="{{ url('/admin/post') }}" class="btn btn-space btn-danger"> Back </a>
                                </p>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="card">
                <h5 class="card-header">Publish</h5>
                <div class="tab-content  pl-3 pt-2" id="myTabContent">
                    <div class="tab-pane fade show active text-align form-new" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="form-group">
                                <input type="radio"  class="d-inline" name="post_status" value="active" id="publish" checked>
                                <label class="nested_label active" for="publish">Visibility: Public</label>
                            </div>
                            <div class="form-group">
                                <input type="radio"  class="d-inline"  name="post_status" value="inactive" id="draft">
                                <label class="nested_label" for="draft">Status: Draft</label>
                            </div>
                            {{-- <div class="form-group">
                                <input type="checkbox"  class="d-inline"  name="is_main" {{ $data['is_main'] == 1 ? 'checked' : '' }} value="1" id="is_main">
                                <label class="nested_label" for="is_main">Is Main</label>
                            </div> --}}
                            <hr>
                            {{-- <div class="form-group">
                                <input type="checkbox"  class="d-inline"  name="is_featured" {{ $data['is_main'] == 1 ? 'checked' : '' }} value="1" id="is_featured">
                                <label class="nested_label" for="is_featured">Is BREAKING</label>
                            </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>

</div>


@endsection
