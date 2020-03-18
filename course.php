<?php
  require_once('webFunctions/function.php');
  getHeader();
 ?>
    <!-- slider-start -->
    <div class="slider-area">
        <div class="page-title">
          <?php
            $sel="SELECT * FROM adm_banner ORDER BY ban_id DESC";
            $q=mysqli_query($con,$sel);
            $cdata=mysqli_fetch_assoc($q)
           ?>
            <div class="single-slider slider-height slider-height-breadcrumb d-flex align-items-center" style="background-image: url('admin/upload/<?= $cdata['ban_pic'];?>');">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider-content slider-content-breadcrumb text-center">
                                <h1 class="white-color f-700">Our Course</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider-end -->
    <!-- courses start -->
    <div class="courses-area courses-bg-height gray-bg pt-100 pb-70">
        <div class="container">
            <div class="courses-list">
                <div class="row">

                  <?php
                  $sel="SELECT * FROM adm_course ORDER BY course_id DESC";
                  $q=mysqli_query($con,$sel);
                  while($cdata=mysqli_fetch_assoc($q)){
                   ?>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="courses-wrapper course-radius-none mb-30">
                            <div class="courses-thumb">
                                <a href="#"><img src="admin/upload/<?= $cdata['course_pic'];?>" alt="image"></a>
                            </div>
                            <div class="courses-author">
                                <img width="80px" src="admin/upload/<?= $cdata['course_author_pic'];?>" alt="image">
                            </div>
                            <div class="course-main-content clearfix">
                                <div class="courses-content">
                                    <div class="courses-category-name">
                                        <span>
                                            <a href="#"><?= $cdata['course_category'];?></a>
                                        </span>
                                    </div>
                                    <div class="courses-heading">
                                        <h1><a href="#"><?= $cdata['course_title'];?></a></h1>
                                    </div>
                                    <div class="courses-para">
                                        <p><?= $cdata['course_subtitle'];?>.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="courses-wrapper-bottom clearfix">
                                <div class="courses-icon d-flex f-left">
                                    <div class="courses-single-icon">
                                        <span class="ti-user"></span>
                                        <span class="user-number">35</span>
                                    </div>
                                    <div class="courses-single-icon">
                                        <span class="ti-heart"></span>
                                        <span class="user-number">35</span>
                                    </div>
                                </div>
                                <div class="courses-button f-right">
                                    <a href="#"><?= $cdata['course_detail'];?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                  <?php } ?>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="single-courses-btn text-center mt-15 mb-30">
                            <button class="btn black-border">View all course</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- courses end -->
    <?php
      getFooter();
     ?>
