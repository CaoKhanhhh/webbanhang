<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Danh mục</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							
							
							@foreach($cates as $key => $ca)
							@if($key >4)
							@break
							@endif

							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="{{Route('product.list' , ['id' => $ca->id])}}">{{$ca->cate_name}}</a></h4>
								</div>
							</div>
							@endforeach
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#tuychonkhac">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Tùy chọn khác
										</a>
									</h4>
								</div>
								<div id="tuychonkhac" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											@foreach($cates as $key => $ca)
											@if($key<=4)
											@continue
											@endif
											<li>
												<a href="{{route('product.list' , ['id' => $ca->id])}}">
													{{$ca->cate_name}}
												</a>
											</li>
											@endforeach
										</ul>
									</div>
								</div>
							</div>
							
						</div><!--/category-products-->
					
											
					</div>
				</div>