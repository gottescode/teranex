<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section id="contents" style="padding-top: 100px;">

		<!-- #####Begin main area-->
				<div class="vcenter">
					<div class="container">
						<div class="row">
							<div class="col-md-6 col-md-offset-3 ofx-auto">
								<!-- #####Begin tab element-->
								<div class="login-form ol-tab">
									<div class="login-form-inner">
										<!-- #####Begin tab navigation-->
										<ul class="tab-navigation">
											<li class="tab active"><a href="#login">LOGIN</a></li>
											<li class="tab"><a href="#register">REGISTER</a></li>
										</ul>
										<!-- #####End tab navigation-->
										<div class="tab-content">
											<!-- #####Begin tab panel item-->
											<div id="login" class="tab-pane active">
												<h6 class="title">Login</h6>

													<div class="form-group">
                                                        <!--<select id="loginEmail" class="form-control">
                                                            <option value="simon@gmail.com">simon@gmail.com</option>
                                                            <option value="anis@gmail.com">anis@gmail.com</option>
                                                            <option value="robiul@gmail.com">robiul@gmail.com</option>
                                                        </select>-->
														<input id="loginEmail" type="text" name="email" value="" placeholder="email" class="form-control">
														<input id="loginPassword" type="password" name="password" value="" placeholder="password" class="form-control">
														<input type="submit" value="Login" id="loginSubmit" class="btn btn-small btn-block">
                                                        <?php if(isset($demo) && $demo==true){ ?>
                                                        <input type="button" value="Demo Login Info" id="loginInfo" class="btn btn-small btn-block">
                                                        <?php } ?>
													</div>

											</div>
											<!-- #####End tab panel item-->
											<!-- #####Begin tab panel item-->
											<div id="register" class="tab-pane">
												<h6 class="title">Creat New Account</h6>

													<div class="form-group">
														<input id="regFirstName" type="text" name="name" placeholder="first name" class="form-control">
														<input id="regLastName" type="text" name="name" placeholder="last name" class="form-control">
														<input id="regEmail" type="text" name="email" placeholder="email" class="form-control">
														<input id="regPassword" type="password" name="password" placeholder="password" class="form-control">
														<input id="regSubmit" type="submit" value="register" class="btn btn-small btn-block">
													</div>

											</div>
											<!-- #####End tab panel item-->
										</div>
									</div>
								</div>
								<div class="login-copyright" style="color: #f5f5f5">Copyrights © All Rights Reserved by Farhad Zaman.</div>
								<!-- #####End tab element-->
							</div>
						</div>
					</div>
				</div>


		<!-- #####End main area
        -->
		<div class="clearfix"></div>

</section>
</div>
<div id="loginInfoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" class="modal fade in" style="display: none;padding-right: 17px;">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="border-radius: 6px;">
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="oli oli-delete_sign"></i></span></button>
                <h4 id="myModalLabel" class="modal-title" style="background-color: #75aef3">Login Information</h4>
                <div class="modal-body " >
                    <p>User Emails For Login:</p>
                    <p><strong>simon@gmail.com</strong></p><p><strong>anis@gmail.com</strong></p><p><strong>robiul@gmail.com</strong></p>
                    <p>Password: <strong>123456</strong></p>
                    <p>This product is available @<a href="https://codecanyon.net/item/chat-application-codeigniter-socketio-nodejs/20061969"><strong>codecanyon.net</strong></a> </p>
                </div>
            </div>
        </div>
    </div>
</div>



