<form action={action} method="POST">
    {form}
    <div class="form-group">
        <label for={label}>{label}</label>
        <input name={name} type={type} class="form-control"  placeholder={label} maxlength='{maxlength}' required>
     </div>
     {/form}
     <button class="btn btn-primary" type="submit" value="Submit">SUBMIT</button>
</form>