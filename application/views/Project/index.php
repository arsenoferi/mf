<br>
<br>
<div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Daftar AB</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Kode AB</th>
                    <th>Scope</th>
                    <th>Area</th>
                    <th>Tahun</th>
                    <th>Keterangan</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Kode AB</th>
                    <th>Scope</th>
                    <th>Area</th>
                    <th>Tahun</th> 
                    <th>Keterangan</th> 
                    <th>Delete</th>
                  </tr>
                </tfoot>
                <tbody>
                  {list}
                  <tr>
                    <td>{data_ab_kode_ab}</td>
                    <td>{scope}</td>
                    <td>{area}</td>
                    <td>{tahun}</td>
                    <td>{keterangan}</td>
                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal{idproject}">Delete</button></td>
                  </tr>
                  {/list}
                </thead>
               </table>
            </div>
           </div>       
</div>           

{list}
<div class="modal fade" id="modal{idproject}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Menghapus AB </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah anda yakin untuk Project {data_ab_kode_ab}  ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <a href="<?php echo base_url()?>Project/delete/{idproject}" class="btn btn-primary">Yakin</a>
      </div>
    </div>
  </div>
</div>
{/list}