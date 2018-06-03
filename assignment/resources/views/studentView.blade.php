@extends('layouts.app')

@section('styles')
<!-- page specific styles here -->
@endsection

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="widget-box">
            <div class="widget-header widget-header-blue widget-header-flat">
                <h4 class="widget-title lighter">Student</h4>
            </div>

            <div class="widget-body">
                    <div class="widget-main">
                        <div class="profile-user-info profile-user-info-striped">
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Name </div>

                                <div class="profile-info-value">
                                    <span class="editable editable-click" id="username">{{ ($student->name)?  $student->name: '.............' }}</span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> Date Of Birth </div>

                                <div class="profile-info-value">
                                    <span class="editable editable-click" id="age">{{ ($student->dob)?  $student->dob: '.............' }}</span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> City </div>

                                <div class="profile-info-value">
                                    <i class="fa fa-map-marker light-orange bigger-110"></i>
                                    <span class="editable editable-click" id="city">{{ ($student->city)?  $student->city: '.............' }}</span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> Created at </div>

                                <div class="profile-info-value">
                                    <span class="editable editable-click" id="signup">{{ ($student->created_at)?  $student->created_at: '.............' }}</span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> Updated at </div>

                                <div class="profile-info-value">
                                    <span class="editable editable-click" id="login">{{ ($student->updated_at)?  $student->updated_at: '.............' }}</span>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer wizard-actions">
                        <a class="btn btn-sm btn-danger btn-prev" href="{{ route('student_delete', $student->id) }}">
                            <i class="ace-icon fa fa-trash"></i>
                            Delete
                        </a>

                        <a class="btn btn-warning btn-sm btn-next" href="{{ route('student_edit', $student->id) }}">
                            Edit
                            <i class="ace-icon fa fa-pencil icon-on-right"></i>
                        </a>

                        <a class="btn btn-info btn-sm pull-left" href="{{ route('home') }}">
                            <i class="ace-icon fa fa-backward"></i>
                            Back
                        </a>

                    </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<!-- page specific link script here -->

@endsection

@section('inlineScript')
<!-- page specific inline script here -->
<script type="text/javascript">

</script>
@endsection