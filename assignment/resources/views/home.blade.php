@extends('layouts.app')

@section('styles')
<!-- page specific styles here -->
@endsection

@section('content')
<div class="alert alert-block alert-success">
    <button type="button" class="close" data-dismiss="alert">
        <i class="ace-icon fa fa-times"></i>
    </button>

    <i class="ace-icon fa fa-check green"></i>

    Welcome to
    <strong class="green">
        {{ config('app.name', 'Laravel') }}
        @if (session('status'))
        <small>{{ session('status') }}</small>
        @endif
    </strong>
    You are logged in!
</div>


<div class="row">

    @can('isAdmin')
    <div class="col-xs-12">
        <div class="pull-right">
            <a class="btn btn-sm btn-primary" href="{{ route('student_add') }}">Add New Student</a>
        </div>
    </div>
    @endcan

    <div class="col-xs-12">
        <div class="widget-box widget-color-orange ui-sortable-handle" id="widget-box-1">
            <div class="widget-header">
                <h5 class="widget-title">Advance Filter</h5>
            </div>

            <div class="widget-body">
                <div class="widget-main">
                    <div class="right">
                        <form class="form-inline" method="GET" action="{{ url('/home/filter') }}">
                            @csrf
                            <select class="" id="filter" name="filter">
                                <option value="All Students" {{ ( $filter == 'All Students')? "selected": 'a' }}> All Students</option>
                                <option value="Older than 18" {{ ( $filter == 'Older than 18')? 'selected': '' }}> Older than 18</option>
                                <option value="Class 8 in 2010" {{ ( $filter == 'Class 8 in 2010')? 'selected': '' }}> Class 8 in 2010</option>
                                <option value="Older than 16 and who have parents older than 50" {{ ( $filter == 'Older than 16 and who have parents older than 50')? 'selected': '' }}> Older than 16
                                    and who have parents older than 50
                                </option>
                            </select>

                            <button class="btn btn-xs btn-success" type="submit">Filter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12">

        <table id="simple-table" class="table  table-bordered table-hover">
            <thead>
            <tr>
                <th>Name</th>
                <th>Date Of Birth</th>
                <th>City</th>
                <th>Class</th>
                <th class="detail-col">Parent Details</th>
                <th></th>
            </tr>
            </thead>

            <tbody>
            @foreach ($students as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $student->dob }}</td>
                <td>{{ $student->city }}</td>
                <td><a href="{{ route('class_view', $student->classMaster->id ) }}">{{ $student->classMaster->name }}</a></td>
                <td class="center">
                    <div class="action-buttons">
                        <a href="#" class="green bigger-140 show-details-btn" title="Show Details">
                            <i class="ace-icon fa fa-angle-double-down"></i>
                            <span class="sr-only">Details</span>
                        </a>
                    </div>
                </td>

                <td>
                    <div class="hidden-sm hidden-xs btn-group">
                        <a class="btn btn-xs btn-success" href="{{ route('student_view', $student->id) }}">
                            <i class="ace-icon fa fa-check bigger-120"></i>
                        </a>
                        @can('isAdmin')
                        <a class="btn btn-xs btn-info" href="{{ route('student_edit', $student->id) }}">
                            <i class="ace-icon fa fa-pencil bigger-120"></i>
                        </a>

                        <a href="{{ route('student_delete', $student->id) }}" class="btn btn-xs btn-danger" onclick="confirm('Do you need to delete this student ?')">
                            <i class="ace-icon fa fa-trash-o bigger-120"></i>
                        </a>
                        @endcan
                    </div>

                    <div class="hidden-md hidden-lg">
                        <div class="inline pos-rel">
                            <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown"
                                    data-position="auto">
                                <i class="ace-icon fa fa-cog icon-only bigger-110"></i>
                            </button>

                            <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                <li>
                                    <a href="{{ route('student_view', $student->id) }}" class="tooltip-info" data-rel="tooltip" title="View">
                                        <span class="blue">
                                            <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                        </span>
                                    </a>
                                </li>
                                @can('isAdmin')
                                <li>
                                    <a href="{{ route('student_edit', $student->id) }}" class="tooltip-success" data-rel="tooltip" title="Edit">
                                        <span class="green">
                                            <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                        </span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('student_delete', $student->id) }}" class="tooltip-error" data-rel="tooltip" title="Delete" onclick="confirm('Do you need to delete this student ?')">
                                        <span class="red">
                                            <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                        </span>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </div>
                    </div>
                </td>
            </tr>

            <tr class="detail-row">
                <td colspan="8">
                    @foreach ($student->parents as $parent)
                    <div class="itemdiv memberdiv">
                        <div class="body">
                            <div class="name">
                                <a href="#">{{ $parent->name }}</a>
                            </div>

                            <div class="time">
                                <i class="ace-icon fa fa-clock-o"></i>
                                <span class="green">{{ $parent->dob }}</span>
                            </div>

                            <div>

                                <div class="inline position-relative">
                                    <button class="btn btn-minier btn-yellow btn-no-border dropdown-toggle"
                                            data-toggle="dropdown" data-position="auto" aria-expanded="false">
                                        <i class="ace-icon fa fa-angle-down icon-only bigger-120"></i>
                                    </button>

                                    <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                        <li>
                                            <a href="#" class="tooltip-success" data-rel="tooltip" title=""
                                               data-original-title="View">
                                                <span class="green">
                                                    <i class="ace-icon fa fa-check bigger-110"></i>
                                                </span>
                                            </a>
                                        </li>

                                        @can('isAdmin')

                                        <li>
                                            <a href="#" class="tooltip-warning" data-rel="tooltip" title=""
                                               data-original-title="Edit">
                                                <span class="orange">
                                                    <i class="ace-icon fa fa-pencil bigger-110"></i>
                                                </span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#" class="tooltip-error" data-rel="tooltip" title=""
                                               data-original-title="Delete">
                                                <span class="red">
                                                    <i class="ace-icon fa fa-trash-o bigger-110"></i>
                                                </span>
                                            </a>
                                        </li>
                                        @endcan
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('script')
<!-- page specific link script here -->
@endsection

@section('inlineScript')
<!-- page specific inline script here -->
<script>
    jQuery(function ($) {
        /********************************/
        //add tooltip for small view action buttons in dropdown menu
        $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});

        //tooltip placement on right or left
        function tooltip_placement(context, source) {
            var $source = $(source);
            var $parent = $source.closest('table')
            var off1 = $parent.offset();
            var w1 = $parent.width();

            var off2 = $source.offset();
            //var w2 = $source.width();

            if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2)) return 'right';
            return 'left';
        }


        /***************/
        $('.show-details-btn').on('click', function (e) {
            e.preventDefault();
            $(this).closest('tr').next().toggleClass('open');
            $(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
        });
        /***************/


        /**
         //add horizontal scrollbars to a simple table
         $('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
         {
           horizontal: true,
           styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
           size: 2000,
           mouseWheelLock: true
         }
         ).css('padding-top', '12px');
         */

        $('.memberdiv').on('mouseenter touchstart', function () {
            var $this = $(this);
            var $parent = $this.closest('.tab-pane');

            var off1 = $parent.offset();
            var w1 = $parent.width();

            var off2 = $this.offset();
            var w2 = $this.width();

            var place = 'left';
            if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2)) place = 'right';

            $this.find('.popover').removeClass('right left').addClass(place);
        }).on('click', function (e) {
            e.preventDefault();
        });
    });
</script>
@endsection
