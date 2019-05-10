 <style>


/* Common Style start */
.btn-green {
    width: 40px;
    height: 40px;
    float: left;
    background: #69cb61;
    font-size: 25px;
    color: #fff;
    font-weight: 700;
    display: inline-block;
    text-align: center;
    border: none;
    cursor: default;
    outline: none !important;
    margin-right: 10px;
}
.submit-btn,
.back-btn {
    background: #69cb61;
    box-shadow: none;
    color: #fff;
    min-width: 140px;
    font-weight: 600;
    border-radius: 0;
    padding: 6px 15px;
    font-size: 15px;
    transition: all ease .4s;
    outline: none;
}

.back-btn {
    background: #808f96;
}

.back-btn:hover,
.back-btn:active,
.back-btn:focus {
    border-color: #808f96;
    color: #fff;
    background: #808f96;
    outline: none;
    transition: all ease .4s;
}

.submit-btn:hover,
.submit-btn:active,
.submit-btn:focus {
    border-color: #35a02d;
    color: #fff;
    background: #35a02d;
    outline: none;
    transition: all ease .4s;
}

.input-control,
.form-control {
    width: 100%;
    float: left;
    font-size: 16px;
    color: #000;
    border: 1px solid #f5f5f5;
    box-shadow: 0px 0px 6px rgba(128, 142, 149, 0.75);
    padding: 7px 15px;
    border-radius: 0;
    outline: none;
}

.form-group {
    width: 100%;
    float: left;
}

textarea {
    border: 1px solid #f5f5f5;
    box-shadow: 0px 0px 6px rgba(128, 142, 149, 0.75);
    padding: 7px 15px;
    outline: none;
    flex: 1;
}

.justify-content-center {
    display: flex;
    justify-content: center;
}


.justify-spacebetween {
    display: flex;
    justify-content: space-between;
}

.align-items-center {
    align-items: center;
}

.no-padding {
    padding: 0 !important;
}

.flex {
    display: flex;
}

.flex-1 {
    flex: 1;
}

.flex-2 {
    flex: 2;
}

.flex-3 {
    flex: 3;
}

.flex-4 {
    flex: 4;
}

.full-width {
    width: 100%;
    float: left;
}

input[type=file] {
    display: block !important;
    right: 1px;
    top: 1px;
    height: 34px;
    opacity: 0;
    background: none;
    overflow: hidden;
    z-index: 4;
    position: absolute;
    left: 0;
    width: 130px;
    cursor: pointer;
}

.form-set-content .control-fileupload label {
    width: auto;
}

.file-browser {
    width: 100%;
    float: left;
    padding-top: 5px;
}

.control-fileupload {
    display: block;
    border: none;
    background: #FFF;
    width: 100%;
    height: 36px;
    line-height: 36px;
    overflow: hidden;
    position: relative;
    /* File upload button */
}

.control-fileupload:before {
    content: 'Upload File';
    float: left;
    background: #69cb61;
    box-shadow: none;
    color: #fff;
    font-weight: 600;
    border-radius: 0;
    padding: 6px 25px;
    font-size: 15px;
    transition: all ease .4s;
    outline: none;
    z-index: 1;
    line-height: 20px;
    text-align: center;
    cursor: pointer;
}

.control-fileupload label {
    line-height: 28px;
    color: #000;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    position: relative;
    z-index: 1;
    margin-left: 25px;
    cursor: text;
}

.submit-btn-container {
    width: 100%;
    float: left;
    text-align: center;
    padding: 35px 0;
}

.submit-btn-container button {
    margin: 0 10px;
}

.mt-20 {
    margin-top: 20px;
}

.pb-0 {
    padding-bottom: 0 !important;
}

.pt-0 {
    padding-top: 0 !important;
}

.mb-0 {
    margin-bottom: 0 !important;
}

/* Radio & Check Style Start */
.radio,
.checkbox {
    padding-left: 30px;
    margin: 0;
}

.radio label,
.checkbox label {
    display: inline-block;
    position: relative;
    padding-left: 5px;
}

.radio label::before,
.checkbox label::before {
    content: "";
    display: inline-block;
    position: absolute;
    width: 16px;
    height: 16px;
    left: -5px;
    margin-left: -20px;
    border-radius: 0;
    background-color: #fff;
    transition: border 0.15s ease-in-out;
    top: 5px;
    box-shadow: 0px 0px 6px rgba(128, 142, 149, 0.75);
}

.radio input[type="radio"],
.checkbox input[type="checkbox"] {
    opacity: 0;
}


.radio input[type="radio"]:checked+label::before,
.checkbox input[type="checkbox"]:checked+label::before {
    transition: border 0.15s ease-in-out;
    background-color: #6acb62;
}


.radio input[type="radio"]:disabled+label::before,
.checkbox input[type="checkbox"]:disabled+label::before {
    cursor: not-allowed;
}

.radio.radio-inline,
.checkbox.checkbox-inline {
    margin-top: 0;
}
.form-card-container .custom-radio-check {
    width: 100%;
    float: left;
    margin: 6px 0;
}
/* Radio & Check Style End */
.form-set-content table tbody tr {
    line-height: 40px
}

.form-set-content .form-control {
    border-radius: 0px;
}

/* Common Style end */
/* Header Style start */
.wrapper {
    width: 100%;
    float: left;
}

header {
    width: 100%;
    float: left;
    box-shadow: 0px 0px 6px rgba(128, 142, 149, 0.75);
}

.navbar-default {
    background-color: #fff;
    border-color: transparent;
    border: none;
    margin-bottom: 0;
}

header .navbar-default .container-fluid {
    display: flex;
    align-items: center;
}

.navbar-default .navbar-nav>li>a {
    float: left;
    padding: 30px 15px;
    color: #000000;
    font-size: 17px;
}

.navbar-brand {
    height: 80px;
}

.navbar-brand>img {
    height: 100%;
    width: auto;
}

.header-profile {
    color: #808f96;
    font-size: 28px;
    float: left;
    line-height: 24px;
}

.header-Msearch-close {
    display: none;
}

.navbar-alignit .navbar-brand {
    top: 50%;
    display: block;
    position: relative;
    height: auto;
    transform: translate(0, -50%);
    margin-right: 15px;
    margin-left: 15px;
}

.navbar-nav>li>.dropdown-menu {
    z-index: 9999;
}

.headerbar-search {
    position: relative;
    float: left;
    flex: 2;
    padding-left: 25px;
    width: 100%;
    /* margin-top: 20px; */
    margin-right: 25px;
}

.headerbar-search input {
    width: 100%;
    float: left;
    border: 1px solid #f5f5f5;
    box-shadow: 0px 0px 6px rgba(128, 142, 149, 0.75);
    padding: 7px 15px;
    padding-right: 30px;
}

.headerbar-search .header-search-icon {
    position: absolute;
    top: 8px;
    right: 9px;
    font-size: 18px;
    color: #808f96;
}

.MobileSearch {
    display: none;
}

.navbar-default .navbar-nav>.open>a,
.navbar-default .navbar-nav>.open>a:focus,
.navbar-default .navbar-nav>.open>a:hover {
    color: #000;
    background-color: transparent;
}

.dropdown-menu>li>a {
    padding: 7px 15px;
    font-weight: 300;
    color: #000;
    white-space: nowrap;
    font-size: 15px;
}

.HeaderUserProfile {
    float: left;
    padding: 26px 15px;
    padding-right: 0;
    margin-left: 10px;

}

/* Header Style end */
/* Footer style start */
.footer-top-container {
    width: 100%;
    float: left;
    padding: 70px 0;
    background: -moz-linear-gradient(top, rgba(246, 246, 246, 0.25) 0%, rgba(246, 246, 246, 0.25) 1%, rgba(246, 246, 246, 1) 100%);
    background: -webkit-linear-gradient(top, rgba(246, 246, 246, 0.25) 0%, rgba(246, 246, 246, 0.25) 1%, rgba(246, 246, 246, 1) 100%);
    background: linear-gradient(to bottom, rgba(246, 246, 246, 0.25) 0%, rgba(246, 246, 246, 0.25) 1%, rgba(246, 246, 246, 1) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#40f6f6f6', endColorstr='#f6f6f6', GradientType=0);
}

.footer-menu-container {
    width: 100%;
    float: left;
    padding: 0;
    list-style-type: none;
    margin: 0;
}

.footer-menu-container li {
    width: 100%;
    float: left;
}

.footer-menu-container li:first-child a {
    font-weight: 600;
    font-size: 16px;
}

.footer-menu-container li a {
    width: 100%;
    float: left;
    color: #000;
    font-size: 15px;
    padding: 6px 0;
    text-decoration: none;
}

.footer-news-letter-container {
    width: 100%;
    float: left;
}

.footer-news-letter-title {
    width: 100%;
    float: left;
    color: #000;
    font-weight: 600;
    font-size: 16px;
    padding: 6px 0;
}

.footer-news-letter-content {
    width: 100%;
    float: left;
    color: #000;
    font-size: 15px;
    padding: 6px 0;
}

.footer-news-letter-form {
    width: 100%;
    float: left;
    padding: 6px 0;
}

.footer-news-letter-form .submit-btn {
    font-weight: 300;
}

.footer-news-letter-form input {
    width: 100%;
    float: left;
    border: 1px solid #f5f5f5;
    box-shadow: 0px 0px 6px rgba(128, 142, 149, 0.75);
    padding: 7px 15px;
    border-radius: 0;
    margin-bottom: 15px;
}

.footer-bottom-container {
    width: 100%;
    float: left;
    background: #808f96;
}

.footer-bottom-social-set-container {
    width: 100%;
    float: left;
    padding: 25px 0px;
    display: flex;
    justify-content: center;
}

.footer-bottom-social-set {
    display: flex;
    color: #fff;
    align-items: center;
    font-size: 16px;
    font-weight: bold;
}

.footer-bottom-social-set img {
    width: auto;
    height: 40px;
}

.footer-bottom-social-set a {
    color: #fff;
}

.footer-bottom-social-set i {
    font-size: 20px;
}

.social-set-info {
    padding: 0 15px;
}

.footer-bottom-container hr {
    border-color: #fff;
    margin: 0;
}

.copyrights-container {
    width: 100%;
    float: left;
    padding: 20px 0;
    font-size: 16px;
    color: #fff;
    font-weight: 300;
    text-align: center;
}

/* Footer style end */

/* Body Container style Start */
.page-container {
    width: 100%;
    float: left;
    padding: 30px 0;
    padding-top: 50px;
}

.page-title-container {
    width: 100%;
    float: left;
}

.page-title-container .page-heading {
    width: 100%;
    float: left;
    color: #000;
    font-size: 30px;
    font-weight: bold;
    text-align: center;
}

.form-progress-bar {
    width: 100%;
    float: left;
    height: 8px;
    background-color: #b0bfc6;
    margin: 25px 0;
}

.form-progress-bar .progress-bar {
    line-height: 8px;
    background-color: #6acb62;
    box-shadow: none;
}

.form-container {
    width: 100%;
    float: left;
    padding-top: 30px;
}

.form-card-container {
    width: 100%;
    float: left;
    margin: 15px 0;
    padding: 15px 35px;
    box-shadow: 0px 0px 6px rgba(128, 142, 149, 0.75);
    position: relative;
}

.form-card-container .part-information-action {
    display: none;
}

.part-of-information-card-container .form-card-container .part-information-action {
    display: block;
}

.part-of-information-card-container .form-card-container {
    margin: 35px 0;
}

.part-of-information-card-container .form-card-container:last-child {
    margin-bottom: 15px;
}

.part-information-action {
    position: absolute;
    bottom: -50px;
    right: 0;
    cursor: pointer;
    font-size: 18px;
    font-weight: 300;
    color: #000;
}

.part-information-action i {
    color: #808f96;
    font-size: 20px;
    margin-right: 10px;
}

.form-card-container .page-heading {
    text-align: left;
}

.form-set-content {
    width: 100%;
    float: left;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 300;
}

.form-set-content label {
    float: left;
    font-size: 18px;
    font-weight: 300;
    margin-right: 20px;
}

.form-select-box {
    background: #fff;
    border: none;
    border-bottom: 1px solid #818e96;
    padding: 0px 0;
    font-weight: 600;
    color: #000;
    outline: none !important;
}

.add-new-part {
    /* width: 100%; */
    float: left;
    font-size: 18px;
    font-weight: 300;
    padding: 10px 0;
    color: #000;
    cursor: pointer;
}

.add-new-part i {
    color: #808f96;
    font-size: 20px;
    margin-right: 10px;
}

.radio-FinTech {
    width: 100%;
    float: left;
    margin: 22px 0;
}

.assurance-service .checkbox {
    float: left;
    width: 100%;
    margin: 5px 0;
}

.assurance-service {
    min-height: 322px;
}

.quote-timeline .form-set-content {
    width: auto;
}

.quote-timeline .form-set-content label {
    margin-bottom: 0;
}

.quote-timeline .delevery-width,
.quote-timeline .quantity-width,
.quote-timeline .invite-width {
    width: 100%;
}

.quote-timeline-title {
    color: #000;
    font-size: 30px;
    font-weight: bold;
    margin-right: 30px;
    white-space: nowrap;
}

/* Body Container style End */
/* Media Query Start */
@media (max-width:767px) {
    .form-group.flex {
        display: block;
    }

    .form-group.flex label {
        width: 100%;
        float: left;
    }

    .form-set-content label {
        width: 100%;
        float: left;
    }

    .form-set-content .form-control {
        width: 100%;
        float: left;
    }

    .form-group.flex .form-control {
        width: 100%;
        float: left;
    }

    .m-active {
        overflow: hidden;
    }

    .navbar-toggle {
        margin: 0;
    }

    header .navbar-menus {
        position: fixed;
        left: -70%;
        top: 0;
        bottom: 0;
        background: #fff;
        width: 250px;
        padding: 15px;
        margin: 0 !important;
        z-index: 9;
        transition: all ease .5s !important;
        height: 100vh;
    }

    .m-active .navbar-menus {
        left: 0;
        transition: all ease .5s !important;
    }

    .m-active .mobile-menu-overlay {
        position: fixed;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.65);
        z-index: 8;
    }

    .headerbar-search {
        position: fixed;
        left: 0px;
        right: 0px;
        padding: 0;
        z-index: 5;
        top: -75px;
        margin-right: 0;
        transition: all ease .5s;
        margin-top: 0;
    }

    .headerbar-search.active {
        top: 0;
        transition: all ease .5s;
    }

    .headerbar-search .input-control {
        height: 70px;
        padding-left: 50px;
        padding-right: 50px;
    }

    .navbar-brand {
        height: 70px;
    }

    .navbar-menus .navbar-brand {
        padding: 15px 0px;
    }

    .headerbar-search .header-search-icon {
        position: absolute;
        top: 0;
        left: 0;
        font-size: 18px;
        color: #808f96;
        width: 40px;
        height: 70px;
        background: #ddd;
        line-height: 64px;
        text-align: center;
        cursor: pointer;

    }

    .header-Msearch-close {
        display: block;
        position: absolute;
        top: 0;
        right: 0;
        font-size: 18px;
        color: #808f96;
        width: 40px;
        height: 70px;
        background: #ddd;
        line-height: 64px;
        text-align: center;
        cursor: pointer;
    }

    .MobileMenuRight {
        width: 100%;
        float: left;
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }

    .MobileMenuRight .MobileSearch {
        display: block;
        font-size: 20px;
        width: 32px;
        height: 32px;
        text-align: center;
        line-height: 30px;
        cursor: pointer;
    }

    .navbar-default .navbar-nav>li {
        width: 100%;
        float: left;
    }

    .navbar-default .navbar-nav>li>a {
        width: 100%;
        float: left;
    }

    .navbar-nav .dropdown-menu {
        width: 100% !important;
        float: left !important;
    }

    .navbar-nav .open .dropdown-menu>li>a {
        padding: 10px 15px;
        font-weight: 300;
        color: #000 !important;
        white-space: nowrap;
        font-size: 15px;
    }

    .navbar-nav .open .dropdown-menu>li>a:hover {
        background-color: #ddd;
    }

    .navbar-default .navbar-nav>li {
        margin-bottom: 15px;
    }

    .navbar-default .navbar-nav>li>a {
        padding: 5px 15px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .navbar-default .navbar-nav .open .dropdown-menu>li>a:focus,
    .navbar-default .navbar-nav .open .dropdown-menu>li>a:hover {
        background-color: rgba(128, 143, 150, 0.3);
    }

    .HeaderUserProfile {
        padding: 23px 15px;
    }
}

/* Cart Page Style Start */
.cart-list-container {
    width: 100%;
    float: left;
    margin: 15px 0;
    padding: 15px 15px;
    box-shadow: 0px 0px 6px rgba(128, 142, 149, 0.75);
}

.cart-product-box-left {
    width: 100%;
    height: 120px;
    display: flex;
    align-items: center;
}

.cart-product-img {
    width: 80px;
    height: 80px;
    box-shadow: 0px 0px 6px rgba(128, 142, 149, 0.75);
    margin-right: 20px;
}

.cart-product-name-content {
    width: 300px;
    float: left;
}

.cart-product-name {
    width: 100%;
    float: left;
    padding: 2px 0;
    font-size: 18px;
    font-weight: 600;
    color: #000;
}

.cart-product-modal {
    width: 100%;
    float: left;
    padding: 2px 0;
    font-size: 14px;
    font-weight: 300;
    color: #000;
}

.cart-product-box-right {
    width: 100%;
    height: 120px;
    display: flex;
    align-items: center;
    flex-direction: row;
}

.cart-product-list-set {
    width: 100%;
    float: left;
    padding: 10px 0;
}

.cart-product-list-title {
    width: 100%;
    float: left;
    padding: 2px 0;
    font-size: 18px;
    font-weight: 300;
    color: #000;
}

.cart-product-list-price {
    width: 100%;
    float: left;
    padding: 2px 0;
    font-size: 18px;
    font-weight: 800;
    color: #000;
}

.form-card-container ul {
    padding: 0;
    margin: 0;
    font-size: 18px;
}

.form-card-container ul li {
    list-style: none;
}

/* Cart Page Style End */

.Payment-signin-form-content {
    width: 100%;
    float: left;
    margin-top: 20px;
}

@media (max-width:992px) {
    .form-card-container {
        padding: 15px 15px;
    }

    .mobile-margin-top-20 {
        margin-top: 20px;
    }
    .form-card-container.flex.justify-spacebetween.align-items-center {
    display: block;
    }
    .submit-btn, .back-btn {
            min-width: 120px;
    }
    .form-card-container .submit-btn-container {
        margin-top: 15px;
            text-align: left;
    }
    .form-card-container .submit-btn-container button {
        margin-left: 0;
        margin-right: 20px;
        margin-bottom: 5px;
    }
    .form-card-container .page-heading {
    text-align: left;
    font-size: 24px;
    width: auto;
    white-space: nowrap;
}
}

@media (max-width:767px) {
    .page-title-container .page-heading {
        font-size: 20px;
    }

    .form-set-content {
        font-size: 14px;
    }

    .form-set-content label {
        font-size: 14px;
    }

    .cart-product-box-right {
        flex-wrap: wrap;
        height: auto;
    }

    .mobile-margin-top-20 {
        margin-top: 20px;
    }

    .footer-top-container .row.justify-content-center {
        display: block;
    }

    .footer-bottom-social-set-container {
        display: block;
    }

    .footer-bottom-social-set-container .footer-bottom-social-set {
        display: block;
        width: 100%;
        float: left;
        margin-bottom: 15px;
    }

    .footer-bottom-social-set-container .footer-bottom-social-set:last-child {
        margin-bottom: 0;
    }

    .footer-bottom-social-set a {
        float: left;
    }

    .social-set-info {
        width: 100%;
        float: left;
        margin-bottom: 12px;
    }

    .footer-top-container {
        padding: 15px 0;
    }

    .footer-menu-container {
        margin-bottom: 15px;
    }
}

 </style>
 <div class="page-container">
        <div class="container">
            <div class="page-title-container">
                <div class="page-heading">Request For Time Study</div>
                <div class="progress form-progress-bar">
                    <div class="progress-bar" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width:30%">
                    </div>
                </div>
                <form class="form-container" name="time_study_request" id="time_study_request" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-card-container part-of-information">
                                <div class="page-heading">Part Information</div>
                                <div class="form-set-content">
                                    <p>
                                        Would you like to see your own part being cut on a live machine demo? If yes, please provide the following information.
                                    </p>
                                </div>
                                <div class="form-set-content">
                                    <label >Machine Model(ID)</label>
                                    <select class="form-select-box" name = "machine_id">
                                        <option value="2">X-Adkc</option>
                                    </select>
                                </div>
                                <div class="form-set-content">
                                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-padding">
                                        <div class="form-group">
                                        <input name="part_name[]" class="input-control form-control" type="text" placeholder="Part 1 Name">
                                    </div>
                                    </div>
                                </div>
                                <div class="form-set-content">
                                    <label >Material Type</label>
                                    <select class="form-select-box" name="material_type[]">
                                        <option value="">Please Select</option>
                                        <option value="Material 1">Material 1</option>
                                        <option value="Material 2">Material 2</option>
                                    </select>
                                </div>
                                <div class="form-set-content">
                                    <label >Application Type</label>
                                    <select class="form-select-box" name="application_name[]">
                                        <option value="">Please Select</option>
                                        <option value="Assembly">Assembly </option>
                                        <option value="Bending">Bending</option>
                                        <option value="Forming">Forming</option>
                                        <option value="Laser Cutting">Laser Cutting</option>
                                        <option value="Laser Welding">Laser Welding</option>
                                        <option value="MIG Welding">MIG Welding</option>
                                        <option value="Punching">Punching</option>
                                        <option value="Power Coating">Power Coating</option>
                                        <option value="TIG Welding">TIG Welding</option>
                                        <option value="Laser Marking">Laser Marking</option>
                                        <option value="Laser Tube Cutting">Laser Tube Cutting</option>
                                        <option value="Grinding">Grinding</option>
                                    </select>
                                </div>
                                <div class="part-information-action">
                                    <i class="fa fa-close"></i>
                                    <span>Remove</span>
                                </div>
                            </div>
                            <div class="part-of-information-clone part-of-information-card-container">
                            </div>
                            <div class="add-new-part add-part-information">
                            	<i class="fa fa-plus-square"></i>
                            	<span>Add New</span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-card-container attach-drawing-card">
                                <div class="page-heading">Attach Drawings</div>
                                <div class="form-set-content">
                                    <label  class="full-width">Part 1</label>
                                    <div class="file-browser">
                                        <span class="control-fileupload">
                                            <label for="file"></label>
                                            <input type="file" name="drawing_upload[]" id="file">
                                        </span>
                                    </div>
                                </div>
                                <div class="form-set-content">
                                    <div class="form-group flex">
                                    <label >Description</label>
                                    <textarea class="flex form-control" name="description[]" placeholder="Ender your part description here.." rows="4"></textarea>
                                </div>
                                </div>
                                <div class="part-information-action">
                                    <i class="fa fa-close"></i>
                                    <span>Remove</span>
                                </div>
                            </div>
                            <div class="attach-drawing-clone part-of-information-card-container">
                            </div>
                            <div class="add-new-part add-attach-drawing">
                            	<i class="fa fa-plus-square"></i>
                            	<span>Add New</span>
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-card-container part-of-information">
                                <div class="page-heading">Part Information</div>
                                <div class="form-set-content">
                                    <p>
                                        Would you like to see your own part being cut on a live machine demo? If yes, please provide the following information.
                                    </p>
                                </div>
                                <div class="form-set-content">
                                    <label >Machine Model(ID)</label>
                                    <select class="form-select-box" name = "machine_id">
                                        <option value="2">X-Adkc</option>
                                    </select>
                                </div>
                                <div class="form-set-content">
                                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-padding">
                                        <div class="form-group">
                                        <input name="part_name[]" class="input-control form-control" type="text" placeholder="Part 1 Name">
                                    </div>
                                    </div>
                                </div>
                                <div class="form-set-content">
                                    <label >Material Type</label>
                                    <select class="form-select-box" name="material_type[]">
                                        <option value="">Please Select</option>
                                        <option value="Material 1">Material 1</option>
                                        <option value="Material 2">Material 2</option>
                                    </select>
                                </div>
                                <div class="form-set-content">
                                    <label >Application Type</label>
                                    <select class="form-select-box" name="application_name[]">
                                        <option value="">Please Select</option>
                                        <option value="Assembly">Assembly </option>
                                        <option value="Bending">Bending</option>
                                        <option value="Forming">Forming</option>
                                        <option value="Laser Cutting">Laser Cutting</option>
                                        <option value="Laser Welding">Laser Welding</option>
                                        <option value="MIG Welding">MIG Welding</option>
                                        <option value="Punching">Punching</option>
                                        <option value="Power Coating">Power Coating</option>
                                        <option value="TIG Welding">TIG Welding</option>
                                        <option value="Laser Marking">Laser Marking</option>
                                        <option value="Laser Tube Cutting">Laser Tube Cutting</option>
                                        <option value="Grinding">Grinding</option>
                                    </select>
                                </div>
                                <div class="part-information-action">
                                    <i class="fa fa-close"></i>
                                    <span>Remove</span>
                                </div>
                            </div>
                            <div class="part-of-information-clone part-of-information-card-container">
                            </div>
                            <div class="add-new-part add-part-information">
                            	<i class="fa fa-plus-square"></i>
                            	<span>Add New</span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-card-container attach-drawing-card">
                                <div class="page-heading">Attach Drawings</div>
                                <div class="form-set-content">
                                    <label  class="full-width">Part 1</label>
                                    <div class="file-browser">
                                        <span class="control-fileupload">
                                            <label for="file"></label>
                                            <input type="file" name="drawing_upload[]" id="file1">
                                        </span>
                                    </div>
                                </div>
                                <div class="form-set-content">
                                    <div class="form-group flex">
                                    <label >Description</label>
                                    <textarea class="flex form-control" name="description[]" placeholder="Ender your part description here.." rows="4"></textarea>
                                </div>
                                </div>
                                <div class="part-information-action">
                                    <i class="fa fa-close"></i>
                                    <span>Remove</span>
                                </div>
                            </div>
                            <div class="attach-drawing-clone part-of-information-card-container">
                            </div>
                            <div class="add-new-part add-attach-drawing">
                            	<i class="fa fa-plus-square"></i>
                            	<span>Add New</span>
                            </div>
                        </div>
                    </div>
                    <div class="submit-btn-container">
                        <button class="btn back-btn">Go Back</button>
                        <button class="btn submit-btn" type="submit" name="submit" id="submit">Submit!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $this->template->contentBegin(POS_BOTTOM); ?>

	<script>
	$(document).ready(function() {
	// File Upload Function
    $('#file').change(function() {
        var t = $(this).val();
        var labelText = t.substr(12, t.length);
        $(this).prev('label').text(labelText);
    });
     $('#file1').change(function() {
        var t = $(this).val();
        var labelText = t.substr(12, t.length);
        $(this).prev('label').text(labelText);
    });
    // Mobile Header Function
    $('.navbar-toggle').click(function() {
        $('body').addClass('m-active');
    });
    $('.mobile-menu-overlay').click(function() {
        $('body').removeClass('m-active');
    });
    // Mobile Search Function
    $('.MobileSearch').click(function() {
        $('.headerbar-search').addClass('active');
    });
    $('.header-Msearch-close').click(function() {
        $('.headerbar-search').removeClass('active');
    });

    // Form Clone Function 
    $('.add-part-information').click(function() {
        $('.part-of-information').clone().appendTo('.part-of-information-clone');
    });
    $('body').on('click', '.part-information-action', function() {
        $(this).parents('.part-of-information').remove();
    });

    $('.add-attach-drawing').click(function() {
        $('.attach-drawing-card').clone().appendTo('.attach-drawing-clone');
    });
    $('body').on('click', '.part-information-action', function() {
        $(this).parents('.attach-drawing-card').remove();
    });
});
   </script>
   
   <?php echo $this->template->contentEnd(); ?>
