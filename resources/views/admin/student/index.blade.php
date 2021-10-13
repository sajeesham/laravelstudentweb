@extends('admin.layouts.app')

@section('content')
    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title">Student List</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li><a href="javascript:void(0)">Students</a></li>
                <li class="active">Student List</li>
            </ol>
            <div class="page-header-actions">
                <a class="btn btn-sm btn-success btn-round" href="{{ route('admin.student.create') }}">
                    <i class="icon md-plus" aria-hidden="true"></i>
                    <span class="hidden-xs">Add Student</span>
                </a>
            </div>
        </div>
        <div class="page-content">
            <!-- Panel Basic -->
            <div class="panel">
                <header class="panel-heading">
                    <div class="panel-actions"></div>
                    <h3 class="panel-title">Students</h3>
                </header>
                <div class="panel-body">
                    <table class="table table-hover dataTable table-striped width-full" id="teacher_table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Student Name</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Reporting Teacher</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
						 @forelse($students as $key=>$stud)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ ucfirst($stud->name) }}</td>
                            <td>{{ $stud->age }}</td>
							<td>{{ $stud->gender }}</td>
                            <td>{{ $stud->teacher->name }}</td>							
							<td>
                                <a href="{{ route('admin.student.edit', $stud->id) }}"><button class="btn label label-info"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                                <button  class="btn label label-danger" form="resource-delete-{{ $stud->id }}" onclick="return confirm('Are you sure you want to delete this Student?');"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                <form id="resource-delete-{{ $stud->id }}" action="{{ route('admin.student.destroy' , $stud->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
						@empty
                        @endforelse
                        </tbody>

                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Student Name</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Reporting Teacher</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>

                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End Panel Basic -->
        </div>
    </div>
@endsection

@section('style')

    <link rel="stylesheet" href="{{ asset('assets/remark/global/vendor/datatables-bootstrap/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/remark/global/vendor/datatables-fixedheader/dataTables.fixedHeader.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/remark/global/vendor/datatables-responsive/dataTables.responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/remark/assets/examples/css/tables/datatable.css') }}">

@endsection

@section('scripts')

    <script src="{{ asset('assets/remark/global/vendor/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/remark/global/vendor/datatables-fixedheader/dataTables.fixedHeader.js') }}"></script>
    <script src="{{ asset('assets/remark/global/vendor/datatables-bootstrap/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('assets/remark/global/vendor/datatables-responsive/dataTables.responsive.js') }}"></script>
    <script src="{{ asset('assets/remark/global/vendor/datatables-tabletools/dataTables.tableTools.js') }}"></script>


    <script src="{{ asset('assets/remark/global/js/components/tabs.js') }}"></script>
    <script src="{{ asset('assets/remark/global/js/components/datatables.js') }}"></script>
    <script src="{{ asset('assets/remark/assets/examples/js/tables/datatable.js') }}"></script>

    

@endsection
