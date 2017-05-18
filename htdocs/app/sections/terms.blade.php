<?php 
$ceo = $block->getCeo();
$president = $block->getPresident();
$companyname = $block->getCompanyname();
$companyaddress = $block->getCompanyaddress();
$bankdata = $block->getBankdata();
$button_url = $block->getButtonUrl();
$button_text = $block->getButtonText();
?>
<div class="section section--margin">
	<div class="section__content">
		<div class="terms">
			<div class="terms__info">
				<div class="terms__info__text">

					<h2 class="terms__infnfo__text terms__info__text__manager-title">Management</h2>
					<div class="terms__info__text terms__info__text__manager-ceo">{{$ceo}}</div>
					<div class="terms__info__text terms__info__text__manager-president">{{$president}}</div>

					<h2 class="terms__infnfo__text terms__info__text__address-title">Adresse</h2>
					<div class="terms__info__text terms__info__text__address-companyname">{{$companyname}}</div>
					<div class="terms__info__text terms__info__text__address-companyaddress editor-content">{!!$companyaddress!!}</div>
					
					<h2 class="terms__infnfo__text terms__info__text__bank-title">Bankdetails</h2>
					<div class="terms__info__text terms__info__text__bank-data editor-content">{!!$bankdata!!}</div>					
					
					<h2 class="terms__infnfo__text terms__info__text__legal-title">Geschäftsbedingungen</h2>
					<a class="btn" href="{{$button_url}}">
						{{$button_text}}
					</a>

				</div>
			</div>
		</div>
	</div>
</div>