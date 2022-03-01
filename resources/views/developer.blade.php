<section class="content-header">
	<h1>
		بيانات
		<small>
			التواصــــــــــــل
		</small>
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
	</h1>
</section>
<section class="content">
	<div class="box box-primary">
		<table class="table table-bordered">
			<tr>
				@if(config('developer.logo'))
				<td class="text-center">
					<img style="width: 200px;" src="{{config('developer.logo')}}">
				</td>
				@endif
				<td>
			        <table class="table table-bordered">
						<tr>
							<td>اﻷســــم</td>
							<td>
			                    {{config('developer.developer_'.App::getLocale())}}
			                    
			                </td>
						</tr>
						@if(config('developer.mobile'))
						<tr>
							<td>المــوبيل</td>
							<td> {{config('developer.mobile')}}</td>
						</tr>
						@endif
						@if(config('developer.certification'))
			            <tr>
			                <td>المؤهل</td>
			                <td>{{config('developer.certification')}}</td>
			            </tr>
			            @endif
						@if(config('developer.address'))
						<tr>
							<td>الـعنـــــوان</td>
							<td>{{config('developer.address')}}</td>
						</tr>
						@endif
						@if(config('developer.email'))
			            <tr>
			                <td>البريد الإلكترونــــي</td>
			                <td>{{config('developer.email')}}</td>
			            </tr>
			            @endif
			            @if(config('developer.website'))
			            <tr>
			                <td>الموقع الإلكترونــــي</td>
			                <td>{{config('developer.website')}}</td>
			            </tr>
			            @endif
					</table>
				</td>
			</tr>
		</table>
	</div>
</section>
