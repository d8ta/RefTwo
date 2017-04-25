<?php
$fragments = $item->page->getNavNameFragments();
?>
@if( $fragments && count( $fragments ) > 1)
	<?php
		$first = array_pop( $fragments[0] );
		$second = array_pop( $fragments[1] );
	?>
	<li>
		<a href="{!!$item->url!!}"><strong>{{$first}}:</strong>&nbsp;{{$second}}</a>
		@if($sections = $item->sections)
			<ul class="navigation__level-2">
				@foreach($sections as $section)
					@if(!$section->hasHash())
						<?php continue; ?>
					@endif
					<li>
						<a href="{!!$item->url!!}{!!$section->getHashSlug()!!}">{{$section->getHashCaption()}}</a>
					</li>
				@endforeach
			</ul>
		@endif
	</li>
@endif
