@extends('layout.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                User Management
                <small>User</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin"><i class="fa fa-dashboard"></i> Admin Home</a></li>
                <li class="active"><a href="/admin/user">User Management</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Responsive Hover Table</h3>

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
                                    <th>การจัดการ</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            <a href="/admin/user/{{$user->id}}/edit" class="btn btn-success">แก้ไข</a>
                                            <button onclick="deleteUser({{$user->id}})" type="button"
                                                    class="btn btn-danger">ลบ
                                            </button>
                                        </td>
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
        </section>
        <!-- /.content -->
    </div>

@endsection

@section('javascript')
    <script type="text/javascript">
      function deleteUser(id) {
          if(confirm("Do you want to delete this user?")){
              var form = document.getElementById('deleteUser');
              form.setAttribute('action',"/admin/user/"+id+"/delete")
              form.submit()
          }
      }
    </script>
@endsection