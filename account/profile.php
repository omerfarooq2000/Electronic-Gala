<div class="card rounded-0">
    <div class="card-body">
        <h4 class="mb-4">My Profile</h4>
        <div class="row border-bottom pb-4 mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h5>Account Details</h5>
                    <button type="button" class="btn btn-sm bg-orange rounded-0" data-bs-toggle="modal" data-bs-target="#editAccount"><i class="bi bi-pencil-square me-2"></i>Edit Account</button>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group mb-2 mb-md-0">
                    <label class="mb-2">Name:</label>
                    <input type="text" class="form-control shadow-none text-capitalize rounded-0" value="<?php echo $u_name ?>" disabled>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group mb-2 mb-md-0">
                    <label class="mb-2">E-Mail:</label>
                    <input type="text" class="form-control shadow-none rounded-0" value="<?php echo $u_email ?>" disabled>
                </div>
            </div>
        </div>

        <div class="row border-bottom pb-4 mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h5>Address</h5>
                    <button type="button" class="btn btn-sm bg-orange rounded-0" data-bs-toggle="modal" data-bs-target="#editAddress"><i class="bi bi-pencil-square me-2"></i>Edit Address</button>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group mb-2">
                    <label class="mb-2">Phone:</label>
                    <input type="text" class="form-control shadow-none text-capitalize rounded-0" value="<?php echo $phone ?>" disabled>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group mb-2">
                    <label class="mb-2">Province:</label>
                    <input type="text" class="form-control shadow-none rounded-0" value="<?php echo $province ?>" disabled>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group mb-2">
                    <label class="mb-2">City:</label>
                    <input type="text" class="form-control shadow-none rounded-0" value="<?php echo $city ?>" disabled>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group mb-2">
                    <label class="mb-2">Postal Code:</label>
                    <input type="text" class="form-control shadow-none rounded-0" value="<?php echo $postal_code ?>" disabled>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group mb-2">
                    <label class="mb-2">Address:</label>
                    <textarea rows="2" class="form-control w-100 shadow-none" draggable="false" style="resize: none;" disabled><?php echo $address ?></textarea>
                </div>
            </div>
        </div>
    </div>
</div>