
<?php $this->load->view("/elements/header") ?>

    <!-- Begin page content -->

		<!--  Show User's profile-->
		<!--  Show previously rated books -->
  	<section  class="jumbotron" id="user-profile-section" style="height:500px; overflow:auto;">
  		<div class="bg-dark text-white" style="width: 25%; height:100%; float:left; overflow-y:scroll;">
  			<p class="lead" style="padding-left:20px; padding-top:30px;">
           Hello <?php echo $profile_data['name']; ?> !!!
        </p>
  			<img style="padding-left:20px" src="<?php echo $profile_data['image']; ?>"/>
  			<p class="lead" style="padding-left:20px; padding-top:30px; padding-right:5px;">
  				You joined goodreads in <?php echo $profile_data['joined']; ?>, and have since added
           <?php echo $profile_data['num_books']; ?> books to your shelves. </p>
  		</div>


  		<div class="bg-light" style="width: 75%; height:100%; float:right; overflow-y:scroll">
        <?php if (sizeof($reviews_data) == 0) { ?>
          <h3 style="padding:20px"> You have not rated any books on goodreads.</h3>
        <?php } else { ?>
          <h3 style="padding:20px"> Your ratings on goodreads..</h3>
          <?php foreach ($reviews_data as $review) { ?>
            <div id="book-rating" style="padding-left:20px;padding-bottom:20px;">
              <div style="float:left; height:100%; width:10%; padding-top:2px;">
                <?php
                  $rating = $review['rating'];
                  $fullstars_count = 0; $halfstars_count = 0; $empty_starts = 0;
                  while ($rating >= 1) {
                    $fullstars_count = $fullstars_count + 1;
                    $rating = $rating - 1;
                  }
                  if ($rating > 0) {
                    $halfstars_count = $halfstars_count + 1;
                  }
                  $empty_stars = 5 - $fullstars_count - $halfstars_count;
                  for ($i = 0; $i < $fullstars_count; $i++) {
                    echo '<span class="fa fa-star checked"></span>';
                  }
                  for ($i = 0; $i < $halfstars_count; $i++) {
                    echo '<span class="fa fa-star-half-full checked"></span>';
                  }
                  for ($i = 0; $i < $empty_stars; $i++) {
                    echo '<span class="fa fa-star"></span>';
                  }
              ?>
            </div>
            <div style="float:right; height:100%;  width:90%;">
              <span class="lead text-muted">
                <a target="_blank" href="<?php echo $review['book_link']?>"><span style="color:#6c757d"><?php echo $review['book_name'] ?></span></a>
                &mdash;
                <a target="_blank" href="<?php echo $review['author_link']?>"><span style="color:#365899"> <?php echo $review['author']?> </span></a>
              </span>
            </div>
            <div style="width: 100%; clear:both;"> </div>
          </div>
          <?php } ?>
        <?php } ?>

  		</div>

  	</section>


  	<!--  Show recommended books -->
    <section  class="jumbotron" id="books-recommended-section" style="padding-top:10px">
      <h2>Books you might like..</h2>

      <div>
        <div id="book-recommendation" style="padding:20px;">
          <span class="lead text-muted">The selfish gene &mdash;</span> <span style="color:#365899"> Richard Dawkins</span>
        </div>
      </div>
   </section>


<?php $this->load->view("/elements/footer"); ?>
