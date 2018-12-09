@extends('layouts.meta')

@section('stylesheet')
    <link rel="stylesheet" href="{{asset('css/chosenCss/prism.css')}}">
    <link rel="stylesheet" href="{{asset('css/chosenCss/chosen.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
@endsection


@section('body')
@component('edit')
@endcomponent


<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="well">
                <h4> Publication list</h4>
                <table class="table-edit" >
                    <tr>
                        <th>Title</th>
                    </tr>
                    <tr>
                        <td>
                            @if(isset($data))
                                {{$data}}
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
            <div class="text-center">
            </div>
        </div>
        <div class="col-md-6">
            <div class="well">
                <form action="{{ route ('citation_store')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="referencetitle">Publication title:</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="name of the report"/>
                    </div>
                    <div class="form-group">
                        <label for="author">Authors:</label>
                        <select name="author[]" class="select2 form-control" id="author"  multiple="multiple" placeholder="first name last name,ex: md raihan uddin">
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="published">Year published:</label>
                        <input type="text" name="published" class="form-control" id="published" placeholder="ex:2018 "/>
                    </div>
                    <div class="form-group">
                        <label for="journal">Journal:</label>
                        <input type="text" name="journal" class="form-control" id="journal" placeholder="The name of the journal that the article was published in"/>
                    </div>
                    <div class="form-group">
                        <label for="volume">Volume no.:</label>
                        <input type="text" name="volume" class="form-control" id="volume" placeholder="The volume number of the journal"/>
                    </div>
                    <div class="form-group">
                        <label for="issue">Issue no.:</label>
                        <input type="text" name="issue" class="form-control" id="issue" placeholder="The issue number of the journal"/>
                    </div>
                    <div class="form-group">
                        <label for="pages">Pages used:</label>
                        <input type="text" name="pages" class="form-control" id="pages" placeholder="A single page, or range of pages that the information can be found on. Eg: 3-6"/>
                    </div>
                    <div class="form-group">
                        <label for="doi">DOI:</label>
                        <input type="text" name="doi" class="form-control" id="doi" placeholder="Eg. 10.1002/pbc.22619"/>
                    </div>
                    <div class="form-group">
                        <label for="database">Database:</label>
                        <input type="text" name="database" class="form-control" id="database" placeholder="The online journal database this journal is from. Eg: JSTOR"/>
                    </div>
                    <div class="form-group">
                        <label for="url">URL:</label>
                        <input type="text" name="url" class="form-control" id="url" placeholder="http://"/>
                    </div>
                    <div class="form-group">
                        <label for="date">Access date:</label>
                        <input type="text" name="date" class="form-control" id="date" placeholder="last viewed"/>
                    </div>
                    <button type="submit" class="btn btn-default">
                        <span>
                            <i class="fas fa-sync-alt"></i>
                        </span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


@section('javascript')
    <script src="{{asset('js/jquery-ui.min.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{asset('js/select2.min.js')}}" type="text/javascript" charset="utf-8"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                tags: true,
                tokenSeparators: [','],
                placeholder:'first name last name,ex: md raihan uddin'
            });
        });

        $( "#date" ).datepicker({
            dateFormat: 'yy-mm-dd',
            inline: true,
            changeYear: true
        });
    </script>
@endsection