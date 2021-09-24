<x-applayout title="Detail Blogs">
	<div class="container-fluid py-5">
		<div class="container">
			<div class="row g-4">
				<div class="col-lg-8 ww-break-word">
					<img src="/images/uploads/articles/{{ $data->thumbnail }}" alt="Blog Image" class="img-full2 d-block mb-4"	
					>	
					<h2 class="t-bold t-color-primary">{{ $data->title }}</h2>
					<div class="content">
						@php
							echo $data->content;
						@endphp
					</div>
					<h2 class="t-bold t-color-primary mt-5 mb-3">Tags</h2>
					<div class="d-flex flex-wrap gap-3">
						@php
							$tags = explode('|', $data->tags);
						@endphp
						@for ($i = 0; $i < count($tags); $i++)
							<a href="/blogs/tag/{{ $tags[$i] }}" class="btn btn-sm border-color-primary t-color-primary hover-bg-primary hover-text-white transition">{{ $tags[$i] }}</a>
						@endfor
					</div>
				</div>
				<div class="col-lg-4">
					<h4 class="t-bold t-color-primary mb-3">Search</h4>
					<form action="{{ route('blog.search') }}" method="GET" class="d-flex mb-3">
						<input type="search" name="keyword" class="form-control rounded-0 rounded-start-1">
						<button type="submit" class="btn bg-color-primary text-white hover-btn-color-primary rounded-0 rounded-end-1 transition">Search</button>
					</form>
					<h4 class="t-bold t-color-primary mb-3">Artikel Populer</h4>
					@foreach ($popularData as $item)
					<a href="/blogs/{{ $item->slug }}" class="text-decoration-none">
						<div class="d-flex">
							<div class="flex-shrink-0">
								<img src="/images/uploads/articles/{{ $item->thumbnail }}" alt="Popular Image" style="object-fit: cover; object-position: center;" width="80px" height="80px">
						  </div>
						  <div class="flex-grow-1 ms-3">
								<h6 class="t-semibold">{{ $item->title }}</h6>
								@php
									$dom = new DOMDocument();
									libxml_use_internal_errors(true);
									$dom->loadHtml($data->content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
									libxml_clear_errors();
									$paragraf = $dom->getElementsByTagName('p');
								@endphp
						    <p class="t-ellipsis">
									{{ $paragraf[0]->nodeValue }}
								</p>
						  </div>
						</div>
					</a>
					@endforeach
					
				</div>
				<h2 class="t-bold t-color-primary mt-5 mb-5">Komentar</h2>
				<form action="" method="">
					<div class="form-group mb-5">
						<input type="text" class="form-control form-custom" name="nama" id="nama" required>
						<label for="nama" class="form-label label-custom">Nama</label>
					</div>
					<div class="form-group mb-5">
						<input type="email" class="form-control form-custom" name="email" id="email" required>
						<label for="email" class="form-label label-custom">Email</label>
					</div>
					<div class="form-group mb-5">
						<textarea type="text" class="form-control textarea-custom" name="nama" id="nama" rows="4" required></textarea>
						<label for="nama" class="form-label label-textarea">Komentar</label>
					</div>
					<div class="d-flex justify-content-between">
						<button type="button" class="btn bg-color-primary text-white hover-btn-color-primary transition">Kirim Komentar</button>
						<button type="reset" class="btn btn-sm border-color-secondary hover-bg-secondary hover-text-white t-color-secondary transition">Reset Komentar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</x-applayout>