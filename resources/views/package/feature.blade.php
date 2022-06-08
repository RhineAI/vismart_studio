<style>
    tbody {
        border-top: 2px solid #ebe7e1;
    }
    
    #boRight {
        border-right: 2px solid #ebe7e1;
    }

    #feature {
        padding-left: -13px;
    }

</style>

<!-- Modal -->
<div class="modal fade" id="modal-feature" tabindex="-1" role="dialog" aria-labelledby="modal-form">
    <div class="modal-dialog modal-lg" role="document">
        <form action="" method="post" class="form-horizontal">
            @csrf
            @method('post')

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="feature_id" id="feature_id">
                    <table class="table table-stripped table-feature">
                        <thead>
                            <th id="boRight">
                                <input type="checkbox" name="feature_id" id="select_all">
                            </th>
                            <th class="text-center"><h4>Features</h4></th>
                        </thead>
                        <tbody>
                            
                        </tbody>
                        
                    </table>
                </div>
                    

                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat btn-sm" data-dismiss="modal"><i
                            class="fa fa-circle-xmark"></i> Batal</button>
                    <button type="submit" class="btn btn-primary btn-flat btn-sm"><i class="fa fa-circle-check"></i>
                        Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>  