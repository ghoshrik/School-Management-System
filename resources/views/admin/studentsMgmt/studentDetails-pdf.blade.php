<!DOCTYPE html>
<html>
    <head>
        <title>Student Details Information</title>
        <style type="text/css">
            table {
                border-collapse: collapse;
            }
            h2 h3{
                margin: 0;
                padding: 0;
            }
            .table {
                width: 100%;
                margin-bottom: 1rem;
                background-color: transparent;
            }
            .table th,
            .table td{
                padding: 0.75rem;
                vertical-align: top;
                border-top: 1px solid #dee2e6;
            }
            .table thead th{
                vertical-align: bottom;
                border-bottom: 2px solid #dee2e6;
            }
            .table tbody + tbody{
                border-top: 2px solid #dee2e6;
            }
            .table .table{
                background-color: #fff;
            }
            .table-bordered {
                border: 1px solid #dee2e6;
            }
            .table-bordered th,
            .table-bordered td {
                border: 1px solid #dee2e6;
            }
            .text-center{
                text-align: center;
            }
            .text-right{
                text-align: right;
            }
            table tr td{
                padding: 5px;
            }
            .table-bordered thead th, .table-bordered td, .table-bordered th{
                border: 1px solid black !important;
            }
            .table-bordered thead th{
                background-color: #cacaca;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table width="80%">
                        <tr>
                            <td width="33%" class="text-center"><img src="{{public_path('/admin/img/logo.png')}}" alt="" style="width: 150px;height:150px"></td>
                            <td class="text-center" width="350px">
                                <h1><strong>School Name</strong></h1>
                                <h3><strong>School Address</strong></h3>
                                <h4><strong>School Contact Info</strong></h4>
                            </td>
                            <td width="10%" class="text-center"><img src="{{public_path('/admin/upload/no_image.jpg')}}" alt="" style="width: 150px;height: 150px"></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-12 text-center">
                    <h5 style="font-weight: bold; padding-top: -25px">Student Registration Details</h5>
                </div>
                <div class="col-md-12">
                    <table border="1" width="100%">
                        <tbody>
                            <tr>
                                <td style="width: 50%;">Student Name</td>
                                <td>{{$details['student']['student_name']}}</td>
                            </tr>
                            <tr>
                                <td style="width: 50%;">Father's Name</td>
                                <td>{{$details['student']['father_name']}}</td>
                            </tr>
                            <tr>
                                <td style="width: 50%;">Mother's Name</td>
                                <td>{{$details['student']['mother_name']}}</td>
                            </tr>
                            <tr>
                                <td style="width: 50%;">Gender</td>
                                <td>{{$details['student']['gender']}}</td>
                            </tr>
                            <tr>
                                <td style="width: 50%;">Class</td>
                                <td>{{$details['class_name']['class_name']}} ({{$details['class_name']['class_symbol']}})</td>
                            </tr>
                            <tr>
                                <td style="width: 50%;">Roll No</td>
                                <td>{{$details->roll}}</td>
                            </tr>
                            <tr>
                                <td style="width: 50%;">Year</td>
                                <td>{{$details['year']['year']}}</td>
                            </tr>
                            <tr>
                                <td style="width: 50%;">Student ID</td>
                                <td>{{$details['student']['student_id']}}</td>
                            </tr>
                            <tr>
                                <td style="width: 50%;">Religion</td>
                                <td>{{$details['student']['religion']}}</td>
                            </tr>
                            <tr>
                                <td style="width: 50%;">Date of Birth</td>
                                <td>{{$details['student']['dob']}}</td>
                            </tr>
                            <tr>
                                <td style="width: 50%;">Address</td>
                                <td>{{$details['student']['address']}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <i style="font-size: 10px; float:right;">Print Date: {{date("d M Y")}}</i>
                </div>
            </div><br/>
            <div class="col-md-12">
                <table border="0" width="100%">
                    <tbody>
                        <tr>
                            <td style="width: 30%;"></td>
                            <td style="width: 30%;"></td>
                            <td style="width: 30%; text-align:center;">
                                <hr style="border: solid 1px; width:60%; color: #000; margin-bottom: 0px">
                                <p style="text-align: center;">Head Teacher</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>