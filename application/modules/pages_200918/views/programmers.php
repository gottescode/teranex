<?php session_start();
include('header.php'); 
?>

<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4">
      <ul>
        <li class="myprofile">Programmers</li>
      </ul>
    </div>
  </div>
  <!-- /.container --> 
</div>
<!-- /.myprofile-bg dahboard-bg -->

<div class="container-fluid programmers-grey-bg">
  <div class="container">
    <div class="col-sm-12">
        <form class="navbar-form search-padd" role="search">
        <div class="col-sm-3 input-group">
            <input type="text" class="form-control search-go" placeholder="Search" name="q">
            <div class="input-group-btn">
                <button class="btn btn-default search-go" type="submit"><span>Go</span></button>
            </div>
        </div>
        </form>
    </div>
    
    <div class="col-sm-8 col-md-10">
     <div class="col-sm-4 col-md-2">
     <form>
     <div class="form-group advanced-marg">
          <label for="inputEmail3" class="sort-by">Sort by:</label>
          <div class="col-sm-1">
            <select name="cars" class="form-control input-form sort-input">
              <option value="volvo">English</option>
              <option value="saab">Saab</option>
              <option value="fiat">Fiat</option>
              <option value="audi">Audi</option>
            </select>
          </div>
        </div>
        </form>
     </div>
     
     <div class="col-sm-4 col-md-2"> <a href="#"><span class="advanced-search">Advanced Search</span></a></div>
     </div>
     
     
     <div class="col-sm-4 col-md-2 sortby-marg">
     <p><span class="one-ten-text">1 - 10</span> of 64 Programmers</p>
     </div>
    
  </div>
  <!-- /.container --> 
</div>
<!-- /.container-fluid -->

  <div class="container">
    <center>
      <h1 class="meet-some-text">Meet our pool of programmers</h1>
    </center>
      <div class="container">
      <div class="row">
        <div class="col-sm-4">
        <div class="amit-border">
         <img src="images/meet-img1.jpg">
          <div class="amit-text">
            <span class="amit-das-text">Amit Das</span>
<span class="certified">Certified Public Bookkeeper</span>
            <ul>
            <li>CAD/CAM Solidworks</li>
            <li>CAD/CAM Amada soft</li>
            </ul>
            <button type="submit" class="btn btn-default addmore-btn">View Profile </button>
          </div>
        </div>
        </div>
        
        <div class="col-sm-4">
        <div class="amit-border">
         <img src="images/meet-img1.jpg">
          <div class="amit-text">
            <span class="amit-das-text">Amit Das</span>
<span class="certified">Certified Public Bookkeeper</span>
            <ul>
            <li>CAD/CAM Solidworks</li>
            <li>CAD/CAM Amada soft</li>
            </ul>
            <button type="submit" class="btn btn-default addmore-btn">View Profile </button>
          </div>
        </div>
        </div>
        
        <div class="col-sm-4">
        <div class="amit-border">
         <img src="images/meet-img1.jpg">
          <div class="amit-text">
            <span class="amit-das-text">Amit Das</span>
<span class="certified">Certified Public Bookkeeper</span>
            <ul>
            <li>CAD/CAM Solidworks</li>
            <li>CAD/CAM Amada soft</li>
            </ul>
            <button type="submit" class="btn btn-default addmore-btn">View Profile </button>
          </div>
        </div>
        </div>
        
        <div class="col-sm-4">
        <div class="amit-border">
         <img src="images/meet-img1.jpg">
          <div class="amit-text">
            <span class="amit-das-text">Amit Das</span>
<span class="certified">Certified Public Bookkeeper</span>
            <ul>
            <li>CAD/CAM Solidworks</li>
            <li>CAD/CAM Amada soft</li>
            </ul>
            <button type="submit" class="btn btn-default addmore-btn">View Profile </button>
          </div>
        </div>
        </div>
        
        <div class="col-sm-4">
        <div class="amit-border">
         <img src="images/meet-img1.jpg">
          <div class="amit-text">
            <span class="amit-das-text">Amit Das</span>
<span class="certified">Certified Public Bookkeeper</span>
            <ul>
            <li>CAD/CAM Solidworks</li>
            <li>CAD/CAM Amada soft</li>
            </ul>
            <button type="submit" class="btn btn-default addmore-btn">View Profile </button>
          </div>
        </div>
        </div>
        
        <div class="col-sm-4">
        <div class="amit-border">
         <img src="images/meet-img1.jpg">
          <div class="amit-text">
            <span class="amit-das-text">Amit Das</span>
<span class="certified">Certified Public Bookkeeper</span>
            <ul>
            <li>CAD/CAM Solidworks</li>
            <li>CAD/CAM Amada soft</li>
            </ul>
            <button type="submit" class="btn btn-default addmore-btn">View Profile </button>
          </div>
        </div>
        </div>
        </div>
      </div>
    
    <div class="container">
    <nav aria-label="...">
  <ul class="prog-pagi pagination pagination-sm">
    <li class="page-item">
      <a class="page-link" href="#" tabindex="-1">Result Pages </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1,</a></li>
    <li class="page-item"><a class="page-link" href="#">2,</a></li>
    <li class="page-item"><a class="page-link" href="#">3,</a></li>
    <li class="page-item"><a class="page-link" href="#">4,</a></li>
    <li class="page-item"><a class="page-link" href="#">5,</a></li>
    <li class="page-item">
      <a class="page-link" href="#">...Next >></a>
    </li>
  </ul>
</nav>
</div>

<center>
	<button type="submit" class="btn btn-default request-btn">Conference Booking </button>
</center>
    
    <div class="clearfix"></div>
  </div>

<?
include('footer.php'); 
?>
