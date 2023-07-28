<?php include_once 'header.php'; ?>
<div class="main-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-8  mx-auto">
                <form class="card p-5" method="post" action="process_checkout.php   ">
                    <div class="mb-3">
                        <label for="" class="form-label">Name Receiver</label>
                        <input type="text" class="form-control" name="name_receiver">
                    </div>
                    <div class="mb-3">
                        <label for="phone_receiver" class="form-label">Phone Number Receiver</label>
                        <input type="password" class="form-control" id="phone_receiver" name="phone_receiver">
                    </div>
                    <div class="mb-3">
                        <label for="address_receiver" class="form-label">Address Receiver</label>
                        <input type="password" class="form-control" id="address_receiver" name="address_receiver">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include_once 'footer.php'; ?>