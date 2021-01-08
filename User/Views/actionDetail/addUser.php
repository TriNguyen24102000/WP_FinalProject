{% extends 'layouts/theme.html' %}

{% block pageheader %}
      <h2><i class="fa fa-pencil"></i> Profile Edit <span>Subtitle goes here...</span></h2>

{% endblock %}

{% block content %}
			<!-- Personal Info form -->
      <div class="row">

        <div class="col-md-12">
          <form name="basicForm" ng-submit="submitForm(basicForm.$valid)" class="form-horizontal form-bordered" novalidate>
          <div class="panel panel-default">
              <div class="panel-heading">
                <h1 class="panel-title">Personal Info</h1>
                <p>Please provide your name, email address (won't be published) and a summary.</p>
              </div>
              <div class="panel-body">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Name <span class="asterisk">*</span></label>
                  <div class="col-sm-9">
                    <input ng-model="user.name" type="text" name="name" class="form-control" placeholder="Type your name..." required />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Email <span class="asterisk">*</span></label>
                  <div class="col-sm-9">
                    <input ng-model="user.email" type="email" name="email" class="form-control" placeholder="Type your email..." required />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Headline</label>
                  <div class="col-sm-9">
                    <input ng-model="user.linkedin.headline" type="text" name="headline" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Summary </label>
                  <div class="col-sm-9">
                    <textarea ng-model="user.linkedin.summary" rows="5" class="form-control" placeholder="Type your comment..." required></textarea>
                  </div>
                </div>
              </div><!-- panel-body -->
          </div><!-- panel -->



              <div class="panel-footer">
                <div class="row">
                  <div class="col-sm-9 col-sm-offset-3">
                    <button class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                  </div>
                </div>
              </div>









          </form>
        </div><!-- col-md-6 -->
      </div>
      <!-- end personal info form -->

      <!-- Work Experience form -->
      <div class="row">

        <div class="col-md-12">
          <form name="basicForm" ng-submit="submitForm(profileForm.$valid)" class="form-horizontal">
          <div class="panel panel-default" novalidate>

              <div class="panel-heading">
                <h1 class="panel-title">Work Experience</h1>
                <p>Foo is king.</p>
              </div>

              <div ng-repeat="work in user.work_experiences" class="panel-body">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Title <span class="asterisk">*</span></label>
                  <div class="col-sm-9">
                    <input ng-model="work[$index].title" type="text" name="name" class="form-control" placeholder="Type your name..." required />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Company <span class="asterisk">*</span></label>
                  <div class="col-sm-9">
                    <input ng-model="work.company.name" type="text" name="name" class="form-control" placeholder="Type your name..." required />
                  </div>
                </div>
              </div><!-- panel-body -->

          </div><!-- panel -->
          </form>
        </div><!-- col-md-6 -->
      </div>
      <!-- end work experience form -->

      <!-- Education form -->
      <div class="row">

        <div class="col-md-12">
          <form id="basicForm" action="form-validation.html" class="form-horizontal form-bordered">
          <div class="panel panel-default">

              <div class="panel-heading">
                <h1 class="panel-title">Education</h1>
                <p>Foo is king.</p>
              </div>

              <div ng-repeat="experience in "class="panel-body">
                <div class="form-group">
                  <label class="col-sm-3 control-label">College/University<span class="asterisk">*</span></label>
                  <div class="col-sm-9">
                    <input type="text" name="name" class="form-control" placeholder="Type your school..." required />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Degree<span class="asterisk">*</span></label>
                  <div class="col-sm-9">
                    <input type="text" name="name" class="form-control" placeholder="Type your school..." required />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Field of Study<span class="asterisk">*</span></label>
                  <div class="col-sm-9">
                    <input type="text" name="name" class="form-control" placeholder="Type your school..." required />
                  </div>
                </div>
              </div><!-- panel-body -->



          </div><!-- panel -->



          </form>
        </div><!-- col-md-6 -->
      </div>
      <!-- end education form -->


{% endblock %}

	<script>
	jQuery(document).ready(function(){

	  // Chosen Select
	  jQuery(".chosen-select").chosen({'width':'100%','white-space':'nowrap'});

	  // Tags Input
	  jQuery('#tags').tagsInput({width:'auto'});

	  // Textarea Autogrow
	  jQuery('#autoResizeTA').autogrow();

	  // Color Picker
	  if(jQuery('#colorpicker').length > 0) {
		 jQuery('#colorSelector').ColorPicker({
				onShow: function (colpkr) {
					jQuery(colpkr).fadeIn(500);
					return false;
				},
				onHide: function (colpkr) {
					jQuery(colpkr).fadeOut(500);
					return false;
				},
				onChange: function (hsb, hex, rgb) {
					jQuery('#colorSelector span').css('backgroundColor', '#' + hex);
					jQuery('#colorpicker').val('#'+hex);
				}
		 });
	  }

	  // Color Picker Flat Mode
		jQuery('#colorpickerholder').ColorPicker({
			flat: true,
			onChange: function (hsb, hex, rgb) {
				jQuery('#colorpicker3').val('#'+hex);
			}
		});

	  // Date Picker
	  jQuery('#datepicker').datepicker();

	  jQuery('#datepicker-inline').datepicker();

	  jQuery('#datepicker-multiple').datepicker({
	    numberOfMonths: 3,
	    showButtonPanel: true
	  });

	  // Spinner
	  var spinner = jQuery('#spinner').spinner();
	  spinner.spinner('value', 0);

	  // Input Masks
	  jQuery("#date").mask("99/99/9999");
	  jQuery("#phone").mask("(999) 999-9999");
	  jQuery("#ssn").mask("999-99-9999");

	  // Time Picker
	  jQuery('#timepicker').timepicker({defaultTIme: false});
	  jQuery('#timepicker2').timepicker({showMeridian: false});
	  jQuery('#timepicker3').timepicker({minuteStep: 15});


	});
	</script>

</body>
</html>