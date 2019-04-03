<?php $this->template->contentBegin(POS_TOP);?>
<style>
p{
	font-size: 13px!important;
    line-height: 20px;}
</style>
<?php $this->template->contentEnd();  ?> 
<div class="container">
    <center><h1>Sitemap</h1></center>
    <div class="col-sm-12 padd-0">
      <div class="col-sm-10 pading_left_0">
          <h3 class="">Explore The Marketplace</h3>
          <div class="col-sm-4 pading_left_0">
              <div class="sitemap-links">
                  <h4>Machines & Supplies</h4>
                  <ul>
                    <li><a href="<?php echo site_url();?>machine">Machines</a></li>
                    <li><a href="<?php echo site_url();?>ecommerce/product-category/spare-parts/">Spares</a></li>
                    <li><a href="<?php echo site_url();?>ecommerce/product-category/toolings/">Toolings</a></li>
                    <li><a href="<?php echo site_url()?>pages/digital_manufacturing">Manufacture</a></li>
                  </ul>
              </div>
          </div>
          <div class="col-sm-4 pading_left_0">
            <div class="sitemap-links">
                <h4>Remote Services</h4>
                <ul>
                  <li><a href="<?php echo site_url();?>remotetraining">Remote training</a></li>
                  <li><a href="<?php echo site_url();?>consultant">Remote Machine Service</a></li>
                  <li><a href="<?php echo site_url();?>remoteapplication/">Remote Application consulting</a></li>
                  <li><a href="<?php echo site_url();?>remoteprogramming">Remote programming</a></li>
                </ul>
            </div>
          </div>
          <div class="col-sm-4 pading_left_0">
            <div class="sitemap-links">
                <h4>Collaboration Services</h4>
                <ul>
                  <li><a href="<?php echo site_url();?>community/forum">User Communities</a></li>
                  <li><a href="<?php echo site_url();?>pages/commingsoon">Group Buying</a></li>
                  <li><a href="<?php echo site_url();?>mediacenter">Media Center</a></li>
                  <li><a href="<?php echo site_url();?>events">Live Events</a></li>
                </ul>
            </div>
          </div>
          <div class="clearfix" style="border-bottom: 1px solid #ccc;margin: 10px 0;"></div>
          <div class="">
              <div class="col-sm-4 pading_left_0">
                <div class="sitemap-links">
                  <h4>Market Intelligence</h4>
                  <ul>
                    <li><a href="<?php echo site_url();?>pages/commingsoon">Market Research</a></li>
                    <li><a href="<?php echo site_url();?>pages/commingsoon">Business analytics</a></li>
                    <li><a href="<?php echo site_url();?>pages/commingsoon">Consulting</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-sm-4 pading_left_0">
                <div class="sitemap-links">
                  <h4>Buy on TERANEX.io</h4>
                  <ul>
                    <li><a href="<?php echo site_url()."footer/allCategories";?>">All Categories</a></li>
                    <li><a href="#">Request for Quotation</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-sm-4 pading_left_0">
                <div class="sitemap-links">
                  <h4>Sell on TERANEX.io</h4>
                  <ul>
                    <li><a href="#">Supplier Membership</a></li>
                    <li><a href="#">Service Provider Membership</a></li>
                    <li><a href="#">Learning Center</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-sm-4 pading_left_0">
                <div class="sitemap-links">
                  <h4>Customer Services</h4>
                  <ul>
                    <li><a href="#">Help Center</a></li>
                    <li><a href="<?php echo site_url()."pages/contact";?>">Contact Us</a></li>
                    <li><a href="#">Report Abuse</a></li>
                    <li><a href="#">Submit a Dispute</a></li>
                    <li><a href="#">Policies &amp; Rules</a></li>
                    <li><a href="#">Get Paid for Your Feedback</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-sm-4 pading_left_0">
                <div class="sitemap-links">
                  <h4>About Us</h4>
                  <ul>
                    <li><a href="<?php echo site_url()."pages/about";?>">About TERANEX.io</a></li>
                    <li><a href="<?php echo site_url()."pages/team";?>">Team</a></li>
                    <li><a href="<?php echo site_url()."pages/signIn";?>">Sign Up</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-sm-4 pading_left_0">
                <div class="sitemap-links">
                  <h4>Trade Services</h4>
                  <ul>
                    <li><a href="<?php echo site_url()."pages/suppliers";?>">Trade Assurance</a></li>
                    <li><a href="<?php echo site_url()."pages/serviceproviders";?>">Business Identity</a></li>
                    <li><a href="<?php echo site_url()."pages/market_place";?>">Logistics Service</a></li>
                    <li><a href="<?php echo site_url()."pages/market_place";?>">Secure Payment</a></li>
                    <li><a href="<?php echo site_url()."pages/market_place";?>">Inspection Service</a></li>
                  </ul>
                </div>
              </div>
          </div>
      </div>
      <div class="col-sm-2 padd-0">
        <br/>
        <div style="border: 1px solid #e7e7e7;">
          <div class="gray_bg">
              <p class="padd_5">Submit Complaints</p>
            </div>
          <div class="side_option">
            <ul>
              <li><a href="<?php echo site_url()."footer/ReportAbuse";?>">Report Abuse</a></li>
              <li><a href="<?php echo site_url()."footer/submitAdispute";?>">Submit a Dispute</a></li>
            </ul>
          </div>
        </div>
        <div class="clearfix"></div><br/>
        <div style="border: 1px solid #e7e7e7;">
          <div class="gray_bg">
              <p class="padd_5">Trade Services</p>
            </div>
          <div class="side_option">
            <ul>
              <li><a href="<?php echo site_url()."footer/tradeAssurance";?>">Trade Assurance</a></li>
              <li><a href="<?php echo site_url()."footer/securePayment";?>">Secure Payments</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="clearfix"></div><br/>
</div>
 