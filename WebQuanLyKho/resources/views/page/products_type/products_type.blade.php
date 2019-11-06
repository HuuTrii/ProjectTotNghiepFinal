

@extends('layout.master')
@section('content_products_type')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Loai sản Phẩm
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fa fa-folder"></i> Quản lý</a></li>
            <li class="breadcrumb-item"><a href="#">Loại sản phẩm</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Loại sản phẩm</h3>
                <h6 class="box-subtitle">Tổng hợp tất cả các loại sẩn phẩm</h6>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <div id="example_wrapper" class="dataTables_wrapper">
                          <!-- botton add -->
                            <button type="button" class="btn btn-app btn-success" data-toggle="modal" data-target="#modaladd" style="height: 30px;padding: 0;border-radius: 6px;">
                                   <span style="font-size: 35px;padding: 0px;line-height: 30px;">+</span>
                            </button>
                            <a href="catalog/export">   
                                <button type="button" class="btn btn-app btn-success" style="height: 30px;padding: 0;border-radius: 6px;">
                                            <span style="font-size: 20px;">
                                                 <i class="fa fa-arrow-down"></i><i class="mdi mdi-file-excel"></i>
                                            </span>
                                </button>
                            </a>
                                <button type="button" data-toggle="modal" data-target="#modalimport" class="btn btn-app btn-success" style="height: 30px;padding: 0;border-radius: 6px;">
                                       <span style="font-size: 20px;">
                                                <i class="fa fa-arrow-up"></i><i class="mdi mdi-file-excel"></i>
                                        </span>
                                </button>
                        
                            <div class="modal fade" id="modalimport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                            <form action="{{route('importCatalog')}}" method="POST"  enctype="multipart/form-data">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title">Nhập file excel</h3>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>Thêm file</label>
                                                        <input type="file" name="file_import" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Đóng</button>
                                                    <button type="submit" class="btn btn-bold btn-pure btn-success float-right">Thêm file</button>
                                                </div>
                                                
                                            </div>
                                        </form>
                                <!-- /.modal-content -->
                                    </div>


                            
                                   
                                   
                                   
                                </form>
                            </div>
                         <!-- botton add -->
                        
                        <!-- modal add product_type -->
                        <div class="modal fade bs-example-modal-lg" id="modaladd" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                            <form id="addform" method="POST">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Thêm loại sản phẩm</h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                        {{csrf_field()}}
                                                <div class="form-group">
                                                    <label>Tên loại</label>
                                                    <input name="name_cata"  type="text" placeholder="Tên loại" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Đóng</button>
                                        <button type="submit" class="btn btn-bold btn-pure btn-success float-right">Lưu</button>
                                    </div>
                                </div>
                            </form>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- modal add product_type -->


                        <!-- Modal edit product_type -->
                        <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document" style="min-width: 1000px;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">CẬP NHẬT</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form id="editform" >
                                        <div class="modal-body">
                                            {{csrf_field()}}
                                            {{method_field('PUT')}}
                                            <input type="hidden" name="id" id="id">
                                            <div class="form-group">
                                                <label>Tên loại</label>
                                                <input type="text" class="form-control" name="name_cata" id="name_cata" placeholder="Tên loại">
                                            </div>
                                        </div>
                                        <div class="modal-footer" style="min-width: 1000px">
                                        <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Đóng</button>
                                        <button type="submit" class="btn btn-bold btn-pure btn-success float-right">Cập nhật</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- modal edit product_type -->
                        <table id="data_product_type" class="table table-bordered table-hover display nowrap margin-top-10 w-p100 dataTable" role="grid" aria-describedby="example_info">
                                <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 70%;">Tên Loại</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 30%;">Tương tác</th>
                                </tr>
                                 @foreach($catalog as $catalog1)
                                        <tr role="row " class="odd ">
                                            <td style="display:none;">{{$catalog1->id_cata}}</td>
                                            <td>{{$catalog1->name_cata}}</td>
                                            <td>
                                            <a href=" {{ route('catalogDestroy', $catalog1->id_cata )}}">  <span class="badge badge-danger" style="padding: 1% 5%;"><i class="fa fa-trash"></i></span></a>
                                            <a href="#" class="editbtn"> <span  class="badge badge-success  " style="padding: 1% 5%;"><i class="fa fa-edit "></i></span></a>
                                            </td>

                                        </tr>
                                    @endforeach
                            <tfoot>
                                <tr>
                                    <th rowspan="1 " colspan="1 ">Tên Loại</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 200x;">Tương tác</th>

                                </tr>
                            </tfoot>
                            <div style="float:right">
                                {{ $catalog->links()}}
                            </div>
                        </table>
                        
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </section>
</div>
@endsection
@push('scripts')
    <script>
    $(function() {
        $('#data_product_type').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{asset('datatable/list')}}',
            columns: [
                // { data: 'id_cata', name: 'id_cata' },
                // { data: 'name_cata', name: 'name_cata' },


            ]

        });
    });
    </script>
 @endpush

{{-- ahihi liu liu--}}


<script src="https://code.jquery.com/jquery-3.4.1.js" ></script>



<script type="text/javascript">
    $(document).ready(function () {
        // $('td:nth-child(1)').hide();
        $('.editbtn').on('click',function () {
            $('#editmodal').modal('show');
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function () {
                return $(this).text();
            }).get();
            console.log(data);
            $('#id').val(data[0]);
            $('#name_cata').val(data[1]);
        });
        $(editform).on('submit',function (e) {
            e.preventDefault();
            var id = $('#id').val();
            $.ajax({
                type:"PUT",
                url:"editCata/"+ id,
                data: $('#editform').serialize(),
                success:function (response) {
                    console.log(response);
                    $('#editmodal').modal('hide');
                    location.reload();
                    alert("Cập nhật thành công");
                },
                error:function (error) {
                    alert("Cập nhật không thành công");
                }
            });
        });
    });
</script>
                <script type="text/javascript">

                    $(document).ready(function(){
                        $(addform).on('submit',function (e) {
                            e.preventDefault();
                            $.ajax({
                                type:"POST",
                                url:"cataadd",
                                data: $('#addform').serialize(),
                                success:function (response) {
                                    console.log(response);
                                    $('#modaladd').modal('hide');
                                    location.reload();
                                    alert("Thêm thành công");
                                },
        error:function (error) {
            alert("Không thể thêm");
        }
    });
});
});
</script>
