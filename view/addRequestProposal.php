<div>
	<form name="frmProposal" id="frmProposal" ng-submit="submitRequestProposalForm(frmProposal.$valid)" method="post" enctype="multipart/form-data" novalidate>
		<div class="box-body">
			<div class="row clearfix">
				<div class="form-group col-md-6 has-feedback" ng-class="{ 'has-error' : frmProposal.projectname.$invalid && (!frmProposal.projectname.$pristine || frmProposal.projectname.$touched || frmProposal.$submitted) || ((frmProposal.projectname.$error.minlength) && (frmProposal.projectname.$error.maxlength))}">
					<label for="projectname">Project Name<span>*</span></label>
					<input type="text" class="form-control" id="projectname" name="projectname" ng-model="projectname" placeholder="Enter Project Name" required="" ng-maxlength="100" ng-minlength="2">
					<span ng-show="frmProposal.projectname.$invalid && (!frmProposal.projectname.$pristine || frmProposal.projectname.$touched || frmProposal.$submitted) && (!frmProposal.projectname.$error.minlength) && (!frmProposal.projectname.$error.maxlength)" class="help-block">Project Name is required.</span>
					<span ng-show="frmProposal.projectname.$error.minlength" class="help-block">Minimum length should be 2</span>
					<span ng-show="frmProposal.projectname.$error.maxlength" class="help-block">Maximum length should be 100</span>
				</div>

				<div class="form-group col-md-6 has-feedback" ng-class="{ 'has-error' : frmProposal.projectidea.$invalid && (!frmProposal.projectidea.$pristine || frmProposal.projectidea.$touched || frmProposal.$submitted) || ((frmProposal.projectidea.$error.minlength) && (frmProposal.projectidea.$error.maxlength)) }">
					<label for="projectidea">Project Idea<span>*</span></label>
					<textarea class="form-control" name="projectidea" id="projectidea" ng-model="projectidea" placeholder="Enter Project Idea" required ng-maxlength="255" ng-minlength="2"></textarea>
					<span ng-show="frmProposal.projectidea.$invalid && (!frmProposal.projectidea.$pristine || frmProposal.projectidea.$touched || frmProposal.$submitted) && (!frmProposal.projectidea.$error.minlength) && (!frmProposal.projectidea.$error.maxlength)" class="help-block">Project Idea is required.</span>
					<span ng-show="frmProposal.projectidea.$error.minlength" class="help-block">Minimum length should be 2</span>
					<span ng-show="frmProposal.projectidea.$error.maxlength" class="help-block">Maximum length should be 255</span>
				</div>
			</div>
			
			<div class="row clearfix">
				<div class="form-group col-md-6 has-feedback" ng-class="{ 'has-error' : frmProposal.help.$invalid && (!frmProposal.help.$pristine || frmProposal.help.$touched || frmProposal.$submitted) || ((frmProposal.help.$error.minlength) && (frmProposal.help.$error.maxlength))}">
					<label for="help">Business Objective<span>*</span></label>
					<!--<input type="text" class="form-control" id="help" name="help" ng-model="help" placeholder="Enter Help" value="" required="">-->
					<textarea class="form-control" name="help" id="help" ng-model="help" placeholder="Enter Business Objective" ng-maxlength="255" ng-minlength="2" required></textarea>
					<span ng-show="frmProposal.help.$invalid && (!frmProposal.help.$pristine || frmProposal.help.$touched || frmProposal.$submitted) && (!frmProposal.help.$error.minlength) && (!frmProposal.help.$error.maxlength)" class="help-block">Business Objective is required.</span>
					<span ng-show="frmProposal.help.$error.minlength" class="help-block">Minimum length should be 2</span>
					<span ng-show="frmProposal.help.$error.maxlength" class="help-block">Maximum length should be 255</span>
				</div>
				<?php /*
				<div class="form-group col-md-6 has-feedback" ng-class="{'has-error' : frmProposal.technology.$viewValue.length == 0 && frmProposal.$submitted }">
					<label for="technology">Technology Preference<span>*</span></label>
					<bsp-select multiple id="technology" class="form-control"  name="technology" ng-model="technology" empty-label="Select Technology Preference" nws="%2C+" filter="Filter ..." required=''  ng-change="addOtherField()">
						<bsp-optgroup data-ng-repeat="parentData in tech_data" selectable >{{parentData.name}}
							<bsp-option data-ng-repeat="childData in parentData.children" value="{{childData.id}}">{{childData.name}}</bsp-option>
						</bsp-optgroup>
					</bsp-select>
					<span ng-show="frmProposal.technology.$viewValue.length == 0 && frmProposal.$submitted" class="help-block">Technology Preference is required.</span>
				</div>
				<div id="othersdiv"></div>
			</div>
			
			<div class="row clearfix">
				<div class="form-group col-md-6 has-feedback pr-cust-datepickr" ng-class="{ 'has-error' : frmProposal.psd.$invalid && (!frmProposal.psd.$pristine || frmProposal.psd.$touched || frmProposal.$submitted) }">
					<label for="psd">Project Start Date<span>*</span></label>
					<p class="input-group">
						<input type="text" class="form-control" name='psd' ng-click="open($event)" id='datepicker' datepicker-popup="{{format}}" ng-model="psd" is-open="opened" min-date="minDate" datepicker-options="dateOptions" close-text="Close" readonly required="" my-date/>
					<span class="input-group-btn">
							<button type="button" class="btn btn-default" ng-click="open($event)"><i class="glyphicon glyphicon-calendar"></i></button>
					</span>
					</p>
					<span ng-show="frmProposal.psd.$invalid && (!frmProposal.psd.$pristine || frmProposal.psd.$touched || frmProposal.$submitted)" class="help-block">Project Start Date is required.</span>
				</div>*/ ?>
				<div class="form-group col-md-6 has-feedback">
					<label for="attachment">Attachment</label>
					<input type="file" name="attachment[]" id="attachment" file-model="attachment[]" multiple ng-file-model="files">
					<div class="prof-marg"><p ng-repeat = "filesListData in filesList"> {{filesListData.attach_image}}<a ng-if="filesListData.attach_image" href="" class="deleteHandle" ng-click="deleteFile(filesListData.attach_id)"><i class="fa fa-trash"></i></a></p></div>
					<div><span class="file_error">{{FileMessage}}</span></div>
					<span>Note: Please Upload only doc|docx, pdf, xls|xlsx file type. File size max is: 8MB.</span>       
				</div>
			</div>
			
			<div class="box-footer text-center">
				<button type="submit" class="btn btn-primary subbtn" name="btnaddProposal" id="btnaddClient" ng-disabled="isDisabled">Add</button>
			</div>
		</div>
		<!-- /.box-body -->
		<div id="overlay" ng-show="loader"></div>
	</form>
</div>