<form action="/" method="post">
        <div class="row mb-3">
            <div class="col">
                <label for="firstName" class="form-label"> First Name</label>
                <input required type="text" name="firstName" class="form-control" id="firstName"/>
            </div>

            <div class="col">
                <label for="lastName" class="form-label">Last Name</label>
                <input required type="text" name="lastName" class="form-control" id="lastName"/>
            </div>
        </div>
        <div class="mb-3">
            <label for="dob" class="form-label">Date Of Birth</label>
            <input  type="text" name="dob" class="form-control" id="dob"/>
        </div>
        <div class="d-grid">
            <button type="submit" name="submit" class="btn btn-primary btn-lg fw-semibold">Submit</button>
        </div>
</form>