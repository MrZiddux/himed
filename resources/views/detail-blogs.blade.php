<x-applayout title="Detail Blogs">
	<div class="container-fluid py-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<img src="/images/image-5.png" alt="Blog Image" class="img-full2 d-block mb-4"	
					>	
					<h2 class="t-bold t-color-primary">Ini Judul Blogs</h2>
					<p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus natus ipsum labore eligendi aliquam consectetur fugit et unde ut asperiores odio odit officia, voluptatem quia quo qui nostrum autem, sequi maxime consequuntur id, eius eum ab illo accusamus. Molestias, enim, totam autem adipisci aliquid omnis cumque quibusdam repellendus pariatur distinctio? Amet neque tempora laudantium blanditiis quaerat adipisci, maxime accusantium nostrum facere cum ratione minima aspernatur repellendus, praesentium ex rerum vel perferendis ea? Incidunt id ex reiciendis qui ullam sunt repudiandae similique ea itaque expedita voluptatum labore, dolorem ipsa reprehenderit repellendus architecto fuga iusto eaque perspiciatis dolorum? Optio minima
					<br><br>
					modi, accusantium dicta provident. Quia error ipsam voluptatibus labore hic? Ullam officia recusandae nam reiciendis, explicabo sapiente voluptas debitis voluptatibus similique laborum placeat minus, unde natus, perferendis. Exercitationem dignissimos mollitia distinctio in dicta, culpa voluptas aut dolorum quibusdam, voluptates sequi sint omnis ipsa, et nesciunt quas soluta. Perferendis excepturi distinctio placeat exercitationem est numquam. Esse, corporis dicta ipsam facere assumenda iste ad aperiam architecto est, incidunt laudantium modi. Nam explicabo, quam eos possimus ipsam voluptas labore illo accusamus provident eligendi fugiat dolorum pariatur nostrum! Minus laboriosam aliquam excepturi, eaque, ad, exercitationem nisi distinctio itaque hic temporibus totam eos harum ratione dolores odit.</p>
					<h2 class="t-bold t-color-primary mt-5 mb-3">Tags</h2>
					<div class="d-flex flex-wrap gap-3">
						<a href="#" class="btn btn-sm border-color-primary t-color-primary hover-bg-primary hover-text-white transition">Himed</a>
						<a href="#" class="btn btn-sm border-color-primary t-color-primary hover-bg-primary hover-text-white transition">Kesehatan</a>
						<a href="#" class="btn btn-sm border-color-primary t-color-primary hover-bg-primary hover-text-white transition">Obat</a>
						<a href="#" class="btn btn-sm border-color-primary t-color-primary hover-bg-primary hover-text-white transition">Muka</a>
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
				<div class="col-lg-4">
					<h4 class="t-bold t-color-primary mb-3">Search</h4>
					<form action="" method="" class="d-flex mb-3">
						<input type="search" class="form-control rounded-0 rounded-start-1">
						<button type="button" class="btn bg-color-primary text-white hover-btn-color-primary rounded-0 rounded-end-1 transition">Search</button>
					</form>
					<h4 class="t-bold t-color-primary mb-3">Artikel Populer</h4>
					<a href="#" class="text-decoration-none">
						<div class="d-flex">
						  <div class="flex-shrink-0">
						    <img src="/images/image-5.png" alt="Popular Image" style="object-fit: cover; object-position: center;" width="80px" height="80px">
						  </div>
						  <div class="flex-grow-1 ms-3">
						  	<h6 class="t-semibold">Judul Website</h6>
						    <p class="t-ellipsis">This is some content from a media component. You can replace this with any content and adjust it as needed. Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta qui cumque hic ab facilis necessitatibus enim quia, aspernatur, tenetur dolor!</p>
						  </div>
						</div>
					</a>
					<a href="#" class="text-decoration-none">
						<div class="d-flex">
						  <div class="flex-shrink-0">
						    <img src="/images/image-6.png" alt="Popular Image" style="object-fit: cover; object-position: center;" width="80px" height="80px">
						  </div>
						  <div class="flex-grow-1 ms-3">
						  	<h6 class="t-semibold">Judul Website</h6>
						    <p class="t-ellipsis">This is some content from a media component. You can replace this with any content and adjust it as needed. Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta qui cumque hic ab facilis necessitatibus enim quia, aspernatur, tenetur dolor!</p>
						  </div>
						</div>
					</a>
					<a href="#" class="text-decoration-none">
						<div class="d-flex">
						  <div class="flex-shrink-0">
						    <img src="/images/image-2.png" alt="Popular Image" style="object-fit: cover; object-position: center;" width="80px" height="80px">
						  </div>
						  <div class="flex-grow-1 ms-3">
						  	<h6 class="t-semibold">Judul Website</h6>
						    <p class="t-ellipsis">This is some content from a media component. You can replace this with any content and adjust it as needed. Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta qui cumque hic ab facilis necessitatibus enim quia, aspernatur, tenetur dolor!</p>
						  </div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</x-applayout>