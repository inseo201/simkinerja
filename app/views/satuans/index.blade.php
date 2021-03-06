@extends('layouts.master')

@section('asset')
<!-- Table -->
{{HTML::style("assets/css/datatables/dataTables.bootstrap.css")}}
@stop

@section('script')
	<!-- DATA TABES SCRIPT -->
    {{HTML::script('assets/js/plugins/datatables/jquery.dataTables.js')}}
    {{HTML::script('assets/js/plugins/datatables/dataTables.bootstrap.js')}}
    <!-- page script -->
    <script type="text/javascript">
        $(function() {
            $("#satuan").dataTable();
            $('#example2').dataTable({
                "bPaginate": true,
                "bLengthChange": false,
                "bFilter": false,
                "bSort": true,
                "bInfo": true,
                "bAutoWidth": false
           	});
        });
    </script>
@stop

@section('title')
	{{ $title }}
@stop

@section('title-button')
    {{ HTML::buttonAdd() }}
@stop

@section('breadcrumb')
    <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li class="active">@yield('title')</li>
@stop

@section('content')
	<div class="row">
		<div class="col-xs-12">                            
			<div class="box">				
				<div class="box-body table-responsive">
					<table id="satuan" class="table table-bordered table-hover">
						<thead>
                        <tr>                            
                            <th>Satuan</th>                        
                            <th width="146">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($satuans as $value)
                            <tr>                                
                                <td>{{{ $value->satuan }}}</td>                                
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.satuan.edit', ['satuans'=>$value->id]) }}" class="btn btn-primary">Ubah</a>
                                        {{ Form::open(array('url'=>route('admin.satuan.destroy',['satuans'=>$value->id]),'method'=>'delete', 'class'=>'col-md-1')) }}
                                        {{ Form::submit('Hapus', array('class'=>'btn btn-danger')) }}
                                        {{ Form::close() }}
                                    </div>
                                </td>
                            </tr>
                            @endforeach   
                        </tbody>
                        <tfoot>
                            <tr>                            
                            <th>Satuan</th>                            
                            <th width="146">Aksi</th>
                            </tr>
                        </tfoot>
					</table>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div>
	</div>
@stop