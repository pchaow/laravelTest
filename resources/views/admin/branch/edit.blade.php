@extends('layout.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                แก้ไขสาขา {{$branch->name}}
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">แก้ไข</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form class="form-horizontal" method="post" action="/admin/branch/{{$branch->id}}/edit">
                            <div class="box-body">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ชื่อสาขา</label>

                                    <div class="col-sm-10">
                                        <input type="text"
                                               name="branch[name]"
                                               value="{{$branch->name}}"
                                               class="form-control" placeholder="ชื่อสาขา">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">รายละเอียด</label>

                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="branch[description]"
                                                  rows="5">{{$branch->description}}</textarea>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-info">ตกลง</button>
                                    <button type="submit" class="btn btn-default">ยกเลิก</button>
                                </div>
                                <!-- /.box-footer -->
                            </div>
                        </form>
                    </div>
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">รายการผู้ใช้ในสาขา</h3>

                            <div class="box-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control pull-right"
                                           placeholder="Search">

                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>ชื่อ - นามสกุล</th>
                                    <th>อีเมลล์</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($branch->users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <form id="deleteUser" method="post">
                                {{csrf_field()}}
                            </form>
                        </div>
                        <!-- /.box-body -->
                    </div>

                </div>
            </div>
    </div>
    </section>
    <!-- /.content -->
    </div>

@endsection

@section('javascript')
@endsection