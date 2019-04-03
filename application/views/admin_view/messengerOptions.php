<?php

?>

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="#">User</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>User List</span>
        </li>
    </ul>
    <!-- <div class="page-toolbar">
         <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
             <i class="icon-calendar"></i>&nbsp;
             <span class="thin uppercase hidden-xs"></span>&nbsp;
             <i class="fa fa-angle-down"></i>
         </div>
     </div>-->
</div>

<h1 class="page-title"> All user
    <small>All message information</small>
</h1>
<div class="row">
    <div class="col-md-6 col-sm-7"></div>
    <div class="col-md-5 col-sm-5">
        <div id="sample_1_filter" class="dataTables_filter">
            <label>
                Search: <input id="emailSearch" type="search" class="form-control input-sm input-medium input-inline" placeholder="Email or first name" aria-controls="sample_1"> <button type="button" id="searchEmailBtn" class="btn btn-sm btn-info my-btn-color"> Search </button> <button id="clearBtn" type="button" class="btn btn-sm default"> All </button>
            </label>
        </div>

    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light portlet-fit bordered">

            <div class="portlet-body">
                <div class="table-scrollable table-scrollable-borderless">
                    <table id="userListTable" class="table table-hover table-light">
                        <thead>
                        <tr class="uppercase">
                            <th> Profile Picture</th>
                            <th> First Name </th>
                            <th> Last Name </th>
                            <th> Email </th>
                            <th> Status </th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if($userList!=null && count($userList)>0){ ?>
                    <?php foreach ($userList as $user){ ?>
                        <tr id="user_<?php echo $user['userId']?>">
                            <td> <img src="<?php echo $user['profilePictureUrl']?>" style="width: 25px;"> </td>
                            <td> <?php echo $user['firstName']?> </td>
                            <td> <?php echo $user['lastName']?> </td>
                            <td> <?php echo $user['userEmail']?> </td>
                            <?php if($user['userStatus']==1 && $user['userVerification']==1){ ?>
                            <td id="status_<?php echo $user['userId']?>">
                                <span  class="label label-sm label-success"> Activate </span>
                            </td>
                            <?php }else if($user['userStatus']==0 && $user['userVerification']==1){ ?>
                                <td id="status_<?php echo $user['userId']?>">
                                    <span  class="label label-sm label-warning"> Deactivate </span>
                                </td>
                            <?php } else if($user['userStatus']==2 && $user['userVerification']==0){?>
                                <td id="status_<?php echo $user['userId']?>">
                                    <span class="label label-sm label-info"> Verification pending </span>
                                </td>
                            <?php } else if($user['userStatus']==0 && $user['userVerification']==0){?>
                            <td id="status_<?php echo $user['userId']?>">
                                <span class="label label-sm label-danger"> Deactivate </span>
                            </td>
                            <?php } else if($user['userStatus']==5 && $user['userVerification']==0){?>
                            <td id="status_<?php echo $user['userId']?>">
                                <span class="label label-sm label-warning"> Invited </span>
                            </td>
                            <?php } ?>
                            <td>
                                <button type="button" data-status="<?php echo $user['userStatus'];?>" data-varification="<?php echo $user['userVerification']?>" data-user="<?php echo $user['userId']?>" class="btn btn-info userInfo">View Messages</button>
                            </td>

                        </tr>
                        <?php } ?>
                    <?php if($links!=null || $links!=""){ ?>
                        <tr>
                            <td colspan="6" align="right">
                                <ul class="pagination pagination-sm">
                                    <?php echo $links;?>
                                </ul>

                            </td>
                        </tr>
                    <?php } ?>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

</div>
<!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
<!-- BEGIN QUICK SIDEBAR -->

<!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->
<div id="userInfoModal" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">User Information</h4>
            </div>
            <div class="modal-body">
                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: auto;"><div class="scroller" style="height: auto; overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible1="1" data-initialized="1">
                        <div class="row">
                            <div class="col-md-12">
                               <div class="text-center">
                                   <img class="userImg" src="" style="width: 130px">
                               </div>
                                <div style="padding-top: 5px">
                                <table border="0" align="center" width="90%">
                                    <tbody>
                                    <tr>
                                        <td style="text-align: left;padding: 5px;border-bottom: 0.5px solid #EFEFEF">Name:</td>
                                        <td style="text-align: left;padding: 5px;border-bottom: 0.5px solid #EFEFEF"> <span class="userName"></span></td>
                                    </tr>
                                    <tr><td style="text-align: left;padding: 5px;border-bottom: 1px solid #EFEFEF">Email:</td>
                                        <td style="text-align: left;padding: 5px;border-bottom: 1px solid #EFEFEF"><span class="userEmail"></span></td>
                                    </tr>
                                    <tr><td style="text-align: left;padding: 5px;border-bottom: 1px solid #EFEFEF">Total Groups:</td>
                                        <td style="text-align: left;padding: 5px;border-bottom: 1px solid #EFEFEF"><span class="usergroups"></span></td>
                                    </tr>
                                    <tr><td style="text-align: left;padding: 5px;border-bottom: 1px solid #EFEFEF">Last Profile Update</td>
                                        <td style="text-align: left;padding: 5px;border-bottom: 1px solid #EFEFEF"><span class="userupdate"></span></td>
                                    </tr>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slimScrollBar" style="background: rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 300px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function () {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "positionClass": "toast-bottom-left",
            "onclick": null,
            "showDuration": "1000",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
        /*$('#babyList').DataTable( {
            "paging":   false,
            "ordering": false,
            "info":     false,
            "pageLength": 10
        } );*/

        var getUrlParameter = function getUrlParameter(sParam) {
            var sPageURL = decodeURIComponent(window.location.search.substring(1)),
                sURLVariables = sPageURL.split('&'),
                sParameterName;

            for (var i = 0; i < sURLVariables.length; i++) {
                sParameterName = sURLVariables[i].split('=');

                if (sParameterName[0] === sParam) {
                    return sParameterName[1] === undefined ? true : sParameterName[1];
                }
            }
        };
        var queryEmail=getUrlParameter('email');
        if(queryEmail!=null){
            $('#emailSearch').val(queryEmail);
        }
        var t=localStorage.getItem('_r');
        //$('#userTab').addClass('open');
        $('#messengerTab').addClass('active open');
        //$('#userList').addClass('active open');


        $('#searchEmailBtn').on('click',function (e) {
            var email=$('#emailSearch').val();
            location.href="<?php echo base_url('admin/messengerOptions').'?search='?>"+email;
        });
        $('#clearBtn').on('click',function () {
            location.href="<?php echo base_url('admin/messengerOptions')?>";
        });
    var currentUserInfo=null;

        $('.userInfo').on('click',function () {
            var userId=$(this).data('user');
            window.open("<?php echo base_url('admin/messenger/')?>"+userId,"_blank");
        });

        $('#userInfoModal').on('click','.blockUserBtn',function (e) {
            var userId=$(this).data('id');
            var form = new FormData();
            form.append("userId", userId);
            var settings = {
                "async": true,
                "crossDomain": true,
                "url": "<?php echo base_url('adminApi/blockUser')?>",
                "method": "POST",
                "headers": {
                    "authorization": "Basic YWRtaW46MTIzNA==",
                    "authorizationkeyfortoken": String(t),
                    "cache-control": "no-cache",
                    "postman-token": "ab8317be-e9f0-945f-81da-2355f4e3f0c7"
                },
                "error":function (e) {
                    toastr.error("Invalid User Id");
                },
                "processData": false,
                "contentType": false,
                "mimeType": "multipart/form-data",
                "data": form
            };
            $.ajax(settings).done(function (response) {
                $('#userInfoModal').modal('hide');
                $('#status_'+userId).html('<span class="label label-sm label-danger"> Deactivate </span>');
                currentUserInfo.data('status',0);
                currentUserInfo.data('varification',0);
                currentUserInfo=null;
                toastr.success('User Deactivated successfully');
            });
        });

        $('#userInfoModal').on('click','.verifyUserBtn',function (e) {
            var userId=$(this).data('id');
            var form = new FormData();
            form.append("userId", userId);
            var settings = {
                "async": true,
                "crossDomain": true,
                "url": "<?php echo base_url('adminApi/verifyUser')?>",
                "method": "POST",
                "headers": {
                    "authorization": "Basic YWRtaW46MTIzNA==",
                    "authorizationkeyfortoken": String(t),
                    "cache-control": "no-cache",
                    "postman-token": "ab8317be-e9f0-945f-81da-2355f4e3f0c7"
                },
                "error":function (e) {
                    toastr.error("Invalid User Id");
                },
                "processData": false,
                "contentType": false,
                "mimeType": "multipart/form-data",
                "data": form
            };
            $.ajax(settings).done(function (response) {
                $('#userInfoModal').modal('hide');
                $('#status_'+userId).html('<span  class="label label-sm label-success"> Activate </span>');
                currentUserInfo.data('status',1);
                currentUserInfo.data('varification',1);
                currentUserInfo=null;
                toastr.success('User verified successfully');
            });
        });

        $('#userInfoModal').on('click','.unblockUserBtn',function (e) {
            var userId=$(this).data('id');
            var form = new FormData();
            form.append("userId", userId);
            var settings = {
                "async": true,
                "crossDomain": true,
                "url": "<?php echo base_url('adminApi/unblockUser')?>",
                "method": "POST",
                "headers": {
                    "authorization": "Basic YWRtaW46MTIzNA==",
                    "authorizationkeyfortoken": String(t),
                    "cache-control": "no-cache",
                    "postman-token": "ab8317be-e9f0-945f-81da-2355f4e3f0c7"
                },
                "error":function (e) {
                    toastr.error("Invalid User Id");
                },
                "processData": false,
                "contentType": false,
                "mimeType": "multipart/form-data",
                "data": form
            };
            $.ajax(settings).done(function (response) {
                $('#userInfoModal').modal('hide');
                $('#status_'+userId).html('<span  class="label label-sm label-success"> Activate </span>');
                currentUserInfo.data('status',1);
                currentUserInfo.data('varification',1);
                currentUserInfo=null;
                toastr.success('User activated successfully');
            });
        });
    });
</script>

</body>
</html>