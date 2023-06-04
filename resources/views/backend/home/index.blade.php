@extends('backend.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
            <div class="page_title_left d-flex align-items-center">
                <h3 class="f_s_25 f_w_700 dark_text mr_30">Dashboard</h3>
                <ol class="breadcrumb page_bradcam mb-0">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
            <div class="page_title_right">
                <div class="page_date_button d-flex align-items-center">
                    <img src="{{ asset('backendAsset') }}/img/icon/calender_icon.svg" alt="">
                    August 1, 2023 - August 31, 2023
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row ">
    <div class="col-xl-12">
        <div class="white_card card_height_100 mb_30 user_crm_wrapper">
            <div class="row">
                <div class="col-lg-3">
                    <div class="single_crm">
                        <div
                            class="crm_head crm_bg_3 d-flex align-items-center justify-content-between">
                            <div class="thumb">
                                <img src="{{ asset('backendAsset') }}/img/crm/sqr.svg"
                                    alt="">
                            </div>
                            <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                        </div>
                        <div class="crm_body">
                            <h4>2455</h4>
                            <p>Employee</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single_crm">
                        <div class="crm_head d-flex align-items-center justify-content-between">
                            <div class="thumb">
                                <img src="{{ asset('backendAsset') }}/img/crm/businessman.svg"
                                    alt="">
                            </div>
                            <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                        </div>
                        <div class="crm_body">
                            <h4>2455</h4>
                            <p>Department</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single_crm ">
                        <div
                            class="crm_head crm_bg_1 d-flex align-items-center justify-content-between">
                            <div class="thumb">
                                <img src="{{ asset('backendAsset') }}/img/crm/customer.svg"
                                    alt="">
                            </div>
                            <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                        </div>
                        <div class="crm_body">
                            <h4>2455</h4>
                            <p>Designation</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single_crm">
                        <div
                            class="crm_head crm_bg_2 d-flex align-items-center justify-content-between">
                            <div class="thumb">
                                <img src="{{ asset('backendAsset') }}/img/crm/infographic.svg"
                                    alt="">
                            </div>
                            <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                        </div>
                        <div class="crm_body">
                            <h4>2455</h4>
                            <p>Shifts</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_body">
                                <div class="QA_section">
                                    <div class="white_box_tittle list_header">
                                        <h4>Employees</h4>
                                        <div class="box_right d-flex lms_block">
                                            <div class="serach_field_2">
                                                <div class="search_inner">
                                                    <form Active="#">
                                                        <div class="search_field">
                                                            <input type="text" placeholder="Search content here...">
                                                        </div>
                                                        <button type="submit"> <i class="ti-search"></i> </button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="add_button ms-2">
                                                <a href="#" data-toggle="modal" data-target="#addcategory" class="btn_1">Add New</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="QA_table mb_30">

                                        <table class="table lms_table_active3 ">
                                            <thead>
                                            <tr>
                                                <th scope="col">title</th>
                                                <th scope="col">Category</th>
                                                <th scope="col">Teacher</th>
                                                <th scope="col">Lesson</th>
                                                <th scope="col">Enrolled</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th scope="row"> <a href="#" class="question_content"> title here 1</a></th>
                                                <td>Category name</td>
                                                <td>Teacher James</td>
                                                <td>Lessons name</td>
                                                <td>16</td>
                                                <td>$25.00</td>
                                                <td><a href="#" class="status_btn">Active</a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"> <a href="#" class="question_content"> title here 1</a></th>
                                                <td>Category name</td>
                                                <td>Teacher James</td>
                                                <td>Lessons name</td>
                                                <td>16</td>
                                                <td>$25.00</td>
                                                <td><a href="#" class="status_btn">Active</a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"> <a href="#" class="question_content"> title here 1</a></th>
                                                <td>Category name</td>
                                                <td>Teacher James</td>
                                                <td>Lessons name</td>
                                                <td>16</td>
                                                <td>$25.00</td>
                                                <td><a href="#" class="status_btn">Active</a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"> <a href="#" class="question_content"> title here 1</a></th>
                                                <td>Category name</td>
                                                <td>Teacher James</td>
                                                <td>Lessons name</td>
                                                <td>16</td>
                                                <td>$25.00</td>
                                                <td><a href="#" class="status_btn">Active</a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"> <a href="#" class="question_content"> title here 1</a></th>
                                                <td>Category name</td>
                                                <td>Teacher James</td>
                                                <td>Lessons name</td>
                                                <td>16</td>
                                                <td>$25.00</td>
                                                <td><a href="#" class="status_btn">Active</a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"> <a href="#" class="question_content"> title here 1</a></th>
                                                <td>Category name</td>
                                                <td>Teacher James</td>
                                                <td>Lessons name</td>
                                                <td>16</td>
                                                <td>$25.00</td>
                                                <td><a href="#" class="status_btn">Active</a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"> <a href="#" class="question_content"> title here 1</a></th>
                                                <td>Category name</td>
                                                <td>Teacher James</td>
                                                <td>Lessons name</td>
                                                <td>16</td>
                                                <td>$25.00</td>
                                                <td><a href="#" class="status_btn">Active</a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"> <a href="#" class="question_content"> title here 1</a></th>
                                                <td>Category name</td>
                                                <td>Teacher James</td>
                                                <td>Lessons name</td>
                                                <td>16</td>
                                                <td>$25.00</td>
                                                <td><a href="#" class="status_btn">Active</a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"> <a href="#" class="question_content"> title here 1</a></th>
                                                <td>Category name</td>
                                                <td>Teacher James</td>
                                                <td>Lessons name</td>
                                                <td>16</td>
                                                <td>$25.00</td>
                                                <td><a href="#" class="status_btn">Active</a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"> <a href="#" class="question_content"> title here 1</a></th>
                                                <td>Category name</td>
                                                <td>Teacher James</td>
                                                <td>Lessons name</td>
                                                <td>16</td>
                                                <td>$25.00</td>
                                                <td><a href="#" class="status_btn">Active</a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"> <a href="#" class="question_content"> title here 1</a></th>
                                                <td>Category name</td>
                                                <td>Teacher James</td>
                                                <td>Lessons name</td>
                                                <td>16</td>
                                                <td>$25.00</td>
                                                <td><a href="#" class="status_btn">Active</a></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
