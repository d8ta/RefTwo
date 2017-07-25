<?php
	$logos = $block->getLogo();
?>
<div class="section section--margin-md">
	<div class="section__content">
		<div class="membership">
			<?php
			$title = $block->getTitle();
			?>
			<h2 class="membership__inner__title">{{$title}}</h2>
		</div>

		<div class="membership__logo-container">
			<div class="membership__logos__container">
			@foreach ($logos as $logo)
				<div class="membership__logos">
					<?php
					$logo = $logo['image'];
					?>
					<div class="membership__logos__pusher">
						<p>
							<img src="{{$logo}}">
						</p>
					</div>
				</div>
			@endforeach
			</div>
		</div>
	</div>
</div>
