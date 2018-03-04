<?php $this->load->view("/elements/header") ?>

		<!--  USER INPUT -->
		<section class="jumbotron text-center" id="user-input-section">
			<div class="container">
				<h1 class="jumbotron-heading">Books recommendation system</h1>
				<p class="lead text-muted">Please enter your goodreads.com profile or id below.</p>

		      <div class="mb-3">
  				      <input type="text" class="form-control" id="user-id"
  				 	        placeholder="Eg. https://www.goodreads.com/user/show/145381-brian or just 145381">
  					<div id="invalid-input-feedback" style="display:none; color:red;">
              <p style="margin:0;">Please enter the profile in the correct format.</p>
              <p>Eg. https://www.goodreads.com/user/show/145381-brian or just 145381</p>
  					</div>
	        </div>
				<p>
					<input type="button" class="btn btn-primary my-2"
            disabled=true
            id="user-input-button" value="Recommend books!"/>
				</p>

			<p class="lead text-muted" style="font:small"> The system will use your
				 publicly shared data on Goodreads.com to recommend books you
				 might like :) </p>
			</div>
		</section>

    <section class="jumbotron" id="loading-gif-section" style="display:none; margin-top:50px;">
      <div class="lds-css" style="width:10%; float:left;">
        <div class="lds-gear" style="height:100%;">
          <div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
          </div>
        </div>
      </div>
      <div style="width:90%; float:left; text-align:left;">
        <h1>Generating book recommendations...</h1>
      </div>
      <div style="width: 100%; background-color: red; clear:both">
      </div>

    </section>

<?php $this->load->view("/elements/footer"); ?>
