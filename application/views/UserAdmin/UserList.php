<a href="{tambah_user}" class="btn btn-primary">Tambah User</a>
<br>
<br>
<div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Daftar User</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No Pegawai</th>
                    <th>Nama Pegawai</th>
                    <th>Username</th>
                    <th>email</th>
                    <th>Posisi</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No Pegawai</th>
                    <th>Nama Pegawai</th>
                    <th>Username</th>
                    <th>email</th>
                    <th>Posisi</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </tfoot>
                <tbody>
                  {daftar}
                  <tr>
                    <td>{no_pegawai}</td>
                    <td>{nama}</td>
                    <td>{username}</td>
                    <td>{email}</td>
                    <td>{posisi}</td>
                    <td><a href="<?php echo base_url()?>UserAdmin/edit/{no_pegawai}" type="button" class="btn btn-info">Edit</a></td>
                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal{no_pegawai}">Delete</button></td>
                  </tr>
                  {/daftar}
                </thead>
               </table>
            </div>
           </div>       
</div>           

{daftar}
<div class="modal fade" id="modal{no_pegawai}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Menghapus User </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah anda yakin untuk menghapus user {no_pegawai} miliki {nama} ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <a href="<?php echo base_url()?>UserAdmin/DeleteUser/{no_pegawai}" class="btn btn-primary">Yakin</a>
      </div>
    </div>
  </div>
</div>
{/daftar}



