<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="<?=base_url(); ?>Welcome"><img src="<?= base_url(); ?>asset/img/logo.png" alt="logo"></a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
        <nav>
            <ul class="metismenu" id="menu">
                <li class="<?php if($page=='dashboard'){echo 'active';}?>"><a href="<?php echo base_url();?>Empdashboard"><i class="ti ti-dashboard"></i><span>Employers Panel</span>&nbsp;</a></li>
                <li class="<?php if($page=='cp'){echo 'active';}?>">
                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layers-alt"></i><span>Update Infomation</span></a>
                    <ul class="collapse">
                        <li class="<?php if($page=='cp'){echo 'active';}?>"><a href="<?php echo base_url();?>Empdashboard/editCprofile">Company Profile</a></li>
                        <li><a href="#">Additional</a></li>
                    </ul>
                </li>
                <li class="<?php if($page=='job'){echo 'active';}?>"><a href="<?php echo base_url();?>Empdashboard/job_post" aria-expanded="true"><i class="fa fa-exclamation-triangle"></i><span>Post A New Job</span></a></li>
                <li class="<?php if($page=='cv'){echo 'active';}?>"><a href="<?php echo base_url();?>Empdashboard/cv_bank" aria-expanded="true"><i class="fa fa-file"></i> <span>CV Bank</span></a></li>
                <!-- <li><a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-exclamation-triangle"></i><span>Service Packages</span></a></li> -->
                <!-- <li>
                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-palette"></i><span>UI Features</span></a>
                    <ul class="collapse">
                        <li><a href="accordion.php">Accordion</a></li>
                        <li><a href="alert.php">Alert</a></li>
                        <li><a href="badge.php">Badge</a></li>
                        <li><a href="button.php">Button</a></li>
                        <li><a href="button-group.php">Button Group</a></li>
                        <li><a href="cards.php">Cards</a></li>
                        <li><a href="dropdown.php">Dropdown</a></li>
                        <li><a href="list-group.php">List Group</a></li>
                        <li><a href="media-object.php">Media Object</a></li>
                        <li><a href="modal.php">Modal</a></li>
                        <li><a href="pagination.php">Pagination</a></li>
                        <li><a href="popovers.php">Popover</a></li>
                        <li><a href="progressbar.php">Progressbar</a></li>
                        <li><a href="tab.php">Tab</a></li>
                        <li><a href="typography.php">Typography</a></li>
                        <li><a href="form.php">Form</a></li>
                        <li><a href="grid.php">grid system</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-slice"></i><span>icons</span></a>
                    <ul class="collapse">
                        <li><a href="fontawesome.php">fontawesome icons</a></li>
                        <li><a href="themify.php">themify icons</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-table"></i>
                        <span>Tables</span></a>
                    <ul class="collapse">
                        <li><a href="table-basic.php">basic table</a></li>
                        <li><a href="table-layout.php">table layout</a></li>
                        <li><a href="datatable.php">datatable</a></li>
                    </ul>
                </li>
                <li><a href="invoice.php"><i class="ti-receipt"></i> <span>Invoice Summary</span></a></li>
                <li>
                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layers-alt"></i> <span>Pages</span></a>
                    <ul class="collapse">
                        <li><a href="login.php">Login</a></li>
                        <li><a href="login2.php">Login 2</a></li>
                        <li><a href="login3.php">Login 3</a></li>
                        <li><a href="register.php">Register</a></li>
                        <li><a href="register2.php">Register 2</a></li>
                        <li><a href="register3.php">Register 3</a></li>
                        <li><a href="register4.php">Register 4</a></li>
                        <li><a href="screenlock.php">Lock Screen</a></li>
                        <li><a href="screenlock2.php">Lock Screen 2</a></li>
                        <li><a href="reset-pass.php">reset password</a></li>
                        <li><a href="pricing.php">Pricing</a></li>
                    </ul>
                </li> -->
                <li><a href="<?php echo site_url('Welcome/logOut')?>"><i class="fa fa-sign-out"></i><span>Sign Out</span>&nbsp;</a></li>
            </ul>
        </nav>
        </div>
    </div>
</div>