@extends('layouts.meta')

@section('stylesheet')
    <link rel="stylesheet" href="{{asset('css/chosenCss/prism.css')}}">
    <link rel="stylesheet" href="{{asset('css/chosenCss/chosen.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}">
@endsection


@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="well">
                <h4> Post list</h4>
                <div class="table-fix">
                    <table class="table-edit" >
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Start date</th>
                                <th>Finish date</th>
                                <th>Action</th>
                            </tr>
                            @foreach($posts as $post)
                            <tr>
                                <td> {{$post->id}} </td>
                                <td> {{$post->title}} </td>
                                <td> {{$post->postType->name}} </td>
                                <td> {{$post->status}} </td>
                                <td> {{$post->startDate}} </td>
                                <td> {{$post->finishDate}} </td>
                                <td>
                                    <a href="{{route('post_delete',['id'=>$post->id])}}" class="btn btn-danger">X</a>
                                    <a href="{{route('post_edit',['id'=>$post->id])}}" class="btn btn-info">E</a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                </div>
            </div>
            <div class="text-center">
                {{$posts->links()}}
            </div>
        </div>
        <div class="col-md-4">
            <div class="well">
                @if(isset($postEditInfo)) 
                    <h4>Edit post</h4>
                @else
                    <h4>Create post</h4>
                @endif
                <form action="@if(isset($postEditInfo)) {{ route ('post_update',['id'=>$postEditInfo->id]) }} @else {{ route ('post_store') }}@endif" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" name="title" class="form-control" id="title" @if(isset($postEditInfo)) value="{{$postEditInfo->title}}" @endif>
                    </div>
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <input type="text" name="status" class="form-control" id="status" @if(isset($postEditInfo)) value="{{$postEditInfo->status}}" @endif>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" class="form-control" id="description" rows="3">
                            @if(isset($postEditInfo)) "{{$postEditInfo->description}}" @endif
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" accept="image/*" name="image" class="form-control" id="image" />
                    </div>
                    <div class="form-group">
                        <label for="">Type:</label>
                        <select name="type" size="1" class="chosen-select-type form-control"  data-placeholder="Choose a post type...">
                            <!-- Post types -->
                            @foreach($types as $type)
                                <option value="{{$type->id}}" >{{$type->name}}</option>
                            @endforeach
                            @if(isset($postEditInfo))
                                <option value="{{ $postEditInfo->postType->id }}" selected> {{ $postEditInfo->postType->name }} </option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Groups:</label>
                        <select name="groupId[]" size="1" class="chosen-select-group form-control"  data-placeholder="Choose group names..." multiple="multiple">
                            @foreach($groups as $group)
                                <option value="{{$group->id}}">{{$group->groupName}}</option>
                            @endforeach
                            @if(isset($postEditInfo))
                                @foreach($postEditInfo->group as $group)
                                    <option value="{{ $group->id }}" selected> {{ $group->groupName }} </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Members:</label>
                        <select name="memberId[]" size="1" class="chosen-select-member form-control"  data-placeholder="Choose members..." multiple="multiple">
                            @foreach($members as $member)
                                <option value="{{$member->id}}">{{$member->name}}</option>
                            @endforeach
                            @if(isset($postEditInfo))
                                @foreach($postEditInfo->member as $member)
                                    <option value="{{ $member->id }}" selected> {{ $member->name }} </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="startdate">Start date:</label>
                        <input type="text" name="startDate" class="form-control" id="startdate" @if(isset($postEditInfo)) value="{{$postEditInfo->startDate}}" @endif/>
                    </div>
                    <div class="form-group">
                        <label for="finishdate">Finish date:</label>
                        <input type="text" name="finishDate" class="form-control" id="finishdate" @if(isset($postEditInfo)) value="{{$postEditInfo->finishDate}}" @endif/>
                    </div>
                    <button type="submit" class="btn btn-default">
                    @if(isset($postEditInfo)) 
                        Save
                    @else
                        Create post
                    @endif
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


@section('javascript')
    <script src="{{asset('js/chosenJs/chosen.jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/chosenJs/prism.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{asset('js/jquery-ui.min.js')}}" type="text/javascript" charset="utf-8"></script>
    
    <script>
        $(document).ready(function () {
            var usedgroup = {};
            $(".chosen-select-group option").each(function () {
                if (usedNames[this.value] && !$(this).is(':selected')) {
                    $(this).remove();
                } else {
                    usedNames[this.value] = this.text;
                }
            });
        });
        </script>
        <script>
        $(document).ready(function () {
            var usedgroup = {};
            $(".chosen-select-member option").each(function () {
                if (usedNames[this.value] && !$(this).is(':selected')) {
                    $(this).remove();
                } else {
                    usedNames[this.value] = this.text;
                }
            });
        });
        </script>
        <script>
        $(".chosen-select-type").chosen({
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });

        $(".chosen-select-group").chosen({
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });

        $(".chosen-select-member").chosen({
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });

        
        $( "#startdate" ).datepicker({
            dateFormat: 'yy-mm-dd',
            inline: true,
            changeYear: true
        });
        
        $( "#finishdate" ).datepicker({
            dateFormat: 'yy-mm-dd',
            inline: true,
            changeYear: true
        });

    </script>
@endsection