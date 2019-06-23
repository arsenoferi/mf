<form action={action} method="POST">
    {form}
    <div class="form-group">
        <label for={label}>{label}</label>
        <input name={name} type={type} class="form-control"  placeholder={label} required>
     </div>
     {/form}
     <label for={label}>Posisi</label>
     <div class="form-group">
        <select class="form-control" name="posisi" placeholder='Posisi' required>
            <option>kadiv</option>
            <option>kanit</option>
            <option>katim</option>
            <option>anggota</option>
            <option>sekretaris</option>
         </select>
    </div>
    <button class="btn btn-primary" type="submit" value="Submit">SUBMIT</button>
</form>