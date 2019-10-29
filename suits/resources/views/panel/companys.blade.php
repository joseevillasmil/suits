 <hr class="hidden-md hidden-md" >
                              <div class="row">
										  @foreach($companys as $company)
											
											 <a href="{{ route('getAccount', $company->id) }}" class="ajax" data-name="Account/detail">	
												<div class="col-md-3">
													<div class="panel minimal panel-default">
														 <div class="panel-heading clearfix">
															  <div class="panel-title">{{ $company->name }}</div>

														 </div>
														 <!-- panel body -->
														 <div class="panel-body">
															  
															  
														 </div>
													</div>
											   </div>
											</a>
										  @endforeach
									</div>
									
                                  </div>
                             
                                   
                         </div>