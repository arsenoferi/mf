<div class="card mb-3">

          <div class="card-header">

            <i class="fas fa-table"></i>

            Daftar Pegawai</div>

          <div class="card-body">

            <div class="table-responsive">

              <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">

                <thead>

                  <tr>

                    <th>Nama Pegawai</th>

                    <th>Email  </th>

                    <th>Posisi</th>

                    <th>Assign</th>

                  </tr>

                </thead>

                <tfoot>

                  <tr>

                    <th>Nama Pegawai</th>

                    <th>Email  </th>

                    <th>Posisi</th>

                    <th>Assign</th>

                  </tr>

                </tfoot>

                <tbody>

                  {pegawai}

                  <tr>

                    <td>{nama}</td>

                    <td>{email}</td>

                    <td>{posisi}</td>

                    <th><a href="<?php echo base_url()?>ManagementAssigment/action_assign/{no_pegawai}{/pegawai}/{project}" type="button" class="btn btn-info">Assign</a></th>

                  </tr>

                  

                </thead>

               </table>

            </div>

           </div>       

</div>           



<div class="card mb-3">

          <div class="card-header">

            <i class="fas fa-table"></i>

            Daftar Pegawai</div>

          <div class="card-body">

            <div class="table-responsive">

              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                <thead>

                  <tr>

                    <th>Nama Pegawai</th>

                    <th>Email  </th>

                    <th>Posisi</th>

                    <th>Assign</th>

                  </tr>

                </thead>

                <tfoot>

                  <tr>

                    <th>Nama Pegawai</th>

                    <th>Email  </th>

                    <th>Posisi</th>

                    <th>Assign</th>

                  </tr>

                </tfoot>

                <tbody>

                  {pegawai}

                  <tr>

                    <td>{nama}</td>

                    <td>{email}</td>

                    <td>{posisi}</td>

                    <th><a href="<?php echo base_url()?>ManagementAssigment/action_assign/{no_pegawai}{/pegawai}/{project}" type="button" class="btn btn-info">Assign</a></th>

                  </tr>

                  

                </thead>

               </table>

            </div>

           </div>       

</div>           
