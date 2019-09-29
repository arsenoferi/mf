<form action={action} method="POST">
    
     <div class="form-group">
        <label for='kode_ab'>Kode AB</label>
        <input name='kode_ab' type='text' class="form-control"  placeholder='{kode_ab}' value='{kode_ab}' readonly>
     </div>
     
     <div class="form-group">
        <label for='tahun'>Tahun</label>
        <input name='tahun' type='number' class="form-control"  placeholder='tahun' min=2000 max=2100 value=2000 required>
     </div>

     <label for="Scope">Scope</label>
     <div class="form-group">
        <select class="form-control" name="scope" placeholder='scope' required>
            <option>Rutin</option>
            <option>Khusus</option>
         </select>
     </div>
     
     <label for="Area">Area</label>
     <div class="form-group">
        <select class="form-control" name="area" placeholder='area' required>
            <option>IT</option>
            <option>Non IT</option>
         </select>
    </div>

    <div class="form-group">
        <label for='keterangan'>Keterangan</label>
        <input name='keterangan' type='text' class="form-control"  placeholder='keterangan'>
     </div>

     <button class="btn btn-primary" type="submit" value="Submit">SUBMIT</button>
</form>