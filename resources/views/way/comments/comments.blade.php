<section class="pt-4" id="page-content">
<div class="container single-post">



			@if ($comments)
			<div class="post-item comments" id="comments">
				<div class="heading-text heading-section">
					<h2>ВІДГУКИ</h2>
				</div>
				<div class="comment-list">
					@foreach($comments as $comment)
					<!-- Comment -->
					<div class="comment" id="comment-{{ $comment->id }}">
						<div class="image"><img alt="" src="{{ asset(env('THEME')) }}/images/1.svg" class="avatar"></div>
						<div class="text">
							<h5 class="name">{{ $comment->title }}</h5>
							<span class="comment_date">Додано {{ $comment->created_at }}</span>
							<!--<a class="comment-reply-link" href="#">Відповісти</a>-->
							<div class="text_holder">
								<p>{{ $comment->text }}</p>
							</div>
						</div>
						
						@foreach($comment->sub_comments as $sub_comment)
						<!-- Comment -->
						<div class="comment" id="comment-{{ $comment->id }}-{{ $sub_comment->id }}">
							<div class="image"><img alt="" src="{{ asset(env('THEME')) }}/images/2.svg" class="avatar"></div>
							<div class="text">
								<h5 class="name">{{ $sub_comment->title }}</h5>
								<span class="comment_date">Додано {{ $comment->created_at }}</span>
								<!--<a class="comment-reply-link" href="#">Reply</a>-->
								<div class="text_holder">
									<p>{{ $sub_comment->text }}</p>
								</div>
							</div>
						</div>
						<!-- end: Comment -->
						@endforeach
					</div>
					@endforeach
					<!-- end: Comment -->
				</div>
			</div>
			@endif
			<div class="respond-form" id="respond">
				<div class="respond-comment">
					Залишити <span>Відгук</span></div>
				<form class="form-gray-fields" action="{{ route('addcomment') }}" method="POST">
					@csrf
					@method('PUT')
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label class="upper" for="name">Призвище Ім'я</label>
								<input class="form-control required" name="title" placeholder="Введіть Призвище Ім'я" id="name" aria-required="true" type="text" required>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label class="upper" for="email">Email</label>
								<input class="form-control required email" name="email" placeholder="Введіт email" id="email" aria-required="false" type="email">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<label class="upper" for="comment">Ваш відгук</label>
								<textarea class="form-control required" name="text" rows="9" placeholder="Напишіть відгук" id="comment" aria-required="true" required></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group text-center">
								<button class="btn btn-primary" type="submit">Відправити</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>