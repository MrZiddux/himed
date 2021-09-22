<x-applayout title="Blogs">
	<div class="container-fluid py-5">
		<div class="container">
			<h6 class="t-size-md t-bold t-color-primary text-center mb-3">Artikel Kesehatan</h6>
			<!-- <div class="row g-3 mb-3">
				<div class="col-8">
					<div class="card overlow-hidden bg-dark img-full rounded-0 border-0 h-100" style="background-image: url('/images/image-6.png'); height: 10rem;">
						<div class="d-flex flex-column align-items-start justify-content-end p-5 pb-3">
							<h2 class="pt-5 mt-5 mb-4 lh-1 t-semibold text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a mattis dui.</h2>
							<ul class="d-flex list-unstyled">
								<li class="me-auto text-white t-size">Oleh <span class="t-color-primary t-semibold t-size">Rivaldi Gunawan Yusuf</span> Sep 13, 2021</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-4">
					<div class="row g-3">
						<div class="col-12">
							<div class="card bg-dark img-full rounded-0 border-0 overlow-hidden" style="background-image: url('/images/image-5.png'); height: 10rem;">
								<div class="d-flex flex-column align-items-start justify-content-end p-5 pb-3">
									<h2 class="pt-5 mt-5 mb-4 lh-1 t-semibold text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a mattis dui.</h2>
									<ul class="d-flex list-unstyled">
										<li class="me-auto text-white t-size">Oleh <span class="t-color-primary t-semibold t-size">Rivaldi Gunawan Yusuf</span> Sep 13, 2021</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="card bg-dark img-full rounded-0 border-0 overlow-hidden" style="background-image: url('/images/image-6.png'); height: 10rem;">
								<div class="d-flex flex-column align-items-start justify-content-end p-5 pb-3">
									<h2 class="pt-5 mt-5 mb-4 lh-1 t-semibold text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a mattis dui.</h2>
									<ul class="d-flex list-unstyled">
										<li class="me-auto text-white t-size">Oleh <span class="t-color-primary t-semibold t-size">Rivaldi Gunawan Yusuf</span> Sep 13, 2021</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row row-cols-3 g-3">
				<div class="col">
					<div class="card bg-dark img-full rounded-0 border-0 overlow-hidden" style="background-image: url('/images/image-6.png'); height: 10rem;">
						<div class="d-flex flex-column align-items-start justify-content-end p-5 pb-3">
							<h2 class="pt-5 mt-5 mb-4 lh-1 t-semibold text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a mattis dui.</h2>
							<ul class="d-flex list-unstyled">
								<li class="me-auto text-white t-size">Oleh <span class="t-color-primary t-semibold t-size">Rivaldi Gunawan Yusuf</span> Sep 13, 2021</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="card bg-dark img-full rounded-0 border-0 overlow-hidden" style="background-image: url('/images/image-6.png'); height: 10rem;">
						<div class="d-flex flex-column align-items-start justify-content-end p-5 pb-3">
							<h2 class="pt-5 mt-5 mb-4 lh-1 t-semibold text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a mattis dui.</h2>
							<ul class="d-flex list-unstyled">
								<li class="me-auto text-white t-size">Oleh <span class="t-color-primary t-semibold t-size">Rivaldi Gunawan Yusuf</span> Sep 13, 2021</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="card bg-dark img-full rounded-0 border-0 overlow-hidden" style="background-image: url('/images/image-6.png'); height: 10rem;">
						<div class="d-flex flex-column align-items-start justify-content-end p-5 pb-3">
							<h2 class="pt-5 mt-5 mb-4 lh-1 t-semibold text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a mattis dui.</h2>
							<ul class="d-flex list-unstyled">
								<li class="me-auto text-white t-size">Oleh <span class="t-color-primary t-semibold t-size">Rivaldi Gunawan Yusuf</span> Sep 13, 2021</li>
							</ul>
						</div>
					</div>
				</div>
			</div>	 -->
		</div>
	</div>

	<div class="container-fluid py-5">
		<div class="container">
			<h6 class="t-size t-semibold">Artikel <span class="t-size t-semibold t-color-primary">Terpopuler</span></h6>
			<div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 align-items-center g-3">
				@foreach ($data as $item)
				<div class="col">
					<a href="/blogs/{{ $item->slug }}" class="text-decoration-none">
						<img src="/images/uploads/articles/{{ $item->thumbnail }}" alt="Populer Artikel Image" class="img-fluid">
						@php
							$tags = explode('|', $item->tags);
						@endphp
						<p class="t-size-sm t-color-lightgray text-center mt-1 mb-0">- {{ $tags[0] }} -</p>
						<h6 class="t-size t-semibold text-center">{{ $item->title }}</h6>
						<p class="t-size-sm t-color-lightgray text-center">{{ date('d F Y', strtotime($item->created_at)) }} | {{ $item->author }}</p>
					</a>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</x-applayout>