<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <?php if ($this->session->flashdata('error')) { ?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                            <span aria-hidden="true">&times;</span> 
                        </button>
                        <h3 class="text-danger text-center">
                            <i class="fa fa-exclamation-triangle"></i>
                        </h3> 
                        <h5 class="text-center">
                            <?php echo $this->session->flashdata('error'); ?>
                        </h5>
                    </div>
                <?php } ?>

                <div class="d-md-flex align-items-center">
                    <div>
                        <h4 class="card-title">Login</h4>
                    </div>
                    <div class="ml-auto d-flex no-block align-items-center">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12">
                        <form class="mt-12" method="post" action="<?php echo site_url('Login/Cek'); ?>">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" name="email" class="form-control" required autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password" name="password" class="form-control" required autocomplete="off">
                            </div>

                            <button type="submit" class="btn btn-info">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>