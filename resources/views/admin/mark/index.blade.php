@extends('admin.layouts.app')

@section('content')
    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title">Student Mark List</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li><a href="javascript:void(0)">Student Mark List</a></li>
                <li class="active">Student Mark List</li>
            </ol>
            <div class="page-header-actions">
                <a class="btn btn-sm btn-success btn-round" href="{{ route('admin.mark.create') }}">
                    <i class="icon md-plus" aria-hidden="true"></i>
                    <span class="hidden-xs">Add Student Mark</span>
                </a>
            </div>
        </div>
        <div class="page-content">
            <!-- Panel Basic -->
            <div class="panel">
                <header class="panel-heading">
                    <div class="panel-actions"></div>
                    <h3 class="panel-title">Student Mark</h3>
                </header>
                <div class="panel-body">


                    <table class="table table-hover dataTable table-striped width-full" id="teacher_table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Maths</th>
                            <th>Science</th>
                            <th>History</th>
                            <th>Term</th>
                            <th>Total</th>
                            <th>Created On</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
						 <?php  
                         $i=0;
                         foreach($StudentMark as $key=>$stud){
                             
                             ?>
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $stud->name }}</td>
                            <?php 
                            foreach($alldetails as $marks){
                             if($marks->student_id=="$stud->id" && $marks->term =="$stud->term"){   
                                 echo "<td>".$marks->mark."</td>";
                            }else{
                                
                            }
                        }
                            ?>                         

                            <td>{{ $stud->term }}</td>				
                            <td>{{ $stud->total }}</td>	
                            <td><?=date('d-m-Y',strtotime($stud->created_at)); ?></td>	
                            <td>
                            <a href="#"><button class="btn label label-info"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                                
                            <button  class="btn label label-danger" form="resource-delete-{{ $stud->id }}" onclick="return confirm('Are you sure you want to delete this Mark?');"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                <form id="resource-delete-{{ $stud->id }}" action="{{ route('admin.mark.destroy' , $stud->id) }}" method="POST">
                                <input type="hidden" name="term" value="<?=$stud->term?>">    
                                @csrf
                                    @method('DELETE')
                                </form>
                                
                            </td>
							
                        </tr>
                         <?php 
                        $i++;
                        } ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Maths</th>
                            <th>Science</th>
                            <th>History</th>
                            <th>Term</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>

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
