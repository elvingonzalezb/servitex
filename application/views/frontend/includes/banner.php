<div id="hero">
	<div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
		{banners}
		<div class="item" style="background-image: url(files/banners/{BANNER_IMAGEN});">
			<div class="container-fluid">
				<div class="caption bg-color vertical-center text-left">
					<div class="big-text fadeInDown-1">
						{BANNER_TITULO}
					</div>
					<div class="excerpt fadeInDown-2 hidden-xs">
						<span>{BANNER_SUMILLA}</span>
					</div>
					{if {BANNER_LINK} !="" }
					<div class="button-holder fadeInDown-3">
						<a href="{BANNER_LINK}" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Ver más</a>
					</div>
					{/if}
				</div>
				<!-- /.caption -->
			</div>
			<!-- /.container-fluid -->
		</div>
		{/banners}
		<!-- /.item -->
	</div>
	<!-- /.owl-carousel -->
</div>