@extends('layout.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                การจัดการผู้ใช้งานระบบ
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin"><i class="fa fa-dashboard"></i> หน้าผู้ดูแลระบบ</a></li>
                <li><a href="/admin/user"><i class="fa fa-user"></i> จัดการผู้ใช้</a></li>
                <li class="active"><a href="/admin/user/create">เพิ่มผู้ใช้</a></li>
            </ol>
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
                        <form class="form-horizontal" method="post" action="/admin/user/{{$user->id}}/edit">
                            <div class="box-body">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ชื่อ-นามสกุล</label>

                                    <div class="col-sm-10">
                                        <input type="text"
                                               name="user[name]"
                                               value="{{$user->name}}"
                                               class="form-control" placeholder="ชื่อ-นามสกุล">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">อีเมลล์</label>

                                    <div class="col-sm-10">
                                        <input type="email"
                                               name="user[email]"
                                               value="{{$user->email}}"
                                               class="form-control" placeholder="อีเมลล์">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">สาขาวิชา</label>

                                    <div class="col-sm-10">
                                        <select name="user[branch_id]" class="form-control">
                                            <option>กรุณาเลือก</option>
                                            @foreach($branches as $branch)
                                                <option
                                                        {{$branch->id == $user->branch_id ? 'selected':''}}
                                                        value="{{$branch->id}}">{{$branch->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">รหัสผ่าน</label>

                                    <div class="col-sm-10">
                                        <input type="password"
                                               name="user[password]"
                                               class="form-control" placeholder="รหัสผ่าน">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ยืนยันรหัสผ่าน</label>

                                    <div class="col-sm-10">
                                        <input type="password"
                                               name="user[confirm_password]"
                                               class="form-control" placeholder="ยืนยันรหัสผ่าน">
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-info">ตกลง</button>
                                <button type="submit" class="btn btn-default">ยกเลิก</button>

                            </div>
                            <!-- /.box-footer -->
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

@endsection

@section('javascript')
    <script>
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
@endsection